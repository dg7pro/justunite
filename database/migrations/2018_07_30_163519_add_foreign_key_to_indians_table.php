<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToIndiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indians', function (Blueprint $table) {

            $table->integer('category_id')->unsigned()->after('id');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indians', function (Blueprint $table) {

            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');

        });
    }
}
