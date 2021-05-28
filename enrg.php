<?php 
$con=mysqli_connect('localhost','root','','gestion');

    if(!$con)
    {
        die(' SVP veuillez vérifier votre connexion '.mysqli_error($con));
    }
session_start();
          
    if(isset($_POST['Envoyer']))
    {
       if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['cne']) || empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['cni']))
       {
            header("location:inscrire.php?Empty=Entrer les informations requis !");
       }
       else
       {
             /* if($_POST['code'] != "abc123"){
                header("location:register.php?Invalid= SVP Entrer le code CHU correcte ");
              }*/
              
                    $sql = "SELECT * FROM login where pseudo='".$_POST['username']."'";  
                    $result = mysqli_query($con, $sql); 
                    if (mysqli_num_rows($result) == 1)
                        { 
                          header("location:inscrire.php?Dèja= Il existe un compte avec ces informations : username");
                        }
                          else{
                                $sql1 = "SELECT * FROM login where cne='".$_POST['cne']."' AND cni='".$_POST['cni']."'";  
                                $result1 = mysqli_query($con, $sql1); 
                                if (mysqli_num_rows($result1) == 1)
                                    { 
                                        header("location:inscrire.php?Dèja= Il existe un compte avec ces informations : cni et cne");
                                    }

                                    else
                                        {
 $sql1 = "SELECT * FROM eleve where numel='".$_POST['cne']."' AND cni='".$_POST['cni']."' AND nomel='".$_POST['nom']."' AND  prenomel='".$_POST['prenom']."'";  
                                $result1 = mysqli_query($con, $sql1); 
                                if (mysqli_num_rows($result1) != 1)
                        { 
                          header("location:inscrire.php?Dèja=informations n'existe pas ");
                                
                        }
                          else {                         
 date_default_timezone_set('Europe/Paris');  
 $date=date("Y-m-d H:i:s"); 
                                                      $a=$_POST['cne'];
                                                      $b=$_POST['cni'];
                                                      $c=$_POST['username'];
                                                      $d=$_POST['pass'];
                                                $action='création de compte';    

                                      $sql3=" INSERT INTO login (cne, cni, pseudo, passe, type) VALUES ('$a', '$b', '$c', '$d', 'etudiant')";
                                       $sql4=" INSERT INTO historique (date_t, cne, action,type, status) VALUES ('$date', '$a', '$action','creer', '0')";
                                       
                                                      mysqli_query($con,$sql3);
                                                      mysqli_query($con,$sql4);
                                                      mysqli_query($con,$sql4);

                                                      header("location:loginP.php?Complete= Votre inscription est bien effectué ");}
                                                    
                                        }
                              }
                    
        }
    }

?>