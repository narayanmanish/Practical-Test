
<script type="text/javascript" src="js/validation.js"></script>
<?php
  error_reporting(0);
   include('header.php');
   

   include('php/config.php');
  
if(isset($_POST['submit'])){ 
	$first_name=($_POST["fname"]);
	$middle_name=($_POST["mname"]);
	$last_name=($_POST["lname"]);
	$email=($_POST["email"]);
	$gender=($_POST["gender"]);
	$profession=($_POST["profession"]);
	$phone=($_POST["phone"]);
	$mobile=($_POST["mobile"]);
	$country=($_POST["country"]);
	$state=($_POST["state"]);
	$city=($_POST["city"]);
	$pan=($_POST["pan"]);
	
    // name of the uploaded file
    $filename = $_FILES['resume']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['resume']['tmp_name'];
    $size = $_FILES['resume']['size'];
    //validation server side
	if($first_name =="") {
        $error_first_name=  "<span class='error'>Please enter your First name.</span>";
	}
	elseif($middle_name =="") {
	$error_middle_name=  "<span class='error'>Please enter your Middle name.</span>";
	}
    elseif($last_name =="") {
		$error_middle_name=  "<span class='error'>Please enter your Last name.</span>";
		}
	elseif($email == "") {
	$error_email=  "<span class='error'>Please enter your email</span>"; 
	} 
	elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
	$error_email= "<span class='error'>Please enter valide email, like your@abc.com</span>";
	}
    elseif($gender == "") {
		$error_gender=  "<span class='error'>Please select your Gender</span>"; 
		} 
	elseif($profession == ""){
	$error_profession =  "<span class='error'>Please enter profession.</span>";
	}
   
    elseif($mobile == ""){
		$error_mobile =  "<span class='error'>Please enter mobile No.</span>";
		}
	elseif(is_numeric(trim($mobile)) == false){
	$error_mobile =  "<span class='error'>Please enter numeric value.</span>";
	}
	elseif($country == ""){
	$error_country =  "<span class='error'>Please select country.</span>";
	}
	elseif($state == ""){
		$error_state =  "<span class='error'>Please select state.</span>";
		}
	elseif($city == ""){
			$error_city =  "<span class='error'>Please select city.</span>";
			}
    
    elseif ($_FILES['resume']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        $file_error ="File too large!";
    } 
		
	else{
    
     
//check pan no already exits
$sql = "SELECT panno FROM `registration`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $panno = $row['panno'];
        if($pan == $panno){
            header('location:registration.php?msg=err');
            die();
    }
}
            // move the uploaded (temporary) file to the specified destination
     move_uploaded_file($file, $destination);
     //insert data into database
     $countryname = "SELECT name FROM `countries` where id='$country'";
     $country= mysqli_query($conn,$countryname)->fetch_assoc();
     $c=$country['name'];
     $statename = "SELECT name FROM `states` where id='$state'";
     $state= mysqli_query($conn,$statename)->fetch_assoc();
     $s=$state['name'];
     $cityname = "SELECT city FROM `cities` where id='$city'";
     $city= mysqli_query($conn,$cityname)->fetch_assoc();
     $ci=$city['city'];
     $sql2="INSERT INTO `registration` (`fname`, `mname`, `lname`, `email`, `gender`, `profession`, `phoneno`, `mobileno`, `country`, `state`, `city`, `panno`,`resume`) VALUES 
     ('$first_name','$middle_name','$last_name','$email','$gender','$profession','$phone','$mobile','$c','$s','$ci','$pan','$filename')";
    

            if (mysqli_query($conn, $sql2)) {
                header('location:registration.php?msg=ins');
            } else {
                header('location:registration.php?msg=err');
            }
        
}

    //mail send user and admin
     require "php-mailer/PHPMailer.php";
     require "php-mailer/SMTP.php" ;
     require "php-mailer/Exception.php" ;
     
     // Server settings
     $mail = new PHPMailer\PHPMailer\PHPMailer();
     
     // Enable verbose debug output
     $mail->isSMTP();
     
     // Send using SMTP
     $mail->Host = "smtp.gmail.com";
     $mail->SMTPAuth = true;
     
     // SMTP username
     $mail->Username = "YOUR SMTP USERNAME";
     
     // SMTP password				
     $mail->Password = "YOUR PASSWORD";
     $mail->SMTPAuth = "tls";
     $mail->Port = 587;		
     
     
     $mail->setFrom("###");
     
     // Selecting the mail-id having
            $x=[];
             $mail->addAddress($x['narayanmanish333gmail.com']);
             $mail->addAddress($x[$email]);
         // Set email format to HTML
         $mail->isHTML(true);
         $mail->Subject =
             "Mailer Multiple address in php";
             
         $mail->Body = "Hii .$fname. your Registration done Sucessfully ";
         
         $mail->AltBody = "Welcome to Recuirtment.com";
         
         if($mail->send())
         {
         echo "Message has been sent check mailbox";
         }
         else{
             echo "failure due to the google security";
         }
     
	}

}

?>


<style>
    .error {
    color: red;
    font-size: 90%;
}
</style>

