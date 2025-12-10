<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Utilisateur qui a payé (FK vers la table 'utilisateurs')
            $table->foreignId('id_utilisateur')
                ->constrained('utilisateurs')
                ->onDelete('cascade');

            // ID de la transaction côté FedaPay
            $table->string('transaction_id')->nullable();

            // Contenu concerné
            $table->string('id_type_contenu');        // article, video, podcast...
            $table->unsignedBigInteger('id_contenu'); // ID du contenu

            // Montant payé
            $table->decimal('montant', 10, 2);

            // Statut du paiement
            $table->string('status')->default('pending');

            // Métadonnées
            $table->json('metadata')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
