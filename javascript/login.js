const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"); // sign up buttom
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();  // prevent form from sbumitting
}

continueBtn.onclick = () =>{
    //Ajax
    let xhr = new XMLHttpRequest();  // creating XML object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () =>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){  //200: "OK";  403: "Forbidden";  404: "Not Found"
                let data = xhr.response;  // this give us response of that passed URL("php/signup.php")
                if (data === "success"){
                    location.href = "users.php";
                }
                else{
                    errorText.style.display = "block";
                    errorText.textContent = data;
                    
                }
            }
        }
    }
    // send the form data to php throught ajax
    let formData = new FormData(form); 
    xhr.send(formData);
}

// = () =>{} is the similar to = function(){}
// = () =>{} is called arrow function, differece: https://www.w3schools.com/js/js_arrow_function.asp