<?php
class Report extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        require_once("vendor/autoload.php");
    }



    public function index()
    {
        $this->load->view('report/testpdf');
    }


    public function reportTH()
    {
        $data['title'] = "รายงาน ข้อมูลในประเทศ";
        getHead();
        $this->load->view('report/reportTH', $data);
        getFooter();
    }


    public function fetch_user()
    {
        $this->load->model("report_model");
        $fetch_data = $this->report_model->make_datatables();
        
        
        $data = array();
        foreach ($fetch_data as $row) {

            $topic = $row->crf_topic;

            if($row->crf_topic1 != ''){
                $topic .= " / ".$row->crf_topic1;
            }
            if($row->crf_topic2 != ''){
                $topic .= " / ".$row->crf_topic2;
            }
            if($row->crf_topic3 != ''){
                $topic .= " / ".$row->crf_topic3;
            }
            if($row->crf_topic4 != ''){
                $topic .= " / ".$row->crf_topic4;
            }


            $sub_array = array();
            $sub_array[] = $row->crf_formno;
            $sub_array[] = $row->crfcus_name;
            $sub_array[] = $row->crf_alltype_subname;
            $sub_array[] = $topic;
            $sub_array[] = $row->crfcus_salesreps;
            $sub_array[] = conDateFromDb($row->crf_datecreate);
            $sub_array[] = $row->crf_status;
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->report_model->get_all_data(),
            "recordsFiltered" => $this->report_model->get_filtered_data(),
            "data" => $data
        );
        echo json_encode($output);
    }



    public function fetch_user_formSearch()
    {
        $this->load->model("report_model");
        $fetch_data = $this->report_model->make_datatables_formSearch();
        
        
        $data = array();
        foreach ($fetch_data as $row) {

            $topic = $row->crf_topic;

            if($row->crf_topic1 != ''){
                $topic .= " / ".$row->crf_topic1;
            }
            if($row->crf_topic2 != ''){
                $topic .= " / ".$row->crf_topic2;
            }
            if($row->crf_topic3 != ''){
                $topic .= " / ".$row->crf_topic3;
            }
            if($row->crf_topic4 != ''){
                $topic .= " / ".$row->crf_topic4;
            }


            $sub_array = array();
            $sub_array[] = $row->crf_formno;
            $sub_array[] = $row->crfcus_name;
            $sub_array[] = $row->crf_alltype_subname;
            $sub_array[] = $topic;
            $sub_array[] = $row->crfcus_salesreps;
            $sub_array[] = conDateFromDb($row->crf_datecreate);
            $sub_array[] = $row->crf_status;
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->report_model->get_all_data_formSearch(),
            "recordsFiltered" => $this->report_model->get_filtered_data_formSearch(),
            "data" => $data
        );
        echo json_encode($output);
    }




    // For Export Zone  // For Export Zone  // For Export Zone
    // For Export Zone  // For Export Zone  // For Export Zone


    public function reportEX()
    {
        $data['title'] = "Report Export list";
        getHead();
        $this->load->view('report/reportEX', $data);
        getFooter();
    }


    public function fetch_userex()
    {
        $this->load->model("report_model");
        $fetch_data = $this->report_model->make_datatablesEX();
        $data = array();
        foreach ($fetch_data as $row) {

            $topic = $row->crfex_topic;

            if($row->crfex_curcustopic1 != ''){
                $topic .= " / ".$row->crfex_curcustopic1;
            }
            if($row->crfex_curcustopic2 != ''){
                $topic .= " / ".$row->crfex_curcustopic2;
            }


            $sub_array = array();
            $sub_array[] = $row->crfex_formno;
            $sub_array[] = $row->crfexcus_nameEN;
            $sub_array[] = $row->crf_alltype_subnameEN;
            $sub_array[] = $topic;
            $sub_array[] = $row->crfexcus_salesreps;
            $sub_array[] = conDateFromDb($row->crfex_datecreate);
            $sub_array[] = $row->crfex_status;
            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->report_model->get_all_dataEX(),
            "recordsFiltered" => $this->report_model->get_filtered_dataEX(),
            "data" => $data
        );
        echo json_encode($output);
    }




}//End Report class
