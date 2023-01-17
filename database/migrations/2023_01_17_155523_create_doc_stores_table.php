<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_stores', function (Blueprint $table) {
            $table->id();
            $table->string('title', 45);
            $table->string('description', 255)->nullable();
            $table->timestamps();
            $table->foreignIdFor(App\Models\User::class, 'user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_stores');
    }
};
