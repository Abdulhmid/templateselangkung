<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderBids extends Migration
{
    protected $table = "order_bids";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->table)) {
            Schema::create($this->table, function (Blueprint $table) {

                $table->engine = 'InnoDB';
                $table->increments('id');
                
                $table->string('order_code');
                $table->integer('driver_id')->unsigned();
                $table->integer('vehicle_id')->unsigned();
                $table->integer('vehicle_type_id')->unsigned();
                $table->string('vehicle_brands');

                $table->enum('status', ['new','accept', 'reject'])->default('new');
                $table->decimal('offer_costs', 18, 2);
                
                $table->string('created_by')->default('system')->nullable();

                /* Relation */         
                $table->foreign('order_code')->references('code')->on('orders')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('driver_id')->references('id')->on('driver')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('vehicle_id')->references('id')->on('vehicle')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('vehicle_type_id')->references('id')->on('vehicle_type')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->timestamps();

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
