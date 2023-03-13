<?php
include('config.php');

$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn, $_POST["query"]);
	$query = "
	SELECT * FROM registration 
	WHERE fname LIKE '%".$search."%'
	OR lname LIKE '%".$search."%' 
	OR City LIKE '%".$search."%' 
	OR country LIKE '%".$search."%' 
	OR state LIKE '%".$search."%'
	";
}
else
{
	$query = "
	SELECT * FROM registration ORDER BY id";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
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
  $i=1;
      while($row = mysqli_fetch_assoc($result)) {
        $output .= "<tbody><tr><th scope='row'>{$i}</th><td>{$row["fname"]}</td><td>{$row["mname"]}</td>
        <td>{$row["lname"]}</td><td>{$row["email"]}</td><td>{$row["gender"]}</td><td>{$row["profession"]}</td><td>{$row["phoneno"]}</td><td>{$row["mobileno"]}</td><td>{$row["country"]}</td><td>{$row["state"]}</td><td>{$row["city"]}</td><td>{$row["panno"]}</td><td>{$row["resume"]}</td></tr>";
        $i++;
      }
    $output .= "</tbody></table>";
    echo $output;
}
else
{
	echo 'Data Not Found';
}
?>