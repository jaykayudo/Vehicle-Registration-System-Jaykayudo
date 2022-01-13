
//Form Data
var vehicledoc = document.getElementById("vehicledoc");
var vehicledocText = document.getElementById("vehicledoc-text");
var passport = document.getElementById("passport");
var passportText = document.getElementById("passport-text");
var fullname = document.getElementById("fullname");
var dob = document.getElementById("dob");
var address = document.getElementById("address");
var state = document.getElementById("state");
var lga = document.getElementById("lga");
var hometown = document.getElementById("hometown");
var phonenumber = document.getElementById("phonenumber");
var vehiclename = document.getElementById("vehiclename");
var enginenumber = document.getElementById("enginenumber");
var chasis = document.getElementById("chasis");
//Form Data Errors
var vehicledocError = document.getElementById("vehicledoc-error");
var passportError = document.getElementById("passport-error");
var fullnameError = document.getElementById("fullname-error");
var dobError = document.getElementById("dob-error");
var addressError = document.getElementById("address-error");
var stateError = document.getElementById("state-error");
var lgaError = document.getElementById("lga-error");
var hometownError = document.getElementById("hometown-error");
var phonenumberError = document.getElementById("phonenumber-error");
var vehiclenameError = document.getElementById("vehiclename-error");
var enginenumberError = document.getElementById("enginenumber-error");
var chasisError = document.getElementById("chasis-error");
var chasischeck = true;

function fileupdate(){
    if(vehicledoc.value == "" ){
        vehicledocText.innerHTML = "No Image Chosen";
    }
    else{
        vehicledocText.innerHTML = "1 Image Chosen";
    }
    if(passport.value == "" ){
        passportText.innerHTML = "No Image Chosen";
    }
    else{
        passportText.innerHTML = "1 Image Chosen";
    }
}
fileupdate()
function filePreview(){
    if(vehicledoc.value != ""){
        
        if (vehicledoc.files && vehicledoc.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('vehicledoc-preview').src = e.target.result;
            };
              
            reader.readAsDataURL(vehicledoc.files[0]);
    }
  
    }

    if(passport.value != ""){
         if (passport.files && passport.files[0]) {
                var reader2 = new FileReader();
                reader2.onload = function(e) {
                    document.getElementById('passport-preview').src = e.target.result;
                };
                  
                reader2.readAsDataURL(passport.files[0]);
        }
    }
    
}
passport.addEventListener("change",filePreview)
vehicledoc.addEventListener("change",filePreview)

async function checkchasis(){
        const xmlhttp = await new XMLHttpRequest();
        
        xmlhttp.onload = async function() {
          if(this.responseText == 'Chasis Already Exists'){
              chasisError.innerHTML = "Chasis Already Exists";
              chasischeck = false;
          }
          else{
            chasisError.innerHTML = "";
              chasischeck = true;
          }
        }
        await xmlhttp.open("GET", "chasis.php?chasis=" + chasis.value);
        await xmlhttp.send();
        
}
chasis.addEventListener("change",checkchasis);
function validate(){
    // FullName
    if(fullname.value == "" || !isNaN(fullname.value)){
        fullnameError.innerHTML = "*Input your Surname and Firstname respectively";
        return false
    }
    else{
        var fullnamearray = fullname.value.split(" ")
        if(fullnamearray.length < 2){
            fullnameError.innerHTML = "*Input your Surname and Firstname respectively";
            return false
        }
        else{
            fullnameError.innerHTML = "";
        }
    }
     // DOB
    if(dob.value == ""){
        dobError.innerHTML = "*Enter your date of birth";
        return false
    }
    else{

        if(!dob.value.match(/^(0?[1-9]|[12][0-9]|3[01])[\/](0?[1-9]|1[012])[\/]\d{4}/)){
            console.log(dob.value)
            dobError.innerHTML = "*Enter a valid date of birth";
            return false
        }
        else{
            dobError.innerHTML = "";
        }
        
    }
    // Phone Number
    if(phonenumber.value == "" || phonenumber.value.length != 11 || isNaN(phonenumber.value)){
        phonenumberError.innerHTML = "*Enter a valid Phone Number";
        return false
    }
    else{
        phonenumberError.innerHTML = "";
    }
    // Engine Number
    if(enginenumber.value == "" || enginenumber.value.length < 11 || enginenumber.value.length > 17){
        enginenumberError.innerHTML = "*Enter a valid Engine Number (engine no should range from 11 to 17 characters)";
        return false
    }
    else{
        enginenumberError.innerHTML = "";
    }
    // Chasis
    if(chasis.value == "" || chasis.value.length < 11 || chasis.value.length > 17){
        chasisError.innerHTML = "*Enter a valid Chasis Number (engine no should range from 11 to 17 characters)";
        return false
    }
    else{
        
        if(!chasischeck){
            return false;
        }
        else{
            chasisError.innerHTML = "";
        }
    }
    
     // Passport
     if(passport.value == ""){
        passportError.innerHTML = "*Choose an Image";
        return false
    }
    else{
        if(passport.files.length > 0){
            for(const i = 0; i <= passport.files.length - 1; i++){
                const fsize = passport.files.item(i).size;
                const file =  Math.round((fsize / 1024));
                // file size validation
                if(file >= 4096){
                    passportError.innerHTML = "Image too big. please select a file less than 4mb.";
                    return false
                }
                else{
                    passportError.innerHTML = "";
                }
            }
        }
    }
    // Vehicle docs
    if(vehicledoc.value == ""){
        vehicledocError.innerHTML = "*Choose a Image";
        return false
    }
    else{
        if(vehicledoc.files.length > 0){
            for(const i = 0; i <= vehicledoc.files.length - 1; i++){
                const fsize = vehicledoc.files.item(i).size;
                const file =  Math.round((fsize / 1024));
                // file size validation
                if(file >= 4096){
                    vehicledocError.innerHTML = "Image too big. please select a file less than 4mb.";
                    return false
                }
                else{
                    vehicledocError.innerHTML = "";
                }
            }
        }
    }
    
}

    // function fileValidation() {
    //     var fileInput = 
    //         document.getElementById('file');
          
    //     var filePath = fileInput.value;
      
    //     // Allowing file type
    //     var allowedExtensions = 
    //             /(\.jpg|\.jpeg|\.png|\.gif)$/i;
          
    //     if (!allowedExtensions.exec(filePath)) {
    //         alert('Invalid file type');
    //         fileInput.value = '';
    //         return false;
    //     } 
    //     else 
    //     {
          
    //         // Image preview
    //         if (fileInput.files && fileInput.files[0]) {
    //             var reader = new FileReader();
    //             reader.onload = function(e) {
    //                 document.getElementById(
    //                     'imagePreview').innerHTML = 
    //                     '<img src="' + e.target.result
    //                     + '"/>';
    //             };
                  
    //             reader.readAsDataURL(fileInput.files[0]);
    //         }
    //     }
    
