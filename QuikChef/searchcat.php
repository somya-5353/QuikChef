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
            color:#4cc121;
            transform:translate(890px,100px);
        }
        #tbl{
            width:400px;
            transform:translate(450px,0px);
        }
        tr:hover{
            background-color:black;
            color:#4cc121;
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
                .adds{
    transform:translate(490px,120px)
}
        ::placeholder
        {
            color:#073f60;
        }
    </style>
    </head>
<body> 
     <div class="container1">
         <a href="homecust.php"><img src="imgs/home8.png" class="hm1"></a>
         
          </div>
    <div id="tbl">
    <?php $link=@mysqli_connect("localhost","root","","quikchef") or die("Erro:Unable to connect: " . mysqli_connect_error());
    $val=$_COOKIE["cate"];
    $sql1="select distinct a.rest_id,b.url,b.name,c.ratings from menu a,restaurants b,ratings c where a.rest_id=b.rest_id and b.rest_id=c.rest_id and a.category='$val'";
    if($result1=mysqli_query($link,$sql1)){
           if(mysqli_num_rows($result1)>0){   
          
                echo "<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th style='text-align:center'>RESTAURANT NAME</th>
               <th style='text-align:center'>RATINGS</th>
               </tr>
               ";
     while($row=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                   echo "<tr>";
                   echo "<td style='text-align:center'><a href='".$row["url"]."'>".$row["name"]."</a></td>";
                   echo "<td style='text-align:center'>".$row["ratings"]."</td>";
                   echo "</tr>";
               }
        echo "</table>";
           }
               }
    ?>
    </div>
</body>
    
</html>
<?php
ob_flush();
?>