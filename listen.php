 <?php
ob_start();
      session_start();
    ?>
   <?php 
      $con=mysqli_connect("localhost","root","","gestion");
 $test=0;
 if(isset($_POST['Envoyer'])){
  if(empty($_POST['nom']) && empty($_POST['sem']) && empty($_POST['code'])){

 header("location:listen.php?Empty=Entrer les informations requis");
}
else { 
 $a= $_POST['nom'];
 $b= $_POST['sems'];
$c =  $_POST['code'];
$sql2=" SELECT * FROM eleve WHERE numel='$a'";

  $sql1=" SELECT * FROM matiere WHERE coded='$c' and semester='$b'";

  }
 
 }
 else { 
  $a= $b =$c ='';
  $sql1="SELECT * FROM matiere WHERE coded='$c' and semester='$b'";
  $sql2=" SELECT * FROM eleve WHERE numel='$a'";
  
}
    $result1 = mysqli_query($con,$sql1); 
    $result2 = mysqli_query($con,$sql2); 
 
                       if   (isset($_POST['Envoyer'])){       if (mysqli_num_rows($result2) != 1)
                        {   $test=1;
                          header("location:listen.php?Dèja=informations n'existe pas ");
                                
                        }}
                   
?>
 
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Relevé de Note | Modification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  <link rel="stylesheet" href="css/style.css"> -->
           <link rel="stylesheet" href="stylesF.css"> 
             <link rel="stylesheet" href="css2/style.css">
                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
  width: 25%; 


    border-radius: 24px;
  border: 2px solid black;
}
  
input {
    background-color: transparent;
    border: 0px solid;
    height: 20px;
    width: 160px;
    color: black;
    cursor: crosshair;
}
    </style>

  </head>
  <body>
     <form   action="listen.php" method="POST">
   

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
         <h2 class="mb-4" align="center"> </h2>
        
<br>
<div class="wrapper">
  <div class="contact-form">
   
 <div class="input-fields">
    
                    <input type="text"  class="input"  name="nom" placeholder="Numero d'étudiant"  ></div>
                    <div class="input-fields">
                    <input type="text"  class="input"  name="sems" placeholder="Semestre"  ></div>
              
                     <div class="input-fields">
                    <input type="text"  class="input"  name="code" placeholder="Code déprtement"  >
                      <button name="Envoyer" class="button">Afficher </button></div>
</div> </div>
 
                                                
 
 
 
 


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
                    <div class="table-responsive">
          <table class="table table bordered">
  </div> 
<?php 
while ($row = mysqli_fetch_array($result2)) {
echo ' <tr><th width="15%"   >Numero </th>   <th width="10%" >'.$row['numel'].' </th></tr>
<tr><th width="15%"   >Nom et Prenom </th>   <th width="10%" >'.$row['nomel'].' '.$row['prenomel'].' </th></tr>
';
}
 $size[]='';
 while ($row = mysqli_fetch_array($result1)) {
  $size[]=$row['id'];
  $mat[]=$row['nomm'];
 }
$size1=sizeof($size);

for ($i=1; $i <= $size1 ; $i++) { 
   $sql=" SELECT * FROM note WHERE numel='$a' and codem='M".$b."".$i."'  ";
$resultd= mysqli_query($con,$sql); 
    $result = mysqli_query($con,$sql); 
    while ($row = mysqli_fetch_array($result)) {
   echo '<tr><th width="15%"   >'.$mat[$i-1].' </th>   <th width="10%" ><input value="'.$row['valeur'].'" name="'.$row['codem'].'" ></th></tr>';
    }
}

if (isset($_POST['Envoyer']) OR $test==1 ){
echo '<tr><th width="100%">
<input  class="w3-check"  type="checkbox" value="'.$b.'" name="sems"><label><small>&nbsp;Vous etes sur </small></label><br> 
 <input  class="w3-check"  type="checkbox" value="'.$c.'" name="cod"><label><small>&nbsp;Confirmer le </small></label>
 </th> 
 <th></th></tr></table>';
echo '<p align="center"><button value="'.$a.'" name="enr" class="button">Sauvgarder</button><p>';
}


 $NF = 0;
if(isset($_POST['enr'])){ 
$a=$_POST['enr'];
$b=$_POST['sems'];
$c=$_POST['cod'];


  #################
 $n1=0;

 for ($i=1; $i <= 4 ; $i++) { 

 $m= 'M'.$i.'';
$sqlns="SELECT * FROM matiere WHERE  semester='$b' And  coded='$c' and codemo='$m' "; 
$resultns = mysqli_query($con,$sqlns);
   
while($row = mysqli_fetch_array($resultns)){
  $cof1[] = ($row['cofm']/100);
 $matt[] = $row['codem']; 
}

$N =sizeof($matt) ;

                                                                                                                                                                                                                                                         
$note_cof=0;    
for ($n=$n1  ; $n < $N ; $n++) {
 
  $yu = $_POST[$matt[$n]];
 
  $note_cof = $note_cof + $cof1[$n]*$yu;
 

  
}


$note_z[]=$note_cof;

 
$n1 = $n;


}
for ($i=0; $i <4 ; $i++) { 
  $ii = $i+1; 
$sqlse=" UPDATE note SET valeur='".$note_z[$i]."'  WHERE numel='$a' and codem='M".$ii."S".$b."'  ";
mysqli_query($con, $sqlse);
}
 $NF1= array_sum($note_z);
  $NF =$NF1/4;
$sqlnf=" UPDATE note SET valeur='$NF'  WHERE numel='$a' and codem='NF".$a."S".$b."'  ";
mysqli_query($con, $sqlnf);

 for ($i=1; $i <= $N ; $i++) { 
   $sql=" SELECT * FROM note WHERE numel='$a' and codem='M".$b."".$i."'  ";
$resultd= mysqli_query($con,$sql); 
    while ($row = mysqli_fetch_array($resultd)) { 
      $v= $_POST[$row['codem']];
 $sql=" UPDATE note SET valeur='$v'  WHERE numel='$a' and codem='".$row['codem']."'  ";
mysqli_query($con, $sql);}
   }
 

}
?>
<?php 



?>
  <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close" id="close" style="cursor: pointer;">&times;</span>
     
      <p style="color: white" align="center"><br />
                
           
<input style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto; width: 200px; "    type="text" name="text">
<button style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto;  width: 200px;   cursor: pointer" name="modifier" value='.$a.' >
       envoyer </button>     </form>
        </div>

    </div> 
 
<script type="text/javascript">
  var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
var modal1 = document.getElementById("myModal");
var btn1 = document.getElementById("myBtn1");
var span1 = document.getElementsByClassName("close")[0];



btn.onclick = function() {
  modal.style.display = "block";
}
btn1.onclick = function() {
  modal.style.display = "block";
}


span.onclick = function() {
  modal.style.display = "none";
}
span1.onclick = function() {
  modal.style.display = "none";
}


window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
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