<?php
class Email_model extends CI_Model
{

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

      $SERVERFILEPATH = $_SERVER['DOCUMENT_ROOT'] . '/crf/upload/qrcode/';
      $urlQrcode = $linkQrcode;
      $filename1 = 'qrcode' . rand(2, 200) . ".png";
      $folder = $SERVERFILEPATH;

      $filename = $folder . $filename1;

      QRcode::png(
         $urlQrcode,
         $filename,
         // $outfile = false,
         $level = QR_ECLEVEL_H,
         $size = 4,
         $margin = 2
      );

      // echo "<img src='http://192.190.10.27/crf/upload/qrcode/".$filename1."'>";
      return $filename1;
   }




   // Step 1
   function sendemail_savedatath($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่ รออนุมัติ";

      $body = '
        <h2>รายการ Credit Request Form ใหม่ รออนุมัติ</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone
      $deptcodeTo = getDataEmail($formno)->crfcus_usercreate_deptcode;
      $posiTo = 75;
      if ($deptcodeTo == 1006) {
         $ecode = "M0051";
         $option = getuserEmailToSl($deptcodeTo, $posiTo, $ecode);
      } else {
         $option = getuserEmailTo($deptcodeTo, $posiTo);
      }


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone
   }
   //End Step 1




   function sendemail_toCs($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่รอเพิ่ม BRCODE";

      $body = '
        <h2>รายการ Credit Request Form ใหม่รอเพิ่ม BRCODE</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone


      $ecode = " 'M0019' , 'M1508' , 'M0254' ";

      $option = getuserEmailToCs($ecode);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }





   function sendemail_toAccMgr($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่รอ Account Manager อนุมัติ";

      $body = '
        <h2>รายการ Credit Request Form ใหม่รอ Account Manager อนุมัติ</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการดำเนินงานของ CS</b></td>
         </tr>

         <tr>
            <td><strong>BR CODE</strong></td>
            <td colspan="3">' . getDataEmail($formno)->crf_brcode . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึก</strong></td>
            <td>' . getDataEmail($formno)->crf_brcode_userpost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_brcode_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone


      $posiTo = "75";
      $deptcodeTo = 1003;
      $option = getuserEmailTo($deptcodeTo, $posiTo);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }


   function sendemail_toAccMgr2($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่รอ Account Manager อนุมัติ";

      $body = '
        <h2>รายการ Credit Request Form ใหม่รอ Account Manager อนุมัติ</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>


         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone


      $posiTo = "75";
      $deptcodeTo = 1003;
      $option = getuserEmailTo($deptcodeTo, $posiTo);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }





   function sendemail_toDerector1($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่รอ Deputy Managing Director Sales อนุมัติ";

      $body = '
        <h2>รายการ Credit Request Form ใหม่รอ Deputy Managing Director Sales อนุมัติ</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการดำเนินงานของ CS</b></td>
         </tr>

         <tr>
            <td><strong>BR CODE</strong></td>
            <td colspan="3">' . getDataEmail($formno)->crf_brcode . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึก</strong></td>
            <td>' . getDataEmail($formno)->crf_brcode_userpost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_brcode_datetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Account Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_accmgr_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_detail . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone


      $posiTo = "85";
      $option = getuserEmailToDirector($posiTo);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }



   function sendemail_toDerector1type2($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่รอ Deputy Managing Director Sales อนุมัติ";

      $body = '
        <h2>รายการ Credit Request Form ใหม่รอ Deputy Managing Director Sales อนุมัติ</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Account Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_accmgr_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_detail . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone


      $posiTo = "85";
      $option = getuserEmailToDirector($posiTo);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }






   function sendemail_toDerector2($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่รอ Deputy Managing Director Account อนุมัติ";

      $body = '
        <h2>รายการ Credit Request Form ใหม่รอ Deputy Managing Director Account อนุมัติ</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการดำเนินงานของ CS</b></td>
         </tr>

         <tr>
            <td><strong>BR CODE</strong></td>
            <td colspan="3">' . getDataEmail($formno)->crf_brcode . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึก</strong></td>
            <td>' . getDataEmail($formno)->crf_brcode_userpost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_brcode_datetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Account Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_accmgr_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_detail . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Deputy Managing Director Sales</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_director_name1 . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_director_datetime1) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_directorapprove_status1 . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_director_detail1 . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone


      $posiTo = "85";
      $option = getuserEmailToDirector($posiTo);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }



   function sendemail_toDerector2type2($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่รอ Deputy Managing Director Account อนุมัติ";

      $body = '
        <h2>รายการ Credit Request Form ใหม่รอ Deputy Managing Director Account อนุมัติ</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Account Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_accmgr_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_detail . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Deputy Managing Director Sales</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_director_name1 . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_director_datetime1) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_directorapprove_status1 . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_director_detail1 . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone


      $posiTo = "85";
      $option = getuserEmailToDirector($posiTo);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }





   function sendemail_toAccStaff($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf] มีรายการ Credit request form ใหม่รอบันทึก Customer code";

      $body = '
        <h2>รายการ Credit Request Form ใหม่รอบันทึก Customer code</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการดำเนินงานของ CS</b></td>
         </tr>

         <tr>
            <td><strong>BR CODE</strong></td>
            <td colspan="3">' . getDataEmail($formno)->crf_brcode . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึก</strong></td>
            <td>' . getDataEmail($formno)->crf_brcode_userpost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_brcode_datetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Account Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_accmgr_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_detail . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Deputy Managing Director Sales</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_director_name1 . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_director_datetime1) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_directorapprove_status1 . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_director_detail1 . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Deputy Managing Director Account</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_director_name2 . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_director_datetime2) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_directorapprove_status2 . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_director_detail2 . '</td>
         </tr>

         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone

      $deptcode = 1003;
      $posi = "15";
      $option = getuserEmailTo($deptcode, $posi);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $ecodecc = getDataEmail($formno)->crf_userecodepost;
      $optioncc = getuserEmailToOwner($ecodecc);

      $cc = array();
      foreach ($optioncc->result_array() as $resultcc) {
         $cc[] = $resultcc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }





   function sendemail_toOwnerType2($formno)
   {

      $topicTH = getDataEmail($formno)->crf_topic;
      if (getDataEmail($formno)->crf_topic1 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic1;
      }
      if (getDataEmail($formno)->crf_topic2 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic2;
      }
      if (getDataEmail($formno)->crf_topic3 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic3;
      }
      if (getDataEmail($formno)->crf_topic4 != '') {
         $topicTH .= " / " . getDataEmail($formno)->crf_topic4;
      }

      $longurl = base_url('qrcode/') . getDataEmail($formno)->crf_id;
      $short_url = shorturl($longurl);


      $subject = "[crf]รายการ Credit request form ที่ร้องขอ ผ่านการอนุมัติเรียบร้อยแล้ว";

      $body = '
        <h2>รายการ Credit request form ที่ร้องขอ ผ่านการอนุมัติเรียบร้อยแล้ว</h2>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>' . getDataEmail($formno)->crfcus_formno . '</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>' . conDateFromDb(getDataEmail($formno)->crf_datecreate) . '</td>
         </tr>

         <tr>
            <td><strong>ประเภทลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crf_alltype_subname . '</td>
            <td><strong>สถานะ</strong></td>
            <td>' . getDataEmail($formno)->crf_status . '</td>
         </tr>

         <tr>
            <td><strong>หัวข้อ</strong></td>
            <td colspan="3">' . $topicTH . '</td>
         </tr>

         <tr>
            <td><strong>ชื่อลูกค้า</strong></td>
            <td>' . getDataEmail($formno)->crfcus_name . '</td>
            <td><strong>เซลล์ผู้ดูแล</strong></td>
            <td>' . getDataEmail($formno)->crfcus_salesreps . '</td>
         </tr>

         <tr>
            <td><strong>ผู้บันทึกข้อมูล</strong></td>
            <td>' . getDataEmail($formno)->crf_userpost . '</td>
            <td><strong>แผนก</strong></td>
            <td>' . getDataEmail($formno)->crf_userdeptpost . '</td>
         </tr>

         <tr>
            <td><strong>รหัสพนักงาน</strong></td>
            <td>' . getDataEmail($formno)->crf_userecodepost . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_userpostdatetime) . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_mgrapprove_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_mgrapprove_detail . '</td>
         </tr>


         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Account Manager</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_name . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_accmgr_datetime) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgrapprove_status . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_accmgr_detail . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Deputy Managing Director Sales</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_director_name1 . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_director_datetime1) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_directorapprove_status1 . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_director_detail1 . '</td>
         </tr>

         <tr>
            <td colspan="4" class="bghead"><b>ผลการอนุมัติของ Deputy Managing Director Account</b></td>
         </tr>

         <tr>
            <td><strong>ผู้อนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_director_name2 . '</td>
            <td><strong>วันที่</strong></td>
            <td>' . conDateTimeFromDb(getDataEmail($formno)->crf_director_datetime2) . '</td>
         </tr>

         <tr>
            <td><strong>ผลการอนุมัติ</strong></td>
            <td>' . getDataEmail($formno)->crf_directorapprove_status2 . '</td>
            <td><strong>เหตุผล</strong></td>
            <td>' . getDataEmail($formno)->crf_director_detail2 . '</td>
         </tr>


         <tr>
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="' . base_url('main/viewdata/') . getDataEmail($formno)->crf_id . '">' . getDataEmail($formno)->crfcus_formno . '</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3"><img src="' . base_url('upload/qrcode/') . $this->createQrcode($short_url) . '"></td>
         </tr>

         </table>
         ';



      //  Email Zone

      $ecode = getDataEmail($formno)->crf_userecodepost;
      $option = getuserEmailToOwner($ecode);


      $to = array();
      foreach ($option->result_array() as $result) {
         $to[] = $result['memberemail'];
      }

      //  $to = array(
      //      "chainarong_k@saleecolour.com",
      //  );

      $deptcode = getDataEmail($formno)->crf_userdeptcodepost;
      $option_cc = getuserEmailccOwner($deptcode);
      $cc = array();
      foreach ($option_cc->result_array() as $result_cc) {
         $cc[] = $result_cc['memberemail'];
      }

      emailSaveDataTH($subject, $body, $to, $cc);
      //  Email Zone

   }
}
