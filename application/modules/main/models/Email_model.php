<?php
class Email_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


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


        $subject = "[crf] มีรายการ Credit Request Form ใหม่รออนุมัติ";

        $body = '
        <h3>รายการ Credit Request Form ใหม่รออนุมัติ</h3>
        <table>
         <tr>
            <td><strong>เลขที่คำขอ</strong></td>
            <td>'.getDataEmail($formno)->crfcus_formno.'</td>
            <td><strong>วันที่สร้างรายการ</strong></td>
            <td>'.getDataEmail($formno)->crf_datecreate.'</td>
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
            <td><strong>ตรวจสอบรายการ</strong></td>
            <td colspan="3"><a href="'.base_url().'">'.getDataEmail($formno)->crfcus_formno.'</a></td>
         </tr>

         <tr>
            <td><strong>Scan QrCode</strong></td>
            <td colspan="3">'.createQrcode($short_url).'<img src="'.createQrcode($short_url).'" alt="Smiley face" height="42" width="42"></td>
         </tr>

         </table>
         ';
         email($subject , $body);

    }














    
}






?>