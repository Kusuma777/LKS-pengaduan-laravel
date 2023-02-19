<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_reports', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 20);
            $table->char('nama', 255);
            $table->char('email', 50);
            $table->char('hp', 20);
            $table->text('aduan');
            $table->char('status', 20);
            $table->text('respon');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('foto3');
            $table->string('foto4');
            $table->string('foto5');
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
        Schema::dropIfExists('_reports');
    }
}
