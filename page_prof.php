 <?php
ob_start();
      session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Espace Chefs </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="css2/style.css"> 

    <style type="text/css">
      
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4); 
}

.modal-content {
  background-color: black ;
  margin: 15% auto; 
  padding: 20px;
  border: 1px solid #888;
  width: 80%; 
    border-radius: 24px;
  border: 2px solid black;
}
 
    .responsive {
    width: 100%;
 
  height: auto;
}
 


    </style>
  </head>
  <body>
     <form   action="releve.php" method="POST">

    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <div class="p-4 pt-5">
          <a href="page_prof.php" class="img logo rounded-circle mb-5" style="background-image: url(images2/prof.png);"></a>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="images2/ajouter.png">&nbsp;&nbsp;Ajouter</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="matiere.php" style="cursor: pointer;"  ><img src="images2/id.png">&nbsp;&nbsp;Matière</a>
                </li>
                 <li>
                    <a  href="releve.php" style="cursor: pointer;"><img src="images2/note.png">&nbsp;&nbsp;Notes</a>
                </li>
              
              </ul>
            </li>
            
            <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><img src="images2/conf.png">&nbsp;&nbsp;Modifier</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                 
               <li>
                    <a href="listem.php" style="cursor: pointer;"  ><img src="images2/id.png">&nbsp;&nbsp;Matière</a>
                </li>
                 <li>
                    <a  href="listen.php" style="cursor: pointer;"><img src="images2/note.png">&nbsp;&nbsp;Notes</a>
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
        ob_end_flush();
    }
 ?>
                  
                </li>
              </ul>
            </div>
          </div>
        </nav>
 <img src="images2/body2.png" class="responsive"  align="center">
        <?php 
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div class="message" style="color: red;"><?php echo $_GET['Empty'] ?></div>                                
                    <?php
                        }
                    ?>
 
 
                    <?php 
                        if(@$_GET['Invalid']==true)
                        {
                    ?>
                        <div class="message" style="color: red;"><?php echo $_GET['Deja'] ?></div>                                
                    <?php
                        }
                    ?>


                    <?php 
                        if(@$_GET['Complete']==true)
                        {
                    ?>
                        <div class="message" style="color: red;"><?php echo $_GET['Complete'] ?></div>                                
                    <?php
                        }
                    ?>
    
      </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close" id="close" style="cursor: pointer;">&times;</span>
           
              <p style="color: white" align="center">Code  Departement<br />
                 <input  type="radio" name="type" value="1">Semester 1<br />
              <input  type="radio" name="type" value="2">Semester 2 <br />
              <input  type="radio" name="type" value="3">Semester 3<br />
              <input  type="radio" name="type" value="4">Semester 4 </p>
           
<input style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto; width: 200px; "    type="text" name="code">
<input style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto;  width: 200px;   cursor: pointer" type="submit" name="envoyer" value="envoyer">
            </form>
        </div>

    </div>
   
<script type="text/javascript">
  var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
 




btn.onclick = function() {
  modal.style.display = "block";
}

 
span.onclick = function() {
  modal.style.display = "none";
}
 




window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
   
 
  
}
</script>
    <script src="js2/jquery.min.js"></script>
    <script src="js2/popper.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>
  </form>
  </body>
</html>