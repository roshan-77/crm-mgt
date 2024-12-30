<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 50); 
            $table->string('number', 15);
            $table->boolean('company'); //If a project is from company(1) or an individual(0) client.
            $table->boolean('lead'); 
            $table->string('address', 50)->nullable();
            $table->string('referred_by', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
