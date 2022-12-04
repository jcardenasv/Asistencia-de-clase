<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_attendance');
            $table->bigInteger('id_student');
            $table->foreign('id_attendance')
                ->references('id')
                ->on('attendances')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_student')
                ->references('num_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('class_attendances');
    }
};
