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
        }
       ::placeholder{
            color:#0b4363;
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
         #im{
        height:30px;
        width:30px;
    }
    #mg{
        transform:translate(575px,0px);
    }
        #title{
            font-family:Arvo,serif;
    font-style:italic;
            font-size:40px;
            color:#0b4363;
            transform:translate(540px,-100px);
        }
         #tb{
            width:400px;
            transform:translate(-30px,-50px);
        }
        tr:hover{
            background-color:black;
            color:#4cc121;
        }
                #err{
           color:red;
            transform: translate(1100px,20px);
        }
    </style>
    </head>
<body> 
    <div class="container1">
         <a href="homecust.php"><img src="imgs/home8.png" class="hm1"></a>
         
          </div>
    <div id="tbl">
    <?php 
        $d1=date("Y-m-d");
    $restid=103;
   $tot=$_COOKIE["total"]; $link=@mysqli_connect("localhost","root","","quikchef") or die("Erro:Unable to connect: " . mysqli_connect_error());
        $sql5="select ratings from ratings where rest_id='$restid'";
    if($result5=mysqli_query($link,$sql5)){
           if(mysqli_num_rows($result5)>0){
        $row5=mysqli_fetch_array($result5,MYSQLI_ASSOC);
               $num=$row5["ratings"];
               echo '<div id="mg">';
               for($i=1;$i<=$num;$i++)
               {
                   echo '<img id="im" src="imgs/star.png">';
               }
               echo "</div>";
           }
    }
         echo '<p id="title">Spice Cafe</p>';
      $sql="select item_id,iname,price from menu where rest_id=103";
         if($result=mysqli_query($link,$sql)){
           if(mysqli_num_rows($result)>0){
               $d="<center><table class='tabl table table-stripped table-hover table-condensed table-bordered'>
               <tr>
                  <th style='text-align:center'>SELECT</th>
               <th style='text-align:center'>ITEM</th>
               <th style='text-align:center'>PRICE</th>
               </tr>
               ";
               while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                   $d.="<tr>";
                    $d.= "<td style='text-align:center'><input type='radio' name='item' value='".$row["item_id"]."'>
            </td>";
                   $d.= "<td style='text-align:center'>".$row["iname"]."</td>";
                   $d.= "<td style='text-align:center'>".$row["price"]."</td>";
                   $d.= "</tr>";
               }
              $d.="</table></center>";
                mysqli_free_result($result);
           }
         }
    if(isset($_POST["add"]))
    {
         if(isset($_POST["item"]) && isset($_POST["qty"]) && !empty($_POST["qty"]))
    {
        $id=$_POST["item"];
             $qty=$_POST["qty"];
        $sql1="SELECT price from menu where item_id='$id'";
         if($result1=mysqli_query($link,$sql1)){
           if(mysqli_num_rows($result1)>0){while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                $tot=$tot+$row1["price"]*$qty;
        setcookie("total",$tot,time()+9600);
            }
           }
         }
    }
    else
    {
        echo "<p id='err'>Select all the fields!!!</p>";
    }
    }
    if(isset($_POST["cont"]))
    {
        $val=$_COOKIE["total"];
        setcookie("price",$val,time()+9600);
        $user=$_COOKIE["ename"];
        $sql2="Select user_id from users where name='$user'";
        if($result2=mysqli_query($link,$sql2)){
           if(mysqli_num_rows($result2)>0){while($row2=mysqli_fetch_array($result2,MYSQLI_ASSOC)){
               $i=$row2["user_id"];
           }
                                          }
        }
        $sql3="Insert into orders(rest_id,user_id,status,orderdate) values('$restid','$i','pending','$d1')";
        if($result3=mysqli_query($link,$sql3)){

        header("Location:summary.php");
        exit();
           }
                                    
    }
    ?>
    </div>
    <div class="main" id="main1">
    <form name="myForm" method="post" action="sc.php" >
        <?php
        echo "<div id='tb'>".$d."</div>";
        ?>
         <div class="form-group">
             <input type="text" class="ut" name="qty" placeholder="quantity" size="30px" maxlength="20" ></div>
        <br />
         <div class="form-group">
     <input type="submit" name="add" class="btn btn-success btn-lg" id="button1" value="ADD" style="background-color:#04a301;">
        </div><br />
         <div class="form-group">
        <input type="submit" name="cont" class="btn btn-success btn-lg" id="button1" value="PROCEED" style="background-color:#04a301;">
        </div>
        </form>
    </div>    
    
</body>
</html>
<?php
ob_flush();
?>