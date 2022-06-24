<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('empl_id');
            $table->string('empl_name',50)->nullable();
            $table->string('empl_phone',20)->unique();
            $table->string('empl_email',50)->nullable();
            $table->integer('empl_salary')->default(0);
            $table->date('empl_dob')->nullable();
            $table->mediumText('empl_address')->nullable();
            $table->string('empl_photo',70)->nullable();
            $table->unsignedBigInteger('empl_creator')->nullable();
            $table->string('empl_slug',50)->nullable();
            $table->enum('empl_status',['active','inactive','suspend','reject'])->default('active');
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
        Schema::dropIfExists('employees');
    }
}
