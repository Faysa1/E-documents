<?php
 date_default_timezone_set('Europe/Paris'); 
         function facebook_time_ago($timestamp)  
 {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
      return "Juste maintenant";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "il y a une minute";  
     }  
     else  
           {  
       return "Il y a $minutes minutes";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "il y a une heure";  
     }  
           else  
           {  
       return "Il y a $hours  heures";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "hier";  
     }  
           else  
           {  
       return "Il ya $days  jours";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "il y a une semaine";  
     }  
           else  
           {  
       return "il y a $weeks semaines";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "il y a un mois";  
     }  
           else  
           {  
       return "il y a $months mois";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "il y a un an";  
     }  
           else  
           {  
       return "il ya $years ans";  
     }  
   }  
 }

$connect =mysqli_connect("localhost", "root", "", "gestion");
 $output ='';
if(isset($_POST["query"]))
{
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = "
  SELECT * FROM comments 
  WHERE date_t LIKE '%".$search."%'
  OR comment_subject LIKE '%".$search."%' 
  OR comment_text LIKE '%".$search."%' 
   
   
  ";
}
else
{
  $query = "
  SELECT * FROM comments  ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  $output .= '<div class="table-responsive">
          <table class="table table bordered">
           ';
           while($row = mysqli_fetch_array($result)){
  $date[]=$row['date_t'];
  $cne[]=$row['comment_subject'];
  $form[]=$row['comment_text'];
 

}
  $size=sizeof($cne);

$x=$size;
//for ($i=$x; $i <=0 ; $i=$i-2)
  $i=$x-1;

while ($i >= 0) {
 
 $d =facebook_time_ago(''.$date[$i].'') ;
 
 $output .= '<tr><th width="50%"><img src="images2/ll.png">'.$cne[$i].'</th>
   <th width="40%">'.$form[$i].' </th>
   <th width="10%">  <h6>'.$d.'</h6></th>
           </tr>
       
    ';
$i=$i-1;  }
 echo $output;
 echo '</table></div>';}



else
{
  echo '<p ><h1 align="center">Aucun résultat</h1></p>';
}

?>
 
