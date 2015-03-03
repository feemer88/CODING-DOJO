<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Model {
     
     function get_all_courses()
     {
         return $this->db->query("SELECT * FROM courses ORDER BY courses.id DESC")->result_array();
     }

     function add_course($course_info)
     {
        return $this->db->query("INSERT INTO courses (name, description, created_at) VALUES (?, ?, NOW())", array($course_info['title'], $course_info['description']));
     }

     function get_specific_course($course_id)
     {

        return $this->db->query("SELECT * FROM courses WHERE id = ?", $course_id)->row();
     }

     function remove_course($course_id)
     {
        return $this->db->query("DELETE FROM courses WHERE id = ?", $course_id);
     }
}