<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('characters', function($table) {
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->integer('age');
            $table->string('image_url');
            $table->longText('bio');
            $table->longText('description');
        });
    }

    public function down()
    {
        Schema::table('characters', function($table) {
            $table->dropColumn('user_id');
            $table->dropColumn('name');
            $table->dropColumn('surname');
            $table->dropColumn('age');
            $table->dropColumn('image_url');
            $table->dropColumn('bio');
            $table->dropColumn('description');
        });
    }
};
