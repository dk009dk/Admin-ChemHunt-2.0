<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->unique(['id','user_id']);
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->enum('day_1',['Done','Pending'])->default('Pending');
            $table->enum('day_2',['Done','Pending'])->default('Pending');
            $table->enum('day_3',['Done','Pending'])->default('Pending');
            $table->enum('day_4',['Done','Pending'])->default('Pending');
            $table->enum('day_5',['Done','Pending'])->default('Pending');
            $table->enum('day_6',['Done','Pending'])->default('Pending');
            $table->enum('day_7',['Done','Pending'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
