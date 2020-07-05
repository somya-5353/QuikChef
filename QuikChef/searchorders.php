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
             background:url(imgs/hm2.jpg) no-repeat center center;
    background-attachment:fixed;
    background-size:cover;
            color:white;
        }
        
        #errp1{
            color:#bf9c0d;
            transform:translate(890px,100px);
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
        tr:hover{
            background-color:black;
            color:#bf9c0d;
    </style>
    </head>
<body>
     <div class="container1">
         <a href="homeadmin.php"><img src="imgs/home3.png" class="hm1"></a>
         
          </div>
    <div id="tbl">
    <?php $link=@mysqli_connect("localhost","root","","quikchef") or die("Erro:Unable to connect: " . mysqli_connect_error());
    if(isset($_POST["orderid"]))
    {
        $oid=$_POST["orderid"];
    }
  if(isset($_POST["submit"]))
  {
    $sql="Select * from orders where order_id='$oid'";
       if($result=mysqli_query($link,$sql)){
           if(mysqli_num_rows($result)>0){
                echo "<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th style='text-align:center'>ORDER ID</th>
               <th style='text-align:center'>REST ID</th>
               <th style='text-align:center'>USER ID</th>
               <th style='text-align:center'>STATUS</th>
               </tr>
               ";
               while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   echo "<tr>";
                   echo "<td style='text-align:center'>".$row["order_id"]."</td>";
                   echo "<td style='text-align:center'>".$row["rest_id"]."</td>";
                   echo "<td style='text-align:center'>".$row["user_id"]."</td>";
                   echo "<td style='text-align:center'>".$row["status"]."</td>";
                   echo "</tr>";
               }
               echo "</table>";
                mysqli_free_result($result);
           }
      else
      {
          echo "<p id='errp1'>Invalid order id!!!</p>";
    
          }
      }
      }
               
    ?>
    </div>
     <div class="adds" id="adds1">  
    <form method="post" name="myForm" action="searchorders.php" onsubmit="return validateForm()">
              <br />
         <div class="form-group">
             <input type="text" class="ut" name="orderid" placeholder="Enter order-id" size="30px" maxlength="100" class="form-control" ></div>
         <br />
                 <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="SUBMIT" style="background-color:#bf9c0d;">
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