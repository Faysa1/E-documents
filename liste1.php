 <?php
ob_start();
      session_start();
    ?>
   <?php 
      $con=mysqli_connect("localhost","root","","gestion");
 
 if(isset($_POST['Envoyer'])){
  if(empty($_POST['nom'])){

 header("location:liste1.php?Empty=Entrer les informations requis");
}
else { 
 $a=$_POST['nom'];
  $sql1=" SELECT * FROM eleve WHERE numel='$a' ";
    $result1 = mysqli_query($con,$sql1); 
                   
                    if (mysqli_num_rows($result1) != 1)
                        { 
                          header("location:liste1.php?Dèja=cne ou cni n'existe pas");
                                
                        }
else { 
   $a=$_POST['nom'];
  $sql=" SELECT * FROM eleve WHERE numel='$a'  ";

   
}
                      }



 }
 else { 
  $a='';
  $sql=" SELECT * FROM eleve WHERE numel='$a' ";
}
  $result = mysqli_query($con,$sql);


    //SUPPRIMER
 
    
    if (isset($_POST['sup'])){ 
    // $c= $_POST['numero'];
      $c=$_POST['sup'];
    $sql1 = "DELETE FROM eleve WHERE numel='$c' ";
   $resultat1 = mysqli_query($con, $sql1); 
   if ($resultat1 == FALSE) {header("location:liste1.php?Complete= Echec de l'exécution de la requête.");} 
   else { header("location:liste1.php?Complete= Votre traitment est bien effectué "); }
 }
?>
 <?php
 $cne = 'Cne';
 $cni = 'Cni';
 $nom = 'Nom';
 $prenom = 'Prénom';
 $date= 'Date Naissance';
 $lieu= 'Lieu Naissance';
 $adresse= 'Adresse';
 $dep= 'Département';
 $classe = 'Classe';

 ?>

 
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Etudiants | Modification  </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--  <link rel="stylesheet" href="css/style.css"> -->
           <link rel="stylesheet" href="stylesF.css"> 
             <link rel="stylesheet" href="css2/style.css">
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

    border: 0px solid;
    color: #CCC;
 
    background: transparent;
    border-bottom: 2px solid #38ada9;
    
    color: black;

}

    </style>

  </head>
  <body>
     <form   action="liste1.php" method="POST">
   

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
         <h2 class="mb-4" align="center"> </h2>
        
<br>
<div class="wrapper">
  <div class="contact-form">
    <div class="input-fields"> 
   
                    <input type="text"  class="input"  name="nom" placeholder="Numero d'étudiant"  >
                      <div><button name="Envoyer" class="button">Afficher </button>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                

                    <?php 

/*                    if(isset($_POST['modifier'])){
      echo '    <input type="text"  class="input" name="nome" placeholder="Nom d étudiant" >
                <input type="text"  class="input" name="prenome" placeholder="Prenom d étudiant" >
      <input type="text"  class="input" name="lieu" placeholder="Lieu de naissance" >
      <input type="date"  class="input" name="date" placeholder="Date de naissance" > 
  
      <input type="text"  class="input" name="adr" placeholder="Adresse" >
      <input type="text"  class="input" name="tele" placeholder="telephone" >
      <input type="text"  class="input"  class="input" name="Cni" placeholder="Cni" >
      <input type="text"  class="input" name="Cne" placeholder="Cne" >  </br>
  '; }*/

