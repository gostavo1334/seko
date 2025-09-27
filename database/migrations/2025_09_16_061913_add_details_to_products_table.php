<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('ingredients')->nullable();
            $table->text('usage_instructions')->nullable();
            // Add any other fields you need
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('ingredients');
            $table->dropColumn('usage_instructions');
            // Drop any other fields you added
        });
    }
}

