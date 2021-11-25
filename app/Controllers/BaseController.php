<?php

namespace App\controllers;

use App\Controllers\CommentsController;
use App\Controllers\DB;

use App\Controllers\PostsController;
use App\Controllers\UsersController;

class BaseController
{

    public static function create($attributes)
    {
        $model = get_called_class()::model;
        $table = $model::table;
        return DB::insert($table, $attributes);
    }

    public static function getAll()
    {
        $model = get_called_class()::model;
        $table = $model::table;
        $records = DB::select("SELECT * FROM $table", true);
        $result = [];
        foreach ($records as $record) {
            $result[] = new $model($record);
        }

        return $result;
    }

    static function getSingle($id)
    {
        $model = get_called_class()::model;
        $table = $model::table;

        $record = DB::select("SELECT * FROM $table WHERE id = $id", false);
        $post = new $model($record);

        return $post;
    }

    static function get($id = NULL)
    {
        $model = get_called_class()::model;
        $table = $model::table;

        $multiple = !(isset($id) and is_int($id)); // TEST IF IS INT (ID)

        $hasDiscriminators = (isset($id) && is_array($id) && count($id) > 0);

        $sql = "SELECT * FROM `$table`";

        if (!$multiple) $sql .= " WHERE id = '$id'";
        if ($hasDiscriminators && $multiple) $sql .= " WHERE ";

        $i = 0;
        if ($hasDiscriminators) foreach ($id as $filter) {
            $sql .= "`$filter[0]` $filter[1] '$filter[2]'";
            if (++$i !== count($id)) $sql .= " AND ";
        }

        $records = DB::select($sql, $multiple);

        if(!$records) $result = $records;
        else if ($multiple) foreach ($records as $record) $result[] = new $model($record);
        else $result = new $model($records);

        return $result;
    }

    static function update($id, $args = NULL)
    {
        $model = get_called_class()::model;
        $table = $model::table;

        $updated = DB::update($table, $id, $args);

        return new $model($updated);
    }

    static function delete($id)
    {
        $model = get_called_class()::model;
        $table = $model::table;

        return DB::delete($table, $id);
    }

    public function test()
    {
        $result = UsersController::get(1);

        echo ("<pre>" . json_encode($result, JSON_PRETTY_PRINT) . "</pre>");
    }
}
