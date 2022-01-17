function validate(userForm){

    var div=document.getElementById("usernamemsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.user.value.length ==0) // #11
    {
    div.appendChild(document.createTextNode("Name cannot be blank"));
    userForm.user.focus();
    return false;
    }

    div=document.getElementById("numbermsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    regex=/^\d+/; // #5
    match=regex.exec(userForm.number.value);
    if(!match) // #10
    {
    div.appendChild(document.createTextNode("Invalid Entry for number"));
    userForm.number.focus();
    return false;
    }

    div=document.getElementById("emailmsg"); // #1
    div.style.color="red"; // #2
    if(div.hasChildNodes()) // #3
    {
    div.removeChild(div.firstChild); // #4
    }
    regex=/(^\w+\@\w+\.\w+)/; // #5
    match=regex.exec(userForm.Email.value);
    if(!match)
    {
    div.appendChild(document.createTextNode("Invalid Email")); // #6
    userForm.Email.focus(); // #7
    return false; // #8
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
    div=document.getElementById("Btypemsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.account.value.length == 0) // #10
    {
    div.appendChild(document.createTextNode("Buisness Type cannot be blank"));
    // userForm.account.focus();
    return false;
    }
    div=document.getElementById("Bnamemsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.Bname.value.length == 0) // #10
    {
    div.appendChild(document.createTextNode("Buisness Name cannot be blank"));
    userForm.Bname.focus();
    return false;
    }

    div=document.getElementById("Addressmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.address.value.length == 0) // #10
    {
    div.appendChild(document.createTextNode("Address cannot be blank"));
    userForm.address.focus();
    return false;
    }

    return true;
}