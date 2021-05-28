<?php
ob_start();
      session_start();
    ?>
   <?php 
      
   $con=mysqli_connect("localhost","root","","gestion");
 if(isset($_POST['t'])){ 
 $a=$_POST['t'];

 if(isset($_POST['c'])){
 if($_POST['c']=='un'){ $b='1';
                                     $sql=" SELECT * FROM eleve WHERE dep='$a' AND  classe='1' "; }
                                  
 else { $b='2'; $sql=" SELECT * FROM eleve WHERE dep='$a' AND  classe='2' "; }
  }
     else { $b=''; $sql=" SELECT * FROM eleve WHERE dep='$b'";}

 }else {$a=''; $sql=" SELECT * FROM eleve WHERE dep='$a'"; }

      $result = mysqli_query($con,$sql);
 
  if (isset($_POST['plus'])){
    $a=$_POST['plus'];
     $sql1=" SELECT * FROM eleve WHERE cne='$a' ";
$b='';
  }     
  else{
    $a='';
      $sql1=" SELECT * FROM eleve WHERE cne='$a' ";
    
  }
   $result1= mysqli_query($con,$sql1);
 
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
 $telephone='telephone';
 $classe = 'Classe';
$numero= 'Numero'
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Département</title>
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
         <h2 class="mb-4" align="center"> </h2>
        
<br>
<div class="wrapper">
  <div class="contact-form">
    <div class="input-fields"><table><tr>
      <th width="70%">
       <?php 

     #  echo"    Etudiants departement |   ";

       ?>
     
 <?php # echo"   <font color='white'>  ".$a." ".$b."  </font> "  ?> &nbsp;
 </th>
           
      <!--   <th width="30%"><input type="text"  class="input"  name="cn" placeholder="Cne/Cni"  >-->

      
  </th>
   
       
        </tr>
</table>


  </div>
 
 </div>
 <!-- <button name="Envoyer" class="button">
Afficher </button><button name="Envoyer" class="button">Modifier</button>
   <button name="Envoyer" class="button"> 
 Supprimer </button></div>
</div>
  </div>
 -->
  
 

        <?php
    if(isset($_POST['t'])){

echo '
<div class="table-responsive">
       <table class="table table bordered" style="background: white;" cellspacing="0" cellpadding="3" align="center" width="100%">  
    <thead>
           <tr>  
                <th width="1%" style="background-color: white">'.$numero.'</th>   
                <th width="1%" style="background-color: #38ada9">'.$cni.'</th>
                <th width="1%" style="background-color: #38ada9">'.$cne.'</th>
                 <th width="1%"  style="background-color: #38ada9">'.$nom.'</th>
                 <th width="1%"  style="background-color: #38ada9">'.$prenom.'</th>
                 <th width="1%"  style="background-color: #38ada9">'.$date.'</th>
                 <th width="1%"  style="background-color: #38ada9">'.$lieu.'</th>
                 <th width="1%"  style="background-color: #38ada9">'.$adresse.'</th>

                 <th width="1%"  style="background-color: #38ada9">'.$telephone.'</th>
                 <th width="1%"  style="background-color: #38ada9">'.$dep.'</th>
                 <th width="1%"  style="background-color: #38ada9">'.$classe.'</th>



                

                
                
           </tr></thead>';}

while($row = mysqli_fetch_array($result)){
 
  $pl=$row['cne'];
  #              <th width="10%" style="background-color: #38ada9"></th>  

  #<th width="10%"  style="background-color: #38ada9">Departement</th>
   #             <th width="10%"  style="background-color: #38ada9">Classe</th>
 #  <td  >'.$row["dep"].'</td>
#                          <td  >'.$row["classe"].'</td> 
  #                        <td width="10%">'.$row['nomel'].'</td>  
    # <th width="12%" style="background-color: #38ada9">Date naissance</th>
             #    <th width="12%" style="background-color: #38ada9">Lieu naissance</th>
              #   <th width="10%" style="background-color: #38ada9">Adresse</th>
              #   <th width="10%" style="background-color: #38ada9">Telphone</th>
             #  <td width="12%">'.$row["date_naissance"].'</td> 
               #            <td width="12%">'.$row["lieu_naissance"].'</td> 
                 #          <td width="10%">'.$row["adresse"].'</td> 
                  #         <td width="10%">'.$row["telephone"].'</td> 

echo '
          <tbody>
          <tr active-row>  
                       <td width="1%" data-label="Numero">'. $row['numel'].'</td> 
                          
                          <td width="1%" data-label="Cni">'.$row["cni"].'</td> 
                          <td width="1%" data-label="Cne">'.$row["cne"].'</td> 
                          <td width="1%" data-label="Nom">'.$row['nomel'].'</td>
                          <td width="1%" data-label="Prenom">'.$row["prenomel"].'</td> 
                          <td width="1%" data-label="Date naissance">'.$row["date_naissance"].'</td> 
                          <td width="1%" data-label="lieu naissance">'.$row["lieu_naissance"].'</td> 
                          <td width="1%" data-label="Adresse">'.$row["adresse"].'</td> 
                          <td width="1%" data-label="téléphone">'.$row["telephone"].'</td> 
                            <td width="1%" data-label="Département">'.$row["dep"].'</td>
                            <td width="1%" data-label="Classe">'.$row["classe"].'</td>

                         
                         

                     </tr></tbody> ' ;

}
echo '</table></div> ';


    ?>

     <?php
      
while($row = mysqli_fetch_array($result1)){
echo '

<div class="table-responsive">
          <table class="table table bordered">
  </div> 
  <tr> <th width="15%"   >Numero </th>   <th width="10%" >'. $row['numel'].'         </th></tr>
 <tr>  <th width="10%" style="background-color: #C0E9E7" >'.$cne.'</th> <th style="background-color: #C0E9E7">'.$row["cne"].'</th> 
 </td>      </tr>
  <tr>  <th width="10%" >'.$cni.'</th>
   <td  >'.$row["cni"].'</td>
 </th>      </tr>     
  
  <tr>  <th width="10%" style="background-color: #C0E9E7"><img src="images2/location.png">'.$nom.'</th> 
  <th style="background-color: #C0E9E7">'.$row['nomel'].'
  </th>                                           </th></tr> 
  <tr>  <th>Prenom</th>  <td>'.$row["prenomel"].'
                                            </td></tr>     
   <tr>  <th width="10%" style="background-color: #C0E9E7">Date naissance</th>
     <th style="background-color: #C0E9E7">'.$row["date_naissance"].'
  </th>      </tr>    
  <tr>  <th width="10%"  >Lieu naissance</th> <td>'.$row["lieu_naissance"].'
   </td>       </tr>   
    <tr>  <th width="10%" style="background-color: #C0E9E7">Adresse</th>
    <th style="background-color: #C0E9E7">'.$row["adresse"].'
   </th></tr> 
  <tr>  <th width="10%"  >Telphone</th><td>'.$row["telephone"].'
    </td>       </tr> 
    <tr>  <th width="10%"  style="background-color: #C0E9E7">Departement</th>
    <th style="background-color: #C0E9E7"  >'.$row["dep"].'
   </th></tr>
  <tr>  <th width="10%"  >Classe</th>                        
                          <th>'.$row["classe"].'   </th>     </tr>  
  ' ;
}
echo '</table></div>';
    ?>

   
 
   

    
 
  

 
    <script src="js2/jquery.min.js"></script>
    <script src="js2/popper.js"></script>
    <script src="js2/bootstrap.min.js"></script>
    <script src="js2/main.js"></script>
  </form>
  </body>
</html>