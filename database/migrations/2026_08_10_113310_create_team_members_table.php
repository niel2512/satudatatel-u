<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');             // jabatan / role
            $table->string('photo')->nullable();    // path di storage/app/public
            $table->boolean('is_leader')->default(false); // apakah ketua tim
            $table->unsignedSmallInteger('order')->default(0); // urutan tampil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
