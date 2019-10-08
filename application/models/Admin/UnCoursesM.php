<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UnCoursesM extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    } 

    public function fetchUnapprovedCourses()
    {
        $this->db->select("c.*,u.userName,s.*");
        $this->db->from("tblCourse as c");
        $this->db->join("tblUser as u","u.userID=c.userID");
        $this->db->join("tblSubject as s","c.subjectID=s.subjectID");
        $this->db->where("c.status",-1);
        return $this->db->get()->result();
    }

    public function approveCourse($id,$data)
    {
        $this->db->set($data);
        $this->db->where("courseID",$id)->update("tblCourse");
    }
}

?>