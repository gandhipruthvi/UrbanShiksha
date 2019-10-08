<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class ForumC extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User/ForumM','fm');
		if(!$this->session->userID)
		{
			redirect("User/LoginC");
		}
	}

	public function index()
	{
		$forumData = $this->fm->fetchForum();
		foreach ($forumData as $key) 
		{
			$key->forum = $this->fm->fetchForumCount($key->forumID);
		}
		foreach ($forumData as $key) 
		{
			$key->user = $this->fm->fetchUser($key->creatorID);
		}

		$data = array(
			"forumData" => $forumData
		);
		$this->load->view('User/forums-detail',$data);
	}

	public function singlePost($forumID)
	{
		$forumTopic = $this->fm->fetchForumTopic($forumID);
		$forumPost = $this->fm->fetchSinglePost($forumID);
		$likedPost = $this->fm->fetchLikedPost($this->session->userID);
		foreach ($forumPost as $key) 
		{
			$key->user = $this->fm->fetchUser($key->userID);
			$key->postLikes = $this->fm->fetchPostLikes($key->forumPostID);
		}
		$data = array(
			"forumPost" => $forumPost,
			"forumID" => $forumID,
			"likedPost" => $likedPost,
			"forumTopic" => $forumTopic
		);
		$this->load->view('User/forum-single-topic',$data);
	}

	public function addForum($forumID)
	{
		$data = array(
			"forumID" => $forumID,
			"userID" => $this->session->userID,
			"forumPost" => $this->input->post("forumData")
		);
		$this->fm->addForum($data);

		$likedPost = $this->fm->fetchLikedPost($this->session->userID);
		$likedp = array();

		foreach ($likedPost as $key) 
		{
			$likedp[] = $key->forumPostID;
		}

		$forumPost = $this->fm->fetchSinglePost($forumID);
		foreach ($forumPost as $key) 
		{
			$key->user = $this->fm->fetchUser($key->userID);
			$key->postLikes = $this->fm->fetchPostLikes($key->forumPostID);
		}

		foreach ($forumPost as $key) 
		{
			?>
			<div class="details-slide" style="border-width: 2px">
				<div class="user-info">
					<?php
					foreach ($key->user as $key0) 
					{
						?>
						<a><img src="upload/<?=$key0->image?>" alt="User Image" style="height: 90px;width: 100px;"></a>
						<div class="name" style="font-size: 16px"><b><i><?=$key0->userName?></i></b></div>
						<?php
					}
					?>
				</div>
				<div class="date" style="color: #646363; font-size: 16px"><b><?=$key->postDate?></b></div>
				<p style="color: #B22222; font-size: 20px"><?=$key->forumPost?></p>
				<div class="tg-description" style="font-size: 12px;color: green;">
					<u><b><a href="javascript:void(0)" style="font-size: 14px;color: green;" class="like" data-post-id="<?=$key->forumPostID?>" id="like-<?=$key->forumPostID?>"><?php if(in_array($key->forumPostID,$likedp)){echo "Unlike";}else echo "Like";?> <?=$key->postLikes?></a></b></u>
				</div>                     
			</div>
			<?php
		}
	}

	public function searchPost($forumID)
	{
		$searchPost = $this->input->post("searchPost");
		$forumPost = $this->fm->searchPost($searchPost,$forumID);
		foreach ($forumPost as $key) 
		{
			$key->user = $this->fm->fetchUser($key->userID);
			$key->postLikes = $this->fm->fetchPostLikes($key->forumPostID);
		}
		$likedPost = $this->fm->fetchLikedPost($this->session->userID);
		$likedp = array();

		foreach ($likedPost as $key) 
		{
			$likedp[] = $key->forumPostID;
		}

		foreach ($forumPost as $key) 
		{
			?>
			<div class="details-slide" style="border-width: 2px">
				<div class="user-info">
					<?php
					foreach ($key->user as $key0) 
					{
						?>
						<a><img src="upload/<?=$key0->image?>" alt="User Image" style="height: 90px;width: 100px;"></a>
						<div class="name" style="font-size: 16px"><b><i><?=$key0->userName?></i></b></div>
						<?php
					}
					?>
				</div>
				<div class="date" style="color: #646363; font-size: 16px"><b><?=$key->postDate?></b></div>
				<p style="color: #B22222; font-size: 20px"><?=$key->forumPost?></p>
				<div class="tg-description" style="font-size: 12px;color: green;">
					<u><b><a href="javascript:void(0)" style="font-size: 14px;color: green;" class="like" data-post-id="<?=$key->forumPostID?>" id="like-<?=$key->forumPostID?>"><?php if(in_array($key->forumPostID,$likedp)){echo "Unlike";}else echo "Like";?> <?=$key->postLikes?></a></b></u>
				</div>                     
			</div>
			<?php
		}
	}

	public function searchForum()
	{
		$searchF = $this->input->post("searchF");
		$x = $this->fm->searchForum($searchF);
		foreach ($x as $key) 
		{
			$key->forum = $this->fm->fetchForumCount($key->forumID);
		}
		foreach ($x as $key) 
		{
			$key->user = $this->fm->fetchUser($key->creatorID);
		}
		$i = 1;
		foreach ($x as $key) 
		{
			if($i%2==0)
			{
				$t = " even";
			}
			else
			{
				$t = "";
			}
			?>
			<div class="details-slide<?=$t?>">
				<div class="name"><a href="<?=site_url('User/ForumC/singlePost/').$key->forumID?>" style="font-size: 22px;"><b><i><?=$key->forumTopic?></i></b></a></div>
				<div class="info" style="padding-top: 15px">
					<?php
					foreach ($key->user as $key0)
					{
						?>
						<div class="block"><i class="fa fa-pencil fa-lg"></i><img class="popper" src="upload/<?=$key0->image?>" alt="User Image" data-toggle="popover" style="height: 50px;width: 50px;margin-left: 25px;margin-right: 20px"><b><span style="font-size: 18px"><?=$key0->userName?></span></b>
							<div class="popper-content hide"><p><img src="<?=base_url();?>upload/<?=$key0->image?>"></p><p>Name : <?=$key0->userName?></p></div>
						</div>
						<?php
					}
					?>

					<div class="block" style="margin-left: 40px; margin-top:7px"><i class="fa fa-comment fa-lg"></i><b><span style="color: #4682B4; font-size: 20px"><?=$key->forum?></span></b></div>

					<div class="block" style="margin-left: 40px; margin-top:7px"><i class="fa fa-clock-o fa-lg"></i><b><span style="color: #646363; font-size: 16px"><?=$key->createdDate?></span></b></div>
				</div>
			</div>
			<?php
			$i++;
		}
	}

	public function addForumPostLike($forumPostID)
	{
		$data = array(
			"forumPostID" => $forumPostID,
			"userID" => $this->session->userID,
		);

		$x = $this->fm->addForumPostLike($data);
		$cnt = $this->fm->countPostLike($forumPostID);

		if($x)
		{
			echo "Like $cnt";
		}
		else
		{
			echo "Unlike $cnt";
		}
	}

	public function addForumPost()
	{
		$data=array(
			"creatorID"=>$this->session->userID,
			"forumTopic"=>$this->input->post("postData")
		);
		$this->fm->addForumPost($data);
	}
}
?>