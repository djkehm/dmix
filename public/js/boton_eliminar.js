function elminarBoton(){
    let text= 'Desea eliminar al usuario?';
    if(confirm(text)== true){
        tetx = "Acepto borra";
    }else{
        text = 'Se ha cancelado el borrado';
    }
    document.getElementById("mensaje").innerHTML = text;

}