if(isset($_POST['Envoyer'])){
echo ' 
     
       
        
                    <button  name="sup" class="button" value='.$a.'>Supprimer</button></div>
        ';
        }
 ?>
 
  </div>
 

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

  
 

        <?php 
        $tab =array ("cne",'cni','nomel','prenomel','date_naissance','lieu_naissance','adresse','telephone','dep','classe');

        for ($i=0; $i <= 9 ; $i++) { 
      
  
        $r = $tab[$i] ;
  if (isset($_POST[''.$i.''])) { $a= $_POST[''.$i.''];
      $sql=" SELECT * FROM eleve WHERE numel='$a' ";
        $result1 = mysqli_query($con,$sql);
    
echo ' <div class="table-responsive">
          <table class="table table bordered">
  </div>  <tr> <th width="15%"   >Numero </th><th width="10%" >'.$a.'</th></tr>
<tr> <th style="background-color: #C0E9E7">'.$tab[$i].' </th>
<th>';
if($i=='0'){while ( $row1 = mysqli_fetch_array($result1)){
  echo ' <input type="text"  class="input"name="update" placeholder="Cne" 
 value="'.$row1[$tab[$i]].'" pattern="[A-Z]{1}[0-9]{9}" > ';  } }

else if($i=='1'){while ( $row1 = mysqli_fetch_array($result1)){echo ' <input type="text" value="'.$row1[$tab[$i]].'"  class="input"  class="input" name="update" placeholder="Cni" pattern="[A-Z]{2}[0-9]{5,6}">';  }  }

else if($i=='4'){ while ( $row1 = mysqli_fetch_array($result1)){echo '  <input type="date" value="'.$row1[$tab[$i]].'"  class="input" name="update" placeholder="Date de naissance" >';  } }

else if($i=='7'){while ( $row1 = mysqli_fetch_array($result1)){echo '      <input type="tel"  value="'.$row1[$tab[$i]].'" class="input" name="update" placeholder="téléphone" pattern="[0-9]{10}">';  }  }

else if($i=='8'){while ( $row1 = mysqli_fetch_array($result1)){echo '<input type="radio" name="update"   value="GI"  >&nbsp;&nbsp;GI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="update"   value="GE"  >&nbsp;&nbsp;GE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="update"   value="GM"  >&nbsp;&nbsp;GM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="update"   value="GP"  >&nbsp;&nbsp;GP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="update"   value="TM"  >&nbsp;&nbsp;TM ';  }  }
else if($i=='9'){while ( $row1 = mysqli_fetch_array($result1)){
  echo '  <input type="number" name="update" min="1" max="2" step="1" value="'.$row1[$tab[$i]].'">';  } }

else{ 
while ( $row1 = mysqli_fetch_array($result1)){  
echo '<input type="text"  class="input" name="update"   placeholder="Nom détudiant "  pattern="[A-Z ]*" value="'.$row1[$tab[$i]].'" >';} }


      echo '</th>
<th align="right" width="1%" style="background-color: #C0E9E7" >Confirmer &nbsp;<input type="checkbox" value="'.$a.'" name="eh" required></th></tr>

</table></div><button name="en" value="'.$tab[$i].'" class="button"> 
Enregistrer</button>';
 }



}  

//echo $tab[$i];

 if (isset($_POST['en'])){   

if ( $_POST['update'] == "GI"){$j='ESTCGi2020';
 $sq="UPDATE eleve SET coded='".$j."'  WHERE  numel='".$_POST['eh']."' ";
  mysqli_query($con, $sq);}
  if ( $_POST['update'] == "GE"){$j='ESTCDGE';
$sq="UPDATE eleve SET coded='".$j."'  WHERE  numel='".$_POST['eh']."' ";
 mysqli_query($con, $sq);}
    if ( $_POST['update'] == "GM"){$j='ESTCDGM';
  $sq="UPDATE eleve SET coded='".$j."'  WHERE  numel='".$_POST['eh']."' ";
 mysqli_query($con, $sq);}
      if ( $_POST['update'] == "GP"){$j='ESTCDGP';
    $sq="UPDATE eleve SET coded='".$j."'  WHERE  numel='".$_POST['eh']."' ";
   mysqli_query($con, $sq);}
        if ( $_POST['update'] == "TM"){$j='ESTCDTM';
      $sq="UPDATE eleve SET coded='".$j."'  WHERE  numel='".$_POST['eh']."' ";
     mysqli_query($con, $sq);}
 

  $sql="UPDATE eleve SET ".$_POST['en']."='".$_POST['update']."'  WHERE  numel='".$_POST['eh']."' ";     
              mysqli_query($con, $sql);
                 $sql1=" SELECT * FROM eleve WHERE numel='".$_POST['eh']."' ";
                $result = mysqli_query($con,$sql1);
             }

while($row = mysqli_fetch_array($result) ){
$n =''. $row['numel'].'' ; 

echo '

<div class="table-responsive">
          <table class="table table bordered">
  </div> 

 <tr>  <th width="10%" style="background-color: #C0E9E7" >'.$cne.'</th> 

  <th style="background-color: #C0E9E7"> '.$row["cne"].' </th> 
  <th align="right" width="1%" style="background-color: #C0E9E7" > <button name="0" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th>      </tr>


  <tr>  <th width="10%" >'.$cni.'</th>
   <td  >'.$row["cni"].'</td>
<th align="right" width="1%" ><button name="1" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" id="myBtn1" ></button></th></th>      </tr>     
  
  <tr>  <th width="10%" style="background-color: #C0E9E7"> '.$nom.'</th> 
  <th style="background-color: #C0E9E7">'.$row['nomel'].'
 <th align="right" width="1%" style="background-color: #C0E9E7"><button name="2" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th>                                           </th></tr> 
  <tr>  <th>Prenom</th>  <td>'.$row["prenomel"].'
  <th align="right" width="1%"  > <button name="3" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th>                                          </td></tr>     
   <tr>  <th width="10%" style="background-color: #C0E9E7">Date naissance</th>
     <th style="background-color: #C0E9E7">'.$row["date_naissance"].'
  <th align="right" width="1%" style="background-color: #C0E9E7"> <button name="4" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th></th>      </tr>    
  <tr>  <th width="10%"  >Lieu naissance</th> <td>'.$row["lieu_naissance"].'
   <th align="right" width="1%"  > <button name="5" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th></td>       </tr>   
    <tr>  <th width="10%" style="background-color: #C0E9E7">Adresse</th>
    <th style="background-color: #C0E9E7">'.$row["adresse"].'
  <th align="right" width="1%" style="background-color: #C0E9E7"> <button name="6" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th></th></tr> 
  <tr>  <th width="10%"  >Telphone</th><td>'.$row["telephone"].'
    <th align="right" width="1%"  > <button name="7" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th></td>       </tr> 
    <tr>  <th width="10%"  style="background-color: #C0E9E7">Departement</th>
    <th style="background-color: #C0E9E7"  >'.$row["dep"].'
  <th align="right" width="1%" style="background-color: #C0E9E7"> <button name="8" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th></th></tr>
  <tr>  <th width="10%"  >Classe</th>                        
                          <th>'.$row["classe"].'  <th align="right" width="1%">
                   
 <button name="9" value="'.$n.'"> 
 <img style="width: 12px; height: 12px" src="images/modifier.png" ></button></th></th>     </tr>  
  ' ;
}
echo '</table></div>';
/*
echo '<p>numero'. $row['numel'].'</p>
      <p>Nom'. $row['nomel'].'</p>



       ';}*/

    ?>
  <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close" id="close" style="cursor: pointer;">&times;</span>
    <?php        
      echo '         <p style="color: white" align="center"><br />
                
           
<input style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto; width: 200px; "    type="text" name="text">
<button style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto;  width: 200px;   cursor: pointer" name="modifier" value='.$a.' >
       envoyer </button>     </form>
        </div>

    </div>'; ?>
   <!-- <div id="myModal1" class="modal">
        <div class="modal-content">
          <span class="close1" id="close" style="cursor: pointer;">&times;</span>
           
              <p style="color: white" align="center">numero d'etudiant
<input style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto; width: 200px; "    type="text" name="numero"> </p>      
        <p style="color: white" align="center">ancien Cne
<input style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto; width: 200px; "    type="text" name="Cne"></p>
<input style="border: 0; border-radius: 24px; border: 2px solid #191919;  border-radius: 24px; border: 2px solid #191919; text-align: center; display: block; margin: 20px auto;  width: 200px;   cursor: pointer" type="submit" name="envoyer" value="envoyer">
            </form></tr> 
        </div>

    </div> -->
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