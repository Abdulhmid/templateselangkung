<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProvince extends Migration
{
    protected $table = "province";
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
                $table->increments('province_id');

                /** Main data  */
                $table->integer('country_id')->unsigned();
                $table->string('name');

                /** Action */
                $table->nullableTimestamps();

                /** Foreign Key */
                $table->foreign('country_id')->references('country_id')->on('country')
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
