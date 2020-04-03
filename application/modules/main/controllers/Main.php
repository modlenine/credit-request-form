<?php
class Main extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model("main_model", "main");
        date_default_timezone_set("Asia/Bangkok");
        $this->load->library("pagination");
    }

    public function index()
    {
        calllogin();
        getHead();
        getContent('index');
        getFooter();
    }


    public function addTH()
    {
        calllogin();
        // Check Permission For Sales and CS only
        if (getUser()->DeptCode == 1006 || getUser()->DeptCode == 1010) {
            $data['getFormCode'] = getFormCode();
            $data['getCusProcess'] = getCusProcess();
            $data['getCreditTerm'] = getCreditTerm();
            getHead();
            getContentData('add_th', $data);
            getFooter();
        } else {
            echo "<script>alert('ขออภัยคุณไม่สามารถสร้างรายการได้ โปรดติดต่อ ฝ่ายไอที')</script>";
            header("refresh:0; url=" . base_url('main/list'));
            die();
        }
    }

    public function savedata()
    {
        calllogin();
        if (isset($_POST["user_submit"])) {
            if ($this->main->savedata() == 1) {
                echo "Insert Data Success<br>";
                header("refresh:0; url=" . base_url('main/list'));
                die();
            } else {
                echo "Insert Data Not Success";
                header("refresh:1; url=" . base_url());
            }
        }
    }


    public function list()
    {
        calllogin();
        getHead();
        getContent('list');
        getFooter();
    }


    public function pagination()
    {
        //  $this->load->model("ajax_pagination_model");
        //  $this->load->library("pagination");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->main->count_all();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'countTotal' => $this->main->count_all(),
            'country_table'   => $this->main->fetch_details($config["per_page"], $start)
        );
        echo json_encode($output);
    }


    public function paginationByDate()
    {
        //  $this->load->model("ajax_pagination_model");
        //  $this->load->library("pagination");
        $dateStart = $this->uri->segment(4);
        $dateEnd = $this->uri->segment(5);

        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->main->count_all_Date($dateStart, $dateEnd);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];



        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'countTotal' => $this->main->count_all_Date($dateStart, $dateEnd),
            'country_table'   => $this->main->fetch_detailsByDate($config["per_page"], $start, $dateStart, $dateEnd)
        );
        echo json_encode($output);
    }


    public function paginationByFormNo()
    {
        //  $this->load->model("ajax_pagination_model");
        //  $this->load->library("pagination");
        $formNo = $this->uri->segment(4);

        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->main->count_all_FormNo($formNo);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];



        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'countTotal' => $this->main->count_all_FormNo($formNo),
            'country_table'   => $this->main->fetch_detailsByFormNo($config["per_page"], $start, $formNo)
        );
        echo json_encode($output);
    }





    public function paginationByCompany()
    {
        //  $this->load->model("ajax_pagination_model");
        //  $this->load->library("pagination");
        $companyname = "";
        $companyname =$this->input->post("companyName");

        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->main->count_all_Company($companyname);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];



        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'countTotal' => $this->main->count_all_Company($companyname),
            'country_table'   => $this->main->fetch_detailsByCompany($config["per_page"], $start, $companyname)
        );
        echo json_encode($output);
    }






    public function viewdata($crf_id)
    {
        calllogin();
        $data['result'] = getViewData($crf_id);

        getHead();
        $this->load->view('view_data', $data);
        getFooter();
    }


    public function exportpdf()
    {
        getContent('exportpdf');
    }


    public function managerApprove($crfid)
    {
        if (isset($_POST['mgr_submit'])) {
            $this->main->managerApprove($crfid);
            header("refresh:0; url=" . base_url('main/list'));
        }
    }


    public function csBr($crfid)
    {
        if (isset($_POST['br_submit'])) {
            $this->main->csbr($crfid);
            header("refresh:0; url=" . base_url('main/list'));
        }
    }


    public function accMgr($crfid)
    {
        if (isset($_POST['accmgr_submit'])) {
            $this->main->accMgr($crfid);
            header("refresh:0; url=" . base_url('main/list'));
        }
    }


    public function director1($crfid)
    {
        if (isset($_POST['director_submit1'])) {
            $this->main->director1($crfid);
            header("refresh:0; url=" . base_url('main/list'));
        }
    }


    public function director2($crfid)
    {
        if (isset($_POST['director_submit2'])) {
            $this->main->director2($crfid);
            header("refresh:0; url=" . base_url('main/list'));
        }
    }


    public function saveCustomersCode($crfid, $crfcusid)
    {
        if (isset($_POST['acc_staff'])) {
            $this->main->saveCustomersCode($crfid, $crfcusid);
            header("refresh:0; url=" . base_url('main/list'));
        }
    }

    public function searchCustomerDetail()
    {
        $this->main->searchCustomerDetail();
    }
    public function searchCustomerDetailEx()
    {
        $this->main->searchCustomerDetailEx();
    }

    public function queryProcessUse()
    {
        $this->main->queryProcessUse();
    }

    public function queryPrimanageUse()
    {
        $this->main->queryPrimanageUse();
    }

    public function filterCreditTerm()
    {
        $this->main->filterCreditTerm();
    }









    // Export Zone // Export Zone // Export Zone // Export Zone // Export Zone // Export Zone
    // Export Zone // Export Zone // Export Zone // Export Zone // Export Zone // Export Zone
    public function addEx()
    {
        callLogin();
        if(getUser()->DeptCode == 1006 || getUser()->DeptCode == 1010){
            $data = array(
                'username' => getUser()->Fname . " " . getUser()->Lname,
                'deptcode' => getUser()->DeptCode,
                'deptname' => getUser()->Dept,
                'ecode' => getUser()->ecode,
                'datenow' => date("d-m-Y H:i:s"),
                'formcode' => getFormCodeEN(),
                'test' => array(
                    array('title' => 'Title1', 'body' => 'Body1'),
                    array('title' => 'Title2', 'body' => 'Body2')
                )
            );
            getHead();
            getContentData('add_en', $data);
            getFooter();
        }else{
            echo "<script>alert('Sorry you can not access to this page , Please contact admin !')</script>";
            header("refresh:0; url=" . base_url('main/listex'));
            die();
        }
       
    }

    public function savedataEX()
    {
        calllogin();
        if (isset($_POST["usercrfex_submit"])) {
            if ($this->main->savedataEX() == 1) {
                echo "Insert Data Success<br>";
                header("refresh:0; url=" . base_url('main/listex'));
                die();
            } else {
                echo "Insert Data Not Success";
                header("refresh:1; url=" . base_url());
            }
        }
    }



    public function listex()
    {
        calllogin();
        getHead();
        getContent('listex');
        getFooter();
    }


    public function paginationex()
    {
        //  $this->load->model("ajax_pagination_model");
        //  $this->load->library("pagination");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->main->count_allex();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'countTotal' => $this->main->count_allex(),
            'country_table'   => $this->main->fetch_detailsex($config["per_page"], $start)
        );
        echo json_encode($output);
    }


    public function paginationByDateex()
    {
        //  $this->load->model("ajax_pagination_model");
        //  $this->load->library("pagination");
        $dateStart = $this->uri->segment(4);
        $dateEnd = $this->uri->segment(5);

        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->main->count_all_Dateex($dateStart, $dateEnd);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];



        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'countTotal' => $this->main->count_all_Dateex($dateStart, $dateEnd),
            'country_table'   => $this->main->fetch_detailsByDateex($config["per_page"], $start, $dateStart, $dateEnd)
        );
        echo json_encode($output);
    }


    public function paginationByFormNoex()
    {
        //  $this->load->model("ajax_pagination_model");
        //  $this->load->library("pagination");
        $formNo = $this->uri->segment(4);

        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->main->count_all_FormNoex($formNo);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];



        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'countTotal' => $this->main->count_all_FormNoex($formNo),
            'country_table'   => $this->main->fetch_detailsByFormNoex($config["per_page"], $start, $formNo)
        );
        echo json_encode($output);
    }





    public function paginationByCompanyex()
    {
        //  $this->load->model("ajax_pagination_model");
        //  $this->load->library("pagination");
        $companyname = $this->uri->segment(4);

        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->main->count_all_Companyex($companyname);
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 1;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];



        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'countTotal' => $this->main->count_all_Companyex($companyname),
            'country_table'   => $this->main->fetch_detailsByCompanyex($config["per_page"], $start, $companyname)
        );
        echo json_encode($output);
    }


    public function viewdataEx($crfexid)
    {

        if (viewdataEX($crfexid)->crfex_custype == 1) {
            $salesreps = viewdataEX($crfexid)->crfex_salesreps;
            $customernameEN = viewdataEX($crfexid)->crfex_cusnameEN;
            $customernameTH = viewdataEX($crfexid)->crfex_cusnameTH;
            $cusaddress = viewdataEX($crfexid)->crfex_address;
            $tel = viewdataEX($crfexid)->crfex_tel;
            $fax = viewdataEX($crfexid)->crfex_fax;
            $email = viewdataEX($crfexid)->crfex_email;
            $creditlimit = viewdataEX($crfexid)->crfex_creditlimit;
            $cterm = viewdataEX($crfexid)->crfex_cterm;
            $cdiscount = viewdataEX($crfexid)->crfex_cdiscount;
            $crfex_bg = viewdataEX($crfexid)->crfex_bg;
        } else if (viewdataEX($crfexid)->crfex_custype == 2) {
            if (viewdataEX($crfexid)->crfex_status == 'Complated') {
                $salesreps = viewdataEX($crfexid)->crfex_salesreps;
                $customernameEN = viewdataEX($crfexid)->crfex_cusnameEN;
                $customernameTH = viewdataEX($crfexid)->crfex_cusnameTH;
                $cusaddress = viewdataEX($crfexid)->crfex_address;
                $tel = viewdataEX($crfexid)->crfex_tel;
                $fax = viewdataEX($crfexid)->crfex_fax;
                $email = viewdataEX($crfexid)->crfex_email;
                $creditlimit = viewdataEX($crfexid)->crfex_creditlimit;
                $cterm = viewdataEX($crfexid)->crfex_cterm;
                $cdiscount = viewdataEX($crfexid)->crfex_cdiscount;
                $crfex_bg = viewdataEX($crfexid)->crfex_bg;
                $crfexm_pcreditlimit = viewdataEX($crfexid)->crfex_pcreditlimit;
                $crfexm_pterm = viewdataEX($crfexid)->crfex_pterm;
                $crfexm_pdiscount = viewdataEX($crfexid)->crfex_pdiscount;
            } else {
                $salesreps = viewdataEX($crfexid)->crfexm_salesreps;
                $customernameEN = viewdataEX($crfexid)->crfexm_cusnameEN;
                $customernameTH = viewdataEX($crfexid)->crfexm_cusnameTH;
                $cusaddress = viewdataEX($crfexid)->crfexm_address;
                $tel = viewdataEX($crfexid)->crfexm_tel;
                $fax = viewdataEX($crfexid)->crfexm_fax;
                $email = viewdataEX($crfexid)->crfexm_email;
                $creditlimit = viewdataEX($crfexid)->crfexm_creditlimit;
                $cterm = viewdataEX($crfexid)->crfexm_term;
                $cdiscount = viewdataEX($crfexid)->crfexm_discount;
                $crfex_bg = viewdataEX($crfexid)->crfexm_bg;
                $crfexm_pcreditlimit = viewdataEX($crfexid)->crfexm_pcreditlimit;
                $crfexm_pterm = viewdataEX($crfexid)->crfexm_pterm;
                $crfexm_pdiscount = viewdataEX($crfexid)->crfexm_pdiscount;
            }
        }



        $data = array(
            'username' => getUser()->Fname . " " . getUser()->Lname,
            'deptcode' => getUser()->DeptCode,
            'deptname' => getUser()->Dept,
            'ecode' => getUser()->ecode,
            'posi' => getUser()->posi,
            'datenow' => date("d-m-Y H:i:s"),
            'formcode' => getFormCodeEN(),
            'company' => viewdataEX($crfexid)->crfex_company,
            'customertype' => viewdataEX($crfexid)->crfex_custype,
            'datecreate' => conDateFromDb(viewdataEX($crfexid)->crfex_datecreate),
            'customercode' => viewdataEX($crfexid)->crfex_cuscode,
            'salesreps' => $salesreps,
            'customernameEN' => $customernameEN,
            'customernameTH' => $customernameTH,
            'cusaddress' => $cusaddress,
            'tel' => $tel,
            'fax' => $fax,
            'email' => $email,
            'pcreditlimit' => $crfexm_pcreditlimit,
            'pterm' => $crfexm_pterm,
            'pdiscount' =>  $crfexm_pdiscount,
            'ccreditlimit' => $creditlimit,
            'cterm' => $cterm,
            'cdiscount' => $cdiscount,
            'crfex_bg' => $crfex_bg,
            'brcode' => viewdataEX($crfexid)->crfex_brcode,
            'userpost' => viewdataEX($crfexid)->crfex_userpost,
            'userdept' => viewdataEX($crfexid)->crfex_userdept,
            'userdatetime' => conDateTimeFromDb(viewdataEX($crfexid)->crfex_userdatetime),
            'status' => viewdataEX($crfexid)->crfex_status,
            'checkpage' => $this->uri->segment(2),
            'exManagerApprove' => base_url('main/exManagerApprove/') . $crfexid,
            'show_crfex_mgrapp_status' => viewdataEX($crfexid)->crfex_mgrapp_status,
            'show_crfex_mgrapp_detail' => viewdataEX($crfexid)->crfex_mgrapp_detail,
            'show_crfex_mgrapp_username' => viewdataEX($crfexid)->crfex_mgrapp_username,
            'show_crfex_mgrapp_datetime' => conDateTimeFromDb(viewdataEX($crfexid)->crfex_mgrapp_datetime),
            'exCsAddBr' => base_url('main/exCsAddBr/') . $crfexid,
            'crfex_csuserpost' => viewdataEX($crfexid)->crfex_csuserpost,
            'crfex_csmemo' => viewdataEX($crfexid)->crfex_csmemo,
            'crfex_csdept' => viewdataEX($crfexid)->crfex_csdept,
            'crfex_csdatetime' => conDateTimeFromDb(viewdataEX($crfexid)->crfex_csdatetime),
            'exAccMgrApprove' => base_url('main/exAccMgrApprove/') . $crfexid,
            'crfex_accmgr_status' => viewdataEX($crfexid)->crfex_accmgr_status,
            'crfex_accmgr_username' => viewdataEX($crfexid)->crfex_accmgr_username,
            'crfex_accmgr_datetime' => conDateTimeFromDb(viewdataEX($crfexid)->crfex_accmgr_datetime),
            'crfex_accmgr_detail' => viewdataEX($crfexid)->crfex_accmgr_detail,
            'exDirectorApprove' => base_url('main/exDirectorApprove/') . $crfexid,
            'crfex_directorapp_status' => viewdataEX($crfexid)->crfex_directorapp_status,
            'crfex_directorapp_username' => viewdataEX($crfexid)->crfex_directorapp_username,
            'crfex_directorapp_datetime' => conDateTimeFromDb(viewdataEX($crfexid)->crfex_directorapp_datetime),
            'crfex_directorapp_detail' => viewdataEX($crfexid)->crfex_directorapp_detail,
            'crfex_customerid' => viewdataEX($crfexid)->crfex_customerid,
            'exAccountAddCusCode' => base_url('main/exAccountAddCusCode/') . $crfexid,
            'crfex_accmemo' => viewdataEX($crfexid)->crfex_accmemo,
            'crfex_accuserpost' => viewdataEX($crfexid)->crfex_accuserpost,
            'crfex_accdatetime' => conDateTimeFromDb(viewdataEX($crfexid)->crfex_accdatetime),
            'crfex_methodcurcus' => viewdataEX($crfexid)->crfex_methodcurcus


        );

        getHead();
        getContentData('view_data_ex', $data);
        getFooter();
    }



    public function exManagerApprove($crfexid)
    {
        if (isset($_POST['ex_mgrSubmit'])) {
            $this->main->exManagerApprove($crfexid);
            header("refresh:0; url=" . base_url('main/listex'));
        }
    }


    public function exCsAddBr($crfexid)
    {
        if (isset($_POST['ex_csSubmit'])) {
            $this->main->exCsAddBr($crfexid);
            header("refresh:0; url=" . base_url('main/listex'));
        }
    }


    public function exAccMgrApprove($crfexid)
    {
        if (isset($_POST['ex_accManagerSubmit'])) {
            $this->main->exAccMgrApprove($crfexid);
            header("refresh:0; url=" . base_url('main/listex'));
        }
    }


    public function exDirectorApprove($crfexid)
    {
        if (isset($_POST['ex_directorSubmit'])) {
            $this->main->exDirectorApprove($crfexid);
            header("refresh:0; url=" . base_url('main/listex'));
        }
    }


    public function exAccountAddCusCode($crfexid)
    {
        if (isset($_POST['ex_accSubmit'])) {
            $this->main->exAccountAddCusCode($crfexid);
            header("refresh:0; url=" . base_url('main/listex'));
        }
    }
}
// Main Controller
