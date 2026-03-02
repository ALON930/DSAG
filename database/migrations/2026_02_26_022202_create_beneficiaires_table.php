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
    Schema::create('beneficiaires', function (Blueprint $table) {
        $table->id(); // id auto-incrément

        // Champs hérités de la table comptes
        $table->string('nom');
        $table->string('prenoms');
        $table->string('adresse')->nullable();
        $table->string('email')->unique();
        $table->string('telephone')->unique();
        $table->string('password');

        // Nouveau champ : numéro unique
        $table->string('numero_unique')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiaires');
    }
};
