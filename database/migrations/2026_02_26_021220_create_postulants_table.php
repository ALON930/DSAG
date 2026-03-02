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
    Schema::create('postulants', function (Blueprint $table) {
        $table->id(); // id auto-incrément

        // Champs hérités de la table comptes
        $table->string('nom');
        $table->string('prenoms');
        $table->string('adresse')->nullable();
        $table->string('email')->unique();
        $table->string('telephone')->unique();
        $table->string('password');

        // Champs supplémentaires (oui / non / aucun)
        $table->enum('dispo', ['oui', 'non', 'aucun'])->default('aucun');
        $table->enum('niveau', ['oui', 'non', 'aucun'])->default('aucun');
        $table->enum('PC', ['oui', 'non', 'aucun'])->default('aucun');
        $table->enum('Droits_de_formation', ['oui', 'non', 'aucun'])->default('aucun');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulants');
    }
};
