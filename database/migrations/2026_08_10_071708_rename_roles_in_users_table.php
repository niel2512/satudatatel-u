<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Migrate existing roles:
        // super_admin → administrator
        // admin_puti  → administrator  (PuTI menjadi satu dengan administrator)
        // data_owner  → data_owner     (tetap)
        DB::table('users')
            ->whereIn('role', ['super_admin', 'admin_puti'])
            ->update(['role' => 'administrator']);

        // Ubah panjang kolom (opsional, tapi bersihkan default lama)
        Schema::table('users', function (Blueprint $table) {
            $table->string('role', 20)->default('data_owner')->change();
        });
    }

    public function down(): void
    {
        // Rollback: administrator → super_admin
        DB::table('users')
            ->where('role', 'administrator')
            ->update(['role' => 'super_admin']);
    }
};
