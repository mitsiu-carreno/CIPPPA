<?php
class Abc_model extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->load->library('rb');
    }
    
    //Inserta en una tabla en especifico
    function insert($table, $data){     
        $bean = R::dispense($table);
        $bean->import($data);
        $id=R::store($bean);
        return $id;
    }


    //$table=tabla llave padre, $table2= tabla llave foranea, $data=datos del tabla hijo, $id = llave padre a la que se liga
    function insert_with_foreign_key($table, $table2, $data, $id){
        $bean = R::load($table, $id);
        $bean2 = R::dispense($table2);
        $bean2->import($data);
        $bean->ownBeanList[] = $bean2;
        $id = R::store($bean);
        $new_id = $bean2->id;
        return $new_id;
    }

    function get_beans($table){
        $beans = R::findAll($table);
        return R::exportAll($beans);
    }
    
    function get_bean_by_id($table, $id){
        $bean = R::load($table, $id);
        if($bean){
            return $bean->export();
        }
        
    }

    function get_field_from_bean($table, $field, $id){
        $bean = R::load($table, $id);
        if($bean){
            $value = $bean->$field;
            return $value;
        }
    }
    
    function update_bean($table, $id, $data){
        foreach ($data as &$d) {    //NOTA cuando se va a modificar el valor del arreglo se usa "&" antes del key!!
            ($d=="")? $d=null: "";
        }
        //var_dump("model_pre");
        //var_dump($data);
        $bean = R::load($table, $id);
        $bean->import($data);
        R::store($bean);
        //var_dump("model_pos");
        //var_dump($bean->export());
        return $bean->export();
    }
    
    function test(){
        $table = "user";
        $field = "apellido_paterno";
        $value = "carreño";
        $bean = R:: findOne($table, "apellido_paterno like ?", array($value));
        //$bean = R::findOne($table, "apellido_paterno like ?", array($value));  //<--AVANCE
        //$bean = R::findOne("user", "apellido_paterno like 'carreño'");
        
    
        var_dump($bean);
        //return $bean->export();
    }
 

    //Crea tablas iniciales para que funcione el sistema :) 
    function initial_tables(){
        //Destruye toda la basde de datos 
        R::nuke(); //HANDLE WITH CARE!!!! <-FOR TESTING POURPUSES ONLY

        //Tabla user
        $bean = R ::dispense('user');
        $bean->nombre=null;
        $bean->apellido_paterno=null;
        $bean->apellido_materno=null;
        $bean->correo_institucion=null;
        $bean->correo_personal=null;
        $bean->password=null;
        $bean->fecha_registro=null;
        $bean->fecha_actualizacion=null;
        $bean->tipouser_id=null;
        $bean->fecha_nacimiento=null;
        $bean->edo_civil=null;
        $bean->tel=null;
        $bean->tel_oficina=null;
        $bean->celular=null;
        $bean->cod_postal=null;
        $bean->fracc=null;
        $bean->calle=null;
        $bean->num_exterior_domicilio=null;
        $bean->num_interior_domicilio=null;
        $bean->curp=null;
        $bean->rfc=null;
        $bean->nacionalidad=null;
        $bean->imss=null;
        $bean->profesor_id=null;
        $bean->municipio=null;
        $bean->estado=null;
        $bean->puesto_solicitado=null;
        R::store($bean);
        R::wipe('user');


        //Tabla tipouser
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'usuario';
        R::store($bean);
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'evaluador';
        R::store($bean);
        $bean = R::dispense('tipouser');
        $bean->tipo_usuario = 'administrador';
        R::store($bean);
        
        //Tabla pais
        $bean = R::dispense('pais');
        $bean->pais= "Afganistán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Akrotiri";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Albania";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Alemania";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Andorra";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Angola";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Anguila";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Antártida";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Antigua y Barbuda";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Antillas Neerlandesas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Arabia Saudí";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Arctic Ocean";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Argelia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Argentina";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Armenia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Aruba";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Ashmore andCartier Islands";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Atlantic Ocean";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Australia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Austria";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Azerbaiyán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bahamas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bahráin";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bangladesh";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Barbados";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bélgica";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Belice";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Benín";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bermudas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bielorrusia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Birmania Myanmar";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bolivia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bosnia y Hercegovina";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Botsuana";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Brasil";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Brunéi";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bulgaria";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Burkina Faso";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Burundi";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Bután";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Cabo Verde";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Camboya";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Camerún";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Canadá";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Chad";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Chile";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "China";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Chipre";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Clipperton Island";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Colombia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Comoras";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Congo";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Coral Sea Islands";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Corea del Norte";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Corea del Sur";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Costa de Marfil";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Costa Rica";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Croacia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Cuba";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Dhekelia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Dinamarca";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Dominica";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Ecuador";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Egipto";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "El Salvador";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "El Vaticano";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Emiratos Árabes Unidos";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Eritrea";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Eslovaquia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Eslovenia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "España";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Estados Unidos";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Estonia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Etiopía";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Filipinas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Finlandia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Fiyi";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Francia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Gabón";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Gambia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Gaza Strip";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Georgia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Ghana";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Gibraltar";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Granada";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Grecia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Groenlandia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Guam";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Guatemala";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Guernsey";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Guinea";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Guinea Ecuatorial";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Guinea-Bissau";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Guyana";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Haití";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Honduras";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Hong Kong";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Hungría";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "India";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Indian Ocean";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Indonesia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Irán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Iraq";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Irlanda";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Isla Bouvet";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Isla Christmas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Isla Norfolk";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islandia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Caimán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Cocos";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Cook";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Feroe";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Georgia del Sur y Sandwich del Sur";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Heard y McDonald";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Malvinas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Marianas del Norte";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "IslasMarshall";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Pitcairn";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Salomón";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Turcas y Caicos";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Vírgenes Americanas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Islas Vírgenes Británicas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Israel";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Italia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Jamaica";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Jan Mayen";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Japón";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Jersey";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Jordania";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Kazajistán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Kenia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Kirguizistán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Kiribati";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Kuwait";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Laos";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Lesoto";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Letonia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Líbano";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Liberia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Libia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Liechtenstein";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Lituania";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Luxemburgo";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Macao";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Macedonia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Madagascar";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Malasia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Malaui";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Maldivas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Malí";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Malta";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Man;
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= Isle of";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Marruecos";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Mauricio";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Mauritania";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Mayotte";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "México";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Micronesia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Moldavia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Mónaco";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Mongolia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Montserrat";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Mozambique";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Namibia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Nauru";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Navassa Island";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Nepal";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Nicaragua";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Níger";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Nigeria";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Niue";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Noruega";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Nueva Caledonia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Nueva Zelanda";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Omán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Pacific Ocean";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Países Bajos";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Pakistán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Palaos";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Panamá";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Papúa-Nueva Guinea";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Paracel Islands";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Paraguay";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Perú";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Polinesia Francesa";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Polonia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Portugal";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Puerto Rico";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Qatar";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Reino Unido";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "República Centroafricana";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "República Checa";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "República Democrática del Congo";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "República Dominicana";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Ruanda";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Rumania";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Rusia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Sáhara Occidental";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Samoa";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Samoa Americana";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "San Cristóbal y Nieves";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "San Marino";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "San Pedro y Miquelón";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "San Vicente y las Granadinas";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Santa Helena";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Santa Lucía";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Santo Tomé y Príncipe";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Senegal";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Seychelles";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Sierra Leona";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Singapur";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Siria";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Somalia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Southern Ocean";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Spratly Islands";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Sri Lanka";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Suazilandia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Sudáfrica";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Sudán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Suecia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Suiza";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Surinam";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Svalbard y Jan Mayen";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Tailandia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Taiwán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Tanzania";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Tayikistán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "TerritorioBritánicodel Océano Indico";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Territorios Australes Franceses";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Timor Oriental";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Togo";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Tokelau";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Tonga";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Trinidad y Tobago";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Túnez";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Turkmenistán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Turquía";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Tuvalu";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Ucrania";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Uganda";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Unión Europea";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Uruguay";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Uzbekistán";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Vanuatu";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Venezuela";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Vietnam";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Wake Island";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Wallis y Futuna";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "West Bank";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "World";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Yemen";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Yibuti";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Zambia";
        R::store($bean);

        $bean = R::dispense('pais');
        $bean->pais= "Zimbabue";
        R::store($bean);
    } 
   
    
}