<?php 
define('MYSQL_BOTH',MYSQLI_BOTH);
define('MYSQL_NUM',MYSQLI_NUM);
define('MYSQL_ASSOC',MYSQLI_ASSOC);


function filter_inputs($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  
}

//print_r($_REQUEST); die;

//$_REQUEST['course_period'] = "";
$name =  $emailid = $phoneno = $course = $comment = ""; //print_r($_REQUEST);die();
$name           =   filter_inputs($_REQUEST['name']);
$emailid	    =	filter_inputs($_REQUEST['email']);
$phoneno	    =	$_REQUEST['mobile'];
$course	    =	$_REQUEST['course'];
/*$course_period	=	filter_inputs($_REQUEST['course_period']);
$gender     	=	filter_inputs($_REQUEST['gender']);*/
$comment	    =	filter_inputs($_REQUEST['comment']);

$to             = "$emailid";
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
<td style='padding:10px; text-align:center'>{$phoneno}</td>
<td style='padding:10px; text-align:center'>&nbsp;</td>
<td style='padding:10px; text-align:center'>{$emailid}</td>
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



$conect = mysqli_connect("localhost", "root", "","trainingdb");
//$conect = mysqli_connect("74.63.215.10", "boldlink_root", "Consistency@2016","boldlink_formtesting");
mysqli_select_db($conect,"trainingdb");

///select all entries
/*$All_sql = ("SELECT COUNT(*) FROM formtable");
$rs = mysql_query($All_sql);
echo "total is $rs";*/

$select_sql = "select * from  register where email ='".$emailid."' OR lname='".$phoneno."'";

//$sql = $sql = @mysqli_query($conect,$select_sql);print_r($sql);die("stop hrere");
//$sql="SELECT * FROM course";
$user_query=mysqli_query($conect,$select_sql);
if($user_query){
    while($row = mysqli_fetch_array($user_query, MYSQL_ASSOC)){//.
        $db_email = $row['email'];
        $db_phone = $row['lname'];
        if(($db_email != "") && ($db_email == $emailid)){
            echo '<p class="or_btn_icon2" >Your have already registered with this mail: '.$row['Email'].'</p>';die();
        }else if(($db_phone != "") && ($db_phone == $phoneno)){
            echo '<p class="or_btn_icon2" >Your have already registered with this number: '.$row['lname'].'</p>';die();
        }
        

    } 
}
                                       
$insert_sql = "insert into  register set Name='".$name."', Email='".$emailid."', Phone='".$phoneno."',  Msg='".$comment."', Source='Demo Enquiry Page'";
$sql = @mysqli_query($conect,$insert_sql);
if($sql){ mail($to,$subject,$message,$headers);
mysqli_close($conect);

echo '<p class="or_btn_icon2">Your registration has been submitted successfully.<br> please check your mail '.$emailid.' for follow up</p>';
}
?>