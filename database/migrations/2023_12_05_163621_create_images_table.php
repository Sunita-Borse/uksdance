<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
             $table->timestamps();
           $table->unsignedInteger('studentinfo_id')->nullable()->default(NULL);
           // $table->foreignId(column:'studentinfo_id')->nullable()->constrained(table:'studentinfos');
	  // $table->foreign('studentinfo_id')->references('id')->on('studentinfos')->onDelete('cascade'); 
          //$table->foreignId('studentinfo_id')->constrained('studentinfos');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
