<?php
class Email_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


function createQrcode($linkQrcode)
{
    // $obj = new emailfn();
    // $obj->gci()->load->library("Ciqrcode");
    require("phpqrcode/qrlib.php");
    // $this->load->library('phpqrcode/qrlib');

    $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'].'/crf/upload/qrcode/';
    $urlQrcode = $linkQrcode;
    $filename1 = 'qrcode'.rand(2,200).".png";
    $folder = $SERVERFILEPATH;

    $filename = $folder.$filename1;

   QRcode::png(
        $urlQrcode,
        $filename,
        // $outfile = false,
        $level = QR_ECLEVEL_H,
        $size = 4,
        $margin =2
    );

    // echo "<img src='http://192.190.10.27/crf/upload/qrcode/".$filename1."'>";
    return $filename1;
    
}




// Step 1
    function sendemail_savedatath($formno)
    {

        $topicTH = getDataEmail($formno)->crf_topic;
        if(getDataEmail($formno)->crf_topic1 != ''){
            $topicTH .= " / ".getDataEmail($formno)->crf_topic1;
        }
        if(getDataEmail($formno)->crf_topic2 != ''){
            $topicTH .= " / ".getDataEmail($formno)->crf_topic2;
        }
        if(getDataEmail($formno)->crf_topic3 != ''){
            $topicTH .= " / ".getDataEmail($formno)->crf_topic3;
        }
        if(getDataEmail($formno)->crf_topic4 != ''){
            $topicTH .= " / ".getDataEmail($formno)->crf_topic4;
        }

        $longurl = base_url('qrcode/').getDataEmail($formno)->crf_id;
        $short_url = shorturl($longurl);


        $subject = "[crf] มีรายการ Credit request form ใหม่ รออนุมัติ";

        $body = '
        <h2>รายการ Credit Request Form ใหม่ รออนุมัติ</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>'.getDataEmail($formno)->crfcus_formno.'</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>'.conDateFromDb(getDataEmail($formno)->crf_datecreate).'</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>'.getDataEmail($formno)->crf_alltype_subname.'</td>
            <td><strong>สถานะ</strong></td>
            <td>'.getDataEmail($formno)->crf_status.'</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">'.$topicTH.'</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>'.getDataEmail($formno)->crfcus_name.'</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>'.getDataEmail($formno)->crfcus_salesreps.'</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>'.getDataEmail($formno)->crf_userpost.'</td>
            <td><strong>แผนก</strong></td>
            <td>'.getDataEmail($formno)->crf_userdeptpost.'</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>'.getDataEmail($formno)->crf_userecodepost.'</td>
            <td><strong>วันที่</strong></td>
            <td>'.getDataEmail($formno)->crf_userpostdatetime.'</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="'.base_url('main/viewdata/').getDataEmail($formno)->crf_id.'">'.getDataEmail($formno)->crfcus_formno.'</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="'.base_url('upload/qrcode/').$this->createQrcode($short_url).'"></td>
         </tr>

         </table>
         ';



        //  Email Zone
        $deptcodeTo = getDataEmail($formno)->crfcus_usercreate_deptcode;
        $posiTo = 75;
        if($deptcodeTo == 1006){
            $ecode = "M0051";
            $option = getuserEmailToSl($deptcodeTo , $posiTo , $ecode);
        }else{
            $option = getuserEmailTo($deptcodeTo , $posiTo);
        }


        $to = array();
        foreach($option->result_array() as $result){
            $to[] = $result['memberemail'];
        }

        //  $to = array(
        //      "chainarong_k@saleecolour.com",
        //  );

         $cc = array(
            "it@saleecolour.com",
         );

         emailSaveDataTH($subject , $body , $to , $cc);
        //  Email Zone
    }
//End Step 1




function sendemail_toCs($formno)
{
    
    $topicTH = getDataEmail($formno)->crf_topic;
        if(getDataEmail($formno)->crf_topic1 != ''){
            $topicTH .= " / ".getDataEmail($formno)->crf_topic1;
        }
        if(getDataEmail($formno)->crf_topic2 != ''){
            $topicTH .= " / ".getDataEmail($formno)->crf_topic2;
        }
        if(getDataEmail($formno)->crf_topic3 != ''){
            $topicTH .= " / ".getDataEmail($formno)->crf_topic3;
        }
        if(getDataEmail($formno)->crf_topic4 != ''){
            $topicTH .= " / ".getDataEmail($formno)->crf_topic4;
        }

        $longurl = base_url('qrcode/').getDataEmail($formno)->crf_id;
        $short_url = shorturl($longurl);


        $subject = "[crf] มีรายการ Credit request form ใหม่รอเพิ่ม BRCODE";

        $body = '
        <h2>รายการ Credit Request Form ใหม่รอเพิ่ม BRCODE</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>'.getDataEmail($formno)->crfcus_formno.'</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>'.conDateFromDb(getDataEmail($formno)->crf_datecreate).'</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>'.getDataEmail($formno)->crf_alltype_subname.'</td>
            <td><strong>สถานะ</strong></td>
            <td>'.getDataEmail($formno)->crf_status.'</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">'.$topicTH.'</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>'.getDataEmail($formno)->crfcus_name.'</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>'.getDataEmail($formno)->crfcus_salesreps.'</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>'.getDataEmail($formno)->crf_userpost.'</td>
            <td><strong>แผนก</strong></td>
            <td>'.getDataEmail($formno)->crf_userdeptpost.'</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>'.getDataEmail($formno)->crf_userecodepost.'</td>
            <td><strong>วันที่</strong></td>
            <td>'.getDataEmail($formno)->crf_userpostdatetime.'</td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>'.getDataEmail($formno)->crf_mgrapprove_name.'</td>
            <td><strong>วันที่</strong></td>
            <td>'.conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime).'</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>'.getDataEmail($formno)->crf_mgrapprove_status.'</td>
            <td><strong>เหตุผล</strong></td>
            <td>'.getDataEmail($formno)->crf_mgrapprove_detail.'</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="'.base_url('main/viewdata/').getDataEmail($formno)->crf_id.'">'.getDataEmail($formno)->crfcus_formno.'</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="'.base_url('upload/qrcode/').$this->createQrcode($short_url).'"></td>
         </tr>

         </table>
         ';



        //  Email Zone

        
        $posiTo = "15,35,45,55";
        $deptcodeTo = 1010;
        $option = getuserEmailTo($deptcodeTo , $posiTo);


        $to = array();
        foreach($option->result_array() as $result){
            $to[] = $result['memberemail'];
        }

        //  $to = array(
        //      "chainarong_k@saleecolour.com",
        //  );

         $cc = array(
            "it@saleecolour.com",
         );

         emailSaveDataTH($subject , $body , $to , $cc);
        //  Email Zone

}













    
}
