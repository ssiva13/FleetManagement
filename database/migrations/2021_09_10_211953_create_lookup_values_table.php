<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLookupValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookup_values', function (Blueprint $table) {
            $table->id();
	        $table->unsignedBigInteger('fk_lookup_list');
	        $table->string('option_key')->nullable();
	        $table->string('option_value');
	        $table->tinyInteger('status')->default(0);
            $table->timestamps();
	
	        $table->index(['fk_lookup_list', 'option_key'], 'un_lookup_list');
	        $table->foreign('fk_lookup_list', 'fk_lookup_list')->references('id')->on('lookup_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lookup_value');
    }
}
