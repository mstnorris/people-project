<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->timestamp('date_of_birth');
            $table->string('gender');
            $table->string('eye_colour');
            $table->string('blood_type');
            $table->string('first_language');
            $table->string('footed');
            $table->string('handed');
            $table->string('fathers_first_name');
            $table->string('fathers_middle_name')->nullable();
            $table->string('fathers_last_name');
            $table->string('mothers_first_name');
            $table->string('mothers_middle_name')->nullable();
            $table->string('mothers_last_name');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
