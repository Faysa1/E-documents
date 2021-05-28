<?php
ob_start();
      session_start();
$con=mysqli_connect('localhost','root','','gestion');
 /* $sql1= "SELECT * FROM comments ";    
                  $result = mysqli_query($con,$sql1); 
while($row = mysqli_fetch_array($result)){
  if ($row['comment_status']=='0'){
$nb[] =$row['comment_id'];
$size = sizeof($nb); }
else { $size=0;} 
}*/
 $size=0;
 $sql1= "SELECT * FROM historique ";    
                  $result = mysqli_query($con,$sql1); 
while($row = mysqli_fetch_array($result)){
  if ($row['status']=='0'){
$nb[] =$row['cne'];
$size = sizeof($nb)/2; }
else { $size=0;} 
}
 $size1=0;
 $sql2= "SELECT * FROM comments ";    
                  $result2 = mysqli_query($con,$sql2); 
while($row = mysqli_fetch_array($result2)){
  if ($row['comment_status']=='0'){
$nb[] =$row['comment_id'];
$size1 = sizeof($nb); }
else { $size1=0;} 
}
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Espace Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css"> 
             <link rel="stylesheet" href="css2/style.css">
             <!-- pour messages -->
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
    <style type="text/css">
       button {
    background-color: Transparent
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;

}

    .responsive {
    width: 100%;
 
  height: auto;
}
    </style>
  </head>
  <body>
     <form   action="page_admin.php" method="POST">
 
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="page_admin.php" class="img logo rounded-circle mb-5" style="background-image: url(images2/images.png);"></a>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="images2/ajouter.png">&nbsp;&nbsp;Ajouter</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="ajouter_etu.php"><img src="images2/group.png">&nbsp;&nbsp;Etudiant</a>
                </li>
                <li>
                    <a href="ajouter_chef.php"><img src="images2/un.png">&nbsp;&nbsp;Chef filière</a>
                </li>
                
              </ul>
            </li>
            
           
            <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="images2/conf.png">&nbsp;&nbsp;Modifier</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="liste1.php"><img src="images2/group.png">&nbsp;&nbsp;Etudiant</a>
                </li>
                
                <li>
                    <a href="liste2.php"><img src="images2/un.png">&nbsp;&nbsp;Chef filière</a>
                </li>
              </ul>
            </li>
            
            
           
            <li>
              <a href="rech_etudiant.php"><img src="images2/dep.png">&nbsp;&nbsp;Département  </a>
            </li>
          </ul>

        

        </div>
      </nav>
  
 
 
    
  
   
   
 
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5" >

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
     

  
    
    

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <table align="right"><tr><th>        <ul class="nav navbar-nav ml-auto" >
                 <button> <li class="nav-item active">
                    <a class="nav-link" href="#"><img src="images2/home.png"></a>
                </li></button>
 
                   
  <button name="vide"> <li class="">                    <img src="images2/notif1.png">  
    <?php 
    if($size == 0){ echo '<span class="label label-pill label-danger count" style="border-radius:10px;">0</span>'; }
 else {  
echo '<span class="label label-pill label-danger count" style="border-radius:10px;">'.$size.'</span> ' ; }
                  if (isset($_POST['vide'])){ 
  header('location:trace.php');
  $sql = "UPDATE  historique SET status=1 where status=0 ";
   $result = mysqli_query($con,$sql); 
} ?>
                
                </li></button>
               
       
     
                <button name="vide1"><li class="nav-item">
                <img src="images2/sms1.png">
                    <?php 

 
echo '<span class="label label-pill label-danger count" style="border-radius:10px;">'.$size1.'</span> ' ; 
                           if (isset($_POST['vide1'])){ 
  header('location:message.php');
  $con1= mysqli_connect('localhost','root','','gestion');
   $sql = "UPDATE comments SET comment_status=1 where comment_status=0 ";
   $result = mysqli_query($con,$sql); 
}      ?> 
                </li></button>
                 <button name="log"> <li class="nav-item">
                  <?php
 
    if(isset($_SESSION['User']))
    {
    ?>


    <?php 
                        if(@$_GET['Ajoute']==true)
                        {
                    ?>
                        <div class="message" style="color: black;"><?php echo $_GET['Ajoute'] ?></div>                                
                    <?php
                        }
                    ?>


 <img src="images2/logout1.png"> 
 
 <?php 
 if (isset($_POST['log'])){
  header('location:logout.php?logout');}
 
 ?>
                    <?php 
  }
    else
    {
        header("location:index.html");
        ob_end_flush();
    }
 ?>
                  
                </li> </button> 
              </ul></th></tr></table>
            </div>
          </div>
        </nav>

 <img src="images2/body.png" class="responsive"  align="center">

      </div>
    </div>

    <script src="js2/jquery.min.js"></script>
    <script src="js2/popper.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>


 


  </form>
  </body>
</html>