<?php
require 'DBSingleton.php';

class Medicos
{
    function __construct()
    {
    }

    public static function actualizar(
        $id,
        $numeroColegiado,
        $dni,
        $nombre,
        $apellido1,
        $apellido2,
        $telefono,
        $sexo,
        $idEspecialidad,
        $idHorario,
        $idUser
    ) {
        // Creando consulta UPDATE
        $consulta = "UPDATE medicos" .
            " SET numero_colegiado=?, dni=?, nombre=?, apellido1=?, apellido2=?, telefono=?, sexo=?, especialidad_id=?, horario_id=?, user_id=?" .
            "WHERE id=?";

        // Preparar la sentencia
        $cmd = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array(
            $numeroColegiado,
            $dni, $nombre, $apellido1, $apellido2,
            $telefono,
            $sexo, $idEspecialidad,
            $idHorario,
            $idUser,
            $id
        ));

        return $cmd;
    }

    public static function agregar(
        $id,
        $numeroColegiado,
        $dni,
        $nombre,
        $apellido1,
        $apellido2,
        $telefono,
        $sexo,
        $idEspecialidad,
        $idHorario,
        $idUser
    ) {
        // Sentencia INSERT
        $comando = "INSERT INTO medicos (" .
            "id," .
            "numero_colegiado," .
            "dni," .
            "nombre," .
            "apellido1," .
            "apellido2," .
            "telefono," .
            "sexo," .
            "especialidad_id," .
            "horario_id," .
            "user_id)" .
            "VALUES(?,?,?,?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($comando);

        return $sentencia->execute(
            array(
                $id, $numeroColegiado,
                $dni, $nombre, $apellido1, $apellido2,
                $telefono,
                $sexo, $idEspecialidad,
                $idHorario,
                $idUser
            )
        );
    }

    public static function obtenerTabla()
    {
        $consulta = "SELECT * FROM medicos";
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
        $comando = "DELETE FROM medicos WHERE id=?";

        // Preparar la sentencia
        $sentencia = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($comando);

        return $sentencia->execute(array($id));
    }
}
