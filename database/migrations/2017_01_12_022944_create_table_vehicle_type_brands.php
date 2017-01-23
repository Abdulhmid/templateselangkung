<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVehicleTypeBrands extends Migration
{
    protected $table = "vehicle_type_brands";
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        /* Tidak Jadi Di Gunakan */
        // if (!Schema::hasTable($this->table)) {
        //     Schema::create($this->table, function (Blueprint $table) {

        //         $table->engine = 'InnoDB';
        //         /** Primary key  */
        //         $table->increments('id');

        //         /** Main data  */
        //         $table->integer('vehicle_type_id')->unsigned();
        //         $table->string('brands');


        //         /** Action */
        //         $table->timestamps();
        //         /** Foreign Key */
        //         $table->foreign('vehicle_type_id')->references('id')->on('vehicle_type')
        //              ->onDelete('cascade')->onUpdate('cascade');
        //     });
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        // Schema::dropIfExists($this->table);
    }
}
