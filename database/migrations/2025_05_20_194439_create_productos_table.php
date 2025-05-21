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
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('codigo')->unique();
        $table->string('serie')->nullable(); // A o B
        $table->foreignId('marca_id')->constrained()->onDelete('cascade');
        $table->foreignId('rubro_id')->constrained()->onDelete('cascade');
        $table->foreignId('subrubro_id')->constrained()->onDelete('cascade');
        $table->foreignId('grupo_id')->nullable()->constrained()->onDelete('set null');
        $table->foreignId('sector_id')->nullable()->constrained()->onDelete('set null');
        $table->decimal('precio', 10, 2);
        $table->integer('stock')->default(0);
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
        Schema::dropIfExists('productos');
    }
};
