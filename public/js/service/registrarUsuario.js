const registrarUsuario = async (user)=>{ //arrow functions
    
    //Estructura de peticion post al servidor con axios
    let resp = await axios.post("api/users/post", user, {
        headers: {
            "Content-Type": "application/json"
        }
    });
    return resp.data;
};
const getUsuario = async (filtro ="todos")=>{
    let resp;
    if(filtro == "todos"){
        resp = await axios.get("api/users/get");
    }
    return resp.data;
};
