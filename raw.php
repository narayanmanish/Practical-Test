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
<form name="contactForm" onsubmit="return validateForm()" action="" method="post"  enctype="multipart/form-data" autocomplete="off">
    <h2 class="text-center underline">Application Form</h2><br>
    <div class="row">
    <div class="col-md-4">
        <label>First Name</label>
        <input type="text" name="fname" class="form-control">
        <div class="error" id="fnameErr"></div>
      
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
        <input type="text" name="pan"  class="form-control">
        <div id="uname_response" ></div>
        </div>

    </div>
    <div class="row">
    <div class="col-md-12">
        <label>Resume Upload </label>
        <input type="file" name="resume" class="form-control" accept=".doc, .docx,.pdf">
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

<script type="text/javascript" src="js/validation.js"></script>



<?php
   include('footer.php');
?>
