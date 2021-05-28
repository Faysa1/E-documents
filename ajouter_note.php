<?php
ob_start();
      session_start();
    ?>
   <?php 
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
//echo $np;	echo '&nbsp; '; echo $note_t[$i];    echo '<br>';
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
//echo $cnf;	echo '&nbsp; |'; echo $note_z[$i];    echo '&nbsp;|'; echo $ne;  echo '<br>' ;
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