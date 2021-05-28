 <?php
ob_start();
      session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Départements</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css2/style.css">  
           <link rel="stylesheet" href="stylesF.css"> 

       
    <style type="text/css">
      .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #38ada9;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 2px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
    </style>
  </head>
  <body>
     <form   action="liste.php" method="POST">
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
      <div id="content" class="p-4 p-md-5">

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
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><img src="images2/home1.png">&nbsp;&nbsp;</a></a>
                </li>
              
                <li class="nav-item">
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


  <a class="nav-link" href="logout.php?logout"><img src="images2/logout1.png"></a>
                    <?php 
  }
    else
    {
        header("location:index.html");
        ob_enf_fluch();
    }
 ?>
                  
                </li>
              </ul>
            </div>
          </div>
        </nav>
 
 <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="message" style="color: red;" align="center"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>
 
 
                    <?php 
                        if(@$_GET['Complete']==true)
                        {
                    ?>
                        <div class="message" style="color: green;" align="center"><?php echo $_GET['Complete'] ?></div>                                
                    <?php
                        }
                    ?>

                    <?php 
                        if(@$_GET['Dèja']==true)
                        {
                    ?>
                        <div class="message" style="color: red;" align="center"><?php echo $_GET['Dèja'] ?></div>                                
                    <?php
                        }
                    ?>
<br>
<div class="wrapper">
  <div class="contact-form">
    <div class="input-fields">
         <p ><font color="white">Classe </p>   
       <form><div>
<input   type="radio"   value="un" name="c">&nbsp;&nbsp;1ére Année    </br></br> 
<input  type="radio"  value="deux" name="c">&nbsp;&nbsp;2ème Année    </br></br></div> </form></div>
     <div class="input-fields">
        <p align="center" >Départements</p>
        <button class="button" style="vertical-align:middle" value="GI" name="t"><span>GI </span></button></br></br>
        <button class="button" style="vertical-align:middle" value="GE" name="t"><span>GE </span></button></br></br>
        <button class="button" style="vertical-align:middle" value="GM" name="t"><span>GM </span></button></br></br></div> <div class="input-fields">
          <p>:</p></font>
     <button class="button" style="vertical-align:middle" value="GP" name="t"><span>GP </span></button></br></br>
        <button class="button" style="vertical-align:middle" value="TM" name="t"><span>TM </span></button>
 
 </div>
     

</div>
 


  </div>
</div>


    
 
  

 
    <script src="js2/jquery.min.js"></script>
    <script src="js2/popper.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>
  </form>
  </body>
</html>