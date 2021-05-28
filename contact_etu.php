 <?php
ob_start();
      session_start();

    ?>
    <?php
//insert.php
$con=mysqli_connect('localhost','root','','gestion');

    if(!$con)
    {
        die(' SVP veuillez vérifier votre connexion '.mysqli_error($con));
    }
if(isset($_POST["Envoyer"]))
{
       if(empty($_POST['subject']) || empty($_POST['comment']))
       {
            header("location:contact_etu.php?Empty= SVP Entrer les informations requis");
       } 
 
 else { 
 $s =  $_POST["subject"];
 $c =  $_POST["comment"];
 $date=date("Y-m-d H:i:s"); 
 $sql = "
 INSERT INTO comments (date_t,comment_subject, comment_text,comment_status)
 VALUES ('$date','$s', '$c','0')
 ";
 mysqli_query($con, $sql);
header("location:contact_etu.php?Complete= Votre traitment est bien effectué");}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Espace Etudiant | Contact </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="css2/style.css"> 
<style type="text/css">
  .button {
  display: inline-block;
  border-radius: 4px;
  background-color:  #38ada9;
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
  <form   action="contact_etu.php" method="POST">  
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="page_etudiant.php" class="img logo rounded-circle mb-5" style="background-image: url(images/etudiant.png);"></a>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="images2/mat.png">&nbsp;&nbsp;Documments</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="telecharger_a.php"><img src="images2/download.png">&nbsp;&nbsp;Télécharger</a>
                </li>
                
                
              </ul>
            </li>
            
           
            
           
            
           
            <li>
              <a href="contact_etu.php"><img src="images2/call.png">&nbsp;&nbsp;Contact</a>
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
 
    if(isset($_SESSION['User2']))
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
        ob_end_flush();
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
    <div class="container">
  

    <div class="form-group">
 
     <input type="text" name="subject"   class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
 
     <textarea name="comment"   class="form-control" rows="5" placeholder="Message"></textarea>
    </div>
     
 
  <input type="submit" name="Envoyer" value="ENVOYER"   class="button" />
 
      </div>
    </div>

    <script src="js2/jquery.min.js"></script>
    <script src="js2/popper.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>
  </form>
  </body>
</html>