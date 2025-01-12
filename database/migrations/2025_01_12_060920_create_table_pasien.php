<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_pasien', function (Blueprint $table) {
            $table->charset('utf8mb4');
            $table->collation('utf8mb4_unicode_ci');
            $table->engine('InnoDB');
            $table->increments('id_pasien');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
      //      $table->integer('id_outlet',10);
            $table->integer('id_outlet');
            $table->timestamps();
         
     //       $table->foreign('id_outlet')->references('id')->on('table_outlet');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_pasien');
    }
};
