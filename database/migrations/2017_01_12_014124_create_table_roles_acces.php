<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRolesAcces extends Migration
{
    protected $table = "role_access";
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
                /** Primary key  */
                $table->increments('id');

                /** Main data  */
                $table->text('access_data');
                
                /** Foreign Key */
                $table->integer('role_id')->unsigned();
                $table->foreign('role_id')->references('id')->on('roles')
                        ->onDelete('cascade')->onUpdate('cascade');
                
                $table->integer('module_id')->unsigned();
                $table->foreign('module_id')->references('id')->on('modules')
                        ->onDelete('cascade')->onUpdate('cascade');

                /** Action */
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
