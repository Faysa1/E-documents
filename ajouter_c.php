<?php 
$con=mysqli_connect('localhost','root','','gestion');

    if(!$con)
    {
        die(' SVP veuillez vérifier votre connexion '.mysqli_error($con));
    }
session_start();
          
    if(isset($_POST['Envoyer']))
    {

       if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['cni']) || empty($_POST['user']) || empty($_POST['passe'])|| 
        empty($_POST['Dep']))
       {
            header("location:ajouter_chef.php?Empty= SVP Entrer les informations requis");
       }  

             /* if($_POST['code'] != "abc123"){
                header("location:register.php?Invalid= SVP Entrer le code CHU correcte ");
              }*/
           else{
                         $sql1= "SELECT * FROM responsable where cni='".$_POST['Cni']."' AND nomres='".$_POST['nom']."' ";    
                    $result = mysqli_query($con,$sql1); 
                   
                    if (mysqli_num_rows($result) == 1)
                        { 
                          header("location:ajouter_chef.php?Dèja= Il existe un compte avec ces informations : cne ou cni");
                                
                        }
                          else{ 
                                          
                                      $a=$_POST['nom'];
                                      $b=$_POST['prenom'];
                                      $c=$_POST['cni'];
                                      $d=$_POST['user'];
                                      $e=$_POST['passe'];
                                      $f=$_POST['Dep'];
                                       
                                    
$sql3=" INSERT INTO responsable (cni, nomres, prenomres, dep) VALUES ('$c', '$a', '$b', '$f')";
$sql4=" INSERT INTO login       (cni, pseudo, passe, type) VALUES ('$c', '$d', '$e', 'prof')"; 

                                                      mysqli_query($con,$sql3);
                                                       mysqli_query($con,$sql4);
                                                      header("location:ajouter_chef.php?Complete= Votre traitment est bien effectué ");
                                                    
                                        
                              }
                    
        
 }  
  }

?>