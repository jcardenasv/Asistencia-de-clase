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
            $table->unsignedBigInteger('id_attendance_record');
            $table->unsignedBigInteger('id_student');
            $table->foreign('id_attendance_record')
                ->references('id')
                ->on('attendance_records')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_student')
                ->references('id')
                ->on('students')
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
