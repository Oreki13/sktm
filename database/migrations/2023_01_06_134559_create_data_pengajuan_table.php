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
        Schema::create('tbl_data_pengajuan', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('nik', 100)->unique();
            $table->string('nama', 355);
            $table->string('email', 155);
            $table->string('jenis_kelamin', 50);
            $table->string('agama', 50);
            $table->string('pob', 50);
            $table->string('dob', 50);
            $table->string('address', 455);
            $table->string('pendidikan', 255);
            $table->string('pekerjaan', 355);
            $table->string('status', 10);
            $table->integer('is_deleted');
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
        Schema::dropIfExists('tbl_data_pengajuan');
    }
};
