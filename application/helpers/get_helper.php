<?php
class getfn
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




// GET HEAD , FOOTER , CONTENT ZONE
function getHead()
{
    $obj = new getfn();
    $obj->gci()->load->view("template/head");
}
function getFooter()
{
    $obj = new getfn();
    $obj->gci()->load->view("template/footer");
}
function getContent($content)
{
    $obj = new getfn();
    $obj->gci()->load->view($content);
}
function getContentData($content,$data)
{
    $obj = new getfn();
    $obj->gci()->parser->parse($content,$data);
}
function getModal()
{
    $obj = new getfn();
    $obj->gci()->load->view("template/modal");
}


// GET Formcode
function getFormCode()
{
    return 'SA-F-004-11-01-08-61';
}

function getFormCodeEN()
{
    return 'SA-F-014-02-16-08-60';
}


// Get Form Number
// Get Form Number
function getFormNo()
{
    $obj = new getfn();
    // check formno ซ้ำในระบบ
    $checkRowdata = $obj->gci()->db->query("SELECT
    crf_formno FROM crf_maindata ORDER BY crf_id DESC LIMIT 1 
    ");
    $result = $checkRowdata->num_rows();

    $cutYear = substr(date("Y"), 0, 2);
    $getMonth = substr(date("m"), 0, 2);
    $formno = "";
    if ($result == 0) {
        $formno = "CRF" . $cutYear . $getMonth . "001";
    } else {

        $getFormno = $checkRowdata->row()->crf_formno; //อันนี้ดึงเอามาทั้งหมด CRF2003001
        $cutGetFormno = substr($getFormno, 3, 2); //อันนี้ตัดเอาเฉพาะปีจาก 2020 ตัดเหลือ 20
        $cutNo = substr($getFormno, 7, 3); //อันนี้ตัดเอามาแค่ตัวเลขจาก CRF2003001 ตัดเหลือ 001
        $cutNo++;

        if ($cutNo < 10) {
            $cutNo = "00" . $cutNo;
        } else if ($cutNo < 100) {
            $cutNo = "0" . $cutNo;
        }

        if ($cutGetFormno != $cutYear) {
            $formno = "CRF" . $cutYear . $getMonth . $cutNo;
        } else {
            $formno = "CRF" . $cutGetFormno . $getMonth . $cutNo;
        }
    }

    return $formno;
}



function getFormNoEX()
{
    $obj = new getfn();
    // check formno ซ้ำในระบบ
    $checkRowdata = $obj->gci()->db->query("SELECT
    crfex_formno FROM crfex_maindata ORDER BY crfex_id DESC LIMIT 1 
    ");
    $result = $checkRowdata->num_rows();

    $cutYear = substr(date("Y"), 0, 2);
    $getMonth = substr(date("m"), 0, 2);
    $formno = "";
    if ($result == 0) {
        $formno = "CRFEX" . $cutYear . $getMonth . "001";
    } else {

        $getFormno = $checkRowdata->row()->crfex_formno; //อันนี้ดึงเอามาทั้งหมด CRF2003001
        $cutGetFormno = substr($getFormno, 5, 2); //อันนี้ตัดเอาเฉพาะปีจาก 2020 ตัดเหลือ 20
        $cutNo = substr($getFormno, 9, 3); //อันนี้ตัดเอามาแค่ตัวเลขจาก CRF2003001 ตัดเหลือ 001
        $cutNo++;

        if ($cutNo < 10) {
            $cutNo = "00" . $cutNo;
        } else if ($cutNo < 100) {
            $cutNo = "0" . $cutNo;
        }

        if ($cutGetFormno != $cutYear) {
            $formno = "CRFEX" . $cutYear . $getMonth . $cutNo;
        } else {
            $formno = "CRFEX" . $cutGetFormno . $getMonth . $cutNo;
        }
    }

    return $formno;
}
// Get Form Number
// Get Form Number

// GetCustomer Number
function getCustomerNumber()
{
    $obj = new getfn();
    // check formno ซ้ำในระบบ
    $checkRowdata = $obj->gci()->db->query("SELECT
    crfcus_id FROM crf_customers ORDER BY crfcus_id DESC LIMIT 1 
    ");
    $result = $checkRowdata->num_rows();

    $cusnumber = "";
    if ($result == 0) {
        $cusnumber = 1;
    } else {

        $getFormno = $checkRowdata->row()->crfcus_id; //อันนี้ดึงเอามาทั้งหมด CRF2003001
        $cutNo =  $getFormno;
        $cutNo++;

        $cusnumber = $cutNo;
    }

    return $cusnumber;
}

function getCustomerNumberEX()
{
    $obj = new getfn();
    // check formno ซ้ำในระบบ
    $checkRowdata = $obj->gci()->db->query("SELECT
    crfex_cusid FROM crfex_customers ORDER BY crfex_cusid DESC LIMIT 1
    ");
    $result = $checkRowdata->num_rows();

    $cusnumber = "";
    if ($result == 0) {
        $cusnumber = 1;
    } else {

        $getFormno = $checkRowdata->row()->crfex_cusid; //อันนี้ดึงเอามาทั้งหมด CRF2003001
        $cutNo =  $getFormno;
        $cutNo++;

        $cusnumber = $cutNo;
    }

    return $cusnumber;
}



// GET Customer process #Form add
function getCusProcess()
{
    $obj = new getfn();
    $obj->gci()->db->order_by("cuspro_name", "ASC");
    $result = $obj->gci()->db->get("crf_process");
    return $result->result();
}

//Get Credit term #Form add
function getCreditTerm()
{
    $obj = new getfn();
    $obj->gci()->db->order_by("credit_order", "ASC");
    $result = $obj->gci()->db->get("credit_term_category");
    return $result->result();
}


// Get Data For view_data page
function getViewData($crf_id)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT
    crf_maindata.crf_id,
    crf_maindata.crf_formno,
    crf_maindata.crf_cuscode,
    crf_maindata.crf_company,
    crf_maindata.crf_datecreate,
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
    crf_customers.crfcus_creditterm2,
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
    crf_customers.crfcus_moneylimit2,
    crf_maindata.crf_type,
    crf_alltype.crf_alltype_subname,
    crf_maindata.crf_sub_oldcus_changearea,
    crf_maindata.crf_sub_oldcus_changeaddress,
    crf_maindata.crf_sub_oldcus_changecredit,
    crf_maindata.crf_sub_oldcus_changefinance,
    crf_maindata.crf_creditterm,
    crf_maindata.crf_change_creditterm,
    crf_maindata.crf_condition_credit,
    crf_maindata.crf_creditterm2,
    crf_maindata.crf_finance,
    crf_maindata.crf_finance_req_number,
    crf_maindata.crf_finance_status,
    crf_maindata.crf_finance_change_status,
    crf_maindata.crf_finance_change_number,
    crf_maindata.crf_finance_change_total,
    crf_maindata.crf_finance_change_detail,
    crf_maindata.crf_userpost,
    crf_maindata.crf_userdeptpost,
    crf_maindata.crf_userecodepost,
    crf_maindata.crf_userdeptcodepost,
    crf_maindata.crf_userpostdatetime,
    crf_maindata.crf_mgrapprove_detail,
    crf_maindata.crf_mgrapprove_name,
    crf_maindata.crf_mgrapprove_datetime,
    crf_maindata.crf_mgrapprove_status,
    crf_maindata.crf_brcode,
    crf_maindata.crf_brcode_userpost,
    crf_maindata.crf_brcode_datetime,
    crf_maindata.crf_accmgr_detail,
    crf_maindata.crf_accmgr_name,
    crf_maindata.crf_accmgr_datetime,
    crf_maindata.crf_accmgrapprove_status,
    crf_maindata.crf_director_detail1,
    crf_maindata.crf_director_name1,
    crf_maindata.crf_director_datetime1,
    crf_maindata.crf_directorapprove_status1,
    crf_maindata.crf_director_detail2,
    crf_maindata.crf_director_name2,
    crf_maindata.crf_director_datetime2,
    crf_maindata.crf_directorapprove_status2,
    crf_maindata.crf_savecustomercode,
    crf_maindata.crf_usersave_customercode,
    crf_maindata.crf_datetimesave_customercode,
    crf_maindata.crf_status,
    crf_maindata.crfw_salesreps,
    crf_maindata.crfw_cusaddresstype,
    crf_maindata.crfw_cusaddress,
    crf_maindata.crfw_cusfile1
    
    FROM
    crf_maindata
    INNER JOIN crf_customers ON crf_customers.crfcus_id = crf_maindata.crf_cuscode
    INNER JOIN crf_company_type ON crf_company_type.crf_comid = crf_customers.crfcus_companytype
    INNER JOIN credit_term_category ON credit_term_category.credit_id = crf_customers.crfcus_creditterm
    INNER JOIN crf_alltype ON crf_alltype.crf_alltype_subcode = crf_maindata.crf_type
    
    
    WHERE crf_id = '$crf_id' 
    ");

    return $query->row();
}
function getPrimanage($crfcus_id)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT
    crf_primanage_id , crf_primanage_dept , crf_primanage_name , crf_primanage_posi , crf_primanage_email
    FROM crf_pri_manage WHERE crf_pricusid = '$crfcus_id' ORDER BY crf_primanage_id DESC
    ");
    return $query;
}
function getProcess($crfcus_id)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT
    crf_process_id , crf_process_name , crf_cusid FROM crf_process_use WHERE crf_cusid = '$crfcus_id'
    ");
    return $query;
}
function getFileToModal($crf_formno)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT crf_file1 , crf_file2 , crf_file3 , crf_file4 , crf_file5 , crf_file6 FROM crf_maindata WHERE crf_formno = '$crf_formno'
    ");
    return $query->row();
}


