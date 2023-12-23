<?php
include("config/conexion.php");

class ControladorCarros {
/*=============================================
	CREAE CARRO
	=============================================*/
    static public function ctrCrearCarro() {

        $modeloCarroNuevo = new modeloVehiculo();

        if (isset($_POST['signupSubmit'])) { 
            $placa = $_POST['placa'];
            $modelo = $_POST['modelo'];
            $color = $_POST['color'];
            $tipo = $_POST['tipo'];

            $modeloCarroNuevo->carRegistration($placa, $modelo, $color, $tipo);

        } 
    }
/*=============================================
	ELIMINAR CARRO
	=============================================*/
    static public function ctrBorrarCarro()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminarCarro'])) {
        $carro_id_to_delete = $_POST['eliminarCarro'];
        $controlador = new modeloVehiculo();
        $delete_success = $controlador->deleteCar($carro_id_to_delete);

        if ($delete_success) {
            echo "Carro eliminado exitosamente.";
            echo '<script>
                        window.location = "/carros";
                    </script>';
        } else {
            echo "Error al eliminar carro.";
        }
    }
}
}
?>