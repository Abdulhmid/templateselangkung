<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDriver extends Migration
{
    protected $table = "driver";
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
                $table->string('password');
                $table->timestamp('birth');
                $table->enum('gender', ['male', 'female'])->default('male');
                $table->text('photo')->nullable();
                $table->string('phone', 15)->nullable();
                $table->string('telp')->nullable();
                $table->string('ktp');
                $table->string('sim');
                $table->string('npwp');
                $table->string('latitude');
                $table->string('longitude');
                $table->tinyInteger('status')->default(0);
                $table->text('address')->nullable();
                $table->timestamp('last_login')->nullable();
                
                /* Relation */
                $table->integer('city_id')->unsigned();
                $table->string('postal_code');
                
                $table->string('created_by')->default('system')->nullable();


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
