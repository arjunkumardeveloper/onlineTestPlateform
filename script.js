function validate() {
    var name = document.regiForm.name.value;
    var uname = document.regiForm.username.value;
    var pass = document.regiForm.password.value;
    // alert(name +", " + uname + ", "+ pass);
    if (name == "") {
        alert("Name Field Must Be Required");
        return false;
    } else if (uname == "") {
        alert("Username Field Must Be Required");
        return false;
    } else if (pass == "") {
        alert("Password Field Must Be Required");
        return false;
    } else {
        return true;
    }
}

function loginValidate() {
    var name = document.loginForm.uname.value;
    var pass = document.loginForm.pass.value;

    if (name == "") {
        alert("Username Field Must Be Required !");
        return false;
    } else if (pass == "") {
        alert("Password Field Must Be Required !")
        return false;
    } else {
        return true;
    }
}