function getSuboldCus($crfid)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT 
    crf_sub_oldcus_changearea , 
    crf_sub_oldcus_changeaddress , 
    crf_sub_oldcus_changecredit , 
    crf_sub_oldcus_changefinance
    FROM crf_maindata
    WHERE crf_id = '$crfid'
    ");
    return $query->row();
}

function getWhenComplate($crfid)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT
    crfw_salesreps , crf_cuscode , crfw_cusaddresstype , crfw_cusaddress , crfw_cusfile1 , crf_creditterm , crf_creditterm2 , crf_finance_change_total
    FROM crf_maindata
    WHERE crf_id = '$crfid'
    ");
    return $query->row();
}

function conCreditTerm($creditid)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT credit_name FROM credit_term_category WHERE credit_id = '$creditid'
    ");
    return $query->row()->credit_name;
}

function getFormBeforeSave($formno)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT crf_formno FROM crf_maindata WHERE crf_formno = '$formno' ");
    $numrow = $query->num_rows();
    return $numrow;
}







// Export Zone
function viewdataEX($crfexid)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT
    crfex_maindata.crfex_id,
    crfex_maindata.crfex_formno,
    crfex_maindata.crfex_customerid,
    crfex_maindata.crfex_company,
    crfex_maindata.crfex_datecreate,
    crfex_maindata.crfex_custype,
    crfex_maindata.crfex_pcreditlimit,
    crfex_maindata.crfex_pterm,
    crfex_maindata.crfex_pdiscount,
    crfex_maindata.crfex_ccreditlimit,
    crfex_maindata.crfex_cterm,
    crfex_maindata.crfex_cdiscount,
    crfex_maindata.crfex_brcode,
    crfex_maindata.crfex_userpost,
    crfex_maindata.crfex_userdept,
    crfex_maindata.crfex_userdatetime,
    crfex_maindata.crfex_status,
    crfex_maindata.crfex_csuserpost,
    crfex_maindata.crfex_csmemo,
    crfex_maindata.crfex_csdept,
    crfex_maindata.crfex_csdatetime,
    crfex_maindata.crfex_mgrapp_status,
    crfex_maindata.crfex_mgrapp_username,
    crfex_maindata.crfex_mgrapp_datetime,
    crfex_maindata.crfex_mgrapp_detail,
    crfex_maindata.crfex_accmgr_status,
    crfex_maindata.crfex_accmgr_username,
    crfex_maindata.crfex_accmgr_datetime,
    crfex_maindata.crfex_accmgr_detail,
    crfex_maindata.crfex_directorapp_status,
    crfex_maindata.crfex_directorapp_username,
    crfex_maindata.crfex_directorapp_datetime,
    crfex_maindata.crfex_directorapp_detail,
    crfex_maindata.crfex_accmemo,
    crfex_maindata.crfex_accuserpost,
    crfex_maindata.crfex_accdatetime,
    crfex_maindata.crfex_report_date,
    crfex_maindata.crfex_report_month,
    crfex_maindata.crfex_report_year,
    crfex_maindata.crfex_topic,
    crfex_customers.crfex_cuscode,
    crfex_customers.crfex_cusdatecreate,
    crfex_customers.crfex_salesreps,
    crfex_customers.crfex_cusnameEN,
    crfex_customers.crfex_cusnameTH,
    crfex_customers.crfex_address,
    crfex_customers.crfex_file,
    crfex_customers.crfex_tel,
    crfex_customers.crfex_fax,
    crfex_customers.crfex_email,
    crfex_customers.crfex_creditlimit,
    crfex_customers.crfex_term,
    crfex_customers.crfex_discount,
    crfex_customers.crfex_bg,
    crfex_customers.crfex_his_month1,
    crfex_customers.crfex_his_tvolume1,
    crfex_customers.crfex_histsales1,
    crfex_customers.crfex_his_month2,
    crfex_customers.crfex_his_tvolume2,
    crfex_customers.crfex_histsales2,
    crfex_customers.crfex_his_month3,
    crfex_customers.crfex_his_tvolume3,
    crfex_customers.crfex_histsales3,
    crfex_customers.crfex_usercreate,
    crfex_customers.crfex_userecode,
    crfex_customers.crfex_userdeptcode,
    crfex_customers.crfex_userdatetimecreate,
    crfex_customers.crfex_usermodify,
    crfex_customers.crfex_userecodemodify,
    crfex_customers.crfex_userdeptcodemodify,
    crfex_customers.crfex_datetimemodify,
    crf_alltype.crf_alltype_subnameEN,
    crfex_maindata.crfexm_salesreps,
    crfex_maindata.crfexm_cusnameEN,
    crfex_maindata.crfexm_cusnameTH,
    crfex_maindata.crfexm_address,
    crfex_maindata.crfexm_file,
    crfex_maindata.crfexm_tel,
    crfex_maindata.crfexm_fax,
    crfex_maindata.crfexm_email,
    crfex_maindata.crfexm_creditlimit,
    crfex_maindata.crfexm_term,
    crfex_maindata.crfexm_discount,
    crfex_maindata.crfexm_bg,
    crfex_maindata.crfex_methodcurcus,
    crfex_maindata.crfexm_pcreditlimit,
    crfex_maindata.crfexm_pterm,
    crfex_maindata.crfexm_pdiscount
    FROM
    crfex_maindata
    INNER JOIN crfex_customers ON crfex_customers.crfex_cusid = crfex_maindata.crfex_customerid
    INNER JOIN crf_alltype ON crf_alltype.crf_alltype_subcode = crfex_maindata.crfex_custype
    WHERE crfex_id = '$crfexid'
    ");
    return $query->row();
}


function getMethodCus($crfexid)
{
    $obj = new getfn();
    $query = $obj->gci()->db->query("SELECT crfex_methodcurcus FROM crfex_maindata WHERE crfex_id = '$crfexid' ");
    return $query->row();
}




