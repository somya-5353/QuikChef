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
            background:url(imgs/details.jpg) no-repeat center center;
    background-attachment:fixed;
    background-size:cover;
        }
        ::placeholder{
            color:black;
        }
        .ut1{
            color:black;
        }
        #errp1{
            color:darkred;
            transform:translate(890px,100px);
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
         #sell{
            color:#10415c;
             font-family:Arvo,serif;
        }
        label{
            font-family:Arvo,serif;
            font-size:20px;
        }
        select{
            width:345px;
            height:10px;
        }
    </style>
    </head>
    <body>
         <div class="container1">
         <a href="homerest.php"><img src="imgs/home6.png" class="hm1"></a>
         
          </div>
        <?php
$link=@mysqli_connect("localhost","root","","quikchef") or die("Error:Unable to connect: " . mysqli_connect_error());

   if(isset($_POST["cat"]))
    {
        $cat=$_POST["cat"];
     }
    if(isset($_POST["iname"]))
    {
        $iname=$_POST["iname"];
    }
        if(isset($_POST["price"]))
    {
        $price=$_POST["price"];
    }
        $var=$_COOKIE["ename"] ;
        $sql1="Select rest_id from restaurants where name='$var'";
       if($result1=mysqli_query($link,$sql1)){
           if(mysqli_num_rows($result1)>0){
              
          while($row1=mysqli_fetch_array($result1,MYSQLI_ASSOC)){
                   $rid=$row1["rest_id"];
               }
           }
       }
//if the user has submitted the form
if(isset($_POST["submit"])){
    
         $sql="INSERT INTO menu(rest_id,category,iname,price) VALUES('$rid','$cat','$iname','$price')";
        if($result=mysqli_query($link,$sql)){
           echo "<p id='errp1'>Item added to the menu successfully</p>";
    }
    
}
mysqli_close($link);
?> 
    <div class="adds" id="adds1">  
    <form name="myForm" method="post" action="updatemenu.php" onsubmit="return validateForm()">
      <div class="form-group">
          <br /><br /><br /><br />
          <label for="sell">Select category:</label><br />
              <select class="ut" class="form-control" id="sell" name="cat">
            <option>milkshakes</option>
            <option>desserts</option>
            <option>main course</option>
            <option>chinese</option>
            <option>pizza</option>
          </select></div>
         <br />
          <div class="form-group">
              <input type="text" class="ut1" name="iname" id="emailuser" placeholder="Enter item name"  size="30px" maxlength="100" class="form-control" > </div>
    
     <br />
        <div class="form-group">
              <input type="text" class="ut1" name="price" id="emailuser" placeholder="Enter price"  size="30px" maxlength="100" class="form-control" > </div>
    
     <br />
        
     <input type="submit" name="submit" class="btn btn-success btn-lg" id="button1" value="UPDATE" style="background-color:darkred;"> 
          </form>
    </div>
        <script>
     function validateForm() {
  var x = document.forms["myForm"]["cat"].value;
        var y = document.forms["myForm"]["iname"].value;
          var z= document.forms["myForm"]["price"].value;
  if (x == "" || y=="" ||z=="") {
    alert("Missing Fields!!!");
    return false;
  }
}
    </script>
    </body>
</html>
<?php
ob_flush();
?>