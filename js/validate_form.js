function validarForm(formulario){
    var inputs     = formulario.getElementsByClassName('required-input');
    var num_inputs = inputs.length;
    var empty = 0;
    console.log("validacion");
    console.log(num_inputs);
    for(var i = 0; i < num_inputs; i++){
        inputs[i].value =inputs[i].value.replace(/\s+/g, '');   //Elimina espacios en blanco " "!= ""
        console.log(inputs[i].value);
        if(inputs[i].value === null || inputs[i].value === ""){
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

/*TAREA INGLES
34 c 
35 g 
82