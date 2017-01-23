<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVehicleMinimalCosts extends Migration
{
    protected $table = "vehicle_minimal_costs";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (!Schema::hasTable($this->table)) {
            Schema::create($this->table, function (Blueprint $table) {

                $table->engine = 'InnoDB';
                /** Primary key  */
                $table->increments('id');

                /** Main data  */
                $table->integer('vehicle_id')->unsigned();
                $table->decimal('costs', 18, 2);


                /** Action */
                $table->timestamps();
                /** Foreign Key */
                $table->foreign('vehicle_id')->references('id')->on('vehicle')
                     ->onDelete('cascade')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists($this->table);
    }
}
