<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    protected $table = "orders";
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
                
                $table->integer('customer_id')->unsigned();
                $table->integer('driver_id')->nullable()->unsigned();
                $table->string('code')->unique();
                $table->string('name_packages');
                $table->integer('category_id')->unsigned();
                $table->integer('packages_id')->unsigned();
                $table->enum('status', ['create','expired','paid','canceled','on_progress','done'])
                    ->default('male');

                $table->integer('city_id_from')->unsigned();
                $table->text('address_from');
                $table->string('latitude_from');
                $table->string('longitude_from');
                $table->string('name_contact_from');
                $table->string('phone_from');

                $table->integer('city_id_to')->unsigned();
                $table->text('address_to');
                $table->string('latitude_to');
                $table->string('longitude_to');
                $table->string('name_contact_to');
                $table->string('phone_to');

                $table->decimal('deal_price', 18, 2)->nullable();
                $table->timestamp('pick_up_date')->nullable();

                $table->string('created_by')->default('system')->nullable();

                /* Relation */         
                $table->foreign('customer_id')->references('id')->on('customers')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('driver_id')->references('id')->on('driver')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('city_id_from')->references('city_id')->on('city')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('city_id_to')->references('city_id')->on('city')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('category_id')->references('id')->on('order_category')
                        ->onDelete('cascade')->onUpdate('cascade');

                $table->foreign('packages_id')->references('id')->on('packages_category')
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
