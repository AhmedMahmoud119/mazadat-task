<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCategoryPropertiesTable extends Migration
{
    public function up()
    {
        Schema::table('category_properties', function (Blueprint $table) {
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id', 'sub_category_fk_7600761')->references('id')->on('sub_categories');
        });
    }
}
