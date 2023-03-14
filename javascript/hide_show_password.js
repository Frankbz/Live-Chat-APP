const pswrdField = document.querySelector(".form input[type='password']"),
toggleIcon = document.querySelector(".form .field i");

toggleIcon.onclick = () =>{
    if (pswrdField.type === "password")
//== in JavaScript is used for comparing two variables, but it ignores the datatype of variable. === is used for comparing two variables, but this operator also checks datatype and compares two values
    {
        pswrdField.type = "text";
    }
    else
    {
        pswrdField.type = "password";
    }
}