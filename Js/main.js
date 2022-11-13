// Regular expression for login
const form = document.getElementById("form");

function sub(){
    let correct = true;

    const name = form.elements['name'].value;
    const email = form.elements['email'].value;
    const password = form.elements['password'].value;
    const country = form.elements['country'].value;
    const city = form.elements['city'].value;
    const contact = form.elements['contact'].value;

    
    if(!isNaN(name)){
        correct = false;
        document.getElementById('name_error').innerHTML = "Please check value";
        document.getElementById('name_error').style.color = "red";
    }

    emailregex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    if(!email.match(emailregex)){
        correct = false;
        document.getElementById('email_error').innerHTML = "Please check value";
        document.getElementById('email_error').style.color = "red";
    }

    passwordregex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})"
    if(!password.match(passwordregex)){
        correct = false;
        document.getElementById('password_error').innerHTML = "Please check value";
        document.getElementById('password_error').style.color = "red";
    }

    if(!isNaN(country)){
        correct = false;
        document.getElementById('country_error').innerHTML = "Please check value";
        document.getElementById('country_error').style.color = "red";
    }

    if(!isNaN(city)){
        correct = false;
        document.getElementById('city_error').innerHTML = "Please check value";
        document.getElementById('city_error').style.color = "red";
    }

    // let phone =/^[0]{1}([2]|[5]|[3]){1}\d{8}$/
    if(isNaN(contact)){
        correct = false;
        document.getElementById('contact_error').innerHTML = "Invalid Input";
        document.getElementById('contact_error').style.color = "red";
    }

    return correct;
}

// Product page
const product_form = document.getElementById("product_form");

function check(){
    let correct = true;

    const name = product_form.elements['title'].value;
    const price = product_form.elements['price'].value;
    

    
    if(!isNaN(name)){
        correct = false;
        document.getElementById('name_error').innerHTML = "Please check value";
        document.getElementById('name_error').style.color = "red";
    }

    if(isNaN(price) || price == ""){
        correct = false;
        document.getElementById('price_error').innerHTML = "Invalid Input";
        document.getElementById('price_error').style.color = "red";
    }

    return correct;
}


// Check category validation
const update_form = document.getElementById("validateupdate");



function see(){
    let correct = true;

    const name = update_form.elements['title'].value;
    const price = update_form.elements['price'].value;
    const description = update_form.elements['description'].value;
    const keyword = update_form.elements['keyword'].value;
    
    

    
    if(!isNaN(name)){
        correct = false;
        document.getElementById('name_error').innerHTML = "Please check value";
        document.getElementById('name_error').style.color = "red";
    }

    if(isNaN(price) || price == ""){
        correct = false;
        document.getElementById('price_error').innerHTML = "Invalid Input";
        document.getElementById('price_error').style.color = "red";
    }

    if(!isNaN(description) || description == ""){
        correct = false;
        document.getElementById('desc_error').innerHTML = "Invalid Input";
        document.getElementById('desc_error').style.color = "red";
    }

    if(!isNaN(keyword) || keyword == ""){
        correct = false;
        document.getElementById('keyword_error').innerHTML = "Invalid Input";
        document.getElementById('keyword_error').style.color = "red";
    }

    return correct;
}

