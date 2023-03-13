// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    var fname = document.contactForm.fname.value;
    var mname = document.contactForm.mname.value;
    var lname = document.contactForm.lname.value;
    var profession=document.contactForm.profession.value;
    var email = document.contactForm.email.value;
    var phone = document.contactForm.phone.value;
    var mobile = document.contactForm.mobile.value;
    var country = document.contactForm.country.value;
    var gender = document.contactForm.gender.value;
    var state = document.contactForm.state.value;
    var city = document.contactForm.city.value;
    var pan = document.contactForm.pan.value;
    var resume = document.contactForm.resume.value;
    
    
	// Defining error variables with a default value
    var fnameErr = mnameErr = resumeErr=professionErr=panErr=stateErr= phonErr= lnameErr= emailErr = mobileErr = countryErr = genderErr = true;
    
    // Validate Firstname
    if(fname == "") {
        printError("fnameErr", "Please enter your First name");
        return false;
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(fname) === false) {
            printError("fnameErr", "Please enter a valid First name");
            return false;
        } else {
            printError("fnameErr", "");
            
            fnameErr= false;
        }
    }
    
    
            
        
   
     // Validate Middlename
     if(mname == "") {
        printError("mnameErr", "Please enter your Middle name");
        return false;
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(mname) === false) {
            printError("mnameErr", "Please enter a valid Middle name");
            return false;
        } else {
            printError("mnameErr", "");
            
            mnameErr= false;
        }
    }
    // Validate lastname 
    if(lname == "") {
        printError("lnameErr", "Please enter your Last name");
        return false;
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(lname) === false) {
            printError("lnameErr", "Please enter a valid Last name");
            return false;
        } else {
            printError("lnameErr", "");
           
            lnameErr= false;
        }
    }


     // Validate email address
     if(email == "") {
        printError("emailErr", "Please enter your email address");
        return false;
    } else {
        // Regular expression for basic email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
            return false;
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }


     // Validate gender
     if(gender == "") {
        printError("genderErr", "Please select your gender");
        return false;
    } else {
        printError("genderErr", "");
        genderErr = false;
    }
     // Validate  profession
     if(profession == "") {
        printError("professionErr", "Please enter your profession");
        return false;
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(profession) === false) {
            printError("professionErr", "Please enter a valid profession");
            return false;
        } else {
            printError("professionErr", "");
           
            professionErr= false;
        }
    }
    
   

    
     // Validate Phone number
     if(phone == "") {
        printError("phoneErr", "Please enter your phone number");
        return false;
    } else {
         var re = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
        if(re.test(phone) === false) {
            printError("phoneErr", "Please enter a valid Phone no like (123) 456-7890");
            return false;
        } else{
            printError("phoneErr", "");
            phoneErr = false;
        }
    }
  
    // Validate mobile number 
    if(mobile == "") {
        printError("mobileErr", "Please enter your mobile number");
        return false;
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(mobile) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
            return false;
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
    
   
    // Validate country
    if(country == "Select") {
        printError("countryErr", "Please select your country");
        return false;
    } else {
        printError("countryErr", "");
        countryErr = false;
    }

    // Validate state
    if(state=="")
    {
        printError("stateErr", "Please select your State");
        return false;
    } 

    if(state == "Select") {
        printError("stateErr", "Please select your State");
        return false;
    } else {
        printError("stateErr", "");
        stateErr = false;
    }
    // Validate state
    if(city == "Select") {
        printError("cityErr", "Please select your city");
        return false;
    } else {
        printError("cityErr", "");
        cityErr = false;
    }
     // Validate Pan no 
     if(pan == "") {
        printError("panErr", "Please enter your pan number");
        return false;
    } else {
        // Regular expression for basic pan validation
        var regpan = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
        if(regpan.test(pan) === false) {
            printError("panErr", "Please enter a valid PAN NO");
            return false;
        } else{
            printError("panErr", "");
            panErr = false;
        }
    }
    if(resume=="")
    {
        printError("resumeErr", "Please upload resume");
        return false;   
    }
    else{
       
            printError("resumeErr", "");
            resumeErr = false;
      
    }
 
    
  
    // Prevent the form from being submitted if there are any errors
    if((fname || lname || mname  || professionErr || emailErr || mobileErr || countryErr|| resumeErr|| genderErr) == true) {
        console.log("Error");
       return false;
    } 
    
}