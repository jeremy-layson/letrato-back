<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->char('name', 200);
            $table->char('company', 200)->nullable();
            $table->char('fb_message_id', 200)->nullable();
            $table->char('email', 200)->nullable();
            $table->char('channel', 200)->nullable();
            $table->unsignedTinyInteger('has_not_pushed_through')->nullable();
            $table->char('reason', 200)->nullable();
            $table->unsignedInteger('pieces')->default(0);

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inquiries');
    }
}
