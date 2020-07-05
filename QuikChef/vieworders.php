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
        #tbl{
            width:400px;
            transform:translate(450px,0px);
        }
       
        #errp1{
            color:red;
            transform:translate(890px,100px);
        }
        tr:hover{
            background-color:black;
            color:#bf9c0d;
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
         <a href="homeadmin.php"><img src="imgs/home3.png" class="hm1"></a>
         
          </div>
    <div id="tbl">
    <?php $link=@mysqli_connect("localhost","root","","quikchef") or die("Erro:Unable to connect: " . mysqli_connect_error());
   $sql="select order_id,rest_id,user_id,status,orderdate from orders";
         if($result=mysqli_query($link,$sql)){
           if(mysqli_num_rows($result)>0){
               echo "<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th style='text-align:center'>ORDER ID</th>
               <th style='text-align:center'>REST ID</th>
               <th style='text-align:center'>USER ID</th>
               <th style='text-align:center'>STATUS</th>
               <th style='text-align:center'>DATE</th>
               </tr>
               ";
               while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   echo "<tr>";
                   echo "<td style='text-align:center'>".$row["order_id"]."</td>";
                   echo "<td style='text-align:center'>".$row["rest_id"]."</td>";
                   echo "<td style='text-align:center'>".$row["user_id"]."</td>";
                   echo "<td style='text-align:center'>".$row["status"]."</td>";
                    echo "<td style='text-align:center'>".$row["orderdate"]."</td>";
                   echo "</tr>";
               }
               echo "</table>";
                mysqli_free_result($result);
           }
         }
    ?>
        </div>
</body>
</html>
<?php
ob_flush();
?>