document.querySelector("#registrar-btn").addEventListener("click", async ()=>{
    let username = document.querySelector("#user-txt").value.trim();
    let password = document.querySelector("#contraseña-txt").value;


    let errores = [];
    if(username === ""){
        errores.push("Debe ingresar un usuario");
    }else{
        if(password === ""){
            errores.push("Debe ingresar una contraseña");
        }else{
        //Validar si la consola existe en el sistema
            let users = await getUsuario(); //TODO: Hay que mejorarlo
            //Nintendo SWITCH, == nintendo switch, == Nintendo Switch
            let usuarioEncontrado = users.find(c=>c.usuario.toLowerCase() === username.toLowerCase());
            if(usuarioEncontrado != undefined){

                
            }else{
                let emailEncontrado = users.find(c=>c.email.toLowerCase() === email.toLowerCase());
                if(emailEncontrado != undefined){
                    errores.push("El correo electronico ya esta registrado");
                }
            }
        }
    }
});