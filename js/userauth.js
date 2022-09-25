function check(form) { /*function to check userid & password*/
    /*the following code checkes whether the entered userid and password are matching*/
    if(form.userid.value == "admin@employee.in" && form.password.value == "admin") {
        window.open('home.html')/*opens the target page while Id & password matches*/
    }
    else {
        alert("Invalid Email or Password")/*displays error message*/
    }
}