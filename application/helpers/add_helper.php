<?php
class addfn
{
    public $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        date_default_timezone_set("Asia/Bangkok");
    }

    public function gci()
    {
        return $this->ci;
    }
}

// Sale , CS Approve
function saveApprove($crfid)
{
    $obj = new addfn();

    if($obj->gci()->input->post("mgr_appro") == "อนุมัติ"){
        $status = "Sales Manager Approved";
    }else{
        $status = "Sales Manager Not Approve";
    }
    $mgrArray = array(
        "crf_mgrapprove_detail" => $obj->gci()->input->post("crf_mgrapprove_detail"),
        "crf_mgrapprove_name" => $obj->gci()->input->post("crf_mgrapprove_name"),
        "crf_mgrapprove_datetime" => conDatetimeToDb($obj->gci()->input->post("crf_mgrapprove_datetime")),
        "crf_mgrapprove_status" => $obj->gci()->input->post("mgr_appro"),
        "crf_status" => $status
    );

    $obj->gci()->db->where("crf_id" , $crfid);
    $obj->gci()->db->update("crf_maindata" , $mgrArray);
}


function saveCsBr($crfid)
{
    $obj = new addfn();
    $arbr = array(
        "crf_brcode" => $obj->gci()->input->post("crf_brcode"),
        "crf_brcode_userpost" => $obj->gci()->input->post("crf_brcode_userpost"),
        "crf_brcode_datetime" => conDateTimeToDb($obj->gci()->input->post("crf_becode_datetime")),
        "crf_status" => "CS POST BR"
    );

    $obj->gci()->db->where("crf_id" , $crfid);
    $obj->gci()->db->update("crf_maindata" , $arbr);
}


function saveAccMgr($crfid)
{
    $obj = new addfn();
    $arAccMgr = array(
        "crf_accmgr_detail" => $obj->gci()->input->post("crf_accmgr_detail"),
        "crf_accmgr_name" => $obj->gci()->input->post("crf_accmgr_name"),
        "crf_accmgr_datetime" => conDateTimeToDb($obj->gci()->input->post("crf_accmgr_datetime")),
        "crf_accmgrapprove_status" => $obj->gci()->input->post("mgracc_appro"),
        "crf_status" => "Account Manager Approved"
    );

    $obj->gci()->db->where("crf_id" , $crfid);
    $obj->gci()->db->update("crf_maindata" , $arAccMgr);
}


function saveDerector1($crfid)
{
    $obj = new addfn();
    $arDirector = array(
        "crf_director_detail1" => $obj->gci()->input->post("crf_director_detail1"),
        "crf_director_name1" => $obj->gci()->input->post("crf_director_name1"),
        "crf_director_datetime1" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime1")),
        "crf_directorapprove_status1" => $obj->gci()->input->post("director1_appro"),
        "crf_status" => "Director Sales Approved"
    );

    $obj->gci()->db->where("crf_id" , $crfid);
    $obj->gci()->db->update("crf_maindata" , $arDirector);
}


function saveDerector2($crfid)
{
    $obj = new addfn();
    $arDirector = array(
        "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
        "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
        "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
        "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
        "crf_status" => "Director Account Approved"
    );

    $obj->gci()->db->where("crf_id" , $crfid);
    $obj->gci()->db->update("crf_maindata" , $arDirector);
}

// สำหรับเปลี่ยนเขตการขาย
function saveDirector2ChangSales($crfid)
{
    $obj = new addfn();
    $arDirector = array(
        "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
        "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
        "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
        "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
        "crf_status" => "Complated"
    );
    $obj->gci()->db->where("crf_id" , $crfid);
    if($obj->gci()->db->update("crf_maindata" , $arDirector)){
        $salesreps = getWhenComplate($crfid)->crfw_salesreps;
        $customerid = getWhenComplate($crfid)->crf_cuscode;
        $arupdateCustomer = array(
            "crfcus_salesreps" => $salesreps,
            "crfcus_usermodify" => $obj->gci()->input->post("userpostD2"),
            "crfcus_usermodify_ecode" => $obj->gci()->input->post("ecodepostD2"),
            "crfcus_usermodify_deptcode" => $obj->gci()->input->post("deptcodeD2"),
            "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id" , $customerid);
        $obj->gci()->db->update("crf_customers" , $arupdateCustomer);
    }
}


