<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // project-00.00.00* Point Release
            $table->unsignedInteger('working_group_id');
            $table->unsignedInteger('project_id');
            $table->dateTime('start_deployment');
            $table->dateTime('end_deployment');
            $table->string('type_of_service');
            $table->string('downtime_req');
            $table->string('business_hours');
            $table->foreign('working_group_id')
                  ->references('id')->on('working_groups')
                  ->onDelete('cascade');
            $table->foreign('project_id')
                  ->references('id')->on('projects')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('releases');
    }
}
