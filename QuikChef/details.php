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
    <style>
        body{
            background:url(imgs/details.jpg) no-repeat center center;
    background-attachment:fixed;
    background-size:cover;
        }
        ::placeholder{
            color:black;
        }
        .ut1{
            color:black;
        }
    </style>
    </head>
    <body>
        <?php
$link=@mysqli_connect("localhost","root","","quikchef") or die("Error:Unable to connect: " . mysqli_connect_error());

   if(isset($_POST["mob"]))
    {
        $mob=$_POST["mob"];
     }
    if(isset($_POST["mail"]))
    {
        $mail=$_POST["mail"];
    }
        $var=$_COOKIE["ename"] ;
        $var1=$_COOKIE["pas"];
//if the user has submitted the form
if(isset($_POST["submit"])){
    
         $sql="INSERT INTO users(name,email,phone,password) VALUES('$var','$mail','$mob','$var1')";
        if($result=mysqli_query($link,$sql)){
             header("Location:logincust.php");
        exit();
    }
    
}
mysqli_close($link);
?> 
    <div id="contain">
   
        <h2 id="detail"><u>Enter your details:</u><br /><br /><br /><br /><br /></h2>    
    </div>   
    
    <div class="adds" id="adds1">  
    <form name="myForm" method="post" action="details.php" onsubmit="return validateForm()">
      <div class="form-group">
      <input type="text" class="ut1" name="mob" id="mobuser" placeholder="Enter mobile number" size="30px" maxlength="100" class="form-control" ></div>
         <br />
          <div class="form-group">
              <input type="email" class="ut1" name="mail" id="emailuser" placeholder="Enter email id"  size="30px" maxlength="100" class="form-control" > </div>
    
     <br />
        
     <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="CONFIRM" style="background-color:darkred;"> 
          </form>
    </div>
        <script>
     function validateForm() {
  var x = document.forms["myForm"]["mob"].value;
        var y = document.forms["myForm"]["mail"].value;
  if (x == "" && y=="") {
    alert("Mobile number and Email id missing!!!");
    return false;
  }
       else if (x == "") {
    alert("Mobile number is missing!!!");
    return false;
  }
      else if (y=="") {
    alert("Email id is missing!!!");
    return false;
  }
         var l=x.length;
            if(l!=10){
                    alert("Mobile number should be 10 digit!!!");
                return false;
                }
            var pat=/[0-9]{10}/;
            if(pat.test(x)==false)
                {
                    alert("Incorrect Mobile number!!!");
                    return false;
                }
}
    </script>
    </body>
</html>
<?php
ob_flush();
?>