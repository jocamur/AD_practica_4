<?php
require 'DBSingleton.php';

class Pacientes
{
    function __construct()
    {
    }

    public static function actualizar(
        $id,
        $sip,
        $dni,
        $nombre,
        $apellido1,
        $apellido2,
        $telefono,
        $sexo,
        $fechaNacimiento,
        $localidad,
        $calle,
        $numero,
        $puerta,
        $piso,
        $idMedico,
        $idEnfermero,
        $idUser
    ) {
        // Creando consulta UPDATE
        $consulta = "UPDATE pacientes" .
            " SET sip=?, dni=?, nombre=?, apellido1=?, apellido2=?, telefono=?, sexo=?, fecha_nacimiento=?, localidad=?, calle=?," .
            " numero=?, puerta=?, piso=?, medico_id=?, enfermero_id=?, user_id=?" .
            "WHERE id=?";

        // Preparar la sentencia
        $cmd = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($consulta);

        // Relacionar y ejecutar la sentencia
        $cmd->execute(array(
            $sip,
            $dni, $nombre, $apellido1, $apellido2,
            $telefono,
            $sexo, $fechaNacimiento,
            $localidad,
            $calle, $numero, $puerta, $piso,
            $idMedico, $idEnfermero, $idUser, $id
        ));

        return $cmd;
    }

    public static function agregar(
        $id,
        $sip,
        $dni,
        $nombre,
        $apellido1,
        $apellido2,
        $telefono,
        $sexo,
        $fechaNacimiento,
        $localidad,
        $calle,
        $numero,
        $puerta,
        $piso,
        $idMedico,
        $idEnfermero,
        $idUser
    ) {
        // Sentencia INSERT
        $comando = "INSERT INTO pacientes (" .
            "id," .
            "sip," .
            "dni," .
            "nombre," .
            "apellido1," .
            "apellido2," .
            "telefono," .
            "sexo," .
            "fecha_nacimiento," .
            "localidad," .
            "calle," .
            "numero," .
            "puerta," .
            "piso," .
            "medico_id," .
            "enfermero_id," .
            "user_id)" .
            "VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        // Preparar la sentencia
        $sentencia = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($comando);

        return $sentencia->execute(
            array(
                $id, $sip,
                $dni, $nombre, $apellido1, $apellido2,
                $telefono,
                $sexo, $fechaNacimiento,
                $localidad,
                $calle, $numero, $puerta, $piso,
                $idMedico, $idEnfermero, $idUser
            )
        );
    }

    public static function obtenerTabla()
    {
        $consulta = "SELECT * FROM pacientes";
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
        $comando = "DELETE FROM pacientes WHERE id=?";

        // Preparar la sentencia
        $sentencia = DBSingleton::obtenerInstancia()->obtenerBaseDatos()->prepare($comando);

        return $sentencia->execute(array($id));
    }
}
