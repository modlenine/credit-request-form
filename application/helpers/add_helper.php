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

    if ($obj->gci()->input->post("mgr_appro") == "อนุมัติ") {
        $status = "Sales Manager Approved";
    } else {
        $status = "Sales Manager Not Approve";
    }
    $mgrArray = array(
        "crf_mgrapprove_detail" => $obj->gci()->input->post("crf_mgrapprove_detail"),
        "crf_mgrapprove_name" => $obj->gci()->input->post("crf_mgrapprove_name"),
        "crf_mgrapprove_datetime" => conDatetimeToDb($obj->gci()->input->post("crf_mgrapprove_datetime")),
        "crf_mgrapprove_status" => $obj->gci()->input->post("mgr_appro"),
        "crf_status" => $status
    );

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $mgrArray);
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

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arbr);
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

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arAccMgr);
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

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arDirector);
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

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arDirector);
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
    $obj->gci()->db->where("crf_id", $crfid);
    if ($obj->gci()->db->update("crf_maindata", $arDirector)) {
        $salesreps = getWhenComplate($crfid)->crfw_salesreps;
        $customerid = getWhenComplate($crfid)->crf_cuscode;
        $arupdateCustomer = array(
            "crfcus_salesreps" => $salesreps,
            "crfcus_usermodify" => $obj->gci()->input->post("userpostD2"),
            "crfcus_usermodify_ecode" => $obj->gci()->input->post("ecodepostD2"),
            "crfcus_usermodify_deptcode" => $obj->gci()->input->post("deptcodeD2"),
            "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id", $customerid);
        $obj->gci()->db->update("crf_customers", $arupdateCustomer);
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
    $obj->gci()->db->where("crf_id", $crfid);
    if ($obj->gci()->db->update("crf_maindata", $arDirector)) {
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
        $obj->gci()->db->where("crfcus_id", $customerid);
        $obj->gci()->db->update("crf_customers", $arupdateCustomer);
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
    $obj->gci()->db->where("crf_id", $crfid);
    if ($obj->gci()->db->update("crf_maindata", $arDirector)) {
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
        $obj->gci()->db->where("crfcus_id", $customerid);
        $obj->gci()->db->update("crf_customers", $arupdateCustomer);
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
    $obj->gci()->db->where("crf_id", $crfid);
    if ($obj->gci()->db->update("crf_maindata", $arDirector)) {
        $crfcus_moneylimit = getWhenComplate($crfid)->crf_finance_change_total;

        $customerid = getWhenComplate($crfid)->crf_cuscode;
        $arupdateCustomer = array(
            "crfcus_moneylimit" => $crfcus_moneylimit,

            "crfcus_usermodify" => $obj->gci()->input->post("userpostD2"),
            "crfcus_usermodify_ecode" => $obj->gci()->input->post("ecodepostD2"),
            "crfcus_usermodify_deptcode" => $obj->gci()->input->post("deptcodeD2"),
            "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id", $customerid);
        $obj->gci()->db->update("crf_customers", $arupdateCustomer);
    }
}





function saveCustomersCode($crfid, $crfcusid)
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

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arAccStaff);

    $obj->gci()->db->where("crfcus_id", $crfcusid);
    $obj->gci()->db->update("crf_customers", $arUpdateCuscode);
}



function exManagerApprove($crfexid)
{
    $obj = new addfn();
    $arManager = array(
        "crfex_mgrapp_status" => $obj->gci()->input->post("ex_mgrApprove"),
        "crfex_mgrapp_detail" => $obj->gci()->input->post("ex_mgrApproveDetail"),
        "crfex_mgrapp_username" => $obj->gci()->input->post("ex_mgrApproveName"),
        "crfex_mgrapp_datetime" => conDateTimeToDb($obj->gci()->input->post("ex_mgrApproveDateTime")),
        "crfex_status" => "Manager approved"
    );
    $obj->gci()->db->where("crfex_id", $crfexid);
    $obj->gci()->db->update("crfex_maindata", $arManager);
}