// สำหรับเปลี่ยนแปลงที่อยู่
function saveDirector2ChangeAddress($crfid)
{
    $obj = new addfn();
    $arDirector = array(
        "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
        "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
        "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
        "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
        "crf_status" => "Complated"
    );
    $obj->gci()->db->where("crf_id" , $crfid);
    if($obj->gci()->db->update("crf_maindata" , $arDirector)){
        $addresstype = getWhenComplate($crfid)->crfw_cusaddresstype;
        $address = getWhenComplate($crfid)->crfw_cusaddress;
        $file1 = getWhenComplate($crfid)->crfw_cusfile1;

        $customerid = getWhenComplate($crfid)->crf_cuscode;
        $arupdateCustomer = array(
            "crfcus_addresstype" => $addresstype,
            "crfcus_address" => $address,
            "crfcus_file1" => $file1,
            "crfcus_usermodify" => $obj->gci()->input->post("userpostD2"),
            "crfcus_usermodify_ecode" => $obj->gci()->input->post("ecodepostD2"),
            "crfcus_usermodify_deptcode" => $obj->gci()->input->post("deptcodeD2"),
            "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id" , $customerid);
        $obj->gci()->db->update("crf_customers" , $arupdateCustomer);
    }
}


// สำหรับ ปรับ Credit term
function saveDirector2ChangeCredit($crfid)
{
    $obj = new addfn();
    $arDirector = array(
        "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
        "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
        "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
        "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
        "crf_status" => "Complated"
    );
    $obj->gci()->db->where("crf_id" , $crfid);
    if($obj->gci()->db->update("crf_maindata" , $arDirector)){
        $creditterm = getWhenComplate($crfid)->crf_creditterm;
        $creditterm2 = getWhenComplate($crfid)->crf_creditterm2;

        $customerid = getWhenComplate($crfid)->crf_cuscode;
        $arupdateCustomer = array(
            "crfcus_creditterm" => $creditterm,
            "crfcus_creditterm2" => $creditterm2,

            "crfcus_usermodify" => $obj->gci()->input->post("userpostD2"),
            "crfcus_usermodify_ecode" => $obj->gci()->input->post("ecodepostD2"),
            "crfcus_usermodify_deptcode" => $obj->gci()->input->post("deptcodeD2"),
            "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id" , $customerid);
        $obj->gci()->db->update("crf_customers" , $arupdateCustomer);
    }
}


// สำหรับ ปรับ วงเงิน
function saveDirector2ChangeMoney($crfid)
{
    $obj = new addfn();
    $arDirector = array(
        "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
        "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
        "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
        "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
        "crf_status" => "Complated"
    );
    $obj->gci()->db->where("crf_id" , $crfid);
    if($obj->gci()->db->update("crf_maindata" , $arDirector)){
        $crfcus_moneylimit = getWhenComplate($crfid)->crf_finance_change_total;

        $customerid = getWhenComplate($crfid)->crf_cuscode;
        $arupdateCustomer = array(
            "crfcus_moneylimit" => $crfcus_moneylimit,

            "crfcus_usermodify" => $obj->gci()->input->post("userpostD2"),
            "crfcus_usermodify_ecode" => $obj->gci()->input->post("ecodepostD2"),
            "crfcus_usermodify_deptcode" => $obj->gci()->input->post("deptcodeD2"),
            "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id" , $customerid);
        $obj->gci()->db->update("crf_customers" , $arupdateCustomer);
    }
}





function saveCustomersCode($crfid,$crfcusid)
{
    $obj = new addfn();
    $arAccStaff = array(
        "crf_savecustomercode" => $obj->gci()->input->post("cusCode"),
        "crf_usersave_customercode" => $obj->gci()->input->post("cusCode_userPost"),
        "crf_datetimesave_customercode" => conDateTimeToDb($obj->gci()->input->post("cusCode_datetimePost")),
        "crf_status" => "Complated"
    );

    $arUpdateCuscode = array(
        "crfcus_code" => $obj->gci()->input->post("cusCode"),
    );

    $obj->gci()->db->where("crf_id" , $crfid);
    $obj->gci()->db->update("crf_maindata" , $arAccStaff);

    $obj->gci()->db->where("crfcus_id" , $crfcusid);
    $obj->gci()->db->update("crf_customers" , $arUpdateCuscode);
}
