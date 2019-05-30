<?php


class DB
{
    /**
     * @var null
     */
    private static $bdd = null;
    /**
     * @var string
     */
    private static $connName = "mysql";

    private function __construct() {
    }

    /**
     * @return PDO|null
     * @throws Exception
     */
    public static function conn() {

        if(is_null(self::$bdd)) {
            $config = config("db")[self::$connName];
            self::$bdd = new PDO("mysql:host=${$config["host"]};dbname=${$config["databaseName"]}", $config["user"], $config["password"]);
        }
        return self::$bdd;
    }

    /**
     * @param $query
     * @return bool|PDOStatement
     */
    public static function prepare($query) {
        return self::conn()->prepare($query);
    }

}
