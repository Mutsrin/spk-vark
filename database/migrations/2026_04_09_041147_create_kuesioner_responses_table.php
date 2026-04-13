<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuesionerResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('kuesioner_responses', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->nullable();
            
            // Preferensi Sensorik (PS1-PS4)
            $table->integer('ps1')->default(0);
            $table->integer('ps2')->default(0);
            $table->integer('ps3')->default(0);
            $table->integer('ps4')->default(0);
            
            // Metode Pemrosesan Informasi (MP1-MP4)
            $table->integer('mp1')->default(0);
            $table->integer('mp2')->default(0);
            $table->integer('mp3')->default(0);
            $table->integer('mp4')->default(0);
            
            // Media dan Alat Belajar (MA1-MA4)
            $table->integer('ma1')->default(0);
            $table->integer('ma2')->default(0);
            $table->integer('ma3')->default(0);
            $table->integer('ma4')->default(0);
            
            // Lingkungan dan Kondisi Belajar (LK1-LK4)
            $table->integer('lk1')->default(0);
            $table->integer('lk2')->default(0);
            $table->integer('lk3')->default(0);
            $table->integer('lk4')->default(0);
            
            // Hasil Perhitungan
            $table->decimal('nilai_visual', 10, 4)->nullable();
            $table->decimal('nilai_auditory', 10, 4)->nullable();
            $table->decimal('nilai_readwrite', 10, 4)->nullable();
            $table->decimal('nilai_kinesthetic', 10, 4)->nullable();
            $table->string('rekomendasi_terbaik')->nullable();
            $table->decimal('nilai_tertinggi', 10, 4)->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kuesioner_responses');
    }
}