<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1 : Renommer les colonnes si elles existent
        Schema::table('payments', function (Blueprint $table) {

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

        // 2 : Ajouter proprement la contrainte FK (sans drop)
        Schema::table('payments', function (Blueprint $table) {

            if (!Schema::hasColumn('payments', 'user_id')) {
                return;
            }

            // Vérifier si une FK existe déjà, sinon Laravel va créer une nouvelle clean
            // ⚠ PAS de dropForeign() → Railway n'accepte pas.

            $table->foreign('user_id')
                  ->references('id')
                  ->on('utilisateurs')
                  ->onDelete('cascade');

            // Mise à jour des types (aucune suppression)
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

    public function down(): void
    {
        // 3 : rollback sans dropForeign (toujours interdit en build Railway)
        Schema::table('payments', function (Blueprint $table) {

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
