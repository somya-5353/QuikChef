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
        #errp1{
            color:red;
            transform:translate(890px,100px);
        }
        body{
             background:url(imgs/spice2.jpg) no-repeat center center;
    background-attachment:fixed;
    background-size:cover;
        }
        #p5{
            color:white;
        }
        #errp{
            color:red;
            transform:translate(890px,130px);
        }
        #errp1{
            color:red;
            transform:translate(890px,100px);
        }
        #leg{
            color:white;
            font-size:30px;
        }
        fieldset{
            width:338px;
        }
    </style>
    </head>
<body> 
     <?php $link=@mysqli_connect("localhost","root","","quikchef") or die("Erro:Unable to connect: " . mysqli_connect_error());
    if(isset($_POST["name"]))
    {
        $name=$_POST["name"];
        setcookie("ename",$name,time()+9600);
    }
   if(isset($_POST["pass"]))
    {
        $password=$_POST["pass"];
   }
    if(isset($_POST["submit"])){
    
        $sql="SELECT user_id from users where name='$name' AND password='$password'";
        if($result=mysqli_query($link,$sql)){
            if(mysqli_num_rows($result)>0)
            {
                $row3=mysqli_fetch_array($result,MYSQLI_ASSOC);
                setcookie("uid",$row3["user_id"],time()+9600);
                header("Location:homecust.php");
                exit();
            }
            else{
                echo "<p id=errp1>Invalid username or password!</p>";
            }
        }
    }
    ?>
     <div class="container">
         <h1><span id="he">QUIK <i>Chef</i></span></h1>
          <h3><span id="he1">Ready to eat Prepared meals platform</span></h3>
          </div>
    <br />
    <br />
  
    <div class="main" id="main1">
    <form name="myForm" method="post" action="logincust.php" onsubmit="return validateForm()">
        <fieldset>
            <legend id="leg"><b>Login</b></legend><br />
        <div class="form-group">
            
            <input type="text" class="ut" name="name" placeholder="username" size="30px" maxlength="100" class="form-control" ></div>  <br /> 
        <div class="form-group">
              <input type="password" class="ut" name="pass" id="eye1" placeholder="password" size="30px" maxlength="100" class="form-control"  > 
        </div>
      <br />
     <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="LOGIN" style="background-color:#ff0041;">
             <p id="s1">Not a member? <a href="signup.php" class="link"><u><i>Sign up now</i></u></a></p>
            </fieldset>
        </form>
    </div>    
    <script>
     function validateForm() {
  var x = document.forms["myForm"]["name"].value;
        var y = document.forms["myForm"]["pass"].value;
  if (x == "" && y=="") {
    alert("Name and Password missing!!!");
    return false;
  }
       else if (x == "") {
    alert("Name is missing!!!");
    return false;
  }
      else if (y=="") {
    alert("Password is missing!!!");
    return false;
  }
}
    </script>
</body>
</html>

<?php
ob_flush();
?>