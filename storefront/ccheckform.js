function validate(userForm) {
    div=document.getElementById("model_nomsg"); // #1
    div.style.color="red"; // #2
    if(div.hasChildNodes()) // #3
    {
    div.removeChild(div.firstChild); // #4
    }
    if(userForm.model_no.value.length==0) // #11
    {
    div.appendChild(document.createTextNode("Model no cannot be blank"));
    userForm.model_no.focus();
    return false;
    }
    
    var div=document.getElementById("modelmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.model.value.length==0) // #11
    {
    div.appendChild(document.createTextNode("Product Name cannot be blank"));
    userForm.model.focus();
    return false;
    }

    div=document.getElementById("prob_descmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.prob_desc.value.length==0) // #9
    {
    div.appendChild(document.createTextNode("Problem description no cannot be blank"));
    userForm.prob_desc.focus();
    return false;
    }

    div=document.getElementById("yrsmsg");
    div.style.color="red";
    if(div.hasChildNodes())
    {
    div.removeChild(div.firstChild);
    }
    if(userForm.yrs.value.length==0) // #10
    {
    div.appendChild(document.createTextNode("Years cannot be blank"));
    userForm.yrs.focus();
    return false;
    }
    
    return true;
   }