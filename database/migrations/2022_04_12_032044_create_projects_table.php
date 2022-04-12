<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('project_id');
            $table->string('project_name',50);
            $table->string('project_description',255)->nullable();
            $table->string('project_code',10)->unique();
            $table->smallInteger('project_status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project');
    }
}
