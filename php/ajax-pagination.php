<?php

include('config.php');

  $limit_per_page = 5;

  $page = "";
  if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
  }else{
    $page = 1;
  }

  $offset = ($page - 1) * $limit_per_page;

  $sql = "SELECT * FROM registration LIMIT {$offset},{$limit_per_page}";
  $result = mysqli_query($conn,$sql) or die("Query Unsuccessful.");
  $output= "";
  $i=1;
  if(mysqli_num_rows($result) > 0){
    $output .= '<table class="table table-bordered table-hover table-fixed" style="width: 100px;">
    <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">First Name</th>
      <th scope="col">Middle Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Profession</th>
      <th scope="col">Phone NO</th>
      <th scope="col">Mobile NO</th>
      <th scope="col">Country</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Pan NO</th>
      <th scope="col">Resume</th>
    </tr>
  </thead>';
      while($row = mysqli_fetch_assoc($result)) {
        $output .= "<tbody><tr><th scope='row'>{$i}</th><td>{$row["fname"]}</td><td>{$row["mname"]}</td>
        <td>{$row["lname"]}</td><td>{$row["email"]}</td><td>{$row["gender"]}</td><td>{$row["profession"]}</td><td>{$row["phoneno"]}</td><td>{$row["mobileno"]}</td><td>{$row["country"]}</td><td>{$row["state"]}</td><td>{$row["city"]}</td><td>{$row["panno"]}</td><td>{$row["resume"]}</td></tr>";
       $i++;
      }
    $output .= "</tbody></table>";

    $sql_total = "SELECT * FROM registration";
    $records = mysqli_query($conn,$sql_total) or die("Query Unsuccessful.");
    $total_record = mysqli_num_rows($records);
    $total_pages = ceil($total_record/$limit_per_page);

    $output .='<div id="pagination">';

    for($i=1; $i <= $total_pages; $i++){
      if($i == $page){
        $class_name = "active";
      }else{
        $class_name = "";
      }
      $output .= "<a class='{$class_name}' id='{$i}' href=''>{$i}</a>";
    }
    $output .='</div>';

    echo $output;
  }else{
    echo "<h2>No Record Found.</h2>";
  }
?>
