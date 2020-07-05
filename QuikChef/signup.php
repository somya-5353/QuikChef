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
        body{
         background:url(imgs/sign.jpg) no-repeat center center;
    background-attachment:fixed;
    background-size:cover;
        }
        ::placeholder{
            color:black;
        }
        .ut{
            color:black;
        }
    </style>
    </head>
<body>
    <?php
$link=@mysqli_connect("localhost","root","","quikchef") or die("Error:Unable to connect: " . mysqli_connect_error());

   if(isset($_POST["name"]))
    {
        $name=$_POST["name"];
       setcookie("ename",$name,time()+9600);
     }
    if(isset($_POST["pass"]))
    {
        $password=$_POST["pass"];
        setcookie("pas",$password,time()+9600);
    }
//if the user has submitted the form
if(isset($_POST["submit"])){
    
             header("Location:details.php");
        exit();
    
}
mysqli_close($link);
?> 
     <div class="container">
         <h1><span id="hsign"><i>Ready To Order?</i></span></h1>
          </div>
    <br />
    <br />
   


      <div class="sign1" id="signnew">  
    <form name="myForm" action="signup.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
      <input type="text" class="ut" name="name" placeholder="Enter username" size="30px" maxlength="100" class="form-control" ></div> <br /> 
        <div class="form-group">
              <input type="password" class="ut" name="pass" id="passid" placeholder="Enter password" size="30px" maxlength="100" class="form-control" ></div>
     <img src="imgs/ques.png" class="bodyimagex">
     <div class="msg1"></div>
        <div class="form-group">
             <input type="password" class="ut" name="pass1" id="pass1id" placeholder="Re-enter password"  size="30px" maxlength="100" class="form-control" ></div>  
        <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="SIGN UP" style="background-color:red;">
   
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
    </body>
    <script>
  function validateForm() {
  var x = document.forms["myForm"]["name"].value;
        var y = document.forms["myForm"]["pass"].value;
      var z = document.forms["myForm"]["pass1"].value;
  if (x == "" || y == "" || z == "") {
    alert("Please fill up all the entries!!!");
    return false;
  }
var pat1=/[a-z]/i;
   if (pat1.test(x)==false)
       {
           alert("Enter a valid name!!!");
           return false;
       }
      var pat2=/^[a-z]+[0-9]+/;
      var l=y.length;
      if(l<8)
          {
              alert("Password must be 8 characters long!!!");
           return false;
          }
        if (pat2.test(y)==false)
       {
           alert("Wrong Password format!!!");
           return false;
       }
  if(y!=z)
      {
          alert("Password does not match!!!");
    return false;
      }
    
}

    </script>
</html>
<?php
ob_flush();
?>