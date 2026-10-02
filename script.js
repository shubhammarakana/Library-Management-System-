const password=Document.getElementById('Pass');
 const toggle=Document.getElementById('toggle');

 toggle.addEventListener('click',function()=>{
     showHide(password,toggle);
 });

 function showHide(password,toggle){                            
    if(password.type==="password"){
        password.type="text";
        toggle.classList.add("fa-eye-slash");
    }else{
        password.type="password";
        toggle.classList.remove("fa-eye-slash");
        toggle.classList.add("fa-eye");
    }