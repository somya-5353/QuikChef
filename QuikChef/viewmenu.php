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
         <a href="homerest.php"><img src="imgs/home3.png" class="hm1"></a>
         
          </div>
    <div id="tbl">
    <?php 
       $restname=$_COOKIE["ename"];
 $link=@mysqli_connect("localhost","root","","quikchef") or die("Erro:Unable to connect: " . mysqli_connect_error());
        $sql1="select rest_id from restaurants where name='$restname'";
        if($result1=mysqli_query($link,$sql1)){
           if(mysqli_num_rows($result1)>0){
              $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC); 
               $restid=$row1["rest_id"];
           }
        }
   $sql="select item_id,iname,category,price from menu where rest_id='$restid'";
         if($result=mysqli_query($link,$sql)){
           if(mysqli_num_rows($result)>0){
               echo "<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th style='text-align:center'>ITEM ID</th>
               <th style='text-align:center'>ITEM NAME</th>
               <th style='text-align:center'>CATEGORY</th>
               <th style='text-align:center'>PRICE</th>
               </tr>
               ";
               while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   echo "<tr>";
                   echo "<td style='text-align:center'>".$row["item_id"]."</td>";
                   echo "<td style='text-align:center'>".$row["iname"]."</td>";
                   echo "<td style='text-align:center'>".$row["category"]."</td>";
                   echo "<td style='text-align:center'>".$row["price"]."</td>";
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