  <?php
ob_start();
      session_start();
    ?>
    <?php 
/******insertion notes ********/



      $con=mysqli_connect("localhost","root","","gestion");
      
if (isset($_POST['envoyer_note'])){ 
$a=$_POST['envoyer_note'];

 $b=$_POST['type'];
 $e=$_POST['classe'];

    $sql=" SELECT * FROM eleve WHERE classe='$e'   And coded='$a'";
   

      $sql2="SELECT * FROM matiere WHERE  semester='$b' And  coded='$a' ";
    $result = mysqli_query($con,$sql);
      $result2= mysqli_query($con,$sql2);
 

//sizeof :
      $x =0;
      while ( $row1 = mysqli_fetch_array($result2) ) { $l[] =  $row1['cofm']; }
      $x = sizeof($l);
     // echo $x;
//sizeof :
    $I=0;
while($row = mysqli_fetch_array($result)){
 $I++; 
 $numel[] = $row['numel'];
 }
//echo $I;
//echo $I; echo '<br>';

 $sql3 ="SELECT * FROM matiere WHERE  coded='$a' and semester='$b' "; 
   $result7 = mysqli_query($con,$sql3);

while($row = mysqli_fetch_array($result7)){
 
 $cof[] = ((($row['cofm']*25)/100)/100);
 }
 //for ($i=0; $i < sizeof($cof) ; $i++) { 
  //echo '&nbsp'; echo $cof[$i];
 //}


  for ($i =1 ; $i <= $x ; $i++ ){ 
 $code[] = 'M'.$b.''.$i.'' ;

  }
 
$y=$x*$I ;
//$note_f=0;
$note_cof=0;
for ($o = 0 ; $o < $I ; $o++){ 

  for ($i =0 ; $i < $x ; $i++ ){ 
$ps = $_POST[''.$numel[$o].''.$code[$i].''];
//echo $ps ;
$no = ''.$numel[$o].'';
$np = ''.$code[$i].'';
$sql="INSERT INTO note (numel,codem,valeur) VALUES ('$no','$np','$ps')";
  mysqli_query($con,$sql);
 



}  
 

}
// NOTES GENERAL
for ($o = 0 ; $o < $I ; $o++){ 
$note_cof=0;
for ($i=0; $i < $x ; $i=$i+1) { 

$yu = $_POST[''.$numel[$o].''.$code[$i].''];
    
$note_cof = $note_cof + $cof[$i]*$yu;
$note_f[]=$note_cof;
 
} 
 $note_t[]= $note_cof ;
}
for ($i=0; $i < sizeof($note_t) ; $i++) { 
$ne = ''.$numel[$i].'';
 $b=$_POST['type'];
$cnf = 'NF'.$numel[$i].'S'.$b.'';
$nf= $note_t[$i];
//echo $np; echo '&nbsp; '; echo $note_t[$i];    echo '<br>';
$req="INSERT INTO note (numel,codem,valeur) VALUES ('$ne','$cnf','$nf')";
  mysqli_query($con,$req);


}
//END NOTE GENERALE
// NOTES DE MODULES

 $n1=0;

 for ($i=1; $i <= 4 ; $i++) { 

  $m= 'M'.$i.'';
$sql="SELECT * FROM matiere WHERE  semester='$b' And  coded='$a' and codemo='$m' "; 
   $result = mysqli_query($con,$sql);
       
while($row = mysqli_fetch_array($result)){
 $cof1[] = ($row['cofm']/100);
$mat[] = $row['codem']; 
}
$N =sizeof($mat) ;

for ($o = 0 ; $o < $I ; $o++){                                                                                                                                                                                                                                                          
$note_cof=0;    
for ($n=$n1  ; $n < $N ; $n++) {
 
$yu = $_POST[''.$numel[$o].''.$mat[$n].''];
$note_cof = $note_cof + $cof1[$n]*$yu;

  
}


$note_z[]=$note_cof;

}
$n1 = $n;


}

                                                                                                                            

//for ($p=0; $p < 4 ; $p++) { 
    for ($o = 0 ; $o < $I ; $o++){ 
$v = $o;
$ii = 1;
//echo $v; echo '<br>' ;
   for ($i=$v; $i < sizeof($note_z) ; $i=$i+$I ) { 

    
$ne = ''.$numel[$o].'';
 $b=$_POST['type'];
$cnf = 'M'.$ii.'S'.$b.'';
$nf= $note_z[$i];
// echo $note_z[$i];  echo '<br>';
//echo $cnf;  echo '&nbsp; |'; echo $note_z[$i];    echo '&nbsp;|'; echo $ne;  echo '<br>' ;
$req="INSERT INTO note (numel,codem,valeur) VALUES ('$ne','$cnf','$nf')";
  mysqli_query($con,$req);
 $ii++;

 } 
}
  //}
 // END NOTES MODULES

header("location:page_prof.php?Complete= Votre traitment est bien effectué ");
}


 
    

  
 

 


    ?>
   <?php
   /*****************ENVOIS D'INFOS************************/
      $con=mysqli_connect("localhost","root","","gestion");
 
 if(isset($_POST['envoyer'])){
  if(empty($_POST['code'])){

 header("location:page_prof.php?Empty=Entrer les informations requis");
}
else { 
 $a=$_POST['code'];
 $b=$_POST['type'];
 if ($b == 1 or $b == 2){$e=1; }else { $e=2;}
  $sql1=" SELECT * FROM eleve WHERE  coded='$a' and classe='$e' ";
    $result1 = mysqli_query($con,$sql1); 
                   
                    if (mysqli_fetch_assoc($result1))
                        { 
                             $a=$_POST['code'];
 $b=$_POST['type'];
  $sql=" SELECT * FROM  eleve WHERE eleve.classe='$e'   And eleve.coded='$a'   ";
  $sql1="SELECT * FROM matiere WHERE semester='$b' And coded='$a' ";
  $sql2="SELECT * FROM matiere WHERE  semester='$b' And  coded='$a' ";
 
                          
                        }
else { 

   header("location:page_prof.php?Deja=Code departement n'existe pas");
   
}
                      }
 



 }
 else { 
 $a='';
 $b='';
 $e='';

  $sql=" SELECT * FROM eleve WHERE classe='$b'   And coded='$a'";
  $sql1="SELECT * FROM eleve WHERE classe='$b'   And coded='$a'";
  $sql2="SELECT * FROM eleve WHERE classe='$b'   And coded='$a'";
 

 


}
  $result = mysqli_query($con,$sql);
  $result1= mysqli_query($con,$sql1);
  $result2= mysqli_query($con,$sql2);
 
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Espace Chefs | Relevé de Note</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="css/style.css"> 
           <link rel="stylesheet" href="stylesF.css"> 
             <link rel="stylesheet" href="css2/style.css">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

    border: 0px solid;
    color: #CCC;
    margin: 10px 0;
    background: transparent;
    border-bottom: 2px solid #38ada9;
    padding: 10px;
    color: black;
    width: 100%;
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
  
 
 
 <?php

 echo '  <div class="wrapper">
  <div class="contact-form">
    <div class="input-fields">';
     if (empty($_POST['envoyer'])){    

 
    echo '       
              <p style="color: white" align="center"><br />
                 <input class="w3-check" type="radio" name="type" value="1">&nbsp;Semestre 1<br />
              <input class="w3-check" type="radio" name="type" value="2">&nbsp;Semestre 2 </p><br /></div>  
 
   <div class="input-fields"><p style="color: white" align="center"><br />
      <input class="w3-check" type="radio" name="type" value="3">&nbsp;Semestre 3<br />
              <input  class="w3-check" type="radio" name="type" value="4">&nbsp;Semestre 4 </p></div>
 <div class="msg"><br />
  <input    type="text" name="code" placeholder="Code  Departement">
<button name="envoyer" class="button" > envoyer</button>
 </div></div></div>';}
    if (isset($_POST['envoyer'])){ 
        echo '        <div class="table-responsive">
       <table class="table table bordered"   cellspacing="0" cellpadding="3" align="center" width="100%"> 
      <thead><tr>
             
               
                <th   style="background-color: #38ada9"> <p align="center">Nom/Prenom</p></th>  
                ';
         //      <th   style="background-color: #38ada9"  ><p align="center">N°</p></th> 

               ?>
                <?php 
        while($row = mysqli_fetch_array($result1)){  

         echo '       <th   style="background-color: #38ada9"> '.$row['codem'].'<br><h6>'.$row['nomm'].'</6> </th>';
       }     ?>

           <?php 
           echo ' </tr> </thead>'; ?>
<?php 
  // $x =0; 
$j[]='';
                while ( $row1 = mysqli_fetch_array($result2) ) {  
              //  $x++ ; 
$j[]  = $row1['codem'];
$k[] = $row1['nomm'];
  }$x = sizeof($j)-1;
  //echo ''.$x.'';
  echo '<br>';

 $I=0;
while($row = mysqli_fetch_array($result)){
 $I++;
 
echo ' <tbody>
          <tr>  
        
                  <td color="red" align="center" data-label="Prenom - Nom">'.$row["prenomel"].'&nbsp;'.$row['nomel'].'</td>   
            ';
 //                 <td align="center">   <input type="text"  name="'.$I.'" min="0"  size="3" value="'. $row['numel'].'" >'.$I.'      </td>
 

 for ( $y=1 ; $y <= $x ; $y++){

 echo'
 <td align="center" data-label="M'.$b.''.$y.'&nbsp; | &nbsp;'.$k[$y-1].'"><input type="numeric" name="'. $row['numel'].'M'.$b.''.$y.'"  class="input" maxlength="5" size="3" requis/>';


  }}  // echo ''.$I.''; 
  ?>
<?php
echo '</td>' ;
 echo '</tr>'; 
echo ' <tbody>
<tr><th>      <p> <input class="w3-check" type="checkbox" name="classe" value="'.$e.'"   style=" cursor: cross;" checked="checked"> 
      <label><small>Confirmation du Semestre</small></label></p><p>
  <input   class="w3-check" type="checkbox" name="type"  value="'.$b.'" size="1" style=" cursor: cross;" checked="checked">
  <label><small>Confirmation du  Classe</small></label></p></th></tr></table></div>' ;
 }
            ?>
       

 <?php


?>                                        



     
                 
  


         
<!--
    <?php
    if(isset($_POST['envoyer1'])){

   echo '<table class="content-table" style="background: white;" cellspacing="0" cellpadding="3"  align="center" width="100%"> 
     <tr>  
                <th   style="background-color: white"> <p align="center">Nom de matiére</p></th> 
                 <td align="center">   <input type="text" name="NF"  class="input"   size="9">     </td></tr>
                   <tr>  
                <th   style="background-color: white"> <p align="center">Code matiére</p></th> 
                 <td align="center">   <input type="text" name="NF"  class="input"   size="9">     </td></tr>
                   <tr>  
                <th   style="background-color: white"> <p align="center">Seméster</p></th> 

                 <td align="center">  <input type="number" id="quantity" name="quantity" min="1" max="4" step="1">        </td></tr>

    </table> ';} 

 ?>-->
 <?php
  if (isset($_POST['envoyer'])){ echo ' 
<p align="center"> <button name="envoyer_note" class="button" value="'.$a.'" >Enregistrer</button></p>';}
   ?>

    


    
 
  

 
    <script src="js2/jquery.min.js"></script>
    <script src="js2/popper.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>
  </form>
  </body>
</html>