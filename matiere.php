 <?php
ob_start();
      session_start();
    ?>
    <?php
 
$con=mysqli_connect('localhost','root','','gestion');

    if(!$con)
    {
        die(' SVP veuillez vérifier votre connexion '.mysqli_error($con));
    }
 
          
    if(isset($_POST['Envoyer']))
    {

       if(empty($_POST['nom']) || empty($_POST['code']) || empty($_POST['cof']) || empty($_POST['semestre']) || empty($_POST['coded']))
       {
            header("location:matiere.php?Empty= SVP Entrer les informations requis");
       }  

             /* if($_POST['code'] != "abc123"){
                header("location:register.php?Invalid= SVP Entrer le code CHU correcte ");
              }*/
           else{
                         $sql1= "SELECT * FROM matiere where nomm=".$_POST['nom']." And coded=".$_POST['coded']."   ";    
                    $result = mysqli_query($con,$sql1); 
                   
                    if (mysqli_num_rows($result) == 1)
                        { 
                          header("location:matiere.php?Dèja= Il existe une matière avec ce nom ");
                                
                        }


                          else{  $w=$_POST['coded'];
                         $sql= "SELECT * FROM eleve where  coded='$w'  "; 
                         $result1 = mysqli_query($con,$sql); 

                 if (mysqli_fetch_assoc($result1)) {
                                      $a=$_POST['nom'];
                                        $g=$_POST['nomm'];
                                      $b=$_POST['code'];
                                      $c=$_POST['cof'];
                                      $e=$_POST['semestre'];
                                      $d=$_POST['coded'];
                                       $f=$_POST['codem'];

                                     
    

$sql3=" INSERT INTO matiere (nomm,nommo,codem,cofm,coded,codemo,semester) VALUES ('$a','$g', '$b', '$c', '$d','$f','$e')";
$sql4=" ALTER TABLE `note` ADD `$b` VARCHAR(3) NOT NULL after coded ";
                                                      mysqli_query($con,$sql3);
                                                      mysqli_query($con,$sql4);


                                                      header("location:matiere.php?Complete= Votre traitment est bien effectué ");
                                                    
                        
                         
                                
                        }
                        else {     
                                      header("location:matiere.php?Dèja= code Departement n'existe pas ");   
                                        
                              }}
                    
        
 }  
  }

 

    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Espace Chefs | Matiéres</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css"> 
           <link rel="stylesheet" href="stylesF.css"> 
             <link rel="stylesheet" href="css2/style.css">
       
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
     <form   action="matiere.php" method="POST">
    
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="page_prof.php" class="img logo rounded-circle mb-5" style="background-image: url(images2/prof.png);"></a>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="images2/ajouter.png">&nbsp;&nbsp;Ajouter</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                  <a href="matiere.php" style="cursor: pointer;"  ><img src="images2/id.png">&nbsp;&nbsp;Matiéres</a>
                </li>
                 <li>
                    <a href="releve.php" style="cursor: pointer;"><img src="images2/note.png">&nbsp;&nbsp;Notes</a>
                </li>
              
              </ul>
            </li>
            
            <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="images2/conf.png">&nbsp;&nbsp;Modifier</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                 
               <li>
                    <a href="listem.php" style="cursor: pointer;"  ><img src="images2/id.png">&nbsp;&nbsp;Matiéres</a>
                </li>
                 <li>
                    <a   href="listen.php" style="cursor: pointer;"><img src="images2/note.png">&nbsp;&nbsp;Notes</a>
                </li>
              </ul>
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
 
    if(isset($_SESSION['User1']))
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
      <input type="text"  class="input" name="nom" placeholder="Nom Matière "  >
      <input type="text"  class="input" name="code" placeholder="Code Matière" pattern="[M]{1}[0-9]{2}" >
      <input type="number"  class="input" name="cof" placeholder="Pourcentage" min="0" max="100">

      </div>
   <div class="input-fields">
      <input type="text"  class="input" name="nomm" placeholder="Nom Module "  >
      <input type="text"  class="input" name="codem" placeholder="Code Module" pattern="[M]{1}[0-9]{1}" >


      <input type="number" class="input" id="quantity" name="semestre" min="1" max="4" step="1"   placeholder="Semèstre" >
     

</br>
   </div>
   <div class="input-fields">
     
   
 
     
  <input type="text"  class="input" name="coded" placeholder="code Departement" >   
  <button name="Envoyer" type="subm" class="button">
 Envoyer </button></div></div>
   </div>   </div> </div>


  </div>
</div>


    
 
  

 
    <script src="js2/jquery.min.js"></script>
    <script src="js2/popper.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>
  </form>
  </body>
</html>