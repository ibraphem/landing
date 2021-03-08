<?php

//print_r($_POST); die;
 /*   $res = array(0=>0);
    echo $myJSON = json_encode($res);
    die(); */


include_once("config.php");

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$course = $_POST['course'];
$comment = $_POST['message'];
$date = date("Y-m-d");


    
$to             = "$email";
$subject        = "RST TECHNOLOGY SEMINAR";
// Always set content-type when sending HTML email
$headers        = "MIME-Version: 1.0" . "\r\n";
$headers        .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers        .= 'From: <info@rstsolarsystemsltd.com>' . "\r\n";
//$headers        .= 'Cc: info@boldlinks.com.ng' . "\r\n";
$message = "
<html>
<head>
<title>RST Technology Seminar Mail Aknowledgement</title>
</head>
<body>
<p>Dear $name,</p><br/>
We are sending you this message to confirm that you have successfully registered for the RST Technology Seminar/Training, 2019.<br/>
<p>We urge you to be patient while we review it and get back to you.</p><br/>
<table width='400px'>
<tr style='padding:10px; text-align:center'>
<th style='padding:10px; text-align:center'>Name</th>
<th style='padding:10px; text-align:center'>&nbsp;</th>
<th style='padding:10px; text-align:center'>Phone</th>
<th style='padding:10px; text-align:center'>&nbsp;</th>
<th style='padding:10px; text-align:center'>Email</th>
<th style='padding:10px; text-align:center'>&nbsp;</th>
<th style='padding:10px; text-align:center'>Course</th>
</tr>
<tr style='padding:10px; text-align:center'>
<td style='padding:10px; text-align:center'>{$name}</td>
<td style='padding:10px; text-align:center'>&nbsp;</td>
<td style='padding:10px; text-align:center'>{$phone}</td>
<td style='padding:10px; text-align:center'>&nbsp;</td>
<td style='padding:10px; text-align:center'>{$email}</td>
<td style='padding:10px; text-align:center'>&nbsp;</td>
<td style='padding:10px; text-align:center'>{$course}</td>
</tr>
</table><br><br>
<p style=''><em><strong>RST Solar Systems LTD</strong></em></p>
<p style=''><em>12 Bayo Ajayi Street, Itoki Junction , Ogun State, Nigeria</em></p>
<p style=''><em>+2348093694698,+2348093694697</em></p>
</body>
</html>
";



    $sel_qry = "SELECT * FROM register WHERE email = '$email'";
    $sel_res = mysqli_query($connect, $sel_qry);
    
    if(mysqli_num_rows($sel_res) > 0) {
        
        echo "You have already registered with this email";
        die;
    } else {
    
    $query = "INSERT INTO register(date, fname, lname, email, course, message)  
           VALUES('$date', '$name', '$phone', '$email', '$course', '$comment')";  
           
    $result = mysqli_query($connect, $query);
    
        }
    
    
if($result) {
    mail($to,$subject,$message,$headers);
    mysqli_close($connect);

    echo '<p class="or_btn_icon2">Your registration has been submitted successfully.<br> please check your mail '.$email.' for follow up</p>';

} else {
    
    echo '<p class="or_btn_icon2">There is a problem submitting your form.<br> please try again</p>';
    
    
}


?>