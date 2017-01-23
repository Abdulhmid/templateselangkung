<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomers extends Migration
{
    protected $table = "customers";
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
                
                $table->string('name');
                $table->string('email')->unique();
                $table->string('phone', 15)->nullable();
                $table->string('password');
                $table->text('address')->nullable();
                $table->integer('city_id')->unsigned();
                $table->string('latitude');
                $table->string('longitude');
                
                $table->string('created_by')->default('system')->nullable();

                /* Relation */         
                $table->foreign('city_id')->references('city_id')->on('city')
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
