
function createStudent(){
    
    const registerBtn = document.getElementById('register-btn');
    const registerForm = document.getElementById('register-form'); 
    registerBtn.addEventListener('click', async (e) => {
        console.log('Login Clicked');
        e.preventDefault();  

        const data = new FormData(registerForm);
            console.log(data);
         fetch('./api/v1/student/create.php', {
            method: 'POST',
            mode: 'cors',
            headers: { 
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'studentID' : Math.floor(Math.random() * Date.now()),
                'LastName' : data.get('LastName'), 
                'FirstName' : data.get('FirstName'), 
                'Email' : data.get('Email'), 
                'password' : data.get('password'), 
                'collegeID' : data.get('collegeID') })
        }) 
        .then(res => {
            res.json().then(function(json) {
                alert(json.message);
                
                window.location.replace("./Home.html");
                console.log(json);
            });

        })
        .catch(error => {
            console.log({ error });
        });

      });
}
 
document.addEventListener('DOMContentLoaded', () => { 
   createStudent(); 
  
});


