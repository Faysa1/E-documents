 <?php
ob_start();
      session_start();
    ?>
   <?php 
      $con=mysqli_connect("localhost","root","","gestion");
 


  if(isset($_POST['Envoyer'])){ 

    $a=$_POST['semestre'];
 $b=$_POST['code'];

 $sql=" SELECT * FROM matiere WHERE semester='$a' and coded='$b' "; }
else {$a=''; $b=''; $sql=" SELECT * FROM matiere WHERE semester='$a' and coded='$b' ";  }

      $result = mysqli_query($con,$sql);
 $result2= mysqli_query($con,$sql);
 
 


    //SUPPRIMER
 
    
    if (isset($_POST['sup'])){ 
$a=$_POST['sel'];
    // $c= $_POST['numero'];
    $sqlr = "SELECT FROM matiere WHERE id='$a' ";
 
    $sql1 = "DELETE FROM matiere WHERE id='$a' ";
   $resultat1 = mysqli_query($con, $sql1); 
   if ($resultat1 == FALSE) { echo 'Echec de l exécution de la requête';} 
   else { echo "Votre traitment est bien effectué "; }

      $result = mysqli_query($con,$sqlr);
 }



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Matiére | Modification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css2/style.css"> 
           <link rel="stylesheet" href="stylesF.css"> 
       
    <style type="text/css">
       button {
    background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;
}
      .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #38ada9;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 14px;
  padding: 2px;
  width: 90px;
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
 
@media(max-width: 500px){
  .table thead{
    display: none;
  }

  .table, .table tbody, .table tr, .table td{
    display: block;
    width: 100%;
  }
  .table tr{
    margin-bottom:15px;
  }
  .table td{
    text-align: right;
    padding-left: 50%;
    text-align: right;
    position: relative;
  }
  .table td::before{
    content: attr(data-label);
    position: absolute;
    left:0;
    width: 50%;
    padding-left:15px;
    font-size:15px;
    font-weight: bold;
    text-align: left;
  }
}
  
input {
    background-color: transparent;
    border: 0px solid;
    height: 20px;
    width: 160px;
    color: black;
}
    </style>
  </head>
  <body>
     <form   action="listem.php" method="POST">
     
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

<div class="wrapper">
  <div class="contact-form">
    <div class="input-fields"> 
     
     
  
 
                    <input type="text"  class="input"  name="semestre" placeholder="Semestre"  >
                    <input type="text"  class="input"  name="code" placeholder="Code Departement"  >


                      <div><button name="Envoyer" class="button">Afficher </button>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                

                    <?php 



if(isset($_POST['Envoyer'])){
echo ' 
     
       
        
                    <button  name="sup" class="button" value='.$a.'>Supprimer</button></div>
        ';
        }
 ?>
 
  </div>
 

 </div> </div> 
 <?php
 if (isset($_POST['mod'])){
$a=$_POST['sel'];
    $sql = "SELECT * FROM matiere   WHERE id='$a' ";
    $resultt = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_array($resultt) ) {
 
 
echo ' <div class="table-responsive">
          <table class="table table bordered">';
          echo '<tr><td style="background-color: #38ada9">Matière</td>
          <td ><input type="text" name="nomm" value="'.$row['nomm'].'"></td></tr>
          <tr><td style="background-color: #38ada9">Code matière</td>
          <td><input type="text" name="codem" value="'.$row['codem'].'" pattern="[M]{1}[0-9]{2}" ></td></tr> 
          <tr><td style="background-color: #38ada9">  Module</td>
          <td><input type="text" name="nommo" value="'.$row['nommo'].'"></td></tr> 
          <tr><td style="background-color: #38ada9">Code module</td>
          <td><input type="text" name="codemo" value="'.$row['codemo'].'" pattern="[M]{1}[0-9]{1}" ></td></tr> 
          <tr><td style="background-color: #38ada9">Coefficient</td>
          <td><input type="text" name="cofm" value="'.$row['cofm'].'"></td></tr> 
          <tr><td style="background-color: #38ada9">Semestre</td>
          <td><input type="number" min="1" max="4" step="1" name="semester" value="'.$row['semester'].'" min="1" max="4" step="1"></td></tr>  
          </table> <input type="checkbox" name="valid" value="'.$row['id'].'" >
          <button name="update" value="'.$row['coded'].'">sauvgarder</button>';
   }
    
 
}
$a='';
if (isset($_POST['update'])){
  $a=$_POST['valid'];
$sql=" SELECT * FROM matiere WHERE semester='".$_POST['semester']."' and coded='".$_POST['update']."' ";
  $sql1 = "UPDATE matiere SET nomm='".$_POST['nomm']."',
                                codem='".$_POST['codem']."',
                                nommo='".$_POST['nommo']."', 
                                codemo='".$_POST['codemo']."',
                                cofm='".$_POST['cofm']."',
                                semester='".$_POST['semester']."'
     WHERE id='$a' ";
       mysqli_query($con, $sql1);

      $result = mysqli_query($con,$sql);
}
 ?>

        <?php
    if (isset($_POST['Envoyer']) or isset($_POST['update']) ){ 
 
echo '
<div class="table-responsive">
       <table class="table table bordered" style="background: white;" cellspacing="0" cellpadding="3" align="center" width="100%">  
    <thead>
           <tr>  
                <th width="1%" style="background-color: white">Matière</th>   
                <th width="1%" style="background-color: #38ada9">Code matière</th>
                <th width="1%" style="background-color: #38ada9">Module</th>
                 <th width="1%"  style="background-color: #38ada9">Code module</th>
                 <th width="1%"  style="background-color: #38ada9">Coefficient</th>
                 <th width="1%"  style="background-color: #38ada9">Semestre</th>
                 <th width="1%"  style="background-color: #38ada9"></th>
              


                

                
                
           </tr></thead>'; }

while($row = mysqli_fetch_array($result)){
 


echo '
          <tbody>
          <tr active-row>  
                       <td width="1%" data-label="Matière">'. $row['nomm'].'</td> 
                          <td width="1%" data-label="Code matière">'.$row["codem"].'</td> 
                          <td width="1%" data-label="Module">'.$row["nommo"].'</td> 
                          <td width="1%" data-label="Code module">'.$row['codemo'].'</td>
                          <td width="1%" data-label="Coefficient">'.$row["cofm"].'%</td> 
                          <td width="1%" data-label="Semestre">'.$row["semester"].'</td> 
                          <td width="1%" align="right"><input type="radio"  name="sel" value="'. $row['id'].'" ></td>
                         
                         
                         

                     </tr></tbody> ' ;

}    if (isset($_POST['Envoyer']) or isset($_POST['update']) ){ 
echo '</table>
<p align="center"><button name="mod"><img src="images2/modifier.png"></button>
                          <button  name="sup"> <img src="images2/supprimer.png"> </button></p></div> ';}


    ?>

 
       <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close" id="close" style="cursor: pointer;">&times;</span>
           
       
        </div>

    </div>
 
   

    
 
  

 
    <script src="js2/jquery.min.js"></script>
    <script src="js2/popper.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>

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
  </form>
  </body>
</html>