function exCsAddBr($crfexid)
{
    $obj = new addfn();
    $arCs = array(
        "crfex_brcode" => $obj->gci()->input->post("ex_csBrCode"),
        "crfex_csmemo" => $obj->gci()->input->post("ex_csBrMemo"),
        "crfex_csuserpost" => $obj->gci()->input->post("ex_csBrName"),
        "crfex_csdatetime" => conDateTimeToDb($obj->gci()->input->post("excsBrDateTime")),
        "crfex_status" => "CS Added BR CODE"
    );
    $obj->gci()->db->where("crfex_id", $crfexid);
    $obj->gci()->db->update("crfex_maindata", $arCs);
}


function exAccMgrApprove($crfexid)
{
    $obj = new addfn();
    $arAccMgr = array(
        "crfex_accmgr_status" => $obj->gci()->input->post("ex_accMgrApprove"),
        "crfex_accmgr_username" => $obj->gci()->input->post("ex_accMgrApproveName"),
        "crfex_accmgr_datetime" => conDateTimeToDb($obj->gci()->input->post("ex_accMgrApproveDateTime")),
        "crfex_accmgr_detail" => $obj->gci()->input->post("ex_accMgrApproveDetail"),
        "crfex_status" => "Account Manager Approved"
    );
    $obj->gci()->db->where("crfex_id", $crfexid);
    $obj->gci()->db->update("crfex_maindata", $arAccMgr);
}

