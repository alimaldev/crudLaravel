<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email');
          $table->date('birthday');
          $table->timestamps();
        });

        Schema::create('address', function (Blueprint $table) {
          $table->increments('id');
          $table->string('idEmployee');
          $table->string('address');
          $table->string('latitude');
          $table->string('longitude');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
      Schema::drop('employees');
      Schema::drop('address');
    }
}