<div class="container">
			<div class="row">
                
                <div class="col-md-12"><br>
                    <?php
                    //message show after registration
                if(isset($_GET['msg']) && $_GET['msg']=='ins')
                   {
                  echo "<div class='alert alert-primary' rol='alert'>
                     Record Insrted Successflly...!
                     </div>";
                   }
                   if(isset($_GET['msg']) && $_GET['msg']=='err')
                   {
                  echo "<div class='alert alert-danger' rol='alert'>
                     Record Not Insrted...!
                     </div>";
                   }
                   ?>
        <br>
<form name="contactForm" onsubmit="return validateForm()" action="registration.php" method="post"  enctype="multipart/form-data" autocomplete="off">
    <h2 class="text-center underline">Application Form</h2><br>
    <div class="row">
    <div class="col-md-4">
        <label>First Name</label>
        <input type="text" name="fname" class="form-control">
        <div class="error" id="fnameErr"></div>
        <?php echo $error_first_name; ?>
    </div>
    <div class="col-md-4">
        <label>Middle Name</label>
        <input type="text" name="mname" class="form-control">
        <div class="error" id="mnameErr"></div>
        <?php echo $error_middle_name; ?>
    </div>
    <div class="col-md-4">
        <label>Last Name</label>
        <input type="text" name="lname" class="form-control">
        <div class="error" id="lnameErr"></div>
        <?php echo $error_last_name; ?>
    </div>
  </div>
    <div class="row">
        <div class="col-md-4">
        <label>Email Address</label>
        <input type="text" name="email" class="form-control">
        <div class="error" id="emailErr"></div>
        <?php echo $error_email; ?>
        </div>
        <div class="col-md-4">
        <label>Gender</label>
        <div class="form-check">
            <label><input type="radio" class="form-check-input" name="gender" value="male"> Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label><input type="radio" class="form-check-input" name="gender" value="female"> Female</label> 
        </div>
        <div class="error" id="genderErr"></div>
        <?php echo $error_gender; ?>
        </div>
        <div class="col-md-4">
        <label>Profession</label>
        <input type="text" name="profession" class="form-control">
        <div class="error" id="professionErr"></div>
        <?php echo $error_profession; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <label>Phone Number</label>
        <input type="text" name="phone" class="form-control">
        <div class="error" id="phoneErr"></div>
        <?php echo $error_phone; ?>
        </div>
        <div class="col-md-4">
        <label>Mobile Number</label>
        <input type="text" name="mobile" maxlength="10" class="form-control">
        <div class="error" id="mobileErr"></div>
        <?php echo $error_mobile; ?>
        </div>
        <div class="col-md-4">
        <label>Country</label>
        <select name="country" id="country" class="form-control">
            <option>Select</option>
        </select> 
        <div class="error" id="countryErr"></div>
        <?php echo $error_country; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        <label>State</label>
        <select name="state" id="state" class="form-control">
            <option>Select</option>
        </select> 
        <div class="error" id="stateErr"></div>
        <?php echo $error_state; ?>
       </div>
       <div class="col-md-4">
        <label>City</label>
        <select name="city" id="city" class="form-control">
            <option>Select</option>
        </select> 
        <div class="error" id="cityErr"></div>
        <?php echo $error_city; ?>
       </div>
       <div class="col-md-4">
        <label>PAN No</label>
        <input type="text" name="pan" id="pan" class="form-control">
        <div class="error" id="panErr"></div>
        <div id="uname_response" ></div>
        </div>

    </div>
    <div class="row">
    <div class="col-md-12">
        <label>Resume Upload </label>
        <input type="file" name="resume" class="form-control" accept=".doc, .docx,.pdf" >
        <div class="error" id="resumeErr"></div>
        </div>
    </div> <br>   
    <div class="form-group">
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        
    </div>
</form>
</div>
</div>
</div>


<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript">
    //pan card unique check
    $(document).ready(function(){

$("#pan").keyup(function(){

   var pan = $(this).val();
   var regpan = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;

   if(regpan.test(pan) && pan != ''){

      $.ajax({
         url: 'php/pan_no_check.php',
         type: 'post',
         data: {pan: pan},
         success: function(response){

             $('#uname_response').html(response);

          }
      });
   }else{
      $("#uname_response").html("<span style='color: red;'>Enter valid username</span>");
   }

 });

});

//fetch data for country state and city using ajax
  $(document).ready(function(){
  	function loadData(type, category_id){
  		$.ajax({
  			url : "php/load-city.php",
  			type : "POST",
  			data: {type : type, id : category_id},
  			success : function(data){
  				if(type == "stateData"){
  					$("#state").html(data);
  				}
                else if(type == "city")
                { 
                    $('#city').html(data);
                }
                else{
  					$("#country").append(data);
  				}
  				
  			}
  		});
  	}

  	loadData();

  	$("#country").on("change",function(){
  		var country = $("#country").val();

  		if(country != ""){
  			loadData("stateData", country);
  		}else{
  			$("#state").html("");
  		}	
  	})
 
  $("#state").on("change",function(){
  		var state = $("#state").val();

  		if(state != ""){
  			loadData("city", state);
  		}else{
  			$("#city").html("");
  		}	
  	})
  });
</script>

<?php
   include('footer.php');
?>