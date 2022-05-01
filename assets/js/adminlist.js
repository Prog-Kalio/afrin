function listInstructors(){
    fetch('../api/v1/instructor/read.php', {
        method: 'GET',
        mode: 'cors',
        headers: { 
        'Content-Type': 'application/json'
        }
    }) 
    .then(res => {
        res.json().then(function(json) {
                       
        const listDiv = document.getElementById('in-list'); 
          for (var i = 0; i < json['data'].length; i++){
              var tr = document.createElement('tr');   

              var td1 = document.createElement('td');
              var td2 = document.createElement('td');
              var td3 = document.createElement('td');
              var td4 = document.createElement('td');
              var td5 = document.createElement('td'); 
              var td6 = document.createElement('td'); 

              var text1 = document.createTextNode(json['data'][i]['InstructorID']);
              var text2 = document.createTextNode(json['data'][i]['CollegeID']);
              var text3 = document.createTextNode(json['data'][i]['LastName']);
              var text4 = document.createTextNode(json['data'][i]['FirstName']);
              var text5 = document.createTextNode(json['data'][i]['Rank']);
              var text6 = document.createTextNode(json['data'][i]['departmentID']);
               
              td1.appendChild(text1);
              td2.appendChild(text2);
              td3.appendChild(text3);
              td4.appendChild(text4);
              td5.appendChild(text5); 
              td6.appendChild(text6); 


              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tr.appendChild(td4);
              tr.appendChild(td5);
              tr.appendChild(td6);

              listDiv.appendChild(tr);
          }  
            console.log(json);
        });
        
    })
    .catch(error => {
        console.log({ error });
    });
}



function listStudents(){
    fetch('../api/v1/student/read.php', {
        method: 'GET',
        mode: 'cors',
        headers: { 
        'Content-Type': 'application/json'
        }
    }) 
    .then(res => {
        res.json().then(function(json) {
                       
        const listDiv = document.getElementById('st-list'); 
          for (var i = 0; i < json['data'].length; i++){
              var tr = document.createElement('tr');   

              var td1 = document.createElement('td');
              var td2 = document.createElement('td');
              var td3 = document.createElement('td');
              var td4 = document.createElement('td');
              var td5 = document.createElement('td'); 

              var text1 = document.createTextNode(json['data'][i]['studentID']);
              var text2 = document.createTextNode(json['data'][i]['LastName']);
              var text3 = document.createTextNode(json['data'][i]['FirstName']);
              var text4 = document.createTextNode(json['data'][i]['Email']);
              var text5 = document.createTextNode(json['data'][i]['collegeID']);
               
              td1.appendChild(text1);
              td2.appendChild(text2);
              td3.appendChild(text3);
              td4.appendChild(text4);
              td5.appendChild(text5); 


              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tr.appendChild(td4);
              tr.appendChild(td5);

              listDiv.appendChild(tr);
          }  
            console.log(json);
        });
        
    })
    .catch(error => {
        console.log({ error });
    });
}


function listDeps(){
    fetch('../api/v1/department/read.php', {
        method: 'GET',
        mode: 'cors',
        headers: { 
        'Content-Type': 'application/json'
        }
    }) 
    .then(res => {
        res.json().then(function(json) {
                       
        const listDiv = document.getElementById('dep-list'); 
          for (var i = 0; i < json['data'].length; i++){
              var tr = document.createElement('tr');   

              var td1 = document.createElement('td');
              var td2 = document.createElement('td');
              var td3 = document.createElement('td');
              var td4 = document.createElement('td');
              var td5 = document.createElement('td'); 

              var text1 = document.createTextNode(json['data'][i]['DepartmentID']);
              var text2 = document.createTextNode(json['data'][i]['Name']);
              var text3 = document.createTextNode(json['data'][i]['HOD']);
              var text4 = document.createTextNode(json['data'][i]['Email']);
              var text5 = document.createTextNode(json['data'][i]['salary']);
               
              td1.appendChild(text1);
              td2.appendChild(text2);
              td3.appendChild(text3);
              td4.appendChild(text4);
              td5.appendChild(text5); 


              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tr.appendChild(td4);
              tr.appendChild(td5);

              listDiv.appendChild(tr);
          }  
            console.log(json);
        });
        
    })
    .catch(error => {
        console.log({ error });
    });
}

function listcours(){
     fetch('../api/v1/course/read.php', {
        method: 'GET',
        mode: 'cors',
        headers: { 
        'Content-Type': 'application/json'
        }
    }) 
    .then(res => {
        res.json().then(function(json) {
            
            
        const listDiv = document.getElementById('my-list'); 
          for (var i = 0; i < json['data'].length; i++){
              var tr = document.createElement('tr');   

              var td1 = document.createElement('td');
              var td2 = document.createElement('td');
              var td3 = document.createElement('td');
              var td4 = document.createElement('td');
              var td5 = document.createElement('td');

              var text1 = document.createTextNode(json['data'][i]['CourseID']);
              var text2 = document.createTextNode(json['data'][i]['Name']);
              var text3 = document.createTextNode(json['data'][i]['Description']);
              var text4 = document.createTextNode(json['data'][i]['Credits']);
              var text5 = document.createTextNode(json['data'][i]['Term']);

              td1.appendChild(text1);
              td2.appendChild(text2);
              td3.appendChild(text3);
              td4.appendChild(text4);
              td5.appendChild(text5);


              tr.appendChild(td1);
              tr.appendChild(td2);
              tr.appendChild(td2);
              tr.appendChild(td3);
              tr.appendChild(td4);
              tr.appendChild(td5);

              listDiv.appendChild(tr);
          }  
            console.log(json);
        });
        
    })
    .catch(error => {
        console.log({ error });
    });
}

document.addEventListener("DOMContentLoaded", function(event) { 
    listDeps();
    listcours();
    listStudents();
    listInstructors();
    
    removeStudent();
    removeInstructor();
    removeCourse();
});