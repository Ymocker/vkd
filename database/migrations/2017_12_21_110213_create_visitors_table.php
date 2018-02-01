<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            //$table->integer('page_id')->unsigned();
            $table->integer('ip')->unsigned();
            $table->ipAddress('ipAddr');
            $table->integer('visit_date')->unsigned();
            $table->string('ref')->nullable();
            $table->string('agent')->nullable();
            $table->timestamps();

            /**
             * Add Foreign/Unique/Index
             */
            /*$table->foreign('page_id')
                ->references('id')
                ->on('pages');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('visitors');
    }
}
