<?php
require 'DBSingleton.php';

class Citas
{
    function __construct()
    {
    }

    public static function actualizar(
        $id,
        $fecha,
        $idMedico,
        $idEnfermero,
        $idPaciente
    ) {
        // Creando consulta UPDATE
        $consulta = "UPDATE citas" .
            " SET fecha=?, medico_id=?, enfermero_id=?, paciente_id=?" .
            "WHERE id=?";

        // Preparar la sentencia
        $cmd = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array($fecha, $idMedico, $idEnfermero, $idPaciente, $id));

        return $cmd;
    }

    public static function agregar(
        $id,
        $fecha,
        $idMedico,
        $idEnfermero,
        $idPaciente
    ) {
        // Sentencia INSERT
        $comando = "INSERT INTO citas (" .
            "id," .
            "fecha," .
            "medico_id," .
            "enfermero_id," .
            "paciente_id)" .
            "VALUES(?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($comando);

        return $sentencia->execute(
            array(
                $id,
                $fecha,
                $idMedico,
                $idEnfermero,
                $idPaciente
            )
        );
    }

    public static function obtenerTabla()
    {
        $consulta = "SELECT * FROM citas";
        try {
            // Preparar sentencia
            $comando = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    public static function borrarElemento($id)
    {
        // Sentencia DELETE
        $comando = "DELETE FROM citas WHERE id=?";

        // Preparar la sentencia
        $sentencia = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($comando);

        return $sentencia->execute(array($id));
    }
}
