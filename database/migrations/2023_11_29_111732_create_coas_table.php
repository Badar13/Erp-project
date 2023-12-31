<?php

use Brick\Math\BigInteger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreateCoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coas', function (Blueprint $table) {
            $table->id();
            $table->string('coacode')->nullable();
            $table->string('coaname')->nullable();
            $table->boolean('operational')->default(true);
            $table->string('refaccode')->nullable();
            $table->integer('parentid')->nullable();
            $table->string('parentcoacode')->nullable();
            $table->string('Level-1')->nullable();
            $table->string('Level-2')->nullable();
            $table->string('Level-3')->nullable();
            $table->string('Level-4')->nullable();
            $table->string('Level-5')->nullable();
            $table->string('Level-6')->nullable();
            $table->string('Level-7')->nullable();
            $table->string('accountype')->nullable();
            $table->string('System_Manual')->nullable();
            $table->string('Transactiontype')->nullable();
            $table->string('currentbalance')->nullable();
            $table->string('openbalance')->nullable();
            $table->string('openingdate')->nullable();
            $table->boolean('is_active')->default(true)->nullable();
            $table->timestamps();

            // $table->unsignedBigInteger('mainheadlevel_id');
            // $table->foreign('mainheadlevel_id')->references('id')->on('coamainheadlevels')->onDelete('cascade');

            $table->unsignedBigInteger('accountcategory_id');
            $table->foreign('accountcategory_id')->references('id')->on('accountcategories')->onDelete('cascade');

            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coas');
    }
}
