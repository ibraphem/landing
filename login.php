<?php

session_start();


if($_POST['username'] == 'rstadmin' && $_POST['password'] == 'quaily@91') {
    $_SESSION['user'] = 'rstadmin';
    
    $res = array(0=>1);
    echo $myJSON = json_encode($res);
    
} else {

    $res = array(0=>0);
    echo $myJSON = json_encode($res);
}
?>