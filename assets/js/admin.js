
function removeStudent(){
    
    const stForm = document.getElementById('del-st-form');
    const stBtn = document.getElementById('st-btn');
    stBtn.addEventListener('click', async (e) => {
        console.log('Login Clicked');
        e.preventDefault();  

        const data = new FormData(stForm);
            console.log(data);
         fetch('../api/v1/student/delete.php', {
            method: 'DELETE',
            mode: 'cors',
            headers: { 
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({'studentID' : data.get('studentID')})
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


function removeInstructor(){
    
    const inForm = document.getElementById('del-in-form');
    const inBtn = document.getElementById('inbtn');
    inBtn.addEventListener('click', async (e) => {
        console.log('Login Clicked');
        e.preventDefault();  

        const data = new FormData(inForm);
            console.log(data);
         fetch('../api/v1/instructor/delete.php', {
            method: 'DELETE',
            mode: 'cors',
            headers: { 
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({'InstructorID' : data.get('InstructorID')})
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



function removeCourse(){
    
    const stForm = document.getElementById('del-cr-form');
    const stBtn = document.getElementById('crbtn');
    stBtn.addEventListener('click', async (e) => {
        console.log('Login Clicked');
        e.preventDefault();  

        const data = new FormData(stForm);
            console.log(data);
         fetch('../api/v1/course/delete.php', {
            method: 'DELETE',
            mode: 'cors',
            headers: { 
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({'CourseID' : data.get('CourseID')})
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
