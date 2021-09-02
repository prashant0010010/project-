function validateLogin(){
    var error = 0;
    var username = document.login.username.value;
    var email = document.login.email.value;
    var password = document.login.password.value;
    var passwordConf = document.login.passwordConf.value;

    var msg = '';

    if(username.trim()==''){
        document.getElementById('err_username').innerHTML = "enter username";
        error ++;
    }else{
        if(username.length<5){
            document.getElementById('err_username').innerHTML = "username should be 5 character minimum";
            error++
        } else{
            document.getElementById('err_name').innerHTML="";
            msg+='';
        }
       
    }



    if(password.trim()==''){
        document.getElementById('err_password').innerHTML = "enter password";
        error ++;
    }else{
        document.getElementById('err_password').innerHTML="";
           }



     if(passwordConf.trim()==''){
            document.getElementById('err_passwordConf').innerHTML = "enter re-password";
            error ++;
     }else{
            document.getElementById('err_passwordConf').innerHTML="";
               }
    


               if(password != passwordConf){
                document.getElementById('err_password').innerHTML =  "password not matched";
                error++;
               }else{
                document.getElementById('err_passwordConf').innerHTML="";
               }



               if(email.trim()==''){
                document.getElementById('err_email').innerHTML = "enter email";
                error ++;
            }else if(!emailpattern.test(email)){
                document.getElementById('err_email').innerHTML = "enter  valid email";
                error++;
            }
            else{
                document.getElementById('err_email').innerHTML="";
                   }
  
}