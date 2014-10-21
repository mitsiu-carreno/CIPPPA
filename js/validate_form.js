function validarForm(formulario){
    var inputs     = formulario.getElementsByClassName('required-input');
    var num_inputs = inputs.length;
    var empty = 0;
    var val;
    console.log("validacion");
    console.log(num_inputs);
    for(var i = 0; i < num_inputs; i++){
        val =inputs[i].value.replace(/\s+/g, '');   //Elimina espacios en blanco " "!= ""
        console.log(val);
        if(val === null || val === ""){
            empty = empty + 1;
        }
    }
    if(empty > 0){
        //apprise("Todos los campos son obligatorios");
        return "false";
    }else{
        return "true";
    }
}
