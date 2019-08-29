<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tbl_employee', function (Blueprint $table) {
            $table->increments('emp_id');
            $table->string('epf_no')->unique();
            $table->string('dep_id')->default('');
            $table->string('name')->unique();
            $table->string('address')->default('');
            $table->string('id_no');
            $table->string('birth_date');
            $table->string('join_date');
            $table->string('gender');
            $table->string('profile')->default('');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tbl_employee');
    }

}
