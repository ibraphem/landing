<?php
session_start();
include_once('config.php');
if(isset($_SESSION['user'])) {

$candidate_count = mysqli_query($connect,"SELECT COUNT(*) As total_records FROM `register`");
$candidate_records = mysqli_fetch_array($candidate_count);
$candidate_records = $candidate_records['total_records'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Candidate Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
<div class="row" style="margin-top: 35px;">
<div class="col-md-8">
<h4 style="color: blue;"><?php echo $candidate_records; ?> candidates have registered</h4>
</div>
<div class="col-md-4">
<a href="logout.php"><button type="button" class="btn btn-danger" style="float: right;">Logout</button></a>
</div>
</div>
<?php //echo $_SESSION['user']; ?>
<table class="table table-bordered table-striped table-hover">
  <tr>
      <th>DATE</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>PHONE NUMBER</th>
      <th>COURSE</th>
  </tr>
  
  <?php
       $result = mysqli_query($connect,"SELECT * FROM `register` ORDER BY id DESC");
     if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){ 
        
?>
  <tr>
    <td><?php echo $row['date']?></td>
    <td><?php echo $row['fname']?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['lname']?></td>
    <td><?php echo $row['course'] ?></td>

  </tr>
<?php }  } ?>
   
</table>
</div><br /><br />

</body>
</html>
<?php } ?>
