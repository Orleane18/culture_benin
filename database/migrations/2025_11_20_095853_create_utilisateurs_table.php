<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id(); // id_utilisateur
            $table->string('nom', 50);
            $table->string('prenom', 50)->nullable();
            $table->string('email', 100)->unique();
            $table->string('mot_de_passe', 100);
            $table->char('sexe', 1)->nullable();
            $table->date('date_inscription');
            $table->date('date_naissance')->nullable();
            $table->string('statut', 20)->nullable();
            $table->string('photo', 255)->nullable();
            $table->foreignId('id_role')->nullable()->constrained('roles')->nullOnDelete();
            $table->foreignId('id_langue')->nullable()->constrained('langues')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
