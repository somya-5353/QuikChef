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
            color:white;
        }
        tr{
            color:#073f60;
        }
         tr:hover{
            background-color:black;
            color:#016a01;
        }
        #errp1{
            color:#073f60;
            transform:translate(500px,100px);
        }
        ::placeholder{
            color:#073f60;
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
            width:460px;
            transform:translate(450px,0px);
        }
        #ml1{
            transform: translate(400px,-80px);
            color:black;
        }
         #sell{
            color:#10415c;
             font-family:Arvo,serif;
        }
        label{
            font-family:Arvo,serif;
            font-size:20px;
            color:#10415c;
        }
        select{
            width:345px;
            height:10px;
        }
         #tb{
            width:400px;
            transform:translate(-30px,-200px);
        }
        tr:hover{
            background-color:black;
            color:#4cc121;
        }
        #err{
           color:red;
            transform: translate(500px,20px);
        }
    </style>
    </head>
<body> 
    <div class="container1">
         <a href="homecust.php"><img src="imgs/home1.png" class="hm1"></a>
         
          </div>
    <div id="tbl">
    <?php $link=@mysqli_connect("localhost","root","","quikchef") or die("Error:Unable to connect: " . mysqli_connect_error());
        $val=$_COOKIE["uid"];
        $sql3="select a.order_id,a.status,a.user_id,a.orderdate,b.name from orders a,restaurants b where a.rest_id=b.rest_id and a.status='completed'";
         if($result3=mysqli_query($link,$sql3)){
           if(mysqli_num_rows($result3)>0){
               $d="<table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
               <th style='text-align:center'>ORDER ID</th>
                <th style='text-align:center'>RESTAURANT NAME</th>

               <th style='text-align:center'>STATUS</th>
    
               <th style='text-align:center'>DATE</th>
               </tr>
               ";
               while($row3=mysqli_fetch_array($result3,MYSQLI_ASSOC)){
                   if($row3["user_id"]==$val){
                   $d.="<tr>";
                   $d.="<td style='text-align:center'><input type='radio' name='ratings' value='".$row3["order_id"]."'>"
                       .$row3["order_id"].
                       "</td>";
                   $d.="<td style='text-align:center'>".$row3["name"]."</td>";
                   $d.="<td style='text-align:center'>".$row3["status"]."</td>";
                       $d.="<td style='text-align:center'>".$row3["orderdate"]."</td>";
                   $d.="</tr>";
                   }
               }
               $d.="</table>";
                mysqli_free_result($result3);
           }
         }
  if(isset($_POST["submit"]))
  { 
       if(isset($_POST["ratings"]))
    {
        $r=$_POST["ratings"];
        if(isset($_POST["ml"]))
    {
        $skey=$_POST["ml"];
    }

          $sql2="Update orders set status='rated' where order_id='$r'";
          if($result2=mysqli_query($link,$sql2)){
        $sql3="select rest_id from orders where order_id='$r'";
               if($result3=mysqli_query($link,$sql3)){

           if(mysqli_num_rows($result3)>0){
               $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
               $restid=$row3["rest_id"];
               $sql4="select ratings,count from ratings where rest_id='$restid'";
               if($result4=mysqli_query($link,$sql4)){

           if(mysqli_num_rows($result4)>0){
               $row4=mysqli_fetch_array($result4,MYSQLI_ASSOC);
               $rating=$row4["ratings"];
               $cnt=$row4["count"];
               $newcnt=$cnt+1;
               $newrating=($rating*$cnt+$skey)/$newcnt;
               $sql5="Update ratings set ratings='$newrating',count='$newcnt' where rest_id='$restid'";
               if($result5=mysqli_query($link,$sql5)){
               echo "<p id='errp1'>Thanks for rating us!!!</p>";
           }
               }
               
           }
               }
           }
               }
          }
      else
      {
          echo "<p id='err'>Order not selected!!!</p>";
      }
    
  }
    ?>
        </div>
     <div class="adds" id="adds1">  
    <form method="post" name="myForm" action="rateorders.php" onsubmit="return validateForm()">
              <br />
         <br />
        <?php
        echo "<div id='tb'>".$d."</div>";
        ?>
        <div class="form-group">
        <label for="sell">Rate your order:</label><br />
              <select class="ut" class="form-control" id="sell" name="ml">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
                 <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="RATE ORDER" style="background-color:#016a01;">
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