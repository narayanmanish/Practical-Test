<?php
include('config.php');

if(isset($_POST['pan'])){
   $pan = mysqli_real_escape_string($conn,$_POST['pan']);

   $query = "select count(*) as panno from registration where panno='".$pan."'";

   $result = mysqli_query($conn,$query);
   $response = "<span style='color: green;'>Available.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['panno'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Not Available.</span>";
      }
   
   }

   echo $response;
   die;
}
?>


