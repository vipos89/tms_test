<?php


    namespace App\Models;

    use mysqli;
    class BaseModel
    {
        protected static $tableName;
        protected static $connection;

        protected static function getConnection(){
            if (!self::$connection){
                self::$connection  = new mysqli('localhost', 'homestead', 'secret', 'mvc');
            }
            return  self::$connection;
        }

        protected static function getTableName(){
            if (empty(static::$tableName)){
                $className = static::class;
                $className = explode('\\', $className);
                $className = array_pop( $className);
                $className = strtolower($className);
                $tableName = $className."s";
            }else{
                $tableName = static::$tableName;
            }
            return $tableName;
        }

        public static function selectAll(){
            $connection = self::getConnection();
            $tableName = static::getTableName();
            $res = $connection->query("SELECT * FROM ".$tableName);
            $arr = [];
            while ($row = $res->fetch_object(static::class)){
                $arr[] =  $row;
            }
            return $arr;
        }

        /**
         *
         * @return object|\stdClass
         * @var mysqli $connection
         */
        public static function findById($id){

            $connection = self::getConnection();
            $sql = "select * from ".(static::getTableName())." where id = ?";
            $stmt =  $connection->prepare($sql);
            $stmt->bind_param("i",  $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_object(static::class);
        }

    }