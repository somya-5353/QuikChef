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
             background:url(imgs/plain.jpg) no-repeat center center;
    background-attachment:fixed;
    background-size:cover;
            color:black;
        }
       
        #errp1{
            color:black;
            font-size: 20px;
            transform:translate(620px,100px);
        }
        #errp2{
            color:#10415c;
        }
        ::placeholder{
            color:#10415c;
        }
        #sel{
            color:#10415c;
        }
        .hm1{
    height: 40px; 
              transform:translate(-20px,-20px)
}
        .container1{
    max-width: 1000px;
    height:80px;
    padding:30px;
}
    </style>
    </head>
<body> 
      <div class="container1">
         <a href="homecust.php"><img src="imgs/home8.png" class="hm1"></a>
         
          </div>
    <?php 
    $var= $_COOKIE["price"];
    echo "<h1 align='center' id='errp2'>Your bill is :  ". $var."</h1>";
    if(isset($_POST["submit"]))
    {
        echo "<p id=errp1>Order Confirmed</p>";
        exit();
    }
    ?>
  
   <div class="main" id="main1">
    <form name="myForm" method="post" action="summary.php" onsubmit="return validateForm()" >
        
        <div class="form-group">
            <br /><br /><br />
            <input type="text" class="ut" name="addr" placeholder="Enter address" size="30px" maxlength="200" class="form-control" ></div>  <br /> 
       
      <br />
        <div class="form-group">
        <select class="ut" class="form-control" id="sel">
            <option>Cash on delivery</option>
            <option>Paytm</option>
            <option>Debit Card</option>
        </select></div>
     <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="CONFIRM" style="background-color:#007e00;">
        </form>
    </div>    
    <script>
     function validateForm() {
  var x = document.forms["myForm"]["addr"].value;
  if (x == "") {
    alert("Address missing!!!");
    return false;
  }
     }
    </script>
</body>
</html>
<?php
ob_flush();
?>