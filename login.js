function login(event){
    event.preventDefault();
    const email = event?.target[0]?.value;
    const password = event?.target[1]?.value;
    console.log("Email is : ",email);
    console.log("Password is : ",password);
}