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

        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Not approve",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id", $obj->gci()->input->post("saleMgrCusid"));
        $obj->gci()->db->update("crf_customers_temp", $arCustomerTemp);
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




    $arCustomer = array(
        "crfcus_brcode" => $obj->gci()->input->post("crf_brcode"),
    );

    $obj->gci()->db->where("crfcus_id", getCustomerCode($crfid)->crf_cuscode);
    $obj->gci()->db->update("crf_customers_temp", $arCustomer);
}


function saveAccMgr($crfid)
{
    $obj = new addfn();
    if ($obj->gci()->input->post("mgracc_appro") == "อนุมัติ") {
        $status = "Account Manager Approved";
    } else {
        $status = "Account Manager Not approved";

        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Not approve",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id", $obj->gci()->input->post("accMgrCuscode"));
        $obj->gci()->db->update("crf_customers_temp", $arCustomerTemp);
    }

    $arAccMgr = array(
        "crf_accmgr_detail" => $obj->gci()->input->post("crf_accmgr_detail"),
        "crf_accmgr_name" => $obj->gci()->input->post("crf_accmgr_name"),
        "crf_accmgr_datetime" => conDateTimeToDb($obj->gci()->input->post("crf_accmgr_datetime")),
        "crf_accmgrapprove_status" => $obj->gci()->input->post("mgracc_appro"),
        "crf_status" => $status
    );

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arAccMgr);
}


function saveDerector1($crfid)
{
    $obj = new addfn();
    if ($obj->gci()->input->post("director1_appro") == "อนุมัติ") {
        $status = "Director Sales Approved";
    } else {
        $status = "Director Sales Not approved";

        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Not approve",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id", $obj->gci()->input->post("Director1Cuscode"));
        $obj->gci()->db->update("crf_customers_temp", $arCustomerTemp);
    }
    $arDirector = array(
        "crf_director_detail1" => $obj->gci()->input->post("crf_director_detail1"),
        "crf_director_name1" => $obj->gci()->input->post("crf_director_name1"),
        "crf_director_datetime1" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime1")),
        "crf_directorapprove_status1" => $obj->gci()->input->post("director1_appro"),
        "crf_status" => $status
    );

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arDirector);
}


function saveDerector2($crfid)
{
    $obj = new addfn();

    if ($obj->gci()->input->post("director2_appro") == "อนุมัติ") {
        $status = "Director Account Approved";
    } else {
        $status = "Director Account Not approved";

        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Not approve",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_id", $obj->gci()->input->post("Director2Cuscode"));
        $obj->gci()->db->update("crf_customers_temp", $arCustomerTemp);
    }
    $arDirector = array(
        "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
        "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
        "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
        "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
        "crf_status" => $status
    );

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arDirector);
}



// สำหรับเปลี่ยนเขตการขาย
function saveDirector2ChangSales($crfid)
{
    $obj = new addfn();

    if ($obj->gci()->input->post("director2_appro") == "อนุมัติ") {
        $arDirector = array(
            "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
            "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
            "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
            "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
            "crf_status" => "Complated"
        );
        $obj->gci()->db->where("crf_id", $crfid);
        if ($obj->gci()->db->update("crf_maindata", $arDirector)) {

            $arUpdateCusTemp = array(
                "crfcus_tempstatus" => "Updated",
                "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
            );
            $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
            if ($obj->gci()->db->update("crf_customers_temp", $arUpdateCusTemp)) {

                $obj->gci()->db->select("crfcus_salesreps");
                $obj->gci()->db->from("crf_customers_temp");
                $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
                $queryTemp = $obj->gci()->db->get();

                foreach ($queryTemp->result() as $result) {
                    $arUpdateToCustomers = array(
                        "crfcus_salesreps" => $result->crfcus_salesreps,
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
                    );
                    $obj->gci()->db->where("crfcus_id", $obj->gci()->input->post("Director2Cuscode"));
                    $obj->gci()->db->update("crf_customers", $arUpdateToCustomers);
                }
            }
        }
    } else {

        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Not approve",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
        $obj->gci()->db->update("crf_customers_temp", $arCustomerTemp);


        $arDirector = array(
            "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
            "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
            "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
            "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
            "crf_status" => "Director Account Not approved"
        );
        $obj->gci()->db->where("crf_id", $crfid);
        $obj->gci()->db->update("crf_maindata", $arDirector);
    }
}


