<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string("userId");
            $table->string("name");
            $table->string("lastname");
            $table->string("prefix");
            $table->string("govermentId");
            $table->string("address");
            $table->string("email");
            $table->date("dob");
            $table->string("startDate");
            $table->string("endDate");
            $table->string("beneficial");

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
