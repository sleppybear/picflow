<?php

namespace db;

use http\Exception;
use Image;
use mysqli;

class DbConnection
{
    private static $connection;

    public static function Init()
    {
        if (self::$connection == null) {
            $connectionJson = json_decode("db_connection.json");
            if ($connectionJson == null) {
                throw new Exception\RuntimeException("Error in connection json.");
            }

            self::$connection = new mysqli($connectionJson["host"],
                $connectionJson["username"],
                $connectionJson["password"],
                $connectionJson["database"]
            );
        }
    }

    public static function getImageById($id)
    {
        if (self::$connection != null) {
            $single = self::$connection->query("SELECT FROM image WHERE id={$id}");
            self::$connection->close();

            $fetched = mysqli_fetch_array($single);
            if ($fetched == null) {
                return null;
            }
            $image = new Image();
            foreach ($fetched as $name => $item) {
                if (property_exists(Image::class, $name)) {
                    $item->$name = $item;
                }
            }

            return $image;
        } else {
            throw new Exception\RuntimeException("Connection was not initiated.");
        }
    }
}