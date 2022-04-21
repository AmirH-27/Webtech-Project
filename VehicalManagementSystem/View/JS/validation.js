function isValidReg(Registration) {
    const fname = Registration.fname.value;
    const lname = Registration.lname.value;
    const gender = Registration.gender.value;
    const dob = Registration.birthday.value;  
    const phone = Registration.phone.value;  
    const email = Registration.email.value;
    const username = Registration.usrName.value;
    const password = Registration.password.value;
    const type = Registration.type.value;

    if (fname == "" || lname == "" || gender == "" || dob == '' || phone == "" || email=="" || username == "" || password == "" || type == "Select") {
        alert("Please fill up the form properly");
        return false;
    }
    return true;
}

function isValidLogin(Login) {
    const username = Login.usrName.value;
    const password = Login.password.value;

    if (username == "" || password == "") {
        alert("Please fill up the form properly");
        return false;
    }
    return true;
}

function isValidChangePass(CngPass) {
    const current = CngPass.password.value;
    const newPassword = CngPass.newPassword.value;
    const conNewPassword = CngPass.cNewPassword.value;

    if (current == "" || newPassword == "" || conNewPassword == "") {
        alert("Please fill up the form properly");
        return false;
    }
    return true;
}


function isValidSearch(Search) {
    const searched = Search.usrName.value;
    
    if (searched == "") {
        alert("Please fill up the form properly");
        return false;
    }
    return true;
}
