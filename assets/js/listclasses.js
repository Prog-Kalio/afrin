//function listDeps(){     
//    var selectedList = getCookie("list");
//    if(selectedList){}
//    else{
//        selectedList = "";
//    }
//    fetch('../api/v1/department/read.php', {
//        method: 'GET',
//        mode: 'cors',
//        headers: { 
//        'Content-Type': 'application/json'
//        }
//    }) 
//    .then(res => {
//        res.json().then(function(json) {
//                       
//        const listDiv = document.getElementById('dep-list'); 
//          for (var i = 0; i < json['data'].length; i++){
//              var tr = document.createElement('tr');   
//
//              var td1 = document.createElement('td');
//              var td2 = document.createElement('td');
//              var td3 = document.createElement('td');
//              var td4 = document.createElement('td');
//              var td5 = document.createElement('td');
//              var tdAction = document.createElement('td');
//              var actionHtml = '<input type="checkbox" name="undergraduate" value="ON" />';
//
//              tdAction.innerHTML = actionHtml;
//              var text1 = document.createTextNode(+json['data'][i]['DepartmentID']);
//              var text2 = document.createTextNode(json['data'][i]['Name']);
//              var text3 = document.createTextNode(json['data'][i]['HOD']);
//              var text4 = document.createTextNode(json['data'][i]['Email']);
//              var text5 = document.createTextNode(json['data'][i]['salary']);
//
//              td1.appendChild(text1);
//              td2.appendChild(text2);
//              td3.appendChild(text3);
//              td4.appendChild(text4);
//              td5.appendChild(text5);
//
//
//              tr.appendChild(td1);
//              tr.appendChild(td2);
//              tr.appendChild(td2);
//              tr.appendChild(td3);
//              tr.appendChild(td4);
//              tr.appendChild(td5);
//
//              listDiv.appendChild(tr);
//              
//          }  
//            console.log(json);
//        });
//        
//    })
//    .catch(error => {
//        console.log({ error });
//    });
//}


function saveCourses(){
    
    const saveBtn = document.getElementById('save-btn');
    const saveForm = document.getElementById('save-form'); 
    saveBtn.addEventListener('click', async (e) => {
        console.log('Save Clicked');
        e.preventDefault();  

        const data = new FormData(saveForm);
            console.log(data);
         fetch('../api/v1/user/saveInfos.php', {
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
              
              var tdAction = document.createElement('td');
              var actionHtml = '<input type="checkbox" name="undergraduate" value="ON" />';

              tdAction.innerHTML = actionHtml;

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
              tr.appendChild(tdAction);

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
    //listDeps();
    listcours();
    saveCourses();
});