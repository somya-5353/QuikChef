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
      #par{
          color:blue;
    font-family:Arvo,sans-serif;
    font-size:18px;
    transform:translate(530px,180px)
}
#par1{
    color:blue;
    font-family:Arvo,sans-serif;
    font-size:18px;
    transform:translate(530px,210px)
}
#par3{
    color:blue;
    font-family:Arvo,sans-serif;
    font-size:18px;
    transform:translate(530px,240px)
}
    </style>
    </head>
<body> 
    <?php $link=@mysqli_connect("localhost","root","","quikchef") or die("Erro:Unable to connect: " . mysqli_connect_error());
    $val=$_COOKIE["ename"];
  $sql="select email,phone from users where
       name='$val'";
         if($result=mysqli_query($link,$sql)){
             $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
             $phone=$row["phone"];
             $mail=$row["email"];
       echo "<p id='par'>NAME : ".$val."</p><br />";
        echo "<p id='par1'>PHONE NUMBER : ".$phone."</p><br />";
        echo "<p id='par3'>EMAIL ID : ".$mail."</p><br />";
 }
    ?>
    
</body>
</html>
<?php
ob_flush();
?>