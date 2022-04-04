<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTodoTable extends Migration
{
    public function up()
    {
        $fields = [
            "id" => [
                "type"=> "INT",
                "unsigned"=> true,
                "auto_increment"=> true,
            ],
            "title" => [
                "type"=> "VARCHAR",
                "constraint" => "200",
                "null" => false,
            ],
            "description" => [
                "type"=> "TEXT",
                "null" => true,
            ],
            "finished_at" => [
                "type"=> "DATETIME",
                "null" => true,
                
            ],
            "status" =>[
                "type"=> "TEXT",
                "null"=>"false",
                "default"=>"Pending",
            ],
            "created_at DATETIME  DEFAULT CURRENT_TIMESTAMP",
            "updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP",
            "deleted_at" => [
                "type"=> "DATETIME",
                "null" => true,
                
            ],
        ];
        $this->forge->addKey('id', true);
        $this->forge->addField($fields);
        $this->forge->createTable('todos', true); //If NOT EXISTS create table todos
    }

    public function down()
    {
        $this->forge->dropTable('todos', true); //If Exists drop table todos
    }
}