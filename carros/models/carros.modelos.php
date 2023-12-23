<?php
include_once "config/conexion.php";
class modeloVehiculo
{
    /*=============================================
	OBTENER CARROS
	=============================================*/
    public function allCarros()
    {
        try {
            $db = getDB();
            $stmt = $db->query("SELECT Id, Placa, Modelo, Color, Tipo FROM venta_carros");
            $data = $stmt->fetchAll(PDO::FETCH_OBJ); // 
            return $data;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }


     /*=============================================
	Registro de Carro
	=============================================*/

    public function carRegistration($placa, $modelo, $color, $tipo)
    {
        try {
            $db = getDB();
            $st = $db->prepare("SELECT Id FROM venta_carros WHERE Placa=:placa");
            $st->bindParam("placa", $email, PDO::PARAM_STR);
            $st->execute();
            $count = $st->rowCount();
          

            if ($count < 1) {
                $stmt = $db->prepare("INSERT INTO venta_carros(Placa, Modelo, Color, Tipo) VALUES (:placa,:modelo,:color,:tipo)");
                $stmt->bindParam("placa", $placa, PDO::PARAM_STR);
                $stmt->bindParam("modelo", $modelo, PDO::PARAM_STR);
                $stmt->bindParam("color", $color, PDO::PARAM_STR);
                $stmt->bindParam("tipo", $tipo, PDO::PARAM_STR);

                $stmt->execute();
                $db = null;

                return true;
            } else {
                $db = null;
                return false;
            }
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

  /*=============================================
	ELIMINAR CARRO
	=============================================*/
    public static function deleteCar($Id)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("DELETE FROM venta_carros WHERE Id = :Id");
            $stmt->bindParam("Id", $Id, PDO::PARAM_INT);
            $stmt->execute();
            
            
            return true; // Eliminación exitosa
        } catch (PDOException $e) {
            echo "Error al eliminar usuario: " . $e->getMessage(); // Mensaje de error
            return false; // Error en la eliminación
        }
    }
}
?>