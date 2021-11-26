<?php

namespace App\COntrollers;

use PDO;

class DB
{
    private $connection;

    public function __construct () {
        $host = config('db.host');
        $dbname = config('db.name');

        $this->connection = new PDO("mysql:host=$host;dbname=$dbname", config('db.username'), config('db.password'));
    }

    private function query ($sql) {
        return $this->connection->query($sql);
    }

    public static function select($sql, $multiple = false)
    {
        $db = new self();
        $req = $db->query($sql);
        if ($req){
            if ($multiple) $return = $req->fetchAll();
            else $return = $req->fetch();
        }
        else $return = false;
        
        return $return;
    }

    public static function insert($table, $attributes)
    {
        $host = config('db.host');
        $dbname = config('db.name');
        $conn = new PDO("mysql:host=$host;dbname=$dbname", config('db.username'), config('db.password'));

        $sql = "INSERT INTO " . $table . " (";
        foreach (array_keys($attributes) as $index => $key) {
            $sql .= "$key,";
        }
        $sql = substr($sql,0,-1);
        $sql .= ') VALUES (';
        foreach (array_values($attributes) as $value) {
            $sql .= "'$value',";
        }
        $sql = substr($sql,0,-1);
        $sql .= ')';

        $req = $conn->prepare($sql);
        $return = $req->execute();
        return $return;
    }

    public static function update($table, $id, $attributes)
    {
        $host = config('db.host');
        $dbname = config('db.name');
        $conn = new PDO("mysql:host=$host;dbname=$dbname", config('db.username'), config('db.password'));

        foreach($attributes as $key => $value) {
            if (trim($value) === "") unset($attributes[$key]);
        }

        $sql = "UPDATE " . $table . " SET ";
        foreach ($attributes as $key => $value) {
            $sql .= "$key = :$key,";
        }
        $sql = substr($sql,0,-1);
        $sql .= " WHERE id = $id";

        $req = $conn->prepare($sql);
        $return = $req->execute($attributes);

        if ($return) {
            return self::select("SELECT * FROM $table WHERE id = $id", false);
        }
        else return $return;
    }

    public static function delete($table, $id)
    {
        $host = config('db.host');
        $dbname = config('db.name');
        $conn = new PDO("mysql:host=$host;dbname=$dbname", config('db.username'), config('db.password'));

        $sql = "DELETE FROM $table WHERE id = :id";
        
        $return = $conn->prepare($sql)->execute([ "id" => $id ]);

        return $return;
    }
}
