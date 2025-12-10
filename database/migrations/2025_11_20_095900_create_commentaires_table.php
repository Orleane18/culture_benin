<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id(); // id_commentaire
            $table->longText('texte');
            $table->integer('note')->nullable();
            $table->date('date');
            $table->foreignId('id_utilisateur')->nullable()->constrained('utilisateurs')->nullOnDelete();
            $table->foreignId('id_contenu')->nullable()->constrained('contenus')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}

