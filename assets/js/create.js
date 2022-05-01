
function createStudent(){
    
    const stForm = document.getElementById('del-st-form');
    const stBtn = document.getElementById('st-btn');
    stBtn.addEventListener('click', async (e) => {
        console.log('Login Clicked');
        e.preventDefault();  

        const data = new FormData(stForm);
            console.log(data);
         fetch('../api/v1/student/create.php', {
            method: 'POST',
            mode: 'cors',
            headers: { 
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'studentID' : data.get('studentID'),
                'LastName' : data.get('LastName'), 
                'FirstName' : data.get('FirstName'), 
                'Email' : data.get('Email'), 
                'collegeID' : data.get('collegeID') })
        }) 
        .then(res => {
            res.json().then(function(json) {
                alert(json.message);
                console.log(json);
            });

        })
        .catch(error => {
            console.log({ error });
        });

      });
}


function createInstructor(){
    
    const inForm = document.getElementById('del-in-form');
    const inBtn = document.getElementById('in-btn');
    inBtn.addEventListener('click', async (e) => {
        console.log('Login Clicked');
        e.preventDefault();  

        const data = new FormData(inForm);
            console.log(data);
         fetch('../api/v1/instructor/create.php', {
            method: 'POST',
            mode: 'cors',
            headers: { 
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'CollegeID' : data.get('CollegeID'),
                'LastName' : data.get('LastName'), 
                'FirstName' : data.get('FirstName'), 
                'Rank' : data.get('Rank'), 
                'departmentID' : data.get('departmentID') })
        }) 
        .then(res => {
            res.json().then(function(json) {
                alert(json.message);
                console.log(json);
            });

        })
        .catch(error => {
            console.log({ error });
        });

      });
}



function createCourse(){
    
    const stForm = document.getElementById('del-cr-form');
    const stBtn = document.getElementById('cr-btn');
    stBtn.addEventListener('click', async (e) => {
        console.log('Login Clicked');
        e.preventDefault();  

        const data = new FormData(stForm);
            console.log(data);
         fetch('../api/v1/course/create.php', {
            method: 'POST',
            mode: 'cors',
            headers: { 
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'Name' : data.get('Name'),
                'Desription' : data.get('Desription'), 
                'Credits' : data.get('Credits'), 
                'Term' : data.get('Term') })
        }) 
        .then(res => {
            res.json().then(function(json) {
                alert(json.message);
                console.log(json);
            });

        })
        .catch(error => {
            console.log({ error });
        });

      });
}

document.addEventListener("DOMContentLoaded", function(event) { 
    createStudent();
    createInstructor();
    createCourse();
     
});