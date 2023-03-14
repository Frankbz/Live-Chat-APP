const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();  // prevent form from sbumitting
}

sendBtn.onclick = () =>{
    //Ajax
    let xhr = new XMLHttpRequest();  // creating XML object
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () =>{
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){  //200: "OK";  403: "Forbidden";  404: "Not Found"
                inputField.value = ""; // once message in batebase, delete typeing content
            }
        }
    }
    // send the form data to php throught ajax
    let formData = new FormData(form); 
    xhr.send(formData);
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
          }
      }
    }
    let formData = new FormData(form); 
    xhr.send(formData);
  }, 500); // This function will run constantly after 500ms