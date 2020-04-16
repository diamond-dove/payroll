<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWaitColumnToAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agents', function (Blueprint $table) {
            //
            $table->string('wait')->after('pauseavg')->nullable();
            $table->string('talk')->after('waitavg')->nullable();
            $table->string('frontn')->after('frontf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agents', function (Blueprint $table) {
            //
            $table->dropColumn(['wait', 'talk', 'frontn']);
        });
    }
}
