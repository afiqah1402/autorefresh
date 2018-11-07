<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeService {
    protected $empId = 0;

    public function __construct(){
        $this->CI = &get_instance();
        $this->CI->load->model('Employee_model', 'emp');
    }

    public function setEmpId( $empId ){
        $this->empId = $empId;
    }

    public function getAllEmp(){
        $empData = $this->CI->emp->getAllEmployee();

        return $empData;
    }

    public function getEmpInfo(){
        $currEmpId = $this->empId;

        $empData = $this->CI->emp->getEmployeeInfoById($currEmpId);

        return $empData;
    }

    public function addEmployee( $params ){
        $addSuccessful = $this->CI->emp->addNewEmployee($params);

        $retVal = array(
            "msg" => $addSuccessful ? "The new employee added successfuly" : "Cannot add employee"
        );

        return $retVal;
    }

    public function updateEmployee( $params ){
        $currEmpId = $this->empId;

        $updateSuccessful = $this->CI->emp->updateEmployee($currEmpId, $params);

        $retVal = array(
            "msg" => $updateSuccessful ? "The employee info updated successfuly" : "Cannot update this employee"
        );

        return $retVal;
    }
}