// สำหรับเปลี่ยนแปลงที่อยู่
function saveDirector2ChangeAddress($crfid)
{
    $obj = new addfn();

    if ($obj->gci()->input->post("director2_appro") == "อนุมัติ"){
        $arDirector = array(
            "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
            "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
            "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
            "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
            "crf_status" => "Complated"
        );
        $obj->gci()->db->where("crf_id", $crfid);
        if ($obj->gci()->db->update("crf_maindata", $arDirector)) {

            $arUpdateCusTemp = array(
                "crfcus_tempstatus" => "Updated",
                "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
            );
            $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
            if ($obj->gci()->db->update("crf_customers_temp", $arUpdateCusTemp)) {

                $obj->gci()->db->select("crfcus_addresstype , crfcus_address , crfcus_contactname , crfcus_phone , crfcus_fax , crfcus_email , crfcus_regiscapital , crfcus_file1");
                $obj->gci()->db->from("crf_customers_temp");
                $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
                $queryTemp = $obj->gci()->db->get();

                foreach ($queryTemp->result() as $result) {
                    $arUpdateToCustomers = array(
                        "crfcus_addresstype" => $result->crfcus_addresstype,
                        "crfcus_address" => $result->crfcus_address,
                        "crfcus_contactname" => $result->crfcus_contactname,
                        "crfcus_phone" => $result->crfcus_phone,
                        "crfcus_fax" => $result->crfcus_fax,
                        "crfcus_email" => $result->crfcus_email,
                        "crfcus_regiscapital" => $result->crfcus_regiscapital,
                        "crfcus_file1" => $result->crfcus_file1,
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
                    );
                    $obj->gci()->db->where("crfcus_id", $obj->gci()->input->post("Director2Cuscode"));
                    $obj->gci()->db->update("crf_customers", $arUpdateToCustomers);
                }
            }
        }


    }else{

        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Not approve",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
        $obj->gci()->db->update("crf_customers_temp", $arCustomerTemp);


        $arDirector = array(
            "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
            "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
            "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
            "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
            "crf_status" => "Director Account Not approved"
        );
        $obj->gci()->db->where("crf_id", $crfid);
        $obj->gci()->db->update("crf_maindata", $arDirector);
    }
}


// สำหรับ ปรับ Credit term
function saveDirector2ChangeCredit($crfid)
{
    $obj = new addfn();
    if ($obj->gci()->input->post("director2_appro") == "อนุมัติ"){

        $arDirector = array(
            "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
            "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
            "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
            "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
            "crf_status" => "Complated"
        );
        $obj->gci()->db->where("crf_id", $crfid);
        if ($obj->gci()->db->update("crf_maindata", $arDirector)) {
            $arUpdateCusTemp = array(
                "crfcus_tempstatus" => "Updated",
                "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
            );
            $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
            if ($obj->gci()->db->update("crf_customers_temp", $arUpdateCusTemp)) {

                $obj->gci()->db->select("crfcus_creditterm2");
                $obj->gci()->db->from("crf_customers_temp");
                $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
                $queryTemp = $obj->gci()->db->get();

                foreach ($queryTemp->result() as $result) {
                    $arUpdateToCustomers = array(
                        "crfcus_creditterm" => $result->crfcus_creditterm2,
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
                    );
                    $obj->gci()->db->where("crfcus_id", $obj->gci()->input->post("Director2Cuscode"));
                    $obj->gci()->db->update("crf_customers", $arUpdateToCustomers);
                }
            }
        }


    }else{

        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Not approve",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
        $obj->gci()->db->update("crf_customers_temp", $arCustomerTemp);


        $arDirector = array(
            "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
            "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
            "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
            "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
            "crf_status" => "Director Account Not approved"
        );
        $obj->gci()->db->where("crf_id", $crfid);
        $obj->gci()->db->update("crf_maindata", $arDirector);

    }
}




