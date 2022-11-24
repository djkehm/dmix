document.querySelector("#registrar-btn").addEventListener("click", async ()=>{
    let nombre = document.querySelector("#nombre-txt").value.trim();
    let username = document.querySelector("#user-txt").value.trim();
    let email = document.querySelector("#email-txt").value.trim();
    let fechaNacimiento = document.querySelector("#fecha-txt").value;
    let password = document.querySelector("#contraseña-txt").value;


    let errores = [];
    if(nombre === ""){
        errores.push("Debe ingresar un nombre");
    }else{
        //Validar si la consola existe en el sistema
        let users = await getUsuario(); //TODO: Hay que mejorarlo
        //Nintendo SWITCH, == nintendo switch, == Nintendo Switch
        let usuarioEncontrado = users.find(c=>c.usuario.toLowerCase() === username.toLowerCase());
        if(usuarioEncontrado != undefined){
            errores.push("El nombre de usuario ya existe");
        }else{
            let emailEncontrado = users.find(c=>c.email.toLowerCase() === email.toLowerCase());
            if(emailEncontrado != undefined){
                errores.push("El correo electronico ya esta registrado");
            }
        }
    }


    //Si no hubieron errores
    if(errores.length == 0){

        let user = {};
        user.nombre = nombre;
        user.usuario = username;
        user.email = email;
        user.fecha = fechaNacimiento;
        user.clave = password;
        //TODO: Falta validar!!!
        //Solo esta linea hace:
        //1. Va al controlador, le pasa los datos
        //2. EL controlador crea el modelo
        //3. El modelo ingresa en la base de datos
        //4. Todos felices
        let res = await registrarUsuario(user); 
        await Swal.fire("Usuario registrado", "Usuario registrado exitosamente", "info");
        //La linea que viene despues del Swal.fire se va a ejecutar solo cuando la persona aprete el OK
        //Aqui a redirigir a otra página
    
        window.location.href = "home_usuario";
        //abrir nueva pestaña
        //window.open("www.google.cl","_blank");
    } else {
        //Mostrar errores
        Swal.fire({
            title: "Errores de validacion",
            icon: "warning",
            html: errores.join("<br />")
        });
    }
});