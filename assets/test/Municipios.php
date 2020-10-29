<?php
require_once('tu_archivo_de_conexión_a_la_bd.php');

/**
 * Clase para traer toda la información de los municipios de la BD
 */
class Municipios extends Database
{

    function Municipios()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        parent::__construct ();
    }

    public function getMunicipio(){
        try {

            $salida = "<option value=''>"."Seleccionar"."</option>";
            $query = "SELECT idMunicipio, nombreMunicipio FROM tabla_municipios ORDER BY idMunicipio";
            if (isset($_POST['consulta'])) {
                $q = $_POST['consulta'];
                $query = "SELECT idMunicipio, nombreMunicipio FROM tabla_municipios
	            WHERE idMunicipio LIKE '".$q."%' ORDER BY idMunicipio";
            }

            $statement = $this->conn->prepare($query);
            $statement->execute();
            if ($municipios = $statement->fetchAll(PDO::FETCH_ASSOC)){

                foreach ($municipios as $municipio) {
                    $salida.= "<option value=".$municipio['idMunicipio'].">".$municipio['nombreMunicipio']."</option>";
                }
            }else{
                $salida.="No se encontraron coincidencias";
            }

            return $salida; // Municipios retornados

        } catch (Exception $e) {
            print "!Error¡: " . $e->getMessage() . "</br>";
            die();
        }
    }
}

$municipios = new Municipios();
if (isset($_POST['consulta'])){
    echo $municipios->getMunicipio();
}