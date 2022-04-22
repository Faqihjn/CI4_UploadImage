<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhotoColumnToTodo extends Migration
{
    public function up()
    {
        $fields = [
            "photo" => [
                "type"=> "TEXT",
            ],
        ];

        $this->forge->addColumn('todos', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('todoss', 'photo');
    }
}
