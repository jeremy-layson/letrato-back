<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtendItemDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->char('centerpiece', 200)->nullable();
            $table->char('centerpiece_note', 200)->nullable();
            $table->char('necklace', 200)->nullable();
            $table->char('necklace_note', 200)->nullable();
            $table->char('item_note', 200)->nullable();
            $table->char('logo', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn([
                'centerpiece',
                'centerpiece_note',
                'necklace',
                'necklace_note',
                'item_note',
                'logo'
            ]);
        });
    }
}
