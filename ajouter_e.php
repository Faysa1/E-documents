<?php 
$con=mysqli_connect('localhost','root','','gestion');

    if(!$con)
    {
        die(' SVP veuillez vérifier votre connexion '.mysqli_error($con));
    }
session_start();
          
    if(isset($_POST['Envoyer']))
    {

       if(empty($_POST['nome']) || empty($_POST['prenome']) || empty($_POST['Cne']) || empty($_POST['Cni']) || empty($_POST['date'])|| 
        empty($_POST['adr'])|| empty($_POST['tele'])|| empty($_POST['lieu'])|| empty($_POST['Dep']))
       {
            header("location:ajouter_etu.php?Empty= SVP Entrer les informations requis");
       }  

             /* if($_POST['code'] != "abc123"){
                header("location:register.php?Invalid= SVP Entrer le code CHU correcte ");
              }*/
           else{
                         $sql1= "SELECT * FROM eleve where cni='".$_POST['Cni']."' AND cne='".$_POST['Cne']."' ";    
                    $result = mysqli_query($con,$sql1); 
                   
                    if (mysqli_num_rows($result) == 1)
                        { 
                          header("location:ajouter_etu.php?Dèja= Il existe un compte avec ces informations : cne ou cni");
                                
                        }

                          else{      $a=$_POST['nome'];
                                      $b=$_POST['prenome'];
                                      $c=$_POST['date'];
                                      $d=$_POST['adr'];
                                      $e=$_POST['tele'];
                                      $f=$_POST['Cne'];
                                      $g=$_POST['Cni'];
                                      $h=$_POST['lieu'];
                                      $i=$_POST['Dep'];
           if($i=='GI'){$j='ESTCGi2020';}                         
           if($i=='GE'){$j='ESTCDGE';}                         
           if($i=='GM'){$j='ESTCDGM';}                         
           if($i=='GP'){$j='ESTCDGP';}                         
           if($i=='TM'){$j='ESTCDTM';} 


$sql3=" INSERT INTO eleve (nomel, prenomel, date_naissance, adresse, telephone, cne, cni, lieu_naissance, dep, classe,coded) 
VALUES ('$a', '$b', '$c', '$d','$e','$f','$g','$h','$i','1','$j')";
                                                      mysqli_query($con,$sql3);
                                                      header("location:ajouter_etu.php?Complete= Votre traitment est bien effectué ");
                                                    
                                        
                                        
                              }
                    
        
 }  
  }

?>