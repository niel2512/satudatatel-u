<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('description_detail')->nullable();
            $table->foreignId('directorate_id')->constrained()->cascadeOnDelete();
            $table->foreignId('data_owner_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('data_categories')->nullOnDelete();
            $table->string('data_format', 20)->nullable();   // CSV, JSON, Excel, PDF
            $table->string('file_size', 20)->nullable();     // e.g. "2.4 MB"
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->date('last_updated_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('datasets');
    }
};
