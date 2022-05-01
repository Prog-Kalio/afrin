function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

function loginForm(){
    const loginForm = document.getElementById('login-form');
  const loginBtn = document.getElementById('login-btn');
  
  loginBtn.addEventListener('click', async (e) => {
    console.log('Login Clicked');
    e.preventDefault();  
    
    const data = new FormData(loginForm);
        console.log(data);
     fetch('./api/v1/user/auth.php', {
        method: 'POST',
        mode: 'cors',
        headers: { 
        'Content-Type': 'application/json'
        },
        body: JSON.stringify({'email' : data.get('email'), 'password' : data.get('password')})
    }) 
    .then(res => {
        res.json().then(function(json) {
            console.log(json);
            setCookie('jwt', json.jwt, 1);
            setCookie('name', json.name, 1);
            if(json.auth){
                alert("Welcom "+json.name);
                window.location.replace("./admin/student.php");
            }else{
                
                alert(json.message);
            }
        });
        
    })
    .catch(error => {
        console.log({ error });
    });
     
  });
  
}

document.addEventListener('DOMContentLoaded', () => {  
   loginForm();
});


