<?php
class emailfn
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




function getDataEmail($formno)
{
    $obj = new emailfn();
    $sql = $obj->gci()->db->query("SELECT
    crf_id,
    a.crf_company,
    a.crf_datecreate,
    b.crf_alltype_subname,
    crf_status,
    crf_topic,
    crf_topic1,
    crf_topic2,
    crf_topic3,
    crf_topic4,
    c.crfcus_name,
    c.crfcus_salesreps,
    c.crfcus_formno

    FROM
    crf_maindata AS a
    INNER JOIN crf_alltype AS b ON a.crf_type = b.crf_alltype_subcode
    INNER JOIN crf_customers_temp AS c ON a.crf_formno = c.crfcus_formno
    WHERE crf_formno = '$formno'
    ");

    return $sql->row();

}


function shorturl($long_url)
{
    // $long_url = 'https://www.saleecolour.com/';
$apiv4 = 'https://api-ssl.bitly.com/v4/bitlinks';
$genericAccessToken = '29ad665eadf5cb5aead471257fe29a333eb00fab';

$data = array(
    'long_url' => $long_url
);
$payload = json_encode($data);

$header = array(
    'Authorization: Bearer ' . $genericAccessToken,
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload)
);

$ch = curl_init($apiv4);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
$result = curl_exec($ch);
$resultToJson = json_decode($result);

if (isset($resultToJson->link)) {
    return $resultToJson->link;
}
else {
    echo 'Not found';
}
}



function createQrcode($linkQrcode)
{
    $obj = new emailfn();
    $obj->gci()->load->library("Ciqrcode");

    $urlQrcode = $linkQrcode;

   $result = QRcode::png(
        $urlQrcode,
        $outfile = false,
        $level = QR_ECLEVEL_H,
        $size = 6,
        $margin =2
    );
    
}


function email($subject , $body)
{
    require("PHPMailer_5.2.0/class.phpmailer.php");

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->CharSet = "utf-8";  // ในส่วนนี้ ถ้าระบบเราใช้ tis-620 หรือ windows-874 สามารถแก้ไขเปลี่ยนได้
    $mail->SMTPDebug = 1;                                      // set mailer to use SMTP
    $mail->Host = "mail.saleecolour.com";  // specify main and backup server

    $mail->Port = 587; // พอร์ท

    $mail->SMTPAuth = true;     // turn on SMTP authentication
    $mail->Username = "otonline_system@saleecolour.com";  // SMTP username

    $mail->Password = "otonline*1234"; // SMTP password

    $mail->From = "otonline_system@saleecolour.com";
    $mail->FromName = "ทดสอบส่ง Email";
    $mail->AddAddress("chainarong_k@saleecolour.com");
    // $mail->AddCC("chainarong_k@saleecolour.com");

    $mail->WordWrap = 50;                                 // set word wrap to 50 characters
    $mail->IsHTML(true);                                  // set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = '
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Sarabun&display=swap");

        h3{
            font-family: Tahoma, sans-serif;
            font-size:14px;
        }

        table {
            font-family: Tahoma, sans-serif;
            font-size:14px;
            border-collapse: collapse;
            width: 70%;
          }
          
          td, th {
            border: 1px solid #ccc;
            text-align: left;
            padding: 8px;
          }
          
          tr:nth-child(even) {
            background-color: #F5F5F5;
          }
        </style>
    '.$body;
    $mail->send();
}
