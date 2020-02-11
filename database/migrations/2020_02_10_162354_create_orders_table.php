<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->char('order_number', 200);
            $table->unsignedInteger('item_discount')->default(0);
            $table->unsignedInteger('order_discount')->default(0);
            $table->unsignedInteger('total_discount')->default(0);
            $table->unsignedInteger('total')->default(0);
            $table->unsignedInteger('payable')->default(0);
            $table->text('address');
            $table->date('delivery_date')->nullable();
            $table->date('event_date')->nullable();

            $table->char('contact_person', 200);
            $table->char('contact_number', 200);

            $table->unsignedInteger('delivery_fee')->default(0);
            $table->char('delivery_method', 200);
            $table->char('delivery_tracking', 200);
            $table->unsignedTinyInteger('is_free_shipping')->default(0);

            $table->char('status', 200)->default('pending');

            $table->char('logo', 200)->nullable();

            $table->unsignedBigInteger('manager_id')->nullable();
            $table->foreign('manager_id')->references('id')->on('users');

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');

            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id')->references('id')->on('clients');

            $table->timestamp('pending_at')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('fullpaid_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            
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
        Schema::dropIfExists('orders');
    }
}
