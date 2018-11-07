<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');

        $this->load->library('EmployeeService');
    }

    public function index(){
        echo "testing default controller";
    }

	public function readAll()
	{
        $data = $this->employeeservice->getAllEmp();
        echo json_encode($data);
    }
    
    public function readOne()
    {
        $empId = $this->input->get('empId');
        $this->employeeservice->setEmpId($empId);
        $data = $this->employeeservice->getEmpInfo();
        
        echo json_encode($data);
    }

    public function insert()
    {
        // input : emp_id, first_name, last_name, designation, based, gender, salary
        $params = [
			'first_name'	=> $this->input->post('first_name'),
			'last_name'		=> $this->input->post('last_name'),
			'designation'	=> $this->input->post('designation'),
			'based'		    => $this->input->post('based'),
			'gender'		=> $this->input->post('gender'),
			'salary'	    => $this->input->post('salary')
		];
        // employee model -> add
        $msg = $this->employeeservice->addEmployee($params);
        echo json_encode($msg);
    }

    public function update()
    {
        // input : emp_id, first_name, last_name, designation, based, gender, salary
        $params = [
			'first_name'	=> $this->input->post('first_name'),
			'last_name'		=> $this->input->post('last_name'),
			'designation'	=> $this->input->post('designation'),
			'based'		    => $this->input->post('based'),
			'gender'		=> $this->input->post('gender'),
			'salary'	    => $this->input->post('salary')
        ];
        $empId = $this->input->post('emp_id');
        $this->employeeservice->setEmpId($empId);

        $msg = $this->employeeservice->updateEmployee($params);
        // employee model -> edit by emp_id
        // echo json_encode($params["emp_id"]);
        echo json_encode($msg);
        // echo $params["emp_id"];
    }

    public function add()
    {
        $data['mode'] = 'add';

        $this->load->view('includes/header');
        $this->load->view('emp_add_edit', $data);
        $this->load->view('includes/footer');
    }

    public function edit()
    {
        $data['mode'] = 'edit';
        $empId = $this->input->get('empId');
        $data['empId'] = $empId;

        $this->load->view('includes/header');
        $this->load->view('emp_add_edit', $data);
        $this->load->view('includes/footer');
    }

    public function empList()
    {
        $this->load->view('includes/header');
        $this->load->view('emp_list');
        $this->load->view('includes/footer');
    }

    public function empInfo()
    {
        $empId = $this->input->get('empId');
        $data['empId'] = $empId;

        $this->load->view('includes/header');
        $this->load->view('emp_info', $data);
        $this->load->view('includes/footer');
    }
}
