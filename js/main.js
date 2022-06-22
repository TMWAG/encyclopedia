
function showPassLog(){
    var z = document.getElementById("pass-log");
    if (z.type === "password"){
        z.type = "text";
    }
    else{
        z.type = "password";
    }
}
function showPassReg(){
    var x = document.getElementById("pass-reg");
    var y = document.getElementById("pass-reg-conf");
    if (x.type === "password" && y.type === "password"){
        x.type = "text";
        y.type = "text";
    }
    else{
        x.type = "password";
        y.type = "password";
    }
}