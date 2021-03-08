<!DOCTYPE html>
<html>

<head>

    <style>
    input[type=text], select {
    width: 60%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
    width: 60%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training - RST Solar Systems LTD</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/styless.css"/>
    <link rel="stylesheet" href="css/Google-Style-Login.css">
    
    
    <script src="js/jquery-3.3.1.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>


<body style="background-image:url('images/sus.png')">
    <div class="login-card">
    <h2 style="color: rgb(104, 145, 162); text-align: center;">ADMIN.</h2>
    <img src="images/r4.png" class="profile-img-card">
    <div>
        <h3 id="permit" style="color: red;"></h3>
    </div>
        <p class="profile-name-card"> </p>
        <form class="form-signin" name="loginForm" id="login_form"><span class="reauth-email" > </span>
            <input class="form-control" type="text" required="" placeholder="Enter Username" name="username" autofocus="" id="inputEmail">
            <input class="form-control" type="password" required="" placeholder="Enter Password" name="password" id="inputPassword">
            
            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="login">Login</button>
        </form></div>

   
   
<script>
     $(document).ready(function(){  
        
         $('#login_form').on("submit", function(event){  
            event.preventDefault(); 
            //alert('what the heellll');
            
            $.ajax({  
                 url:"login.php",  
                 method:"POST",  
                 data:$('#login_form').serialize(),  
                 dataType:"json",
                 success:function(data){
                    if(data == 1) {
                            
                            window.location.href = "dashboard.php";
                        }
                        
                        if (data == 0) {
                            
                            document.getElementById('permit').innerHTML = 'Incorrect login details';
                        }
                     }  
                });
 
           
      });

      
      
      });



</script>
    
</body>

</html>