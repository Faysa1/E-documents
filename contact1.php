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
            header("location:contact1.php?Empty= SVP Entrer les informations requis");
       } 
 
 else { 
 $s =  $_POST["subject"];
 $c =  $_POST["comment"];
 $date=date("Y-m-d H:i:s"); 
 $sql = "
 INSERT INTO comments (date_t,comment_subject, comment_text,comment_status)
 VALUES ('$date','$s', '$c','0')
 ";
 $t=mysqli_query($con, $sql);

    if(!$t)
    {
       header("location:contact1.php?Complete= un caractère ou un symbole non validé");
    }else { 
header("location:contact1.php?Complete= Votre traitment est bien effectué");}}
}
?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>QuickCloud - Hosting Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
 
  
 

<body class="host_version"> 

   <form   action="contact1.php" method="POST">
    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Se connecte</h4>
            </div>
             
        </div>
      </div>
    </div>

    <!-- LOADER 
    <div id="preloader">
        <div class="loader-container">
            <div class="progress-br float shadow">
                <div class="progress__item"></div>
            </div>
        </div>
    </div>-->
    <!-- END LOADER --> 

    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images/est2.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">À propos</a></li>
                        <li class="nav-item active"><a class="nav-link" href="contact1.php">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log" href="loginP.php" ><span>Se connecte</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header 
    
    <div class="all-title-box">
        <div class="container text-center">
            <h1>Contact<span class="m_1">Ecole Supérieure de Technologie , Casablanca.</span></h1>
        </div>
    </div>-->
    
    <div id="support" class="section wb">
        <div class="container-fulid">
            <div class="section-title text-center">
                <h3>Besoin d'aide? Bien sûr, nous sommes en ligne!</h3>
                <p class="lead">Laissez-nous vous donner plus de détails sur le site<p>
<p><font color="red"> VOUS AVEZ BESOIN D'AIDE !</font></p><br>Remplissez le formulaire ci-dessous. </p>
     
            </div><!-- end title -->

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
        </div><!-- end container -->
    </div><!-- end section -->
 


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>About nous</h3>
                        </div>
                        <p>L'Ecole Supérieure de Technologie de Casablanca ESTC est un établissement public d'enseignement supérieur à finalité professionnalisant. Elle a été créée en 1986 par le Ministère de l'Enseignement Supérieur, de la Formation des Cadres et de la Recherche Scientifique.</p>
                        <p>Ce site a été créé pour la gestion du formulaires.</p>
                    </div><!-- end clearfix -->
                </div><!-- end col -->

                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Liens d'information</h3>
                        </div>
                        <ul class="footer-links">
                            <li><a href="#">Accueil</a></li>
                            <li><a href="#">À propos</a></li>
                            <li><a href="#">Contact</a></li>
                             
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Détails du contact</h3>
                        </div>

                        <ul class="footer-links">
                            <li><a href="mailto:#">estcasa@est-uh2c.ac.ma</a></li>
                            <li><a href="#">www.est-uh2c.ac.ma</a></li>
                            <li>Ecole Supérieure de Technologie , Route d'Eljadida,
KM 7, CASABLANCA, Maroc</li>
                            <li>212614000420/21/22</li>
                            <li>212 522 252 245</li>
                        </ul><!-- end links -->
                    </div><!-- end clearfix -->
                </div><!-- end col -->
                
            </div><!-- end row -->
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left"> 

                    <p class="footer-company-name">Tous les droits sont réservés. &copy; 2020 <a href="#">ESTC</a> Design By : <a href="https://html.design/">Brahim Basidi ,</a>
                        <a href="https://html.design/"> Mohamed Elheimer</a></p>
                </div>

                <div class="footer-right">
                    <ul class="footer-links-soi">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    
                    </ul><!-- end links -->
                </div>
            </div>
        </div><!-- end container -->
    </div><!-- end copyrights -->


    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCKjLTXdq6Db3Xit_pW_GK4EXuPRtnod4o"></script>
    <!-- Mapsed JavaScript -->
    <script src="js/mapsed.js"></script>
    <script src="js/01-custom-places-example.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>

</body>
</html>


