<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('comptes', function (Blueprint $table) {
        $table->id(); // id auto-incrément
        $table->string('nom'); // Nom
        $table->string('prenoms'); // Prénoms
        $table->string('adresse')->nullable(); // Adresse (nullable si optionnel)
        $table->string('email')->unique(); // Email unique
        $table->string('telephone')->unique(); // Numéro de téléphone unique
        $table->string('password'); // Mot de passe
        $table->timestamps(); // created_at et updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
