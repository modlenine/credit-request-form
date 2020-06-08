<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends MX_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model("customers_model" , "customer");
    }
    

    public function index()
    {
        redirect(base_url('customers/addCustomer'));
    }

    public function addCustomer()
    {
        $data = array(
            "title" => "หน้าเพิ่มข้อมูลลูกค้า",
            "getCusProcess" => getCusProcess(),
            "getCreditTerm" => getCreditTerm()
        );
        getHead();
        getContentData("addcustomer" , $data);
        getFooter();
    }

    public function saveCustomer()
    {
        $this->customer->saveCustomer();
        header("refresh:0; url=".base_url());
    }

    public function customerList()
    {
        $data = array(
            "title" => "รายการลูกค้า",
            "geturl" => $this->uri->segment(2)
        );
        getHead();
        getContentData("customerslist", $data);
        getFooter();
    }

    public function fetchCustomerlist()
    {
        $data['rss'] = getcustomerlist();
        $this->load->view("resultCustomerList" , $data);
    }

    public function fetchCustomercode()
    {
        $this->customer->checkCustomerCode();
    }



    // Export Zone Export Zone Export Zone Export Zone
    public function addCustomerEx()
    {
        $data = array(
            "title" => "Add Customer page",
            "datenow" => date("d-m-Y"),
            "username" => getUser()->Fname." ".getUser()->Lname,
            "deptname" => getUser()->Dept,
            "datetimenow" => date("d-m-Y H:i:s"),
            "deptcode" => getUser()->DeptCode,
            "ecode" => getUser()->ecode
        );
        getHead();
        getContentData("addcustomerEx" , $data);
        getFooter();
    }

    public function saveCustomerEx()
    {
        $this->customer->saveCustomerEx();
        header("refresh:0; url=".base_url());
    }

    public function customerListEx()
    {
        $data = array(
            "title" => "รายการลูกค้า ต่างประเทศ",
            "geturl" => $this->uri->segment(2)
        );
        getHead();
        getContentData("customerslistEx", $data);
        getFooter();
    }
    public function fetchCustomerlistEx()
    {
        $data['rss'] = getcustomerlistEx();
        $this->load->view("resultCustomerListEx" , $data);
    }

    public function fetchCustomercodeEx()
    {
        $this->customer->checkCustomerCodeEx();
    }





}

/* End of file Customers.php */






?>