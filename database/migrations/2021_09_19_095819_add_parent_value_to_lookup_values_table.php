<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentValueToLookupValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lookup_values', function (Blueprint $table) {
	        $table->unsignedBigInteger('fk_parent_value')->nullable();
	        $table->boolean('has_children')->default(false);
	        
	        $table->foreign('fk_parent_value', 'fk_parent_value')->references('id')->on('lookup_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lookup_values', function (Blueprint $table) {
            //
        });
    }
}
