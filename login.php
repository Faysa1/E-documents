 <?php 
$con=mysqli_connect('localhost','root','','gestion');

    if(!$con)
    {
        die(' SVP veuillez vérifier votre connexion '.mysqli_error($con));
    }
session_start();
    if(isset($_POST['Login']))
    {
       if(empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['type']))
       {
            header("location:loginP.php?Empty=Entrer les informations requis !");
       }
       else
       {
       		$pass=$_POST['pass'];
       		$username=$_POST['username'];
          $type=$_POST['type'];

            $query="SELECT * FROM login WHERE pseudo='$username' AND passe='$pass' AND type='$type'";
          

            $result=mysqli_query($con,$query);
     


  
             if(mysqli_fetch_assoc($result)){
 
        
if ($type=='admin'){  

                $_SESSION['User']=$_POST['username'];
                header("location:page_admin.php");}

else if($type=='prof') {  

                $_SESSION['User1']=$_POST['username'];
                header("location:page_prof.php");


              }
    
else {  
                $_SESSION['User2']=$_POST['username'];
                header("location:page_etudiant.php");}
 
 
             
              
             
             
              }  
            else
            {
                header("location:loginP.php?Invalid=Entrer des informations correcte !");
            }
       }
    }
   /* if(isset($_POST['Register']))
    {
    	header("location:register.php");
    }*/
    

?>