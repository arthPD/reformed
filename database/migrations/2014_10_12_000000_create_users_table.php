<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email_address')->nullable();
            $table->boolean('isPledgor')->nullable()->default(0);
            $table->string('amount')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('breakdowns', function (Blueprint $table) {
            $table->integer('recordpledge_id')->unsigned();
            $table->foreign('recordpledge_id')->references('id')->on('recordpledge')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->nullable()->onDelete('cascade');
            $table->integer('ones')->nullable();
            $table->integer('fives')->nullable();
            $table->integer('tens')->nullable();
            $table->integer('twenties')->nullable();
            $table->integer('fifties')->nullable();
            $table->integer('hundreds')->nullable();
            $table->integer('two_hundreds')->nullable();
            $table->integer('five_hundreds')->nullable();
            $table->integer('thousands')->nullable();
            $table->integer('total')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Arth',
                'username' => "arthpd",
                'password' => \Hash::make('123456'),
                'address' => 'Mapayapa St. Peñafrancia, Brgy. Mayamot, Antipolo City',
                'email_address' => 'arthdano@gmail.com',
                'contact_number' => '09055909948',
                'birthday' => '09/21/1996',
                'isPledgor' => false,
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('breakdowns');
    }
}