// สำหรับ ปรับ วงเงิน
function saveDirector2ChangeMoney($crfid)
{
    $obj = new addfn();

    if ($obj->gci()->input->post("director2_appro") == "อนุมัติ"){

        $arDirector = array(
            "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
            "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
            "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
            "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
            "crf_status" => "Complated"
        );
        $obj->gci()->db->where("crf_id", $crfid);
        if ($obj->gci()->db->update("crf_maindata", $arDirector)) {
            $arUpdateCusTemp = array(
                "crfcus_tempstatus" => "Updated",
                "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
            );
            $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
            if ($obj->gci()->db->update("crf_customers_temp", $arUpdateCusTemp)) {

                $obj->gci()->db->select("crfcus_moneylimit2");
                $obj->gci()->db->from("crf_customers_temp");
                $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
                $queryTemp = $obj->gci()->db->get();

                foreach ($queryTemp->result() as $result) {
                    $arUpdateToCustomers = array(
                        "crfcus_moneylimit" => $result->crfcus_moneylimit2,
                        "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")
                    );
                    $obj->gci()->db->where("crfcus_id", $obj->gci()->input->post("Director2Cuscode"));
                    $obj->gci()->db->update("crf_customers", $arUpdateToCustomers);
                }
            }
        }

    }else{
        $arCustomerTemp = array(
            "crfcus_tempstatus" => "Not approve",
            "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
        );
        $obj->gci()->db->where("crfcus_formno", $obj->gci()->input->post("direc2FormNo"));
        $obj->gci()->db->update("crf_customers_temp", $arCustomerTemp);


        $arDirector = array(
            "crf_director_detail2" => $obj->gci()->input->post("crf_director_detail2"),
            "crf_director_name2" => $obj->gci()->input->post("crf_director_name2"),
            "crf_director_datetime2" => conDateTimeToDb($obj->gci()->input->post("crf_director_datetime2")),
            "crf_directorapprove_status2" => $obj->gci()->input->post("director2_appro"),
            "crf_status" => "Director Account Not approved"
        );
        $obj->gci()->db->where("crf_id", $crfid);
        $obj->gci()->db->update("crf_maindata", $arDirector);
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
        "crfcus_tempstatus" => "Updated",
        "crfcus_datetimeupdate" => date("Y-m-d H:i:s")
    );

    $obj->gci()->db->where("crf_id", $crfid);
    $obj->gci()->db->update("crf_maindata", $arAccStaff);

    $obj->gci()->db->where("crfcus_id", $crfcusid);
    $updateCus = $obj->gci()->db->update("crf_customers_temp", $arUpdateCuscode);

    if ($updateCus) {
        $obj->gci()->db->select("*");
        $obj->gci()->db->from("crf_customers_temp");
        $obj->gci()->db->where("crfcus_id", $crfcusid);
        $query = $obj->gci()->db->get();



        foreach ($query->result() as $result) {
            $arCopyToCustomerTable = array(
                "crfcus_id" => $result->crfcus_id,
                "crfcus_code" => $result->crfcus_code,
                "crfcus_brcode" => $result->crfcus_brcode,
                "crfcus_salesreps" => $result->crfcus_salesreps,
                "crfcus_name" => $result->crfcus_name,
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
                "crfcus_usermodify_datetime" => date("Y-m-d H:i:s")

            );
            $obj->gci()->db->insert("crf_customers", $arCopyToCustomerTable);
        }
    }
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
