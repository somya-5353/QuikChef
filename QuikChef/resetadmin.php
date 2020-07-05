<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ONLINE FOOD ORDER AND DELIVERY</title>
    <link href="styling.css" rel="stylesheet">
     <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
     <script src="js/jquery-3.3.1.min.js"></script>
    <style>
        ::placeholder{
            color:#b55c25;
        }
        .ut
        {
            color:#006900;
        }
        .hm1{
    height: 40px; 
    transform:translate(-180px,-30px)
}

        body{
             background:url(imgs/coffee.jpg) no-repeat center center;
    background-attachment:fixed;
    background-size:cover;
        }
       
        #leg{
            color:#b55c25;
            font-size:30px;
        }
        fieldset{
            width:330px;
        }
        .main{
            transform:translate(-300px,-100px);
        }
        #q5{
            color:black;
              transform:translate(550px,17px); 
        }
    </style>
    </head>
<body> 
 <?php
$link=@mysqli_connect("localhost","root","","quikchef") or die("Error:Unable to connect: " . mysqli_connect_error());

   if(isset($_POST["pass"]))
    {
        $password=$_POST["pass"];
     }
    if(isset($_POST["pass1"]))
    {
        $repassword=$_POST["pass1"];
    }
//if the user has submitted the form
if(isset($_POST["submit"])){
    
         $sql="UPDATE admin SET password='$password' where name='admin'";
        if($result=mysqli_query($link,$sql)){
            echo "<p id=q5>Your password has been reset</p>";
    }
    
}
mysqli_close($link);
?>  
     <div class="container">
         <a href="homeadmin.php"><img src="imgs/home2.png" class="hm1"></a>
         
          </div>
    <br />

  
    <div class="main" id="main1">
    <form name="myForm" method="post" action="resetadmin.php" onsubmit="return validateForm()">
        <fieldset>
            <legend id="leg"><b>Reset Password</b></legend><br />
        <div class="form-group">
            
            <input type="password" class="ut" name="pass" placeholder="New Password" size="30px" maxlength="100" class="form-control" ></div>  <br /> 
              <img src="imgs/ques2.png" class="bodyimagex">
            <div class="msg1"></div>
        <div class="form-group">
              <input type="password" class="ut" name="pass1" id="eye1" placeholder="Confirm Password" size="30px" maxlength="100" class="form-control"  > 
        </div>
      <br />
     <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="RESET" style="background-color:#b55c25;">
            </fieldset>
        </form>
    </div>   
     <script>
    $(function(){
        $(".bodyimagex").mouseover(function(){
            $(".msg1").html("<p>Password should be atleast 8 characters long,should begin with a lowercase alphabet and should contain atleast one digit and no special characters.</p>");
        });
        $(".bodyimagex").mouseout(function(){
            $(".msg1").html("<p></p>");
        });
    });
    
    </script>
    <script>
     function validateForm() {
  var x = document.forms["myForm"]["pass"].value;
        var y = document.forms["myForm"]["pass1"].value;
  if(x=="" || y=="")
      {
          alert("Fill up all the details!!!");
          return false;
      }
    var pat2=/^[a-z]+[0-9]+/;
      var l=x.length;
      if(l<8)
          {
              alert("Password must be 8 characters long!!!");
           return false;
          }
        if (pat2.test(x)==false)
       {
           alert("Wrong Password format!!!");
           return false;
       }
  if(x!=y)
      {
          alert("Password does not match!!!");
    return false;
      }
}

    </script>
</body>
</html>
<?php
ob_flush();
?>