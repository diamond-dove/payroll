<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    protected $string_limit     = 100;
    protected $agent_data_limit = 15;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', $this->string_limit)->nullable();
            $table->string('agent_id', $this->string_limit)->nullable();
            $table->string('current_user_group', $this->string_limit)->nullable();
            $table->string('most_recent_user_group', $this->string_limit)->nullable();
            $table->string('calls', $this->agent_data_limit)->nullable();
            $table->string('time', $this->agent_data_limit)->nullable();
            $table->string('pause', $this->agent_data_limit)->nullable();
            $table->string('pauseavg', $this->agent_data_limit)->nullable();
            $table->string('waitavg', $this->agent_data_limit)->nullable();
            $table->string('talkavg', $this->agent_data_limit)->nullable();
            $table->string('dispo', $this->agent_data_limit)->nullable();
            $table->string('dispoavg', $this->agent_data_limit)->nullable();
            $table->string('dead', $this->agent_data_limit)->nullable();
            $table->string('deadavg', $this->agent_data_limit)->nullable();
            $table->string('customer', $this->agent_data_limit)->nullable();
            $table->string('custavg', $this->agent_data_limit)->nullable();
            $table->string('a', $this->agent_data_limit)->nullable();
            $table->string('b', $this->agent_data_limit)->nullable();
            $table->string('callbk', $this->agent_data_limit)->nullable();
            $table->string('dc', $this->agent_data_limit)->nullable();
            $table->string('dec', $this->agent_data_limit)->nullable();
            $table->string('dnc', $this->agent_data_limit)->nullable();
            $table->string('front', $this->agent_data_limit)->nullable();
            $table->string('frontf', $this->agent_data_limit)->nullable();
            $table->string('n', $this->agent_data_limit)->nullable();
            $table->string('ni', $this->agent_data_limit)->nullable();
            $table->string('nomed', $this->agent_data_limit)->nullable();
            $table->string('np', $this->agent_data_limit)->nullable();
            $table->string('pu', $this->agent_data_limit)->nullable();
            $table->string('sale', $this->agent_data_limit)->nullable();
            $table->string('slam', $this->agent_data_limit)->nullable();
            $table->string('xfer', $this->agent_data_limit)->nullable();
            $table->integer('csv_import_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
