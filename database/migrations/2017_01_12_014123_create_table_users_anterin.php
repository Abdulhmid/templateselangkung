<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersAnterin extends Migration
{
    protected $table = "users";
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
                $table->string('username')->unique();
                $table->string('email')->unique();
                $table->string('password');
                $table->timestamp('birth');
                $table->enum('gender', ['male', 'female'])->default('male');
                $table->text('photo')->nullable();
                $table->string('phone', 15)->nullable();
                $table->string('telp')->nullable();
                $table->timestamp('last_login')->nullable();
                $table->tinyInteger('active')->default(0);
                $table->string('created_by')->default('system')->nullable();
                $table->rememberToken();

                $table->integer('role_id')->unsigned();

                $table->foreign('role_id')->references('id')->on('roles')
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
