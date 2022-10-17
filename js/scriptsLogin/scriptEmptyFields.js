const email = document.getElementById("inputCorreoRe");
const password=document.getElementById("inputPasswordRe");
const form=document.getElementById("formRegister");
const errorElement=document.getElementById("error");

form.addEventListener("submit",(e)=>{
    let messages=[];
    /*if(email.value==='' || email.value==null){
        messages.push("Email is required");
    }*/

    /*if(password.value==='' || password.value==null){
        messages.push("Password is required");
    }*/

    if(password.value.length<=6){
        messages.push("La contraseña debe ser mayor a 6 caracteres");
    }

    if(password.value.length>=20){
        messages.push("La contraseña debe ser menor a 10 caracteres");
    }

    if(password.value==="password"){
        messages.push("password cannot be password");
    }
    if (messages.length>0){
        e.preventDefault();
        errorElement.innerText=messages.join(', ');
    }
});

