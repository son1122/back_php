<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {

            $table->id();

            $table->string("username");
            $table->string("password");
            $table->string("name");
            $table->string("lastname");
            $table->string("prefix");
            $table->string("address");
            $table->string("subDistrict");
            $table->string("district");
            $table->string("province");
            $table->string("zip");
            $table->string("phone");
            $table->string("email");
            $table->string("registerId");
            $table->string("govermentId");
            $table->date("dateRegister");
            $table->integer("packageId");

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
