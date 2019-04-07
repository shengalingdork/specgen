<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('release_id');
            $table->unsignedInteger('ticket_id');
            $table->unsignedInteger('support_team_id');
            $table->unsignedInteger('environment_id');
            $table->foreign('release_id')
                  ->references('id')->on('releases')
                  ->onDelete('cascade');
            $table->foreign('ticket_id')
                  ->references('id')->on('tickets')
                  ->onDelete('cascade');
            $table->foreign('support_team_id')
                  ->references('id')->on('support_teams');
            $table->foreign('environment_id')
                  ->references('id')->on('environments');
            $table->longText('instruction');
            $table->text('db_code_review_link')
                  ->nullable();
            $table->string('db_affected_core_table')
                  ->nullable();
            $table->integer('db_revision_num')
                  ->nullable();
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
        Schema::dropIfExists('instructions');
    }
}
