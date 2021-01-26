<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defis', function (Blueprint $table) {
            $table->id();
            $table->boolean('estAdmin')->nullable()->default(false);
            $table->string('title');
            $table->text('description');
            $table->string('link');
            $table->string('password');
            $table->string("category");
            $table->enum("level", array(1, 2, 3, 4, 5));
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
        Schema::dropIfExists('defis');
    }
}