function exDirectorApprove($crfexid)
{
    $obj = new addfn();
    if ($obj->gci()->input->post("check_custype_direc") == 1) {
        // Maindata table
        $arDirector = array(
            "crfex_directorapp_status" => $obj->gci()->input->post("ex_directorApprove"),
            "crfex_directorapp_username" => $obj->gci()->input->post("ex_directorApproveName"),
            "crfex_directorapp_datetime" => conDateTimeToDb($obj->gci()->input->post("ex_directorApproveDateTime")),
            "crfex_directorapp_detail" => $obj->gci()->input->post("ex_directorApproveDetail"),
            "crfex_status" => "Director Approved"
        );
        $obj->gci()->db->where("crfex_id", $crfexid);
        $obj->gci()->db->update("crfex_maindata", $arDirector);
    } else if ($obj->gci()->input->post("check_custype_direc") == 2) {

        $query = $obj->gci()->db->query("SELECT
        crfexm_salesreps,
        crfexm_cusnameEN,
        crfexm_cusnameTH,
        crfexm_address,
        crfexm_file,
        crfexm_tel,
        crfexm_fax,
        crfexm_email,
        crfexm_creditlimit,
        crfexm_term,
        crfexm_discount,
        crfexm_bg,
        crfex_customerid,
        crfexm_pcreditlimit,
        crfexm_pterm,
        crfexm_pdiscount
        FROM crfex_maindata WHERE crfex_id = '$crfexid'
        ");

        if ($obj->gci()->input->post("check_methodcurcus") == 11) {


            $crfexm_salesreps = $query->row()->crfexm_salesreps;
            $crfexm_cusnameEN = $query->row()->crfexm_cusnameEN;
            $crfexm_cusnameTH = $query->row()->crfexm_cusnameTH;
            $crfexm_address = $query->row()->crfexm_address;
            $crfexm_file = $query->row()->crfexm_file;
            $crfexm_tel = $query->row()->crfexm_tel;
            $crfexm_fax = $query->row()->crfexm_fax;
            $crfexm_email = $query->row()->crfexm_email;
            $crfexm_creditlimit = $query->row()->crfexm_creditlimit;
            $crfexm_term = $query->row()->crfexm_term;
            $crfexm_discount = $query->row()->crfexm_discount;
            $crfexm_bg = $query->row()->crfexm_bg;
            $crfex_customerid = $query->row()->crfex_customerid;

            $arCus = array(
                "crfex_salesreps" => $crfexm_salesreps,
                "crfex_cusnameEN" => $crfexm_cusnameEN,
                "crfex_cusnameTH" => $crfexm_cusnameTH,
                "crfex_address" => $crfexm_address,
                "crfex_file" => $crfexm_file,
                "crfex_tel" => $crfexm_tel,
                "crfex_fax" => $crfexm_fax,
                "crfex_email" => $crfexm_email,
                "crfex_creditlimit" => $crfexm_creditlimit,
                "crfex_term" => $crfexm_term,
                "crfex_discount" => $crfexm_discount,
                "crfex_bg" => $crfexm_bg

            );
            $obj->gci()->db->where("crfex_cusid", $crfex_customerid);
            $obj->gci()->db->update("crfex_customers", $arCus);



            $arDirector = array(
                "crfex_directorapp_status" => $obj->gci()->input->post("ex_directorApprove"),
                "crfex_directorapp_username" => $obj->gci()->input->post("ex_directorApproveName"),
                "crfex_directorapp_datetime" => conDateTimeToDb($obj->gci()->input->post("ex_directorApproveDateTime")),
                "crfex_directorapp_detail" => $obj->gci()->input->post("ex_directorApproveDetail"),
                "crfex_status" => "Complated"
            );
            $obj->gci()->db->where("crfex_id", $crfexid);
            $obj->gci()->db->update("crfex_maindata", $arDirector);

        } else if ($obj->gci()->input->post("check_methodcurcus") == 12) {


            $crfexm_pcreditlimit = $query->row()->crfexm_pcreditlimit;
            $crfexm_pterm = $query->row()->crfexm_pterm;
            $crfexm_pdiscount = $query->row()->crfexm_pdiscount;

            $arCus = array(
                "crfex_creditlimit" => $crfexm_pcreditlimit,
                "crfex_term" => $crfexm_pterm,
                "crfex_discount" => $crfexm_pdiscount

            );
            $obj->gci()->db->where("crfex_cusid", $crfex_customerid);
            $obj->gci()->db->update("crfex_customers", $arCus);


            $arDirector = array(
                "crfex_directorapp_status" => $obj->gci()->input->post("ex_directorApprove"),
                "crfex_directorapp_username" => $obj->gci()->input->post("ex_directorApproveName"),
                "crfex_directorapp_datetime" => conDateTimeToDb($obj->gci()->input->post("ex_directorApproveDateTime")),
                "crfex_directorapp_detail" => $obj->gci()->input->post("ex_directorApproveDetail"),
                "crfex_status" => "Complated"
            );
            $obj->gci()->db->where("crfex_id", $crfexid);
            $obj->gci()->db->update("crfex_maindata", $arDirector);
        }



        // Customer table

    }
}



function exAccountAddCusCode($crfexid)
{
    $obj = new addfn();

    // Maindata table
    $arAccCusCodeMain = array(
        "crfex_acccuscode" => $obj->gci()->input->post("ex_accCostomerCode"),
        "crfex_accuserpost" => $obj->gci()->input->post("ex_accName"),
        "crfex_accdatetime" => conDateTimeToDb($obj->gci()->input->post("ex_accDateTime")),
        "crfex_accmemo" => $obj->gci()->input->post("ex_accMemo"),
        "crfex_status" => "Complated"
    );
    $obj->gci()->db->where("crfex_id", $crfexid);
    $obj->gci()->db->update("crfex_maindata", $arAccCusCodeMain);



    // Customer table
    $arAccCusCode = array(
        "crfex_cuscode" => $obj->gci()->input->post("ex_accCostomerCode"),
        "crfex_usermodify" => $obj->gci()->input->post("ex_accName"),
        "crfex_userecodemodify" => conDateTimeToDb($obj->gci()->input->post("crfex_userecodemodify")),
        "crfex_userdeptcodemodify" => $obj->gci()->input->post("crfex_userdeptcodemodify"),
        "crfex_datetimemodify" => conDateTimeToDb($obj->gci()->input->post("ex_accDateTime"))
    );
    $obj->gci()->db->where("crfex_cusid", $obj->gci()->input->post("accCusCode_getCusid"));
    $obj->gci()->db->update("crfex_customers", $arAccCusCode);
}
