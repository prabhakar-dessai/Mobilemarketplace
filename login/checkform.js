function validate(userForm) {
    div=document.getElementById("emailmsg"); // #1
    div.style.color="red"; // #2
    if(div.hasChildNodes()) // #3
    {
    div.removeChild(div.firstChild); // #4
    }
    regex=/(^\w+\@\w+\.\w+)/; // #5
    match=regex.exec(userForm.email.value);
    if(!match)
    {
    div.appendChild(document.createTextNode("Invalid Email")); // #6
    userForm.email.focus(); // #7
    return false; // #8
    }
    
    var div=document.getElementById("usernamemsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.username.value.length ==0) // #11
    {
    div.appendChild(document.createTextNode("Username cannot be blank"));
    userForm.username.focus();
    return false;
    }

    div=document.getElementById("passwordmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.password.value.length <=5) // #9
    {
    div.appendChild(document.createTextNode("The password should be of at least size 6"));
    userForm.password.focus();
    return false;
    }

    div=document.getElementById("conpasswordmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.password.value != userForm.conpassword.value) // #10
    {
    div.appendChild(document.createTextNode("The two passwords don't match"));
    userForm.password.focus();
    return false;
    }
    
    return true;
   }