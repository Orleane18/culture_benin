<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenusTable extends Migration
{
    public function up()
    {
        Schema::create('contenus', function (Blueprint $table) {
            $table->id(); // id_contenu
            $table->string('titre', 255);
            $table->longText('texte')->nullable(); // CLOB
            $table->date('date_creation');
            $table->string('statut', 20)->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('contenus')->nullOnDelete();
            $table->date('date_validation')->nullable();
            $table->foreignId('id_region')->nullable()->constrained('regions')->nullOnDelete();
            $table->foreignId('id_langue')->nullable()->constrained('langues')->nullOnDelete();
            $table->foreignId('id_moderateur')->nullable()->constrained('utilisateurs')->nullOnDelete();
            $table->foreignId('id_type_contenu')->nullable()->constrained('type_contenus')->nullOnDelete();
            $table->foreignId('id_auteur')->nullable()->constrained('utilisateurs')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contenus');
    }
}
