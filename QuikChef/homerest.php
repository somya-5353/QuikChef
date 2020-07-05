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
<link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>
<style>
    #he{
    font-family:Arvo,serif;
    color:#fff;
    text-align: center;
    margin-left: 0px;
    padding: 55px;
    letter-spacing: 3px;
    font-size:70px;

}
#he1{
    font-family:Arvo,serif;
    font-style:italic;
    color:#fff;
    text-align: center;
    margin-left: 15px;
    padding: 55px;
    letter-spacing: 2px;
    font-size:20px;

}
body{
   background:url(imgs/rest1.jpg) no-repeat center center ;
    background-attachment:fixed;
    background-size:cover;
}
    #sep{
        font-family:Arvo,serif;
    }
    a{
        color:black;
        font-size:27px;
        font-family:cursive;
    }
.navb{
color:white;
font-family:cursive;
}
#home{
    background-color: transparent;
    color: black;
    text-align: center;
    padding-top: 6%;
    font-family:cursive;
}
#home h1{
    margin-bottom: 30px;
    font-family:cursive;
    color:black;
}
    #new{
        font-size:10px;
    }


.navbar-custom {
  font-size: 18px;
  background-color: black;
  border-color: black;

  
}
    .navbar-custom .navbar-nav > li > a {
  color: #c0c0c0;
  border-left: 1px solid black;
}
.navbar-custom .navbar-nav > li > a:hover,
.navbar-custom .navbar-nav > li > a:focus {
  color: #ffffff;
  background-color: transparent;
}
    #im{
        height:30px;
        width:30px;
    }
    #mg{
        transform:translate(630px);
    }
</style>
    </head>
<body>
     
      
      <nav role="navigation" class="navbar navbar-custom navbar-fixed-top" id="mynavBar">
        
          <div class="container-fluid">
              <div>
                  <ul class="nav navbar-nav navbar-right navb" id="new">
                      <li ><a href="viewmenu.php">View Menu</a></li>
                      <li ><a href="manorders.php">Manage Orders</a></li>
                      <li><a href="updatemenu.php">Update Menu</a></li>
                      <li><a href="resetrest.php
                          ">Reset Password</a></li>
<li><a href="index.php
                          ">Logout</a></li>
                  </ul>
              </div>
          </div>
      </nav>

 <div class="jumbotron" id="home">
          <div class="container">
               <h1><span id="he">QUIK <i>Chef</i></span></h1>
              <h3><span id="he1">Ready to eat Prepared meals platform</span></h3>
          </div>
      </div>
<?php
    $link=@mysqli_connect("localhost","root","","quikchef") or die("Erro:Unable to connect: " . mysqli_connect_error());
 $rid=$_COOKIE["restid"]; 
  $sql="select ratings from ratings where rest_id='$rid'";
    if($result=mysqli_query($link,$sql)){
           if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
               $num=$row["ratings"];
               echo '<div id="mg">';
               for($i=1;$i<=$num;$i++)
               {
                   echo '<img id="im" src="imgs/star.png">';
               }
               echo "</div>";
           }
    }
?>
    <script src="js/bootstrap.min.js"></script>
      
  </body>
</html>
<?php
ob_flush();
?>