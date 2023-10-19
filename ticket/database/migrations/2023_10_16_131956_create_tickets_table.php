<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
          //  $table->unsignedBigInteger('department_id')->nullable();
          //  $table->unsignedBigInteger('level_id')->nullable();
            $table->uuid('uuid');
            $table->string('department',150)->nullable();
            $table->string('level',150)->nullable();
            $table->string('subject',150)->nullable();
            $table->text('message')->nullable();
        //    $table->enum('status',['0','1'])->default('1');
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::table('tickets', function($table){
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
          //  $table->foreign('department_id')->on('departments')->references('id')->onDelete('cascade');
           // $table->foreign('level_id')->on('levels')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
