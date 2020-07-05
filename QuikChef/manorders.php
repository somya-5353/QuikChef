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
             background:url(imgs/rest1.jpg) no-repeat center center;
    background-attachment:fixed;
    background-size:cover;
            color:white;
        }
         tr:hover{
            background-color:black;
            color:#fed203;
        }
        #errp1{
            color:#fed203;
            transform:translate(600px,100px);
        }
        .adds{
    transform:translate(490px,120px)
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
         #tbl{
            width:400px;
            transform:translate(450px,0px);
        }
       
    </style>
    </head>
<body> 
    <div class="container1">
         <a href="homerest.php"><img src="imgs/home5.png" class="hm1"></a>
         
          </div>
    <div id="tbl">
    <?php $link=@mysqli_connect("localhost","root","","quikchef") or die("Error:Unable to connect: " . mysqli_connect_error());
    if(isset($_POST["orderid"]))
    {
        $oid=$_POST["orderid"];
    }
    $var=$_COOKIE["ename"];
    $sql1="Select rest_id from restaurants where name='$var'";
       if($result1=mysqli_query($link,$sql1)){
           if(mysqli_num_rows($result1)>0){
              
          while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                   $rid=$row1["rest_id"];
               }
           }
       }
   $sql3="select order_id,user_id,status,orderdate from orders where rest_id='$rid' and status!='pending'";
         if($result3=mysqli_query($link,$sql3)){
           if(mysqli_num_rows($result3)>0){
               echo "<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th style='text-align:center'>ORDER ID</th>
               <th style='text-align:center'>USER ID</th>
               <th style='text-align:center'>STATUS</th>
               <th style='text-align:center'>DATE</th>
             </tr>
               ";
               while($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
                   echo "<tr>";
                   echo "<td style='text-align:center'>".$row3["order_id"]."</td>";
                   echo "<td style='text-align:center'>".$row3["user_id"]."</td>";
                   echo "<td style='text-align:center'>".$row3["status"]."</td>";
                    echo "<td style='text-align:center'>".$row3["orderdate"]."</td>";
                   echo "</tr>";
               }
               echo "</table>";
                mysqli_free_result($result3);
           }
         }
  if(isset($_POST["submit"]))
  {
    $sql="Select * from orders where order_id='$oid' and rest_id='$rid' and status='processing'";
       if($result=mysqli_query($link,$sql)){

           if(mysqli_num_rows($result)==0){
               echo "<p id='errp1'>Invalid order id!!!</p>";
           }
      else
      {
          $sql2="Update orders set status='completed' where order_id='$oid'";
          if($result2=mysqli_query($link,$sql2)){
               echo "<p id='errp1'>Order Completed</p>";
          }
      }
      }
               
  }
    ?>
        </div>
     <div class="adds" id="adds1">  
    <form method="post" name="myForm" action="manorders.php" onsubmit="return validateForm()">
              <br />
         <div class="form-group">
             <input type="text" class="ut" name="orderid" placeholder="Enter order-id" size="30px" maxlength="100" class="form-control" ></div>
         <br />
                 <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="UPDATE STATUS" style="background-color:#fed203;">
             </form>
        </div>
    <script>
     function validateForm() {
  var x = document.forms["myForm"]["orderid"].value;
         if(x=="")
             {
                 alert("Missing field!!!");
                 return false;
             }
     }
    </script>
</body>
</html>
<?php
ob_flush();
?>