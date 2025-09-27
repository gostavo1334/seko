<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('process_images', function (Blueprint $table) {
            $table->string('image_path')->after('id');
        });
    }

    public function down()
    {
        Schema::table('process_images', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }

};
