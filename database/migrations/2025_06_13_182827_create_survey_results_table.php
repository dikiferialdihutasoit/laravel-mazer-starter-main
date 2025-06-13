<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// dalam file ****_create_survey_results_table.php

public function up(): void
{
    Schema::create('survey_results', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('form_id'); // Untuk identifikasi form mana
        $table->json('scores'); // Menyimpan semua skor (0-5) dalam format JSON
        $table->text('notes')->nullable(); // Kolom untuk catatan/komentar
        $table->string('image_path')->nullable(); // Kolom untuk path/lokasi gambar
        $table->timestamps(); // Kolom created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_results');
    }
};
