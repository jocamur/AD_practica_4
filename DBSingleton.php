<?php
class DBSingleton
{
    /* Única instancia de la clase */
    private static $db = null;

    /**
     * Instancia PDO
     */
    private static $pdo;

    final private function __construct()
    {
        try {
            //Crear nueva conexión PDO
            self::obtenerBaseDatos();
        } catch (PDOException $e) {
            //Mostrar mensaje de error
        }
    }
    public static function obtenerInstancia()
    {
        if (self::$db === null)
            self::$db = new self();

        return self::$db;
    }
    /**
     * Crear una nueva conexión PDO basada
     * en los datos de conexión
     * @return PDO Objeto PDO
     */
    public function obtenerBaseDatos()
    {
        if (self::$pdo == null) {
            self::$pdo = new PDO(
                'mysql:dbname=' . "hospital" .
                    ';host=' . "localhost" .
                    ';port:63343;',
                "root",
                "",
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );
            /**
             * La indicación SET NAMES UTF-8 para el servidor permite
             * que los datos de la base de datos vengan codificados en 
             * este formato para evitar problemas de compatibilidad. */

            // Habilitar excepciones
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }

    /**
     * Evita la clonación del objeto
     */
    final protected function __clone()
    {
    }

    function _destructor()
    {
        self::$pdo = null;
    }
}
