 <?php 
 $con=mysqli_connect('localhost','root','','gestion');

    if(!$con)
    {
        die(' SVP veuillez vérifier votre connexion '.mysqli_error($con));
    }
session_start();
  if(isset($_POST['supprimer'])){ 
 if(empty($_POST['nom'])){ 
    

   header("location:supprimer.php?Empty= SVP Entrer les informations requis"); }
else{ 
 
 
                         $sql1= "SELECT * FROM eleve  where cni='".$_POST['nom']."' OR cne='".$_POST['nom']."' ";   
                        
                        

                    $result = mysqli_query($con,$sql1); 
                     
 }
                   
                    if (mysqli_num_rows($result) != 1 )
                        { 
                          header("location:liste1.php?Dèja= Cni/Cne n'existe pas");
                                
                        }



else{   
           $b=$_POST['nom'];

 
   $sql = "DELETE FROM eleve WHERE cni='".$_POST['nom']."' OR cne='".$_POST['nom']."' "; 
 
   $resultat = mysqli_query($con, $sql); 
   if ($resultat == FALSE) { 
      header("location:supprimer.php?Complete= Echec de l'exécution de la requête.");                                              
   } 
   else { 
      header("location:supprimer.php?Complete= Votre traitment est bien effectué ");
       
   } 
 
    
 
 
 
 }

 }
 
 
?>
 
 