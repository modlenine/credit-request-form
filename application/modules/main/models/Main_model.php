<?php
class Main_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        date_default_timezone_set("Asia/Bangkok");
    }

    private function uploadFiles($fileinput = '', $filenameType = '')
    {

        $time = date("H-i-s"); //ดึงวันที่และเวลามาก่อน
        $file_name = $_FILES[$fileinput]['name'];
        $file_name_cut = str_replace(" ", "", $file_name);
        $file_name_date = substr_replace(".", getFormNo() . "-" . $filenameType . "-" . $time . ".pdf", 0);
        $file_size = $_FILES[$fileinput]['size'];
        $file_tmp = $_FILES[$fileinput]['tmp_name'];
        $file_type = $_FILES[$fileinput]['type'];
        move_uploaded_file($file_tmp, "upload/" . $file_name_date);
        $filelocation = "upload";


        // print_r($file_name_date);
        // echo "<br>" . "Copy/Upload Complete" . "<br>";
        return $file_name_date;
    }




    public function savedata()
    {
        $getFormNo = getFormNo();
        $getCustomerNumber = getCustomerNumber();

        $report_date = "";
        $report_month = "";
        $report_year = "";

        $conReportDate = date_create($this->input->post("crf_datecreate"));
        $report_date = date_format($conReportDate, "d");

        $conReportMonth = date_create($this->input->post("crf_datecreate"));
        $report_month = date_format($conReportMonth, "m");

        $conReportYear = date_create($this->input->post("crf_datecreate"));
        $report_year = date_format($conReportYear, "Y");

        if ($this->input->post('crf_type') == 1) {
            // ถ้าเลือกประเภทลูกค้า = ลูกค้าใหม่

            if ($_FILES["crf_file1"]["name"] != "") {
                $file1 = "crf_file1";
                $fileType1 = "ภพ20";
                $this->uploadFiles($file1, $fileType1);
                $resultFile1 = $this->uploadFiles($file1, $fileType1);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ ภพ.20<br>";
            }

            if ($_FILES["crf_file2"]["name"] != "") {
                $file2 = "crf_file2";
                $fileType2 = "หนังสือรับรอง";
                $this->uploadFiles($file2, $fileType2);
                $resultFile2 = $this->uploadFiles($file2, $fileType2);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ หนังสือรับรอง<br>";
            }

            if ($_FILES["crf_file3"]["name"] != "") {
                $file3 = "crf_file3";
                $fileType3 = "ข้อมูลทั่วไป";
                $this->uploadFiles($file3, $fileType3);
                $resultFile3 = $this->uploadFiles($file3, $fileType3);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ ข้อมูลทั่วไป<br>";
            }

            if ($_FILES["crf_file4"]["name"] != "") {
                $file4 = "crf_file4";
                $fileType4 = "งบแสดงฐานะทางการเงิน";
                $this->uploadFiles($file4, $fileType4);
                $resultFile4 = $this->uploadFiles($file4, $fileType4);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ งบแสดงฐานะทางการเงิน<br>";
            }

            if ($_FILES["crf_file5"]["name"] != "") {
                $file5 = "crf_file5";
                $fileType5 = "งบกำไรขาดทุน";
                $this->uploadFiles($file5, $fileType5);
                $resultFile5 = $this->uploadFiles($file5, $fileType5);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ งบกำไรขาดทุน<br>";
            }

            if ($_FILES["crf_file6"]["name"] != "") {
                $file6 = "crf_file6";
                $fileType6 = "อัตราส่วนสภาพคล่อง";
                $this->uploadFiles($file6, $fileType6);
                $resultFile6 = $this->uploadFiles($file6, $fileType6);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ อัตราส่วนสภาพคล่อง<br>";
            }

            // แนบไฟล์แผนที่วางบิล
            $resulttablebill = "";
            if ($_FILES["crf_tablebill"]["name"] != "") {
                $tablebill = "crf_tablebill";
                $tablebillname = "ตารางวางบิล";
                $this->uploadFiles($tablebill, $tablebillname);
                $resulttablebill = $this->uploadFiles($tablebill, $tablebillname);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ ตารางวางบิล<br>";
            }
            $resultmapbill = "";
            if ($_FILES["crf_mapbill"]["name"] != "") {
                $mapbill = "crf_mapbill";
                $mapbillname = "แผนที่ที่ไปวางบิล";
                $this->uploadFiles($mapbill, $mapbillname);
                $resultmapbill = $this->uploadFiles($mapbill, $mapbillname);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ แผนที่ที่ไปวางบิล<br>";
            }

            $resultmapbill2 = "";
            if ($_FILES["crf_mapbill2"]["name"] != "") {
                $mapbill2 = "crf_mapbill2";
                $mapbillname2 = "แผนที่ที่ไปวางบิล2";
                $this->uploadFiles($mapbill2, $mapbillname2);
                $resultmapbill2 = $this->uploadFiles($mapbill2, $mapbillname2);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ แผนที่ที่ไปวางบิล<br>";
            }
            // แนบไฟล์แผนที่วางบิล


            // แนบตารางวางบิลรับเช็ค
            $result_recive_cheuqetable = "";
            if ($_FILES["crf_recive_cheuqetable"]["name"] != "") {
                $recive_cheuqetable = "crf_recive_cheuqetable";
                $recive_cheuqetablename = "ตารางวางบิลรับเช็ค";
                $this->uploadFiles($recive_cheuqetable, $recive_cheuqetablename);
                $result_recive_cheuqetable = $this->uploadFiles($recive_cheuqetable, $recive_cheuqetablename);
            } else {
                echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ ตารางวางบิลรับเช็ค<br>";
            }



            $arcustomer = array(
                "crfcus_id" => $getCustomerNumber,
                "crfcus_formno" => $getFormNo,
                "crfcus_area" => $this->input->post("crf_company"),
                "crfcus_salesreps" => $this->input->post("crf_salesreps"),
                "crfcus_name" => $this->input->post("crf_customername"),
                "crfcus_comdatecreate" => $this->input->post("crf_cuscompanycreate"),
                "crfcus_addresstype" => $this->input->post("crf_addresstype"),
                "crfcus_address" => $this->input->post("crf_addressname"),
                "crfcus_contactname" => $this->input->post("crf_namecontact"),
                "crfcus_phone" => $this->input->post("crf_telcontact"),
                "crfcus_fax" => $this->input->post("crf_faxcontact"),
                "crfcus_email" => $this->input->post("crf_emailcontact"),
                "crfcus_regiscapital" => conPrice($this->input->post("crf_regiscost")),
                "crfcus_companytype" => $this->input->post("crf_companytype"),
                "crfcus_comtype2" => $this->input->post("crf_companytype2"),
                "crfcus_comtype31" => $this->input->post("crf_companytype3_1_1"),
                "crfcus_comtype32" => $this->input->post("crf_companytype3_1_2"),
                "crfcus_comtype33" => $this->input->post("crf_companytype3_2_1"),
                "crfcus_comtype34" => $this->input->post("crf_companytype3_2_2"),
                "crfcus_typebussi" => $this->input->post("crf_typeofbussi"),
                "crfcus_forecast" => $this->input->post("crf_forecast"),
                "crfcus_file1" => $resultFile1,
                "crfcus_file2" => $resultFile2,
                "crfcus_file3" => $resultFile3,
                "crfcus_file4" => $resultFile4,
                "crfcus_file5" => $resultFile5,
                "crfcus_file6" => $resultFile6,
                "crfcus_creditterm" => $this->input->post("crf_creditterm"),
                "crfcus_conditionbill" => $this->input->post("crf_condition_bill"),
                "crfcus_tablebill" => $resulttablebill,
                "crfcus_mapbill" => $resultmapbill,
                "crfcus_datebill" => $this->input->post("crf_datebill"),
                "crfcus_mapbill2" => $resultmapbill2,
                "crfcus_conditionmoney" => $this->input->post("crf_condition_money"),
                "crfcus_cheuqetable" => $result_recive_cheuqetable,
                "crfcus_cheuqedetail" => $this->input->post("crf_recive_cheuqedetail"),
                "crfcus_moneylimit" => conPrice($this->input->post("crf_finance_req_number")),
                "crfcus_usercreate" => $this->input->post("crf_userpost"),
                "crfcus_usercreate_ecode" => $this->input->post("crf_userecodepost"),
                "crfcus_usercreate_deptcode" => $this->input->post("crf_userdeptcodepost"),
                "crfcus_datemodify" => date("Y-m-d H:i:s"),
                "crfcus_tempstatus" => "Processing"
            );


            $arsavedata = array(
                "crf_formno" => $getFormNo,
                "crf_cuscode" => $getCustomerNumber,
                "crf_company" => $this->input->post("crf_company"),
                "crf_datecreate" => conDateToDb($this->input->post("crf_datecreate")),
                "crf_type" => $this->input->post("crf_type"),
                "crf_change_creditterm" => $this->input->post("crf_change_creditterm"),
                "crf_condition_credit" => $this->input->post("crf_condition_credit"),
                "crf_creditterm" => $this->input->post("crf_creditterm"),
                "crf_creditterm2" => $this->input->post("crf_creditterm2"),
                "crf_finance" => $this->input->post("crf_finance"),
                "crf_userpost" => $this->input->post("crf_userpost"),
                "crf_userecodepost" => $this->input->post("crf_userecodepost"),
                "crf_userdeptcodepost" => $this->input->post("crf_userdeptcodepost"),
                "crf_userdeptpost" => $this->input->post("crf_userdeptpost"),
                "crf_userpostdatetime" => conDateTimeToDb($this->input->post("crf_userpostdatetime")),
                "crf_status" => "Open",
                "crf_topic" => "ลูกค้าใหม่ ขอวงเงิน",
                "crfw_salesreps" => $this->input->post("crf_salesreps"),
                "crf_report_date" => $report_date,
                "crf_report_month" => $report_month,
                "crf_report_year" => $report_year
            );


            $this->db->insert("crf_customers_temp",  $arcustomer);
            $this->db->insert("crf_maindata", $arsavedata);


            if (isset($_POST["crf_primanage_dept"])) {
                $crf_primanage_dept = $this->input->post('crf_primanage_dept');

                foreach ($crf_primanage_dept as $key => $rs) {

                    $arsavePri = array(
                        "crf_pricusid" => $getCustomerNumber,
                        "crf_primanage_dept" => $rs,
                        "crf_primanage_name" => $this->input->post("crf_primanage_name")[$key],
                        "crf_primanage_posi" => $this->input->post("crf_primanage_posi")[$key],
                        "crf_primanage_email" => $this->input->post("crf_primanage_email")[$key]
                    );
                    $this->db->insert("crf_pri_manage", $arsavePri);
                }
            }

            if (isset($_POST["crf_process"])) {
                $crf_process = $this->input->post("crf_process");

                foreach ($crf_process as $key => $rs) {

                    $arsaveProcess = array(
                        "crf_cusid" => $getCustomerNumber,
                        "crf_process_name" => $rs
                    );
                    $this->db->insert("crf_process_use",  $arsaveProcess);
                }
            }


            //Update User log table
            $aruserlog = array(
                "crfuserlog_datetime" => date("Y-m-d H:i:s"),
                "crfuserlog_activity" => "สร้างลูกค้าใหม่",
                "crfuserlog_username" => $this->input->post("crf_userpost"),
                "crfuserlog_deptcode" => $this->input->post("crf_userdeptcodepost"),
                "crfuserlog_ecode" => $this->input->post("crf_userecodepost")
            );
            $this->db->insert("crf_userlog", $aruserlog);
            return 1;
        } else {


            // Get data From customers table to customers_temp table
            if ($this->input->post("crf_cusid") != "") {
                $this->db->select("*");
                $this->db->from("crf_customers");
                $this->db->where("crfcus_id", $this->input->post("crf_cusid"));
                $this->db->where("crfcus_area" , $this->input->post("addThArea"));
                $query = $this->db->get();


                foreach ($query->result() as $result) {
                    $arCopyToTempTable = array(
                        "crfcus_id" => $result->crfcus_id,
                        "crfcus_code" => $result->crfcus_code,
                        "crfcus_brcode" => $result->crfcus_brcode,
                        "crfcus_salesreps" => $result->crfcus_salesreps,
                        "crfcus_name" => $result->crfcus_name,
                        "crfcus_area" => $result->crfcus_area,
                        "crfcus_comdatecreate" => $result->crfcus_comdatecreate,
                        "crfcus_addresstype" => $result->crfcus_addresstype,
                        "crfcus_address" => $result->crfcus_address,
                        "crfcus_contactname" => $result->crfcus_contactname,
                        "crfcus_phone" => $result->crfcus_phone,
                        "crfcus_fax" => $result->crfcus_fax,
                        "crfcus_email" => $result->crfcus_email,
                        "crfcus_regiscapital" => $result->crfcus_regiscapital,
                        "crfcus_companytype" => $result->crfcus_companytype,
                        "crfcus_comtype2" => $result->crfcus_comtype2,
                        "crfcus_comtype31" => $result->crfcus_comtype31,
                        "crfcus_comtype32" => $result->crfcus_comtype32,
                        "crfcus_comtype33" => $result->crfcus_comtype33,
                        "crfcus_comtype34" => $result->crfcus_comtype34,
                        "crfcus_typebussi" => $result->crfcus_typebussi,
                        "crfcus_forecast" => $result->crfcus_forecast,
                        "crfcus_file1" => $result->crfcus_file1,
                        "crfcus_file2" => $result->crfcus_file2,
                        "crfcus_file3" => $result->crfcus_file3,
                        "crfcus_file4" => $result->crfcus_file4,
                        "crfcus_file5" => $result->crfcus_file5,
                        "crfcus_file6" => $result->crfcus_file6,
                        "crfcus_creditterm" => $result->crfcus_creditterm,
                        "crfcus_creditterm2" => $result->crfcus_creditterm2,
                        "crfcus_conditionbill" => $result->crfcus_conditionbill,
                        "crfcus_tablebill" => $result->crfcus_tablebill,
                        "crfcus_mapbill" => $result->crfcus_mapbill,
                        "crfcus_datebill" => $result->crfcus_datebill,
                        "crfcus_mapbill2" => $result->crfcus_mapbill2,
                        "crfcus_conditionmoney" => $result->crfcus_conditionmoney,
                        "crfcus_cheuqetable" => $result->crfcus_cheuqetable,
                        "crfcus_cheuqedetail" => $result->crfcus_cheuqedetail,
                        "crfcus_moneylimit" => $result->crfcus_moneylimit,
                        "crfcus_moneylimit2" => $result->crfcus_moneylimit2,
                        "crfcus_usercreate" => $result->crfcus_usercreate,
                        "crfcus_usercreate_ecode" => $result->crfcus_usercreate_ecode,
                        "crfcus_usercreate_deptcode" => $result->crfcus_usercreate_deptcode,
                        "crfcus_datemodify" => $result->crfcus_datemodify,
                        "crfcus_usermodify" => $result->crfcus_usermodify,
                        "crfcus_usermodify_ecode" => $result->crfcus_usermodify_ecode,
                        "crfcus_usermodify_deptcode" => $result->crfcus_usermodify_deptcode,
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s"),
                        "crfcus_tempstatus" => "Processing",
                        "crfcus_formno" => $getFormNo

                    );
                    $this->db->insert("crf_customers_temp", $arCopyToTempTable);
                }


                $getdataStatus = 1;
            } else {
                $getdataStatus = 0;
            }
            // Get data From customers table to customers_temp table




            // Condition when get data success
            if ($getdataStatus == 1) {

                if ($this->input->post("crf_sub_oldcus_changearea") == 1) {  // กรณีที่เลือกเปลี่ยนเขตการขาย
                    $arsavedata = array(
                        "crf_formno" => $getFormNo,
                        "crf_cuscode" => $this->input->post("crf_cusid"),
                        "crf_company" => $this->input->post("crf_company"),
                        "crf_datecreate" => conDateToDb($this->input->post("crf_datecreate")),
                        "crf_type" => $this->input->post("crf_type"),
                        "crf_change_creditterm" => $this->input->post("crf_change_creditterm"),
                        "crf_condition_credit" => $this->input->post("crf_condition_credit"),
                        "crf_creditterm2" => $this->input->post("crf_creditterm2"),
                        "crf_finance" => $this->input->post("value_crf_finance"),
                        "crf_userpost" => $this->input->post("crf_userpost"),
                        "crf_userecodepost" => $this->input->post("crf_userecodepost"),
                        "crf_userdeptcodepost" => $this->input->post("crf_userdeptcodepost"),
                        "crf_userdeptpost" => $this->input->post("crf_userdeptpost"),
                        "crf_userpostdatetime" => conDateTimeToDb($this->input->post("crf_userpostdatetime")),
                        "crf_sub_oldcus_changearea" => $this->input->post("crf_sub_oldcus_changearea"),
                        "crf_status" => "Open",
                        "crf_topic" => "ลูกค้าเดิม",
                        "crf_topic1" => "เปลี่ยนเขตการขาย",
                        "crfw_salesreps" => $this->input->post("crf_salesreps"),
                        "crf_report_date" => $report_date,
                        "crf_report_month" => $report_month,
                        "crf_report_year" => $report_year
                    );

                    if (getFormBeforeSave($getFormNo) > 0) {
                        $this->db->where("crf_formno", $getFormNo);
                        $this->db->update("crf_maindata", $arsavedata);
                    } else {
                        $this->db->insert("crf_maindata", $arsavedata);
                    }


                    $arUpdateTemp = array(
                        "crfcus_salesreps" => $this->input->post("crf_salesreps"),
                    );
                    $this->db->where("crfcus_formno", $getFormNo);
                    $this->db->update("crf_customers_temp", $arUpdateTemp);



                    $aruserlog = array(
                        "crfuserlog_datetime" => date("Y-m-d H:i:s"),
                        "crfuserlog_activity" => "ทำเรื่องเปลี่ยนเขตการขาย",
                        "crfuserlog_username" => $this->input->post("crf_userpost"),
                        "crfuserlog_deptcode" => $this->input->post("crf_userdeptcodepost"),
                        "crfuserlog_ecode" => $this->input->post("crf_userecodepost")
                    );
                    $this->db->insert("crf_userlog", $aruserlog);
                }
            }
            // Condition when get data success






            if ($this->input->post("crf_sub_oldcus_changeaddress") == 2) {  //กรณีที่เลือกเปลี่ยนที่อยู่

                if ($_FILES["crf_file1"]["name"] != "") {
                    $file1 = "crf_file1";
                    $fileType1 = "ภพ20";
                    $this->uploadFiles($file1, $fileType1);
                    $resultFile1 = $this->uploadFiles($file1, $fileType1);
                } else {
                    echo "ไม่พบการแนบไฟล์ในการอัพโหลดไฟล์ ภพ.20<br>";
                }

                // $arcustomer = array(
                //     "crfcus_addresstype" => $this->input->post("crf_addresstype"),
                //     "crfcus_address" => $this->input->post("crf_addressname"),
                //     "crfcus_file1" => $resultFile1,
                //     "crfcus_usercreate" => $this->input->post("crf_userpost"),
                //     "crfcus_usercreate_ecode" => $this->input->post("crf_userecodepost"),
                //     "crfcus_usercreate_deptcode" => $this->input->post("crf_userdeptcodepost"),
                //     "crfcus_datemodify" => date("Y-m-d H:i:s")
                // );
                // $this->db->where("crfcus_code", $this->input->post("crf_customercode"));
                // $this->db->update("crf_customers", $arcustomer);


                $arsavedata = array(
                    "crf_formno" => $getFormNo,
                    "crf_cuscode" => $this->input->post("crf_cusid"),
                    "crf_company" => $this->input->post("crf_company"),
                    "crf_datecreate" => conDateToDb($this->input->post("crf_datecreate")),
                    "crf_type" => $this->input->post("crf_type"),
                    "crf_change_creditterm" => $this->input->post("crf_change_creditterm"),
                    "crf_condition_credit" => $this->input->post("crf_condition_credit"),
                    "crf_creditterm2" => $this->input->post("crf_creditterm2"),
                    "crf_finance" => $this->input->post("crf_finance"),
                    "crf_userpost" => $this->input->post("crf_userpost"),
                    "crf_userecodepost" => $this->input->post("crf_userecodepost"),
                    "crf_userdeptcodepost" => $this->input->post("crf_userdeptcodepost"),
                    "crf_userdeptpost" => $this->input->post("crf_userdeptpost"),
                    "crf_userpostdatetime" => conDateTimeToDb($this->input->post("crf_userpostdatetime")),
                    "crf_sub_oldcus_changeaddress" => $this->input->post("crf_sub_oldcus_changeaddress"),
                    "crf_status" => "Open",

                    "crf_topic" => "ลูกค้าเดิม",
                    "crf_topic2" => "เปลี่ยนที่อยู่",

                    "crfw_salesreps" => $this->input->post("crf_salesreps"),
                    "crfw_cusaddresstype" => $this->input->post("crf_addresstype"),
                    "crfw_cusaddress" => $this->input->post("crf_addressname"),
                    "crfw_cusfile1" => $resultFile1,
                    "crf_report_date" => $report_date,
                    "crf_report_month" => $report_month,
                    "crf_report_year" => $report_year
                );

                if (getFormBeforeSave($getFormNo) > 0) {
                    $this->db->where("crf_formno", $getFormNo);
                    $this->db->update("crf_maindata", $arsavedata);
                } else {
                    $this->db->insert("crf_maindata", $arsavedata);
                }



                $arUpdateTemp = array(
                    "crfcus_addresstype" => $this->input->post("crf_addresstype"),
                    "crfcus_address" => $this->input->post("crf_addressname"),
                    "crfcus_contactname" => $this->input->post("crf_namecontact"),
                    "crfcus_phone" => $this->input->post("crf_telcontact"),
                    "crfcus_fax" => $this->input->post("crf_faxcontact"),
                    "crfcus_email" => $this->input->post("crf_emailcontact"),
                    "crfcus_regiscapital" => conPrice($this->input->post("crf_regiscost")),
                    "crfcus_file1" => $resultFile1
                );
                $this->db->where("crfcus_formno", $getFormNo);
                $this->db->update("crf_customers_temp", $arUpdateTemp);



                $aruserlog = array(
                    "crfuserlog_datetime" => date("Y-m-d H:i:s"),
                    "crfuserlog_activity" => "ทำเรื่องเปลี่ยนที่อยู่ลูกค้า",
                    "crfuserlog_username" => $this->input->post("crf_userpost"),
                    "crfuserlog_deptcode" => $this->input->post("crf_userdeptcodepost"),
                    "crfuserlog_ecode" => $this->input->post("crf_userecodepost")
                );
                $this->db->insert("crf_userlog", $aruserlog);
            }





            if ($this->input->post("crf_sub_oldcus_changecredit") == 3) {  //กรณีที่เลือกปรับ Credit Term

                $arsavedata = array(
                    "crf_formno" => $getFormNo,
                    "crf_cuscode" => $this->input->post("crf_cusid"),
                    "crf_company" => $this->input->post("crf_company"),
                    "crf_datecreate" => conDateToDb($this->input->post("crf_datecreate")),
                    "crf_type" => $this->input->post("crf_type"),
                    "crf_change_creditterm" => $this->input->post("crf_change_creditterm"),
                    "crf_condition_credit" => $this->input->post("crf_condition_credit"),
                    "crf_creditterm" => $this->input->post("oldCreditTerm"),
                    "crf_creditterm2" => $this->input->post("crf_creditterm2"),
                    "crf_finance" => $this->input->post("crf_finance"),
                    "crf_userpost" => $this->input->post("crf_userpost"),
                    "crf_userecodepost" => $this->input->post("crf_userecodepost"),
                    "crf_userdeptcodepost" => $this->input->post("crf_userdeptcodepost"),
                    "crf_userdeptpost" => $this->input->post("crf_userdeptpost"),
                    "crf_userpostdatetime" => conDateTimeToDb($this->input->post("crf_userpostdatetime")),
                    "crf_sub_oldcus_changecredit" => $this->input->post("crf_sub_oldcus_changecredit"),
                    "crf_status" => "Open",

                    "crf_topic" => "ลูกค้าเดิม",
                    "crf_topic3" => "ปรับ Credit term. เพิ่ม - ลด",
                    "crf_report_date" => $report_date,
                    "crf_report_month" => $report_month,
                    "crf_report_year" => $report_year

                );
                if (getFormBeforeSave($getFormNo) > 0) {
                    $this->db->where("crf_formno", $getFormNo);
                    $this->db->update("crf_maindata", $arsavedata);
                } else {
                    $this->db->insert("crf_maindata", $arsavedata);
                }


                $arUpdateTemp = array(
                    "crfcus_creditterm2" => $this->input->post("crf_creditterm2"),
                );
                $this->db->where("crfcus_formno", $getFormNo);
                $this->db->update("crf_customers_temp", $arUpdateTemp);


                $aruserlog = array(
                    "crfuserlog_datetime" => date("Y-m-d H:i:s"),
                    "crfuserlog_activity" => "ปรับ Credit term. เพิ่ม - ลด",
                    "crfuserlog_username" => $this->input->post("crf_userpost"),
                    "crfuserlog_deptcode" => $this->input->post("crf_userdeptcodepost"),
                    "crfuserlog_ecode" => $this->input->post("crf_userecodepost")
                );
                $this->db->insert("crf_userlog", $aruserlog);
            }





            if ($this->input->post("crf_sub_oldcus_changefinance") == 4) { //กรณีที่เลือกปรับวงเงิน


                $arsavedata = array(
                    "crf_formno" => $getFormNo,
                    "crf_cuscode" => $this->input->post("crf_cusid"),
                    "crf_company" => $this->input->post("crf_company"),
                    "crf_datecreate" => conDateToDb($this->input->post("crf_datecreate")),
                    "crf_type" => $this->input->post("crf_type"),
                    "crf_change_creditterm" => $this->input->post("crf_change_creditterm"),
                    "crf_condition_credit" => $this->input->post("crf_condition_credit"),
                    "crf_creditterm2" => $this->input->post("crf_creditterm2"),
                    "crf_finance" => $this->input->post("value_crf_finance"),
                    "crf_finance_req_number" => $this->input->post("crf_finance_req_number_calc"),
                    "crf_finance_status" => $this->input->post("crf_finance_status"),
                    "crf_finance_change_status" => $this->input->post("crf_finance_change_status"),
                    "crf_finance_change_number" => $this->input->post("crf_finance_change_number"),
                    "crf_finance_change_total" => conPrice($this->input->post("crf_finance_change_total")),
                    "crf_finance_change_detail" => $this->input->post("crf_finance_change_detail"),

                    "crf_userpost" => $this->input->post("crf_userpost"),
                    "crf_userecodepost" => $this->input->post("crf_userecodepost"),
                    "crf_userdeptcodepost" => $this->input->post("crf_userdeptcodepost"),
                    "crf_userdeptpost" => $this->input->post("crf_userdeptpost"),
                    "crf_userpostdatetime" => conDateTimeToDb($this->input->post("crf_userpostdatetime")),
                    "crf_sub_oldcus_changefinance" => $this->input->post("crf_sub_oldcus_changefinance"),
                    "crf_status" => "Open",

                    "crf_topic" => "ลูกค้าเดิม",
                    "crf_topic4" => "ปรับวงเงิน เพิ่ม - ลด",
                    "crf_report_date" => $report_date,
                    "crf_report_month" => $report_month,
                    "crf_report_year" => $report_year

                );
                if (getFormBeforeSave($getFormNo) > 0) {
                    $this->db->where("crf_formno", $getFormNo);
                    $this->db->update("crf_maindata", $arsavedata);
                } else {
                    $this->db->insert("crf_maindata", $arsavedata);
                }


                $arUpdateTemp = array(
                    "crfcus_moneylimit2" => conPrice($this->input->post("crf_finance_change_total")),
                );
                $this->db->where("crfcus_formno", $getFormNo);
                $this->db->update("crf_customers_temp", $arUpdateTemp);


                $aruserlog = array(
                    "crfuserlog_datetime" => date("Y-m-d H:i:s"),
                    "crfuserlog_activity" => "ปรับวงเงิน เพิ่ม - ลด",
                    "crfuserlog_username" => $this->input->post("crf_userpost"),
                    "crfuserlog_deptcode" => $this->input->post("crf_userdeptcodepost"),
                    "crfuserlog_ecode" => $this->input->post("crf_userecodepost")
                );
                $this->db->insert("crf_userlog", $aruserlog);
            }
            return 1;
        }

        return 2;
    }
    // End Save Data




    public function count_all()
    {
        $query = $this->db->get("crf_maindata");
        return $query->num_rows();
    }

    public function fetch_details($limit, $start)
    {
        $output = '';
        $this->db->select("crf_formno , crf_id , crf_datecreate , crf_alltype_subname , crf_status , crfcus_name , crfcus_address , crfcus_salesreps , crfsubold_name , crf_topic , crf_topic1 , crf_topic2 , crf_topic3 , crf_topic4 , crfw_salesreps , crf_sub_oldcus_changearea , crf_sub_oldcus_changeaddress , crf_sub_oldcus_changecredit , crf_sub_oldcus_changefinance , crfw_cusaddress");
        $this->db->from("crf_maindata");
        $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crf_maindata.crf_type');
        $this->db->join('crf_customers_temp', 'crf_customers_temp.crfcus_formno = crf_maindata.crf_formno');
        $this->db->join('crf_suboldcus', 'crf_suboldcus.crfsubold_id = crf_maindata.crf_sub_oldcus_changearea');

        $this->db->order_by("crf_formno", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $bgcolor = "background-color:#E8E8E8;";
            $fontcolor = "color:#000000;";

            if ($row->crf_status == "Open") {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            } else if ($row->crf_status == "Completed") {
                $statusColor = "color:#009900;";
                $lineStatusColor = "background-color:#009900;height:3px;";
            } else if ($row->crf_status == "Cancel" || $row->crf_status == "Sales Manager Not Approve" || $row->crf_status == "Account Manager Not approved") {
                $statusColor = "color:#CC0000;";
                $lineStatusColor = "background-color:#CC0000;height:3px;";
            } else {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            }

            if ($row->crf_sub_oldcus_changearea == 1 && $row->crf_status != "Completed") {
                $salesreps = $row->crfw_salesreps;
            } else {
                $salesreps = $row->crfcus_salesreps;
            }

            if ($row->crf_sub_oldcus_changeaddress == 2 && $row->crf_status != "Completed") {
                $address = $row->crfcus_address;
            } else {
                $address = $row->crfcus_address;
            }

            $topicTH = $row->crf_topic;

            if($row->crf_topic1 != ''){
                $topicTH .= " / ".$row->crf_topic1;
            }
            if($row->crf_topic2 != ''){
                $topicTH .= " / ".$row->crf_topic2;
            }
            if($row->crf_topic3 != ''){
                $topicTH .= " / ".$row->crf_topic3;
            }
            if($row->crf_topic4 != ''){
                $topicTH .= " / ".$row->crf_topic4;
            }

            $output .= '
      <div class="card mt-3">
      <div class="card-header" style="' . $bgcolor . $fontcolor . '">
            <div class="col-md-3 col-sm-12">
                เลขที่คำขอ &nbsp;<a href="' . base_url('main/viewdata/') . $row->crf_id . '">' . $row->crf_formno . '</a>
            </div>
            <div class="col-md-3 col-sm-12">
                วันที่สร้างรายการ : &nbsp;<span style="">' . conDateFromDb($row->crf_datecreate) . '</span>
            </div>
            <div class="col-md-3 col-sm-12">
                ประเภทลูกค้า : &nbsp;<span style="">' . $row->crf_alltype_subname . '</span>
            </div>
            <div class="col-md-3 statustext">
                สถานะ : &nbsp;<span style="' . $statusColor . '">' . $row->crf_status . '</span>
            </div>
      </div>
      <div style="' . $lineStatusColor . '"></div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-3">
            <p><label><b>หัวข้อ :</b></label>&nbsp;' . $topicTH . '</p>
            <p><label><b>ชื่อบริษัท : </b></label>&nbsp;' . $row->crfcus_name . '</p>
            </div>

            <div class="col-md-6">
            <label><b>ที่อยู่ : </b></label>&nbsp;' . $address . '
            </div>

            <div class="col-md-3">
            <label><b>Sales Reps : </b></label>&nbsp;' . $salesreps . '
            </div>
        </div>

      </div>
    </div>
      ';
        }
        $output .= '</table>';
        return $output;
    }



    public function count_all_Date($dateStart, $dateEnd)
    {
        $this->db->select("*");
        $this->db->from("crf_maindata");
        $this->db->where("crf_datecreate >=", $dateStart);
        $this->db->where("crf_datecreate <=", $dateEnd);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_detailsByDate($limit, $start, $dateStart, $dateEnd)
    {
        $output = '';
        $this->db->select("crf_formno , crf_id , crf_datecreate , crf_alltype_subname , crf_status , crfcus_name , crfcus_address , crfcus_salesreps , crfsubold_name , crf_topic , crf_topic1 , crf_topic2 , crf_topic3 , crf_topic4 , crfw_salesreps , crf_sub_oldcus_changearea , crf_sub_oldcus_changeaddress , crf_sub_oldcus_changecredit , crf_sub_oldcus_changefinance , crfw_cusaddress");
        $this->db->from("crf_maindata");
        $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crf_maindata.crf_type');
        $this->db->join('crf_customers_temp', 'crf_customers_temp.crfcus_formno = crf_maindata.crf_formno');
        $this->db->join('crf_suboldcus', 'crf_suboldcus.crfsubold_id = crf_maindata.crf_sub_oldcus_changearea');
        $this->db->where("crf_datecreate >=", $dateStart);
        $this->db->where("crf_datecreate <=", $dateEnd);
        $this->db->order_by("crf_formno", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $bgcolor = "background-color:#E8E8E8;";
            $fontcolor = "color:#000000;";

            if ($row->crf_status == "Open") {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            } else if ($row->crf_status == "Completed") {
                $statusColor = "color:#009900;";
                $lineStatusColor = "background-color:#009900;height:3px;";
            } else if ($row->crf_status == "Cancel" || $row->crf_status == "Sales Manager Not Approve" || $row->crf_status == "Account Manager Not approved") {
                $statusColor = "color:#CC0000;";
                $lineStatusColor = "background-color:#CC0000;height:3px;";
            } else {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            }

            if ($row->crf_sub_oldcus_changearea == 1 && $row->crf_status != "Completed") {
                $salesreps = $row->crfw_salesreps;
            } else {
                $salesreps = $row->crfcus_salesreps;
            }

            if ($row->crf_sub_oldcus_changeaddress == 2 && $row->crf_status != "Completed") {
                $address = $row->crfcus_address;
            } else {
                $address = $row->crfcus_address;
            }

            $topicTH = $row->crf_topic;

            if($row->crf_topic1 != ''){
                $topicTH .= " / ".$row->crf_topic1;
            }
            if($row->crf_topic2 != ''){
                $topicTH .= " / ".$row->crf_topic2;
            }
            if($row->crf_topic3 != ''){
                $topicTH .= " / ".$row->crf_topic3;
            }
            if($row->crf_topic4 != ''){
                $topicTH .= " / ".$row->crf_topic4;
            }

            $output .= '
            <div class="card mt-3">
            <div class="card-header" style="' . $bgcolor . $fontcolor . '">
                  <div class="col-md-3 col-sm-12">
                      เลขที่คำขอ &nbsp;<a href="' . base_url('main/viewdata/') . $row->crf_id . '">' . $row->crf_formno . '</a>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      วันที่สร้างรายการ : &nbsp;<span style="">' . conDateFromDb($row->crf_datecreate) . '</span>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      ประเภทลูกค้า : &nbsp;<span style="">' . $row->crf_alltype_subname . '</span>
                  </div>
                  <div class="col-md-3 statustext">
                      สถานะ : &nbsp;<span style="' . $statusColor . '">' . $row->crf_status . '</span>
                  </div>
            </div>
            <div style="' . $lineStatusColor . '"></div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3">
                  <p><label><b>หัวข้อ :</b></label>&nbsp;' . $topicTH . '</p>
                  <p><label><b>ชื่อบริษัท : </b></label>&nbsp;' . $row->crfcus_name . '</p>
                  </div>
      
                  <div class="col-md-6">
                  <label><b>ที่อยู่ : </b></label>&nbsp;' . $address . '
                  </div>
      
                  <div class="col-md-3">
                  <label><b>Sales Reps : </b></label>&nbsp;' . $salesreps . '
                  </div>
              </div>
      
            </div>
          </div>
      ';
        }
        $output .= '</table>';
        return $output;
    }





    public function count_all_FormNo($formNo)
    {
        $this->db->select("*");
        $this->db->from("crf_maindata");
        $this->db->like("crf_formno", $formNo, 'both');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_detailsByFormNo($limit, $start, $formNo)
    {
        $output = '';
        $this->db->select("crf_formno , crf_id , crf_datecreate , crf_alltype_subname , crf_status , crfcus_name , crfcus_address , crfcus_salesreps , crfsubold_name , crf_topic , crf_topic1 , crf_topic2 , crf_topic3 , crf_topic4 , crfw_salesreps , crf_sub_oldcus_changearea , crf_sub_oldcus_changeaddress , crf_sub_oldcus_changecredit , crf_sub_oldcus_changefinance , crfw_cusaddress");
        $this->db->from("crf_maindata");
        $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crf_maindata.crf_type');
        $this->db->join('crf_customers_temp', 'crf_customers_temp.crfcus_formno = crf_maindata.crf_formno');
        $this->db->join('crf_suboldcus', 'crf_suboldcus.crfsubold_id = crf_maindata.crf_sub_oldcus_changearea');
        $this->db->like("crf_formno", $formNo, 'both');
        $this->db->order_by("crf_formno", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $bgcolor = "background-color:#E8E8E8;";
            $fontcolor = "color:#000000;";

            if ($row->crf_status == "Open") {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            } else if ($row->crf_status == "Completed") {
                $statusColor = "color:#009900;";
                $lineStatusColor = "background-color:#009900;height:3px;";
            } else if ($row->crf_status == "Cancel" || $row->crf_status == "Sales Manager Not Approve" || $row->crf_status == "Account Manager Not approved") {
                $statusColor = "color:#CC0000;";
                $lineStatusColor = "background-color:#CC0000;height:3px;";
            } else {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            }

            if ($row->crf_sub_oldcus_changearea == 1 && $row->crf_status != "Completed") {
                $salesreps = $row->crfw_salesreps;
            } else {
                $salesreps = $row->crfcus_salesreps;
            }

            if ($row->crf_sub_oldcus_changeaddress == 2 && $row->crf_status != "Completed") {
                $address = $row->crfcus_address;
            } else {
                $address = $row->crfcus_address;
            }

            $topicTH = $row->crf_topic;

            if($row->crf_topic1 != ''){
                $topicTH .= " / ".$row->crf_topic1;
            }
            if($row->crf_topic2 != ''){
                $topicTH .= " / ".$row->crf_topic2;
            }
            if($row->crf_topic3 != ''){
                $topicTH .= " / ".$row->crf_topic3;
            }
            if($row->crf_topic4 != ''){
                $topicTH .= " / ".$row->crf_topic4;
            }

            $output .= '
            <div class="card mt-3">
            <div class="card-header" style="' . $bgcolor . $fontcolor . '">
                  <div class="col-md-3 col-sm-12">
                      เลขที่คำขอ &nbsp;<a href="' . base_url('main/viewdata/') . $row->crf_id . '">' . $row->crf_formno . '</a>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      วันที่สร้างรายการ : &nbsp;<span style="">' . conDateFromDb($row->crf_datecreate) . '</span>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      ประเภทลูกค้า : &nbsp;<span style="">' . $row->crf_alltype_subname . '</span>
                  </div>
                  <div class="col-md-3 statustext">
                      สถานะ : &nbsp;<span style="' . $statusColor . '">' . $row->crf_status . '</span>
                  </div>
            </div>
            <div style="' . $lineStatusColor . '"></div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3">
                  <p><label><b>หัวข้อ :</b></label>&nbsp;' . $topicTH . '</p>
                  <p><label><b>ชื่อบริษัท : </b></label>&nbsp;' . $row->crfcus_name . '</p>
                  </div>
      
                  <div class="col-md-6">
                  <label><b>ที่อยู่ : </b></label>&nbsp;' . $address . '
                  </div>
      
                  <div class="col-md-3">
                  <label><b>Sales Reps : </b></label>&nbsp;' . $salesreps . '
                  </div>
              </div>
      
            </div>
          </div>
      ';
        }
        $output .= '</table>';
        return $output;
    }






    public function count_all_Company($companyname)
    {
        $this->db->select("crfcus_name");
        $this->db->from("crf_maindata");
        $this->db->join('crf_customers_temp', 'crf_customers_temp.crfcus_formno = crf_maindata.crf_formno');
        $this->db->like("crfcus_name", $companyname);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_detailsByCompany($limit, $start, $companyname)
    {
        $output = '';
        $this->db->select("crf_formno , crf_id , crf_datecreate , crf_alltype_subname , crf_status , crfcus_name , crfcus_address , crfcus_salesreps , crfsubold_name , crf_topic , crf_topic1 , crf_topic2 , crf_topic3 , crf_topic4 , crfw_salesreps , crf_sub_oldcus_changearea , crf_sub_oldcus_changeaddress , crf_sub_oldcus_changecredit , crf_sub_oldcus_changefinance , crfw_cusaddress");
        $this->db->from("crf_maindata");
        $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crf_maindata.crf_type');
        $this->db->join('crf_customers_temp', 'crf_customers_temp.crfcus_formno = crf_maindata.crf_formno');
        $this->db->join('crf_suboldcus', 'crf_suboldcus.crfsubold_id = crf_maindata.crf_sub_oldcus_changearea');
        $this->db->like("crfcus_name", $companyname);
        $this->db->order_by("crf_formno", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $bgcolor = "background-color:#E8E8E8;";
            $fontcolor = "color:#000000;";

            if ($row->crf_status == "Open") {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            } else if ($row->crf_status == "Completed") {
                $statusColor = "color:#009900;";
                $lineStatusColor = "background-color:#009900;height:3px;";
            } else if ($row->crf_status == "Cancel" || $row->crf_status == "Sales Manager Not Approve" || $row->crf_status == "Account Manager Not approved") {
                $statusColor = "color:#CC0000;";
                $lineStatusColor = "background-color:#CC0000;height:3px;";
            } else {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            }

            if ($row->crf_sub_oldcus_changearea == 1 && $row->crf_status != "Completed") {
                $salesreps = $row->crfw_salesreps;
            } else {
                $salesreps = $row->crfcus_salesreps;
            }

            if ($row->crf_sub_oldcus_changeaddress == 2 && $row->crf_status != "Completed") {
                $address = $row->crfcus_address;
            } else {
                $address = $row->crfcus_address;
            }

            $topicTH = $row->crf_topic;

            if($row->crf_topic1 != ''){
                $topicTH .= " / ".$row->crf_topic1;
            }
            if($row->crf_topic2 != ''){
                $topicTH .= " / ".$row->crf_topic2;
            }
            if($row->crf_topic3 != ''){
                $topicTH .= " / ".$row->crf_topic3;
            }
            if($row->crf_topic4 != ''){
                $topicTH .= " / ".$row->crf_topic4;
            }

            $output .= '
            <div class="card mt-3">
            <div class="card-header" style="' . $bgcolor . $fontcolor . '">
                  <div class="col-md-3 col-sm-12">
                      เลขที่คำขอ &nbsp;<a href="' . base_url('main/viewdata/') . $row->crf_id . '">' . $row->crf_formno . '</a>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      วันที่สร้างรายการ : &nbsp;<span style="">' . conDateFromDb($row->crf_datecreate) . '</span>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      ประเภทลูกค้า : &nbsp;<span style="">' . $row->crf_alltype_subname . '</span>
                  </div>
                  <div class="col-md-3 statustext">
                      สถานะ : &nbsp;<span style="' . $statusColor . '">' . $row->crf_status . '</span>
                  </div>
            </div>
            <div style="' . $lineStatusColor . '"></div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3">
                  <p><label><b>หัวข้อ :</b></label>&nbsp;' . $topicTH . '</p>
                  <p><label><b>ชื่อบริษัท : </b></label>&nbsp;' . $row->crfcus_name . '</p>
                  </div>
      
                  <div class="col-md-6">
                  <label><b>ที่อยู่ : </b></label>&nbsp;' . $address . '
                  </div>
      
                  <div class="col-md-3">
                  <label><b>Sales Reps : </b></label>&nbsp;' . $salesreps . '
                  </div>
              </div>
      
            </div>
          </div>
      ';
        }
        $output .= '</table>';
        return $output;
    }





    //     <div class="row">
    //     <div class="col-md-3">
    //         เลขที่คำขอ &nbsp;<a href="#">' . $row->crf_formno . '</a>
    //     </div>
    //     <div class="col-md-3">
    //          วันที่สร้างรายการ : &nbsp;<span style="">' . conDateFromDb($row->crf_datecreate) . '</span>
    //     </div>
    //     <div class="col-md-3">
    //         ประเภทลูกค้า : &nbsp;<span style="">'.$row->crf_alltype_subname.'</span>
    //     </div>
    // </div>

    // public function fetch_details($limit, $start)
    // {
    //  $output = '';
    //  $this->db->select("*");
    //  $this->db->from("crf_maindata");
    //  $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crf_maindata.crf_type');
    //  $this->db->order_by("crf_formno", "DESC");
    //  $this->db->limit($limit, $start);
    //  $query = $this->db->get();
    //  $output .= '
    //  <table class="table table-bordered">
    //   <tr>
    //   <th>เลขที่คำขอ</th>
    //   <th>วันที่สร้างรายการ</th>
    //   <th>ชื่อบริษัทลูกค้า</th>
    //   <th>ประเภทลูกค้า</th>
    //   <th>ผู้ดูแล</th>
    //   </tr>
    //  ';
    //  foreach($query->result() as $row)
    //  {
    //   $output .= '
    //   <tr>
    //    <td><b><a href="'.base_url().'">'.$row->crf_formno.'</a></b></td>
    //    <td>'.$row->crf_datecreate.'</td>
    //    <td>'.$row->crf_customername.'</td>
    //    <td>'.$row->crf_alltype_subname.'</td>
    //    <td>'.$row->crf_salesreps.'</td>
    //   </tr>
    //   ';
    //  }
    //  $output .= '</table>';
    //  return $output;
    // }



    public function managerApprove($crfid)
    {
        saveApprove($crfid);
    }


    public function csbr($crfid)
    {
        $brcode = $this->input->post("crf_brcode");
        $area = $this->input->post("forcheckcrf_area");

        $this->db->select("crfcus_brcode");
        $this->db->from("crf_customers");
        $this->db->where("crfcus_brcode", $brcode);
        $this->db->where("crfcus_area",$area);
        $result = $this->db->get();

        echo $result->num_rows();
        if ($result->num_rows() > 0) {
            echo "<script>";
            echo "alert('พบข้อมูลซ้ำในระบบ')";
            echo "</script>";
            header("refresh:0; url=" . base_url('main/viewdata/') . $crfid);
        } else if ($result->num_rows() == 0) {
            saveCsBr($crfid);
            header("refresh:0; url=" . base_url('main/list'));
        }
    }
    // Check Duplicate Br code
    public function checkDupliBR()
    {
        $brcode = "";
    }

    public function accMgr($crfid)
    {
        saveAccMgr($crfid);
    }

    public function director1($crfid)
    {
        saveDerector1($crfid);
    }

    public function director2($crfid)
    {
        if (getSuboldCus($crfid)->crf_sub_oldcus_changearea == 1) {
            saveDirector2ChangSales($crfid);
        }

        if (getSuboldCus($crfid)->crf_sub_oldcus_changeaddress == 2) {
            saveDirector2ChangeAddress($crfid);
        }

        if (getSuboldCus($crfid)->crf_sub_oldcus_changecredit == 3) {
            saveDirector2ChangeCredit($crfid);
        }

        if (getSuboldCus($crfid)->crf_sub_oldcus_changefinance == 4) {
            saveDirector2ChangeMoney($crfid);
        }

        if (getSuboldCus($crfid)->crf_sub_oldcus_changearea == 0 && getSuboldCus($crfid)->crf_sub_oldcus_changeaddress == 0 && getSuboldCus($crfid)->crf_sub_oldcus_changecredit == 0 && getSuboldCus($crfid)->crf_sub_oldcus_changefinance == 0) {
            saveDerector2($crfid);
        }
    }

    public function saveCustomersCode($crfid, $crfcusid)
    {

        $customercode = $this->input->post("cusCode");
        $accArea = $this->input->post("accCheckAreacode");

        $this->db->select("crfcus_code");
        $this->db->from("crf_customers_temp");
        $this->db->where("crfcus_code", $customercode);
        $this->db->where("crfcus_area" , $accArea);
        $result = $this->db->get();

        echo $result->num_rows();
        if ($result->num_rows() > 0) {
            echo "<script>
            alert('พบข้อมูลซ้ำในระบบ');
            </script>";
            header("refresh:0; url=" . base_url('main/viewdata/') . $crfid);
        } else if ($result->num_rows() == 0) {
            saveCustomersCode($crfid, $crfcusid);
            header("refresh:0; url=" . base_url('main/list'));
        }
    }


    // Query For Old Customer Section // Query For Old Customer Section // Query For Old Customer Section
    // Query For Old Customer Section // Query For Old Customer Section // Query For Old Customer Section

    // Process Use Section
    public function searchCustomerDetail()
    {
        $cusCode = "";
        $cusCode = $this->input->post("cusCode");
        $query = $this->db->query("SELECT
        crf_customers.crfcus_id,
        crf_customers.crfcus_code,
        crf_customers.crfcus_salesreps,
        crf_customers.crfcus_name,
        crf_customers.crfcus_comdatecreate,
        crf_customers.crfcus_addresstype,
        crf_customers.crfcus_address,
        crf_customers.crfcus_contactname,
        crf_customers.crfcus_phone,
        crf_customers.crfcus_fax,
        crf_customers.crfcus_email,
        crf_customers.crfcus_regiscapital,
        crf_customers.crfcus_companytype,
        crf_company_type.crf_comname,
        crf_customers.crfcus_comtype2,
        crf_customers.crfcus_comtype31,
        crf_customers.crfcus_comtype32,
        crf_customers.crfcus_comtype33,
        crf_customers.crfcus_comtype34,
        crf_customers.crfcus_typebussi,
        crf_customers.crfcus_forecast,
        crf_customers.crfcus_file1,
        crf_customers.crfcus_file2,
        crf_customers.crfcus_file3,
        crf_customers.crfcus_file4,
        crf_customers.crfcus_file5,
        crf_customers.crfcus_file6,
        crf_customers.crfcus_creditterm,
        credit_term_category.credit_id,
        credit_term_category.credit_name,
        crf_customers.crfcus_conditionbill,
        crf_customers.crfcus_tablebill,
        crf_customers.crfcus_mapbill,
        crf_customers.crfcus_datebill,
        crf_customers.crfcus_mapbill2,
        crf_customers.crfcus_conditionmoney,
        crf_customers.crfcus_cheuqetable,
        crf_customers.crfcus_cheuqedetail,
        crf_customers.crfcus_moneylimit,
        crf_maindata.crf_finance,
        crf_customers.crfcus_usercreate,
        crf_customers.crfcus_usercreate_ecode,
        crf_customers.crfcus_usercreate_deptcode,
        crf_customers.crfcus_datemodify,
        crf_maindata.crf_id,
        crf_customers.crfcus_creditterm2,
        crf_customers.crfcus_area
        FROM
        crf_customers
        INNER JOIN crf_company_type ON crf_company_type.crf_comid = crf_customers.crfcus_companytype
        INNER JOIN credit_term_category ON credit_term_category.credit_id = crf_customers.crfcus_creditterm
        INNER JOIN crf_maindata ON crf_maindata.crf_cuscode = crf_customers.crfcus_id
        WHERE crfcus_code LIKE '$cusCode%' GROUP BY crf_customers.crfcus_code , crf_customers.crfcus_area  ORDER BY crf_maindata.crf_id DESC
        ");
        $output = "";
        foreach ($query->result() as $rs) {
            $output .= "<ul class='list-group'>";
            $output .= "<a href='javascript:void(0)' class='selectCusCode' 
            data_crf_cusid = '$rs->crfcus_id'
            data_crf_customercode = '$rs->crfcus_code'
            data_crf_salesreps = '$rs->crfcus_salesreps' 
            data_crf_customername = '$rs->crfcus_name'
            data_crf_cuscompanycreate = '$rs->crfcus_comdatecreate'
            data_crf_addressname = '$rs->crfcus_address'
            data_crf_namecontact = '$rs->crfcus_contactname'
            data_crf_telcontact = '$rs->crfcus_phone'
            data_crf_faxcontact = '$rs->crfcus_fax'
            data_crf_emailcontact = '$rs->crfcus_email'
            data_crf_regiscost = '$rs->crfcus_regiscapital'
            data_oldcfr_addresstype = '$rs->crfcus_addresstype'
            data_crf_companytype = '$rs->crfcus_companytype'
            data_crf_companytype3_1_1 = '$rs->crfcus_comtype31'
            data_crf_companytype3_1_2 = '$rs->crfcus_comtype32'
            data_crf_companytype3_2_1 = '$rs->crfcus_comtype33'
            data_crf_companytype3_2_2 = '$rs->crfcus_comtype34'
            data_crf_companytype2 = '$rs->crfcus_comtype2'
            data_crf_typeofbussi = '$rs->crfcus_typebussi'
            data_crf_forecast = '$rs->crfcus_forecast'
            data_credit_name = '$rs->credit_name'
            data_credit_id = '$rs->credit_id'
            data_crf_condition_bill = '$rs->crfcus_conditionbill'
            data_crf_condition_money = '$rs->crfcus_conditionmoney'
            data_crf_recive_cheuqetable = '$rs->crfcus_cheuqetable'
            data_crf_recive_cheuqedetail = '$rs->crfcus_cheuqedetail'
            data_crf_tablebill = '$rs->crfcus_tablebill'
            data_crf_mapbill = '$rs->crfcus_mapbill'
            data_crf_datebill = '$rs->crfcus_datebill'
            data_crf_mapbill2 = '$rs->crfcus_mapbill2'
            data_crf_finance = '$rs->crf_finance'
            data_crf_finance_req_number = '$rs->crfcus_moneylimit'
            data_crf_creditterm2 = '$rs->crfcus_creditterm2'
            data_crf_creditterm2name = '$rs->crfcus_creditterm2'
            data_crf_moneylimit = '$rs->crfcus_moneylimit'
            data_crf_area = '$rs->crfcus_area'
            data_crf_file1 = '$rs->crfcus_file1'
            
            ><li class='list-group-item'>" . $rs->crfcus_code ." (".$rs->crfcus_area.")". "</li></a>";
            $output .= "</ul>";
        }

        echo $output;
    }



    public function searchCustomerDetailEx()
    {
        $cusCode = "";
        $cusCode = $this->input->post("cusCode");
        $query = $this->db->query("SELECT
        crfex_customers.crfexcus_id,
        crfex_customers.crfexcus_code,
        crfex_customers.crfexcus_datecreate,
        crfex_customers.crfexcus_salesreps,
        crfex_customers.crfexcus_nameEN,
        crfex_customers.crfexcus_nameTH,
        crfex_customers.crfexcus_address,
        crfex_customers.crfexcus_file,
        crfex_customers.crfexcus_tel,
        crfex_customers.crfexcus_fax,
        crfex_customers.crfexcus_email,
        crfex_customers.crfexcus_creditlimit,
        crfex_customers.crfexcus_term,
        crfex_customers.crfexcus_discount,
        crfex_customers.crfexcus_bg,
        crfex_customers.crfexcus_his_month1,
        crfex_customers.crfexcus_his_tvolume1,
        crfex_customers.crfexcus_histsales1,
        crfex_customers.crfexcus_his_month2,
        crfex_customers.crfexcus_his_tvolume2,
        crfex_customers.crfexcus_histsales2,
        crfex_customers.crfexcus_his_month3,
        crfex_customers.crfexcus_his_tvolume3,
        crfex_customers.crfexcus_histsales3,
        crfex_customers.crfexcus_usercreate,
        crfex_customers.crfexcus_userecode,
        crfex_customers.crfexcus_userdeptcode,
        crfex_customers.crfexcus_userdatetimecreate,
        crfex_customers.crfexcus_usermodify,
        crfex_customers.crfexcus_userecodemodify,
        crfex_customers.crfexcus_userdeptcodemodify,
        crfex_customers.crfexcus_datetimemodify,
        crfex_customers.crfexcus_payment,
        crfex_customers.crfexcus_area
        FROM
        crfex_customers
        WHERE crfexcus_code LIKE '$cusCode%' ORDER BY crfexcus_code DESC
        ");


        $output = "";
        foreach ($query->result() as $rs) {
            $output .= "<ul class='list-group'>";
            $output .= "<a href='javascript:void(0)' class='selectCusCodeEx' 
            data_crfex_salesreps = '$rs->crfexcus_salesreps'
            data_crfex_cusnameEN = '$rs->crfexcus_nameEN'
            data_crfex_cusnameTH = '$rs->crfexcus_nameTH'
            data_crfex_address = '$rs->crfexcus_address'
            data_crfex_tel = '$rs->crfexcus_tel'
            data_crfex_fax = '$rs->crfexcus_fax'
            data_crfex_email = '$rs->crfexcus_email'
            data_crfex_file = '$rs->crfexcus_file'
            data_crfex_creditlimit = '$rs->crfexcus_creditlimit'
            data_crfex_term = '$rs->crfexcus_term'
            data_crfex_discount = '$rs->crfexcus_discount'
            data_crfex_bg = '$rs->crfexcus_bg'
            data_crfex_cuscode = '$rs->crfexcus_code'
            data_crfex_cusid = '$rs->crfexcus_id'
            data_crfex_cuspayment = '$rs->crfexcus_payment'
            data_crfexcus_area = '$rs->crfexcus_area'

            ><li class='list-group-item'>" . $rs->crfexcus_code ." (".$rs->crfexcus_area.")". "</li></a>";
            $output .= "</ul>";
        }

        echo $output;
    }














    // Process Use Section
    public function queryProcessUse()
    {
        $cusId = "";
        $cusId = $this->input->post("cusId");
        $query = $this->db->query("SELECT
        crf_customers.crfcus_id,
        crf_customers.crfcus_code,
        crf_process_use.crf_process_name,
        crf_process_use.crf_cusid,
        crf_process.cuspro_name
        FROM
        crf_customers
        INNER JOIN crf_process_use ON crf_process_use.crf_cusid = crf_customers.crfcus_id
        INNER JOIN crf_process ON crf_process.cuspro_id = crf_process_use.crf_process_name
        WHERE
        crf_customers.crfcus_id LIKE '$cusId%' ORDER BY cuspro_name ASC");

        $output = '';
        foreach (getCusProcess() as $rss) {

            $checked = "";
            foreach ($query->result() as $rs) {
                if ($rss->cuspro_id == $rs->crf_process_name) {
                    $checked = " checked=''; ";
                }
            }

            $output .= '
                            <div class="col-md-3 ">
                                <input disabled type="checkbox" name="crf_process[]" id="crf_process" value="' . $rss->cuspro_id . '" ' . $checked . '>
                                <label for="">' . $rss->cuspro_name . '</label>
                            </div>
                ';
        }
        // $output .= '<div class="row form-group oldprocesscus">';

        // $output .='</div>';
        echo "$output";
    }


    public function queryPrimanageUse()
    {
        $cusId = "";
        $cusId = $this->input->post("cusId");
        $query = $this->db->query("SELECT
        crf_pri_manage.crf_primanage_id,
        crf_pri_manage.crf_primanage_dept,
        crf_pri_manage.crf_primanage_name,
        crf_pri_manage.crf_primanage_posi,
        crf_pri_manage.crf_primanage_email,
        crf_pri_manage.crf_pricusid
        FROM
        crf_pri_manage
        WHERE
        crf_pri_manage.crf_pricusid LIKE '$cusId%' ORDER BY crf_primanage_id ASC");

        $output = '';
        foreach ($query->result() as $rss) {



            $output .= '
            <div id="priManage" class="row form-group">
            <div class="col-md-3 form-group">
                <label for="">หน่วยงาน</label>
                <input readonly type="text" name="crf_primanage_dept[]" id="crf_primanage_dept" class="form-control form-control-sm" value="' . $rss->crf_primanage_dept . '">
            </div>
            <div class="col-md-3 form-group">
                <label for="">ชื่อ-สกุล</label>
                <input readonly type="text" name="crf_primanage_name[]" id="crf_primanage_name" class="form-control form-control-sm" value="' . $rss->crf_primanage_name . '">
            </div>
            <div class="col-md-3 form-group">
                <label for="">ตำแหน่ง</label>
                <input readonly type="text" name="crf_primanage_posi[]" id="crf_primanage_posi" class="form-control form-control-sm" value="' . $rss->crf_primanage_posi . '">
            </div>
            <div class="col-md-3 form-group">
                <label for="">อีเมล</label>
                <input readonly type="text" name="crf_primanage_email[]" id="crf_primanage_email" class="form-control form-control-sm" value="' . $rss->crf_primanage_email . '">
            </div>
        </div>
                ';
        }
        // $output .= '<div class="row form-group oldprocesscus">';

        // $output .='</div>';
        echo "$output";
    }



    public function filterCreditTerm()
    {
        $creditMethod = "";
        $oldCredit = "";
        $oldCredit = $this->input->post("oldCredit");
        $creditMethod = $this->input->post("creditMethod");

        if ($creditMethod == "เพิ่ม") {
            $query = $this->db->query("SELECT * FROM credit_term_category WHERE credit_id > $oldCredit");
        } else if ($creditMethod == "ลด") {
            $query = $this->db->query("SELECT * FROM credit_term_category WHERE credit_id < $oldCredit");
        }
        $output = '';
        $output .= '<select name="crf_creditterm2" id="crf_creditterm2" class="form-control">';
        foreach ($query->result() as $rs) {
            $output .= '<option value="' . $rs->credit_id . '">' . $rs->credit_name . '</option>';
        }
        $output .= '</select>';

        echo $output;
    }


    public function fetch_filterCredit($oldCredit, $creditMethod)
    {
        if ($creditMethod == "เพิ่ม") {
            $query = $this->db->query("SELECT * FROM credit_term_category WHERE credit_id > $oldCredit");
        } else if ($creditMethod == "ลด") {
            $query = $this->db->query("SELECT * FROM credit_term_category WHERE credit_id < $oldCredit");
        }
        $output = '';
        foreach ($query->result() as $rs) {
            $output .= '<option value="' . $rs->credit_id . '">' . $rs->credit_name . '</option>';
        }
        echo $output;
    }

    // Query For Old Customer Section // Query For Old Customer Section // Query For Old Customer Section
    // Query For Old Customer Section // Query For Old Customer Section // Query For Old Customer Section








    // For Export For Export  For Export  For Export  For Export  For Export  For Export  For Export For Export 
    // For Export For Export  For Export  For Export  For Export  For Export  For Export  For Export For Export 
    public function savedataEX()
    {
        $getFormNo = getFormNoEX();
        $getCustomerNumber = getCustomerNumberEX();

        $report_date = "";
        $report_month = "";
        $report_year = "";

        $conReportDate = date_create($this->input->post("crfex_datecreate"));
        $report_date = date_format($conReportDate, "d");

        $conReportMonth = date_create($this->input->post("crfex_datecreate"));
        $report_month = date_format($conReportMonth, "m");

        $conReportYear = date_create($this->input->post("crfex_datecreate"));
        $report_year = date_format($conReportYear, "Y");

        if ($this->input->post("crfex_custype") == 1) {

            if ($_FILES["crfex_file"]["name"] != "") {
                $file = "crfex_file";
                $fileType = "Document";
                $this->uploadFiles($file, $fileType);
                $resultFile = $this->uploadFiles($file, $fileType);
            } else {
                $resultFile = "";
                echo "Not found document !<br>";
            }


            $arcustomer = array(
                "crfexcus_formno" => $getFormNo,
                "crfexcus_area" => $this->input->post("crfex_company"),
                "crfexcus_id" => $getCustomerNumber,
                "crfexcus_datecreate" => conDateToDb($this->input->post("crfex_datecreate")),
                "crfexcus_salesreps" => $this->input->post("crfex_salesreps"),
                "crfexcus_nameEN" => $this->input->post("crfex_cusnameEN"),
                "crfexcus_nameTH" => $this->input->post("crfex_cusnameTH"),
                "crfexcus_address" => $this->input->post("crfex_address"),
                "crfexcus_file" => $resultFile,
                "crfexcus_tel" => $this->input->post("crfex_tel"),
                "crfexcus_fax" => $this->input->post("crfex_fax"),
                "crfexcus_email" => $this->input->post("crfex_email"),
                "crfexcus_payment" => $this->input->post("crfex_payment"),
                "crfexcus_creditlimit" => $this->input->post("crfex_creditlimit"),
                "crfexcus_term" => $this->input->post("crfex_term"),
                "crfexcus_discount" => $this->input->post("crfex_discount"),
                "crfexcus_bg" => $this->input->post("crfex_combg"),
                "crfexcus_usercreate" => $this->input->post("crfex_usercreate"),
                "crfexcus_userecode" => $this->input->post("crfex_userecode"),
                "crfexcus_userdeptcode" => $this->input->post("crfex_userdeptcode"),
                "crfexcus_userdatetimecreate" => conDateTimeToDb($this->input->post("crfex_userdatetime")),
                "crfexcus_tempstatus" => "Processing",
                "crfexcus_datetimeupdate" => date("Y-m-d H:i:s")
            );




            $armaindata = array(
                "crfex_formno" => $getFormNo,
                "crfex_customerid" => $getCustomerNumber,
                "crfex_company" => $this->input->post("crfex_company"),
                "crfex_datecreate" => conDateToDb($this->input->post("crfex_datecreate")),
                "crfex_custype" => $this->input->post("crfex_custype"),
                "crfex_pcreditlimit" => $this->input->post("crfex_creditlimit"),
                "crfex_pterm" => $this->input->post("crfex_term"),
                "crfex_pdiscount" => $this->input->post("crfex_discount"),
                "crfex_userpost" => $this->input->post("crfex_usercreate"),
                "crfex_userdept" => $this->input->post("crfex_userdeptcode"),
                "crfex_userdatetime" => conDateTimeToDb($this->input->post("crfex_userdatetime")),
                "crfex_status" => "Open",
                "crfex_report_date" => $report_date,
                "crfex_report_month" => $report_month,
                "crfex_report_year" => $report_year,
                "crfex_topic" => "Add new customer."
            );

            $this->db->insert("crfex_customers_temp", $arcustomer);
            $this->db->insert("crfex_maindata", $armaindata);


            return 1;
        } else if ($this->input->post("crfex_custype") == 2) {

            // Get data From customers table to customer table temp
            $updataToTemp = "";

            $this->db->select("*");
            $this->db->from("crfex_customers");
            $this->db->where("crfexcus_code", $this->input->post("crfex_customercode"));
            $this->db->where("crfexcus_area" , $this->input->post("checkAreaAddEn"));
            $query = $this->db->get();

            foreach ($query->result() as $result) {
                $arGetdataToTemp = array(
                    "crfexcus_formno" => $getFormNo,
                    "crfexcus_id" => $result->crfexcus_id,
                    "crfexcus_code" => $result->crfexcus_code,
                    "crfexcus_brcode" => $result->crfexcus_brcode,
                    "crfexcus_datecreate" => $result->crfexcus_datecreate,
                    "crfexcus_salesreps" => $result->crfexcus_salesreps,
                    "crfexcus_nameEN" => $result->crfexcus_nameEN,
                    "crfexcus_nameTH" => $result->crfexcus_nameTH,
                    "crfexcus_address" => $result->crfexcus_address,
                    "crfexcus_file" => $result->crfexcus_file,
                    "crfexcus_tel" => $result->crfexcus_tel,
                    "crfexcus_fax" => $result->crfexcus_fax,
                    "crfexcus_email" => $result->crfexcus_email,
                    "crfexcus_payment" => $result->crfexcus_payment,
                    "crfexcus_creditlimit" => $result->crfexcus_creditlimit,
                    "crfexcus_term" => $result->crfexcus_term,
                    "crfexcus_discount" => $result->crfexcus_discount,
                    "crfexcus_bg" => $result->crfexcus_bg,
                    "crfexcus_his_month1" => $result->crfexcus_his_month1,
                    "crfexcus_his_tvolume1" => $result->crfexcus_his_tvolume1,
                    "crfexcus_histsales1" => $result->crfexcus_histsales1,
                    "crfexcus_his_month2" => $result->crfexcus_his_month2,
                    "crfexcus_his_tvolume2" => $result->crfexcus_his_tvolume2,
                    "crfexcus_histsales2" => $result->crfexcus_histsales2,
                    "crfexcus_his_month3" => $result->crfexcus_his_month3,
                    "crfexcus_his_tvolume3" => $result->crfexcus_his_tvolume3,
                    "crfexcus_histsales3" => $result->crfexcus_histsales3,
                    "crfexcus_usercreate" => $result->crfexcus_usercreate,
                    "crfexcus_userecode" => $result->crfexcus_userecode,
                    "crfexcus_userdeptcode" => $result->crfexcus_userdeptcode,
                    "crfexcus_userdatetimecreate" => $result->crfexcus_userdatetimecreate,
                    "crfexcus_usermodify" => $result->crfexcus_usermodify,
                    "crfexcus_userecodemodify" => $result->crfexcus_userecodemodify,
                    "crfexcus_userdeptcodemodify" => $result->crfexcus_userdeptcodemodify,
                    "crfexcus_datetimemodify" => $result->crfexcus_datetimemodify,
                    "crfexcus_tempstatus" => "Processing",
                    "crfexcus_datetimeupdate" => date("Y-m-d H:i:s")
                );
                $this->db->insert("crfex_customers_temp", $arGetdataToTemp);
            }
            $updataToTemp = 1;

            if ($updataToTemp == 1) {

                if ($this->input->post("crfex_curcustopic1_add") != '') {

                    if ($_FILES["crfex_file"]["name"] != "") {
                        $file = "crfex_file";
                        $fileType = "Document";
                        $this->uploadFiles($file, $fileType);
                        $resultFile = $this->uploadFiles($file, $fileType);
                    } else {
                        $resultFile = "";
                        echo "Not found document !<br>";
                    }


                    $arUpdateCustomerTemp = array(
                        "crfexcus_salesreps" => $this->input->post("crfex_salesreps"),
                        "crfexcus_nameEN" => $this->input->post("crfex_cusnameEN"),
                        "crfexcus_nameTH" => $this->input->post("crfex_cusnameTH"),
                        "crfexcus_address" => $this->input->post("crfex_address"),
                        "crfexcus_file" => $resultFile,
                        "crfexcus_tel" => $this->input->post("crfex_tel"),
                        "crfexcus_fax" => $this->input->post("crfex_fax"),
                        "crfexcus_email" => $this->input->post("crfex_email"),
                        "crfexcus_bg" => $this->input->post("crfex_combg"),
                        "crfexcus_his_month1" => $this->input->post("crfex_his_month1"),
                        "crfexcus_his_tvolume1" => $this->input->post("crfex_his_tvolume1"),
                        "crfexcus_histsales1" => $this->input->post("crfex_histsales1"),
                        "crfexcus_his_month2" => $this->input->post("crfex_his_month2"),
                        "crfexcus_his_tvolume2" => $this->input->post("crfex_his_tvolume2"),
                        "crfexcus_histsales2" => $this->input->post("crfex_histsales2"),
                        "crfexcus_his_month3" => $this->input->post("crfex_his_month3"),
                        "crfexcus_his_tvolume3" => $this->input->post("crfex_his_tvolume3"),
                        "crfexcus_histsales3" => $this->input->post("crfex_histsales3"),

                        "crfexcus_datetimeupdate" => date("Y-m-d H:i:s")
                    );
                    $this->db->where("crfexcus_formno", $getFormNo);
                    $this->db->update("crfex_customers_temp", $arUpdateCustomerTemp);


                    $armaindata = array(
                        "crfex_formno" => $getFormNo,
                        "crfex_customerid" => $getCustomerNumber,
                        "crfex_company" => $this->input->post("crfex_company"),
                        "crfex_datecreate" => conDateToDb($this->input->post("crfex_datecreate")),
                        "crfex_custype" => $this->input->post("crfex_custype"),
                        "crfex_ccreditlimit" => $this->input->post("crfex_creditlimit2"),
                        "crfex_cterm" => $this->input->post("crfex_term2"),
                        "crfex_cdiscount" => $this->input->post("crfex_discount2"),
                        "crfex_userpost" => $this->input->post("crfex_usercreate"),
                        "crfex_userdept" => $this->input->post("crfex_userdeptcode"),
                        "crfex_userdatetime" => conDateTimeToDb($this->input->post("crfex_userdatetime")),
                        "crfex_status" => "Open",
                        "crfex_report_date" => $report_date,
                        "crfex_report_month" => $report_month,
                        "crfex_report_year" => $report_year,
                        "crfex_topic" => "Current customer",
                        "crfex_curcustopic1" => "Change customer information."
                    );

                    if (getFormBeforeSaveEx($getFormNo) > 0) {
                        $this->db->where("crfex_formno", $getFormNo);
                        $this->db->update("crfex_maindata", $armaindata);
                    } else {
                        $this->db->insert("crfex_maindata", $armaindata);
                    }
                }





                if ($this->input->post("crfex_curcustopic2_add") != '') {

                    $arUpdateCustomerTemp = array(
                        "crfexcus_creditlimit2" => $this->input->post("crfex_creditlimit"),
                        "crfexcus_term2" => $this->input->post("crfex_term"),
                        "crfexcus_discount2" => $this->input->post("crfex_discount"),

                        "crfexcus_datetimeupdate" => date("Y-m-d H:i:s")
                    );
                    $this->db->where("crfexcus_formno", $getFormNo);
                    if ($this->db->update("crfex_customers_temp", $arUpdateCustomerTemp)) {
                        $armaindata = array(
                            "crfex_formno" => $getFormNo,
                            "crfex_customerid" => $getCustomerNumber,
                            "crfex_company" => $this->input->post("crfex_company"),
                            "crfex_datecreate" => conDateToDb($this->input->post("crfex_datecreate")),
                            "crfex_custype" => $this->input->post("crfex_custype"),
                            "crfex_ccreditlimit" => $this->input->post("crfex_creditlimit2"),
                            "crfex_cterm" => $this->input->post("crfex_term2"),
                            "crfex_cdiscount" => $this->input->post("crfex_discount2"),
                            "crfex_pcreditlimit" => $this->input->post("crfex_creditlimit"),
                            "crfex_pterm" => $this->input->post("crfex_term"),
                            "crfex_pdiscount" => $this->input->post("crfex_discount"),
                            "crfex_userpost" => $this->input->post("crfex_usercreate"),
                            "crfex_userdept" => $this->input->post("crfex_userdeptcode"),
                            "crfex_userdatetime" => conDateTimeToDb($this->input->post("crfex_userdatetime")),
                            "crfex_status" => "Open",
                            "crfex_report_date" => $report_date,
                            "crfex_report_month" => $report_month,
                            "crfex_report_year" => $report_year,
                            "crfex_topic" => "Current customer",
                            "crfex_curcustopic2" => "Change credit & term."
                        );

                        if (getFormBeforeSaveEx($getFormNo) > 0) {
                            $this->db->where("crfex_formno", $getFormNo);
                            $this->db->update("crfex_maindata", $armaindata);
                        } else {
                            $this->db->insert("crfex_maindata", $armaindata);
                        }
                    }
                }
            }









            // if ($this->input->post("crfex_curcustopic") == 12) {

            //     $armaindata = array(
            //         "crfex_formno" => $getFormNo,
            //         "crfex_customerid" => $this->input->post("getCusid"),
            //         "crfex_company" => $this->input->post("crfex_company"),
            //         "crfex_datecreate" => conDateToDb($this->input->post("crfex_datecreate")),
            //         "crfex_custype" => $this->input->post("crfex_custype"),
            //         // "crfex_pcreditlimit" => $this->input->post("crfex_creditlimit"),
            //         // "crfex_pterm" => $this->input->post("crfex_term"),
            //         // "crfex_pdiscount" => $this->input->post("crfex_discount"),
            //         "crfex_userpost" => $this->input->post("crfex_usercreate"),
            //         "crfex_userdept" => $this->input->post("crfex_userdeptcode"),
            //         "crfex_userdatetime" => conDateTimeToDb($this->input->post("crfex_userdatetime")),
            //         "crfex_status" => "Open",
            //         "crfex_report_date" => $report_date,
            //         "crfex_report_month" => $report_month,
            //         "crfex_report_year" => $report_year,
            //         "crfex_topic" => "Change credit & term.",
            //         "crfex_methodcurcus" => $this->input->post("crfex_curcustopic"),
            //         "crfexm_salesreps" => $this->input->post("crfex_salesreps"),
            //         "crfexm_cusnameEN" => $this->input->post("crfex_cusnameEN"),
            //         "crfexm_cusnameTH" => $this->input->post("crfex_cusnameTH"),
            //         "crfexm_address" => $this->input->post("crfex_address"),
            //         "crfexm_tel" => $this->input->post("crfex_tel"),
            //         "crfexm_fax" => $this->input->post("crfex_fax"),
            //         "crfexm_email" => $this->input->post("crfex_email"),
            //         "crfexm_creditlimit" => $this->input->post("crfex_creditlimit2"),
            //         "crfexm_term" => $this->input->post("crfex_term2"),
            //         "crfexm_discount" => $this->input->post("crfex_discount2"),
            //         "crfexm_bg" => $this->input->post("crfex_combg"),
            //         "crfexm_pcreditlimit" => $this->input->post("crfex_creditlimit"),
            //         "crfexm_pterm" => $this->input->post("crfex_term"),
            //         "crfexm_pdiscount" => $this->input->post("crfex_discount")
            //     );
            //     $this->db->insert("crfex_maindata", $armaindata);
            // }

            return 1;
        } else {
            return 2;
        }
    }




    public function count_allex()
    {
        $query = $this->db->get("crfex_maindata");
        return $query->num_rows();
    }

    public function fetch_detailsex($limit, $start)
    {
        $output = '';
        $this->db->select("crfex_formno , crfex_id , crfex_status , crfex_customerid , crfex_maindata.crfex_datecreate , crf_alltype_subnameEN , crfex_topic , crfexcus_address , crfexcus_salesreps , crfexcus_nameEN ,crfex_curcustopic1 , crfex_curcustopic2");
        $this->db->from("crfex_maindata");
        $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crfex_maindata.crfex_custype');
        $this->db->join('crfex_customers_temp', 'crfex_customers_temp.crfexcus_formno = crfex_maindata.crfex_formno');
        $this->db->order_by("crfex_formno", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $bgcolor = "background-color:#E8E8E8;";
            $fontcolor = "color:#000000;";

            if ($row->crfex_status == "Open") {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            } else if ($row->crfex_status == "Completed") {
                $statusColor = "color:#009900;";
                $lineStatusColor = "background-color:#009900;height:3px;";
            } else if ($row->crfex_status == "Cancel" || $row->crfex_status == "Sales Manager Not Approve" || $row->crfex_status == "Account Manager Not approved") {
                $statusColor = "color:#CC0000;";
                $lineStatusColor = "background-color:#CC0000;height:3px;";
            } else {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            }

            $topic = $row->crfex_topic;

            if ($row->crfex_curcustopic1 != '') {
                $topic .= " / " . $row->crfex_curcustopic1;
            }
            if ($row->crfex_curcustopic2 != '') {
                $topic .= " / " . $row->crfex_curcustopic2;
            }




            $output .= '
      <div class="card mt-3">
      <div class="card-header" style="' . $bgcolor . $fontcolor . '">
            <div class="col-md-3 col-sm-12">
                Form no. &nbsp;<a href="' . base_url('main/viewdataEx/') . $row->crfex_id . '">' . $row->crfex_formno . '</a>
            </div>
            <div class="col-md-3 col-sm-12">
                Date create. : &nbsp;<span style="">' . conDateFromDb($row->crfex_datecreate) . '</span>
            </div>
            <div class="col-md-3 col-sm-12">
                Customer Type : &nbsp;<span style="">' . $row->crf_alltype_subnameEN . '</span>
            </div>
            <div class="col-md-3 statustext">
                Status : &nbsp;<span style="' . $statusColor . '">' . $row->crfex_status . '</span>
            </div>
      </div>
      <div style="' . $lineStatusColor . '"></div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-3">
            <p><label><b>Topic. :</b></label>&nbsp;' . $topic . '</p>
            <p><label><b>Company name. : </b></label>&nbsp;' . $row->crfexcus_nameEN . '</p>
            </div>

            <div class="col-md-6">
            <label><b>Address : </b></label>&nbsp;' . $row->crfexcus_address . '
            </div>

            <div class="col-md-3">
            <label><b>Sales Reps : </b></label>&nbsp;' . $row->crfexcus_salesreps . '
            </div>
        </div>

      </div>
    </div>
      ';
        }
        $output .= '</table>';
        return $output;
    }



    public function count_all_Dateex($dateStart, $dateEnd)
    {
        $this->db->select("*");
        $this->db->from("crfex_maindata");
        $this->db->where("crfex_datecreate >=", $dateStart);
        $this->db->where("crfex_datecreate <=", $dateEnd);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_detailsByDateex($limit, $start, $dateStart, $dateEnd)
    {
        $output = '';
        $this->db->select("crfex_formno , crfex_id , crfex_status , crfex_customerid , crfex_maindata.crfex_datecreate , crf_alltype_subnameEN , crfex_topic , crfexcus_address , crfexcus_salesreps , crfexcus_nameEN ,crfex_curcustopic1 , crfex_curcustopic2");
        $this->db->from("crfex_maindata");
        $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crfex_maindata.crfex_custype');
        $this->db->join('crfex_customers_temp', 'crfex_customers_temp.crfexcus_formno = crfex_maindata.crfex_formno');
        $this->db->where("crfex_datecreate >=", $dateStart);
        $this->db->where("crfex_datecreate <=", $dateEnd);
        $this->db->order_by("crfex_formno", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $bgcolor = "background-color:#E8E8E8;";
            $fontcolor = "color:#000000;";

            if ($row->crfex_status == "Open") {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            } else if ($row->crfex_status == "Completed") {
                $statusColor = "color:#009900;";
                $lineStatusColor = "background-color:#009900;height:3px;";
            } else if ($row->crfex_status == "Cancel" || $row->crfex_status == "Sales Manager Not Approve" || $row->crfex_status == "Account Manager Not approved") {
                $statusColor = "color:#CC0000;";
                $lineStatusColor = "background-color:#CC0000;height:3px;";
            } else {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            }

            $topic = $row->crfex_topic;

            if ($row->crfex_curcustopic1 != '') {
                $topic .= " / " . $row->crfex_curcustopic1;
            }
            if ($row->crfex_curcustopic2 != '') {
                $topic .= " / " . $row->crfex_curcustopic2;
            }



            $output .= '
            <div class="card mt-3">
            <div class="card-header" style="' . $bgcolor . $fontcolor . '">
                  <div class="col-md-3 col-sm-12">
                      Form no. &nbsp;<a href="' . base_url('main/viewdataEx/') . $row->crfex_id . '">' . $row->crfex_formno . '</a>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      Date create. : &nbsp;<span style="">' . conDateFromDb($row->crfex_datecreate) . '</span>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      Customer Type : &nbsp;<span style="">' . $row->crf_alltype_subnameEN . '</span>
                  </div>
                  <div class="col-md-3 statustext">
                      Status : &nbsp;<span style="' . $statusColor . '">' . $row->crfex_status . '</span>
                  </div>
            </div>
            <div style="' . $lineStatusColor . '"></div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3">
                  <p><label><b>Topic. :</b></label>&nbsp;' . $topic . '</p>
                  <p><label><b>Company name. : </b></label>&nbsp;' . $row->crfexcus_nameEN . '</p>
                  </div>
      
                  <div class="col-md-6">
                  <label><b>Address : </b></label>&nbsp;' . $row->crfexcus_address . '
                  </div>
      
                  <div class="col-md-3">
                  <label><b>Sales Reps : </b></label>&nbsp;' . $row->crfexcus_salesreps . '
                  </div>
              </div>
      
            </div>
          </div>
      ';
        }
        $output .= '</table>';
        return $output;
    }





    public function count_all_FormNoex($formNo)
    {
        $this->db->select("*");
        $this->db->from("crfex_maindata");
        $this->db->like("crfex_formno", $formNo, 'both');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_detailsByFormNoex($limit, $start, $formNo)
    {
        $output = '';
        $this->db->select("crfex_formno , crfex_id , crfex_status , crfex_customerid , crfex_maindata.crfex_datecreate , crf_alltype_subnameEN , crfex_topic , crfexcus_address , crfexcus_salesreps , crfexcus_nameEN ,crfex_curcustopic1 , crfex_curcustopic2");
        $this->db->from("crfex_maindata");
        $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crfex_maindata.crfex_custype');
        $this->db->join('crfex_customers_temp', 'crfex_customers_temp.crfexcus_formno = crfex_maindata.crfex_formno');
        $this->db->like("crfex_formno", $formNo, 'both');
        $this->db->order_by("crfex_formno", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $bgcolor = "background-color:#E8E8E8;";
            $fontcolor = "color:#000000;";

            if ($row->crfex_status == "Open") {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            } else if ($row->crfex_status == "Completed") {
                $statusColor = "color:#009900;";
                $lineStatusColor = "background-color:#009900;height:3px;";
            } else if ($row->crfex_status == "Cancel" || $row->crfex_status == "Sales Manager Not Approve" || $row->crfex_status == "Account Manager Not approved") {
                $statusColor = "color:#CC0000;";
                $lineStatusColor = "background-color:#CC0000;height:3px;";
            } else {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            }

            $topic = $row->crfex_topic;

            if ($row->crfex_curcustopic1 != '') {
                $topic .= " / " . $row->crfex_curcustopic1;
            }
            if ($row->crfex_curcustopic2 != '') {
                $topic .= " / " . $row->crfex_curcustopic2;
            }



            $output .= '
            <div class="card mt-3">
            <div class="card-header" style="' . $bgcolor . $fontcolor . '">
                  <div class="col-md-3 col-sm-12">
                      Form no. &nbsp;<a href="' . base_url('main/viewdataEx/') . $row->crfex_id . '">' . $row->crfex_formno . '</a>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      Date create. : &nbsp;<span style="">' . conDateFromDb($row->crfex_datecreate) . '</span>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      Customer Type : &nbsp;<span style="">' . $row->crf_alltype_subnameEN . '</span>
                  </div>
                  <div class="col-md-3 statustext">
                      Status : &nbsp;<span style="' . $statusColor . '">' . $row->crfex_status . '</span>
                  </div>
            </div>
            <div style="' . $lineStatusColor . '"></div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3">
                  <p><label><b>Topic. :</b></label>&nbsp;' . $topic . '</p>
                  <p><label><b>Company name. : </b></label>&nbsp;' . $row->crfexcus_nameEN . '</p>
                  </div>
      
                  <div class="col-md-6">
                  <label><b>Address : </b></label>&nbsp;' . $row->crfexcus_address . '
                  </div>
      
                  <div class="col-md-3">
                  <label><b>Sales Reps : </b></label>&nbsp;' . $row->crfexcus_salesreps . '
                  </div>
              </div>
      
            </div>
          </div>
      ';
        }
        $output .= '</table>';
        return $output;
    }






    public function count_all_Companyex($companyname)
    {
        $this->db->select("crfexcus_nameEN");
        $this->db->from("crfex_maindata");
        $this->db->join('crfex_customers_temp', 'crfex_customers_temp.crfexcus_formno = crfex_maindata.crfex_formno');
        $this->db->like("crfexcus_nameEN", $companyname);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function fetch_detailsByCompanyex($limit, $start, $companyname)
    {
        $output = '';
        $this->db->select("crfex_formno , crfex_id , crfex_status , crfex_customerid , crfex_maindata.crfex_datecreate , crf_alltype_subnameEN , crfex_topic , crfexcus_address , crfexcus_salesreps , crfexcus_nameEN ,crfex_curcustopic1 , crfex_curcustopic2");
        $this->db->from("crfex_maindata");
        $this->db->join('crf_alltype', 'crf_alltype.crf_alltype_subcode = crfex_maindata.crfex_custype');
        $this->db->join('crfex_customers_temp', 'crfex_customers_temp.crfexcus_formno = crfex_maindata.crfex_formno');
        $this->db->like("crfexcus_nameEN", $companyname);
        $this->db->order_by("crfex_formno", "DESC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        foreach ($query->result() as $row) {

            $bgcolor = "background-color:#E8E8E8;";
            $fontcolor = "color:#000000;";

            if ($row->crfex_status == "Open") {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            } else if ($row->crfex_status == "Completed") {
                $statusColor = "color:#009900;";
                $lineStatusColor = "background-color:#009900;height:3px;";
            } else if ($row->crfex_status == "Cancel" || $row->crfex_status == "Sales Manager Not Approve" || $row->crfex_status == "Account Manager Not approved") {
                $statusColor = "color:#CC0000;";
                $lineStatusColor = "background-color:#CC0000;height:3px;";
            } else {
                $statusColor = "color:#0066FF;";
                $lineStatusColor = "background-color:#0066FF;height:3px;";
            }

            $topic = $row->crfex_topic;

            if ($row->crfex_curcustopic1 != '') {
                $topic .= " / " . $row->crfex_curcustopic1;
            }
            if ($row->crfex_curcustopic2 != '') {
                $topic .= " / " . $row->crfex_curcustopic2;
            }



            $output .= '
            <div class="card mt-3">
            <div class="card-header" style="' . $bgcolor . $fontcolor . '">
                  <div class="col-md-3 col-sm-12">
                      Form no. &nbsp;<a href="' . base_url('main/viewdataEx/') . $row->crfex_id . '">' . $row->crfex_formno . '</a>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      Date create. : &nbsp;<span style="">' . conDateFromDb($row->crfex_datecreate) . '</span>
                  </div>
                  <div class="col-md-3 col-sm-12">
                      Customer Type : &nbsp;<span style="">' . $row->crf_alltype_subnameEN . '</span>
                  </div>
                  <div class="col-md-3 statustext">
                      Status : &nbsp;<span style="' . $statusColor . '">' . $row->crfex_status . '</span>
                  </div>
            </div>
            <div style="' . $lineStatusColor . '"></div>
            <div class="card-body">
              <div class="row">
                  <div class="col-md-3">
                  <p><label><b>Topic. :</b></label>&nbsp;' . $topic . '</p>
                  <p><label><b>Company name. : </b></label>&nbsp;' . $row->crfexcus_nameEN . '</p>
                  </div>
      
                  <div class="col-md-6">
                  <label><b>Address : </b></label>&nbsp;' . $row->crfexcus_address . '
                  </div>
      
                  <div class="col-md-3">
                  <label><b>Sales Reps : </b></label>&nbsp;' . $row->crfexcus_salesreps . '
                  </div>
              </div>
      
            </div>
          </div>
      ';
        }
        $output .= '</table>';
        return $output;
    }




    public function exManagerApprove($crfexid)
    {
        exManagerApprove($crfexid);
    }

    public function exCsAddBr($crfexid)
    {
        $exBrCode = $this->input->post("ex_csBrCode");
        $csArea = $this->input->post("csArea");

        $this->db->select("crfexcus_brcode");
        $this->db->from("crfex_customers");
        $this->db->where("crfexcus_brcode", $exBrCode);
        $this->db->where("crfexcus_area" , $csArea);
        $result = $this->db->get();
        echo $result->num_rows();
        if ($result->num_rows() > 0) {
            echo "<script>";
            echo "alert('Duplicate data found in the system')";
            echo "</script>";
            header("refresh:0; url=" . base_url('main/viewdataEx/') . $crfexid);
        } else if ($result->num_rows() == 0) {
            exCsAddBr($crfexid);
            header("refresh:0; url=" . base_url('main/listex'));
        }
    }

    public function exAccMgrApprove($crfexid)
    {
        exAccMgrApprove($crfexid);
    }

    public function exDirectorApprove($crfexid)
    {
        exDirectorApprove($crfexid);
    }

    public function exAccountAddCusCode($crfexid)
    {
        exAccountAddCusCode($crfexid);
    }



    // Check duplicate customer name
    public function checkDuplicateNameCustomer()
    {
        $cusName = "";
        $comName = "";
        $cusName = $this->input->post("cusName");
        $comName = $this->input->post("comName");
        $rs = "";

        $query = $this->db->query("SELECT crfcus_name FROM crf_customers WHERE crfcus_name like '%$cusName%' AND crfcus_area = '$comName' ");
        $result = $query->num_rows();

        if ($result > 1) {
            $rs = 00;
        } else if ($result == 1) {
            $rs = 11;
        }

        return $rs;
    }
    // Check duplicate customer name
    public function checkDuplicateNameCustomerEx()
    {
        $cusName = "";
        $comName = "";
        $cusName = $this->input->post("cusName");
        $comName = $this->input->post("comName");
        $rs = "";

        $query = $this->db->query("SELECT crfexcus_nameEN FROM crfex_customers WHERE crfexcus_nameEN like '%$cusName%' AND crfexcus_area = '$comName' ");
        $result = $query->num_rows();

        if ($result > 1) {
            $rs = 00;
        } else if ($result == 1) {
            $rs = 11;
        }

        return $rs;
    }


    public function save_editdata()
    {

        $report_date = "";
        $report_month = "";
        $report_year = "";

        $conReportDate = date_create($this->input->post("crf_datecreate"));
        $report_date = date_format($conReportDate, "d");

        $conReportMonth = date_create($this->input->post("crf_datecreate"));
        $report_month = date_format($conReportMonth, "m");

        $conReportYear = date_create($this->input->post("crf_datecreate"));
        $report_year = date_format($conReportYear, "Y");


        if ($_FILES["crf_file1"]["name"] != "") {
            $file1 = "crf_file1";
            $fileType1 = "ภพ20";
            $this->uploadFiles($file1, $fileType1);
            $resultFile1 = $this->uploadFiles($file1, $fileType1);
        } else {
            $resultFile1 = $this->input->post("get_crf_file1");
        }

        if ($_FILES["crf_file2"]["name"] != "") {
            $file2 = "crf_file2";
            $fileType2 = "หนังสือรับรอง";
            $this->uploadFiles($file2, $fileType2);
            $resultFile2 = $this->uploadFiles($file2, $fileType2);
        } else {
            $resultFile2 = $this->input->post("get_crf_file2");
        }

        if ($_FILES["crf_file3"]["name"] != "") {
            $file3 = "crf_file3";
            $fileType3 = "ข้อมูลทั่วไป";
            $this->uploadFiles($file3, $fileType3);
            $resultFile3 = $this->uploadFiles($file3, $fileType3);
        } else {
            $resultFile3 = $this->input->post("get_crf_file3");
        }

        if ($_FILES["crf_file4"]["name"] != "") {
            $file4 = "crf_file4";
            $fileType4 = "งบแสดงฐานะทางการเงิน";
            $this->uploadFiles($file4, $fileType4);
            $resultFile4 = $this->uploadFiles($file4, $fileType4);
        } else {
            $resultFile4 = $this->input->post("get_crf_file4");
        }

        if ($_FILES["crf_file5"]["name"] != "") {
            $file5 = "crf_file5";
            $fileType5 = "งบกำไรขาดทุน";
            $this->uploadFiles($file5, $fileType5);
            $resultFile5 = $this->uploadFiles($file5, $fileType5);
        } else {
            $resultFile5 = $this->input->post("get_crf_file5");
        }

        if ($_FILES["crf_file6"]["name"] != "") {
            $file6 = "crf_file6";
            $fileType6 = "อัตราส่วนสภาพคล่อง";
            $this->uploadFiles($file6, $fileType6);
            $resultFile6 = $this->uploadFiles($file6, $fileType6);
        } else {
            $resultFile6 = $this->input->post("get_crf_file6");
        }

        if ($_FILES["crf_file7"]["name"] != "") {
            $file7 = "crf_file7";
            $fileType7 = "ตารางวางบิล";
            $this->uploadFiles($file7, $fileType7);
            $resultFile7 = $this->uploadFiles($file7, $fileType7);
        } else {
            $resultFile7 = $this->input->post("get_crf_file7");
        }

        if ($_FILES["crf_file8"]["name"] != "") {
            $file8 = "crf_file8";
            $fileType8 = "แผนที่ที่ไปวางบิล";
            $this->uploadFiles($file8, $fileType8);
            $resultFile8 = $this->uploadFiles($file8, $fileType8);
        } else {
            $resultFile8 = $this->input->post("get_crf_file8");
        }

        if ($_FILES["crf_file9"]["name"] != "") {
            $file9 = "crf_file9";
            $fileType9 = "แผนที่ที่ไปวางบิล2";
            $this->uploadFiles($file9, $fileType9);
            $resultFile9 = $this->uploadFiles($file9, $fileType9);
        } else {
            $resultFile9 = $this->input->post("get_crf_file9");
        }



        if (isset($_POST['user_edit'])) {

            if ($this->input->post("check_editcustype") == 1) {
                $arcustomer = array(
                    "crfcus_area" => $this->input->post("check_editcom"),
                    "crfcus_salesreps" => $this->input->post("edit_salesreps"),
                    "crfcus_name" => $this->input->post("edit_customername"),
                    "crfcus_comdatecreate" => conDateToDb($this->input->post("edit_cuscompanycreate")),
                    "crfcus_addresstype" => $this->input->post("edit_addresstype"),
                    "crfcus_address" => $this->input->post("edit_addressname"),
                    "crfcus_contactname" => $this->input->post("edit_namecontact"),
                    "crfcus_phone" => $this->input->post("edit_telcontact"),
                    "crfcus_fax" => $this->input->post("edit_faxcontact"),
                    "crfcus_email" => $this->input->post("edit_emailcontact"),
                    "crfcus_regiscapital" => conPrice($this->input->post("edit_regiscost")),
                    "crfcus_companytype" => $this->input->post("crf_companytype"),
                    "crfcus_comtype2" => $this->input->post("crf_companytype2"),
                    "crfcus_comtype31" => $this->input->post("crf_companytype3_1_1"),
                    "crfcus_comtype32" => $this->input->post("crf_companytype3_1_2"),
                    "crfcus_comtype33" => $this->input->post("crf_companytype3_2_1"),
                    "crfcus_comtype34" => $this->input->post("crf_companytype3_2_2"),
                    "crfcus_typebussi" => $this->input->post("edit_typeofbussi"),
                    "crfcus_forecast" => $this->input->post("edit_forecast"),
                    "crfcus_file1" => $resultFile1,
                    "crfcus_file2" => $resultFile2,
                    "crfcus_file3" => $resultFile3,
                    "crfcus_file4" => $resultFile4,
                    "crfcus_file5" => $resultFile5,
                    "crfcus_file6" => $resultFile6,
                    "crfcus_creditterm" => $this->input->post("crf_creditterm"),
                    "crfcus_conditionbill" => $this->input->post("crf_condition_bill"),
                    "crfcus_tablebill" => $resultFile7,
                    "crfcus_mapbill" => $resultFile8,
                    "crfcus_datebill" => $this->input->post("crf_datebill"),
                    "crfcus_mapbill2" => $resultFile9,
                    "crfcus_conditionmoney" => $this->input->post("edit_condition_money"),
                    "crfcus_moneylimit" => conPrice($this->input->post("crf_finance_req_number")),
                    "crfcus_usermodify" => $this->input->post("crf_userpost"),
                    "crfcus_usermodify_ecode" => $this->input->post("crf_userecodepost"),
                    "crfcus_usermodify_deptcode" => $this->input->post("crf_userdeptcodepost"),
                    "crfcus_usermodify_datetime" => conDateTimeToDb($this->input->post("crf_userpostdatetime"))
                );
                $this->db->where("crfcus_formno", $this->input->post("check_EditFormNo"));
                $this->db->update("crf_customers_temp", $arcustomer);


                $arcrfmain = array(
                    "crf_company" => $this->input->post("crf_company"),
                    "crf_type" => $this->input->post("check_editcustype"),
                    "crf_datecreate" => conDateToDb($this->input->post("crf_datecreate")),
                    "crf_finance" => $this->input->post("check_editfinance"),
                    "crf_userpost" => $this->input->post("crf_userpost"),
                    "crf_userecodepost" => $this->input->post("crf_userecodepost"),
                    "crf_userdeptcodepost" => $this->input->post("crf_userdeptcodepost"),
                    "crf_userdeptpost" => $this->input->post("crf_userdeptpost"),
                    "crf_userpostdatetime" => conDateTimeToDb($this->input->post("crf_userpostdatetime")),
                    "crf_report_date" => $report_date,
                    "crf_report_month" => $report_month,
                    "crf_report_year" => $report_year,
                    "crf_status" => "Edited"
                );
                $this->db->where("crf_id", $this->input->post("getCrfid_edit"));
                $this->db->update("crf_maindata", $arcrfmain);




                if (isset($_POST["crf_primanage_dept"])) {

                    if (deletePrimanage($this->input->post("getCustomerid_edit"))) {
                        $crf_primanage_dept = $this->input->post('crf_primanage_dept');

                        foreach ($crf_primanage_dept as $key => $rs) {

                            $arsavePri = array(
                                "crf_pricusid" => $this->input->post("getCustomerid_edit"),
                                "crf_primanage_dept" => $rs,
                                "crf_primanage_name" => $this->input->post("crf_primanage_name")[$key],
                                "crf_primanage_posi" => $this->input->post("crf_primanage_posi")[$key],
                                "crf_primanage_email" => $this->input->post("crf_primanage_email")[$key]
                            );
                            $this->db->insert("crf_pri_manage", $arsavePri);
                        }
                    }
                }

                if (isset($_POST["crf_process"])) {
                    if (deleteProcess($this->input->post('getCustomerid_edit'))) {
                        $crf_process = $this->input->post("crf_process");

                        foreach ($crf_process as $key => $rs) {

                            $arsaveProcess = array(
                                "crf_cusid" => $this->input->post('getCustomerid_edit'),
                                "crf_process_name" => $rs
                            );
                            $this->db->insert("crf_process_use",  $arsaveProcess);
                        }
                    }
                }


                //Update User log table
                $aruserlog = array(
                    "crfuserlog_datetime" => date("Y-m-d H:i:s"),
                    "crfuserlog_activity" => "แก้ไขข้อมูล",
                    "crfuserlog_username" => $this->input->post("crf_userpost"),
                    "crfuserlog_deptcode" => $this->input->post("crf_userdeptcodepost"),
                    "crfuserlog_ecode" => $this->input->post("crf_userecodepost")
                );
                $this->db->insert("crf_userlog", $aruserlog);
                header("refresh:0; url=" . base_url('main/viewdata/') . $this->input->post("getCrfid_edit"));
            } else if ($this->input->post("check_editcustype") == 2) { //When current customer
                //When current customer//When current customer//When current customer//When current customer//When current customer

                if ($this->input->post("crf_sub_oldcus_changearea") != '') {
                    $arUpdateSalesReps = array(
                        "crfcus_salesreps" => $this->input->post("edit_salesreps"),
                        "crfcus_usermodify" => $this->input->post("crf_userpost"),
                        "crfcus_usermodify_ecode" => $this->input->post("crf_userecodepost"),
                        "crfcus_usermodify_deptcode" => $this->input->post("crf_userdeptcodepost"),
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
                    );
                    $this->db->where("crfcus_formno", $this->input->post("check_EditFormNo"));
                    if ($this->db->update("crf_customers_temp", $arUpdateSalesReps)) {
                        $arUpdateMaindata = array(
                            "crf_sub_oldcus_changearea" => $this->input->post("crf_sub_oldcus_changearea"),
                            "crf_topic" => "เปลี่ยนเขตการขาย",
                            "crf_status" => "Edited",
                            "crf_usermodify" => $this->input->post("crf_userpost"),
                            "crf_ecodemodify" => $this->input->post("crf_userecodepost"),
                            "crf_deptcodemodify" => $this->input->post("crf_userdeptcodepost"),
                            "crf_datetimemodify" => date("Y-m-d H:i:s")
                        );
                        $this->db->where("crf_id", $this->input->post("getCrfid_edit"));
                        $this->db->update("crf_maindata", $arUpdateMaindata);
                    }
                }





                if ($this->input->post("crf_sub_oldcus_changeaddress") != "") {
                    $arUpdateAddress = array(
                        "crfcus_addresstype" => $this->input->post("edit_addresstype"),
                        "crfcus_address" => $this->input->post("edit_addressname"),
                        "crfcus_contactname" => $this->input->post("edit_namecontact"),
                        "crfcus_phone" => $this->input->post("edit_telcontact"),
                        "crfcus_fax" => $this->input->post("edit_faxcontact"),
                        "crfcus_email" => $this->input->post("edit_emailcontact"),
                        "crfcus_file1" =>  $resultFile1,
                        "crfcus_regiscapital" => conPrice($this->input->post("edit_regiscost")),
                        "crfcus_usermodify" => $this->input->post("crf_userpost"),
                        "crfcus_usermodify_ecode" => $this->input->post("crf_userecodepost"),
                        "crfcus_usermodify_deptcode" => $this->input->post("crf_userdeptcodepost"),
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
                    );
                    $this->db->where("crfcus_formno", $this->input->post("check_EditFormNo"));
                    if ($this->db->update("crf_customers_temp", $arUpdateAddress)) {
                        $arUpdateMaindata = array(
                            "crf_sub_oldcus_changeaddress" => $this->input->post("crf_sub_oldcus_changeaddress"),
                            "crf_topic2" => "เปลี่ยนที่อยู่",
                            "crf_status" => "Edited",
                            "crf_usermodify" => $this->input->post("crf_userpost"),
                            "crf_ecodemodify" => $this->input->post("crf_userecodepost"),
                            "crf_deptcodemodify" => $this->input->post("crf_userdeptcodepost"),
                            "crf_datetimemodify" => date("Y-m-d H:i:s")
                        );
                        $this->db->where("crf_id", $this->input->post("getCrfid_edit"));
                        $this->db->update("crf_maindata", $arUpdateMaindata);
                    }
                }








                if ($this->input->post("crf_sub_oldcus_changecredit") != "") {

                    $arUpdateChangeCredit = array(
                        "crfcus_creditterm" => $this->input->post("oldCreditTerm"),
                        "crfcus_creditterm2" => $this->input->post("showcredit2"),
                        "crfcus_usermodify" => $this->input->post("crf_userpost"),
                        "crfcus_usermodify_ecode" => $this->input->post("crf_userecodepost"),
                        "crfcus_usermodify_deptcode" => $this->input->post("crf_userdeptcodepost"),
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
                    );
                    $this->db->where("crfcus_formno", $this->input->post("check_EditFormNo"));
                    if ($this->db->update("crf_customers_temp", $arUpdateChangeCredit)) {
                        $arUpdateMaindata = array(
                            "crf_sub_oldcus_changecredit" => $this->input->post("crf_sub_oldcus_changecredit"),
                            "crf_topic3" => "ปรับ Credit term. เพิ่ม / ลด",
                            "crf_status" => "Edited",
                            "crf_creditterm" => $this->input->post("oldCreditTerm"),
                            "crf_change_creditterm" => $this->input->post("crf_change_creditterm"),
                            "crf_condition_credit" => $this->input->post("crf_condition_credit"),
                            "crf_creditterm2" => $this->input->post("showcredit2"),
                            "crf_usermodify" => $this->input->post("crf_userpost"),
                            "crf_ecodemodify" => $this->input->post("crf_userecodepost"),
                            "crf_deptcodemodify" => $this->input->post("crf_userdeptcodepost"),
                            "crf_datetimemodify" => date("Y-m-d H:i:s")
                        );
                        $this->db->where("crf_id", $this->input->post("getCrfid_edit"));
                        $this->db->update("crf_maindata", $arUpdateMaindata);
                    }
                }






                if ($this->input->post("crf_sub_oldcus_changefinance") != "") {

                    $arUpdateChangeFinance = array(
                        "crfcus_moneylimit2" => conPrice($this->input->post("crf_finance_change_total")),
                        "crfcus_usermodify" => $this->input->post("crf_userpost"),
                        "crfcus_usermodify_ecode" => $this->input->post("crf_userecodepost"),
                        "crfcus_usermodify_deptcode" => $this->input->post("crf_userdeptcodepost"),
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
                    );
                    $this->db->where("crfcus_formno", $this->input->post("check_EditFormNo"));
                    if ($this->db->update("crf_customers_temp", $arUpdateChangeFinance)) {
                        $arUpdateMaindata = array(
                            "crf_sub_oldcus_changefinance" => $this->input->post("crf_sub_oldcus_changefinance"),
                            "crf_finance" => $this->input->post("crf_finance"),
                            "crf_finance_req_number" => $this->input->post("crf_finance_req_number_calc"),
                            "crf_finance_status" => $this->input->post("crf_finance_status"),
                            "crf_finance_change_status" => $this->input->post("crf_finance_change_status"),
                            "crf_finance_change_number" => conPrice($this->input->post("crf_finance_change_number")),
                            "crf_finance_change_total" => conPrice($this->input->post("crf_finance_change_total")),
                            "crf_finance_change_detail" => $this->input->post("crf_finance_change_detail"),
                            "crf_topic3" => "ปรับวงเงิน เพิ่ม / ลด",
                            "crf_status" => "Edited",
                            "crf_usermodify" => $this->input->post("crf_userpost"),
                            "crf_ecodemodify" => $this->input->post("crf_userecodepost"),
                            "crf_deptcodemodify" => $this->input->post("crf_userdeptcodepost"),
                            "crf_datetimemodify" => date("Y-m-d H:i:s")
                        );
                        $this->db->where("crf_id", $this->input->post("getCrfid_edit"));
                        $this->db->update("crf_maindata", $arUpdateMaindata);
                    }
                }



                //Update User log table
                $aruserlog = array(
                    "crfuserlog_datetime" => date("Y-m-d H:i:s"),
                    "crfuserlog_activity" => "แก้ไขข้อมูล",
                    "crfuserlog_username" => $this->input->post("crf_userpost"),
                    "crfuserlog_deptcode" => $this->input->post("crf_userdeptcodepost"),
                    "crfuserlog_ecode" => $this->input->post("crf_userecodepost")
                );
                $this->db->insert("crf_userlog", $aruserlog);
                header("refresh:0; url=" . base_url('main/viewdata/') . $this->input->post("getCrfid_edit"));
            }
        }
    }



    public function canceldata($crfid, $crfformno)
    {
        $arCancel = array(
            "crf_status" => "Cancel"
        );
        $this->db->where("crf_id", $crfid);
        $this->db->update("crf_maindata",  $arCancel);

        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Cancel",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $this->db->where("crfcus_formno", $crfformno);
        $this->db->update("crf_customers_temp", $arCustomerTemp);

        header("refresh:0; url=" . base_url('main/list'));
    }

    public function canceldataEx($crfid, $crfformno)
    {
        $arCancel = array(
            "crfex_status" => "Cancel"
        );
        $this->db->where("crfex_id", $crfid);
        $this->db->update("crfex_maindata",  $arCancel);

        $arCustomerTemp = array(
            "crfexcus_tempstatus" => "Cancel",
            "crfexcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $this->db->where("crfexcus_formno", $crfformno);
        $this->db->update("crfex_customers_temp", $arCustomerTemp);

        header("refresh:0; url=" . base_url('main/listex'));
    }




    public function saveEditdataEx()
    {
        if (isset($_POST['usercrfex_edit'])) {
            // Update data to temp table


            // Check file Change or not
            if ($_FILES["crfex_file"]["name"] != "") {
                $file = "crfex_file";
                $fileType = "Customer file";
                $this->uploadFiles($file, $fileType);
                $resultFile = $this->uploadFiles($file, $fileType);
            } else {
                $resultFile = $this->input->post("crfex_fileShowOld");
            }



            $arUpdateToTemp = array(
                "crfexcus_salesreps" => $this->input->post("crfex_salesreps"),
                "crfexcus_nameEN" => $this->input->post("crfex_cusnameEN"),
                "crfexcus_nameTH" => $this->input->post("crfex_cusnameTH"),
                "crfexcus_address" => $this->input->post("crfex_address"),
                "crfexcus_file" => $resultFile,
                "crfexcus_tel" => $this->input->post("crfex_tel"),
                "crfexcus_fax" => $this->input->post("crfex_fax"),
                "crfexcus_email" => $this->input->post("crfex_email"),
                "crfexcus_payment" => $this->input->post("crfex_payment"),
                "crfexcus_bg" => $this->input->post("crfex_combg"),
                "crfexcus_his_month1" => $this->input->post("crfex_his_month1"),
                "crfexcus_his_tvolume1" => $this->input->post("crfex_his_tvolume1"),
                "crfexcus_histsales1" => $this->input->post("crfex_histsales1"),
                "crfexcus_his_month2" => $this->input->post("crfex_his_month2"),
                "crfexcus_his_tvolume2" => $this->input->post("crfex_his_tvolume2"),
                "crfexcus_histsales2" => $this->input->post("crfex_histsales2"),
                "crfexcus_his_month3" => $this->input->post("crfex_his_month3"),
                "crfexcus_his_tvolume3" => $this->input->post("crfex_his_tvolume3"),
                "crfexcus_histsales3" => $this->input->post("crfex_histsales3"),

                "crfexcus_usermodify" => $this->input->post("crfex_usercreate"),
                "crfexcus_userecodemodify" => $this->input->post("crfex_userecode"),
                "crfexcus_userdeptcodemodify" => $this->input->post("crfex_userdeptcode"),
                "crfexcus_datetimemodify" => date("Y-m-d H:i:s"),
                "crfexcus_tempstatus" => "Processing",
                "crfexcus_datetimeupdate" => date("Y-m-d H:i:s")
            );
            $this->db->where("crfexcus_formno", $this->input->post("checkEditFormNo"));
            if ($this->db->update("crfex_customers_temp", $arUpdateToTemp)) {
                // Update data to crfex_maindata
                $arUpdateMaindata = array(
                    "crfex_company" => $this->input->post("crfex_company"),
                    "crfex_curcustopic1" => $this->input->post("crfex_curcustopic1"),
                    "crfex_curcustopic2" => $this->input->post("crfex_curcustopic2"),
                    "crfex_pcreditlimit" => $this->input->post("crfex_creditlimit"),
                    "crfex_pterm" => $this->input->post("crfex_term"),
                    "crfex_pdiscount" => $this->input->post("crfex_discount"),
                    "crfex_ccreditlimit" => $this->input->post("crfex_creditlimit2"),
                    "crfex_cterm" => $this->input->post("crfex_term2"),
                    "crfex_cdiscount" => $this->input->post("crfex_discount2"),
                    "crfex_status" => "Edited",
                    "crfex_usermodify" => $this->input->post("crfex_usercreate"),
                    "crfex_datetimemodify" => date("Y-m-d H:i:s")
                );
                $this->db->where("crfex_id", $this->input->post("checkEditFormId"));
                $this->db->update("crfex_maindata", $arUpdateMaindata);
            }
            header("refresh:0; url=".base_url('main/listex'));
        }
    }



}
// Main Model
