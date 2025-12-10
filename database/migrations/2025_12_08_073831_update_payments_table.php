<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Apply the migration updates.
     */
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            // Renommer uniquement si les colonnes existent
            if (Schema::hasColumn('payments', 'id_utilisateur')) {
                $table->renameColumn('id_utilisateur', 'user_id');
            }

            if (Schema::hasColumn('payments', 'id_type_contenu')) {
                $table->renameColumn('id_type_contenu', 'content_type');
            }

            if (Schema::hasColumn('payments', 'id_contenu')) {
                $table->renameColumn('id_contenu', 'content_id');
            }

            if (Schema::hasColumn('payments', 'montant')) {
                $table->renameColumn('montant', 'amount');
            }
        });

        // Re-création propre de la FK une fois les colonnes renommées
        Schema::table('payments', function (Blueprint $table) {

            // Si user_id n'existe pas, inutile d'aller plus loin
            if (!Schema::hasColumn('payments', 'user_id')) {
                return;
            }

            // Supprimer l'ancienne FK (si elle existe)
            // Railway n'aime pas les DROP FOREIGN KEY inexistants → try/catch obligatoire
            try {
                $table->dropForeign(['user_id']);
            } catch (\Throwable $e) {
                // aucune FK à supprimer, on ignore
            }

            // Recréer la FK vers la bonne table "utilisateurs"
            $table->foreign('user_id')
                ->references('id')
                ->on('utilisateurs')
                ->onDelete('cascade');

            // Mise à jour des types
            if (Schema::hasColumn('payments', 'content_type')) {
                $table->string('content_type')->change();
            }

            if (Schema::hasColumn('payments', 'content_id')) {
                $table->unsignedBigInteger('content_id')->change();
            }

            if (Schema::hasColumn('payments', 'amount')) {
                $table->decimal('amount', 10, 2)->change();
            }
        });
    }

    /**
     * Reverse changes.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            // Supprimer FK proprement
            try {
                $table->dropForeign(['user_id']);
            } catch (\Throwable $e) {
                // ignore
            }

            // revert column names
            if (Schema::hasColumn('payments', 'user_id')) {
                $table->renameColumn('user_id', 'id_utilisateur');
            }

            if (Schema::hasColumn('payments', 'content_type')) {
                $table->renameColumn('content_type', 'id_type_contenu');
            }

            if (Schema::hasColumn('payments', 'content_id')) {
                $table->renameColumn('content_id', 'id_contenu');
            }

            if (Schema::hasColumn('payments', 'amount')) {
                $table->renameColumn('amount', 'montant');
            }
        });
    }
};
