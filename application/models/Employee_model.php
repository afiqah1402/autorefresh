<?php
class Employee_model extends CI_Model{
    public function __construct()
    {
        $this->load->database();
    }

    function getAllEmployeeIdAndName(){
        $this->db->order_by("emp_id", "asc");
        $this->db->select("emp_id, first_name, last_name");
        $query = $this->db->get('emp_info');

        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }

    function getAllEmployee(){
        $this->db->order_by("emp_id", "asc");
        // $this->db->select("emp_id, first_name, last_name");
        $query = $this->db->get('emp_info');

        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return FALSE;
        }
    }

    function getEmployeeInfoById( $empId ){
        $this->db->where( 'emp_id = ', $empId );
        $query = $this->db->get('emp_info');

        if($query->num_rows()>0){
            return $query->row_array();
        }else{
            return FALSE;
        }
    }

    function addNewEmployee( $params ){
        $data = array(
            "first_name"    => $params["first_name"],
            "last_name"     => $params["last_name"],
            "designation"   => $params["designation"],
            "based"         => $params["based"],
            "gender"        => $params["gender"],
            "salary"        => $params["salary"]
        );

        $this->db->insert('emp_info', $data); 

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    function updateEmployee( $empId, $params ){
        $data = array(
            "first_name"    => $params["first_name"],
            "last_name"     => $params["last_name"],
            "designation"   => $params["designation"],
            "based"         => $params["based"],
            "gender"        => $params["gender"],
            "salary"        => $params["salary"]
        );

        $this->db->where('emp_id', $empId);
        $this->db->update('emp_info', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}