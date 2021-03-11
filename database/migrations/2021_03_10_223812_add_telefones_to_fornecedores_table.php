<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTelefonesToFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('telefone2', 14)->nullable(true);
            $table->string('telefone3', 14)->nullable(true);
            $table->string('telefone4', 14)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropColumn('telefone2');
            $table->dropColumn('telefone3');
            $table->dropColumn('telefone4');
        });
    }
}
