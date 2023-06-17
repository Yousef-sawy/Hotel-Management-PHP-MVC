<?php


class DB
{
    private static $connection;
    
    public static function getConnection()
    {
        if (!isset(self::$connection)) {
            self::$connection = new mysqli("localhost", "root", "", "hotel-final", 3306);
            
            if (self::$connection->connect_error) {
                throw new Exception("Database connection failed: " . self::$connection->connect_error);
            }
        }
        
        return self::$connection;
    }
}



?>