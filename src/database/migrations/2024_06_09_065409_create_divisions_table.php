<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::connection('golflinks')->create('divisions', function (Blueprint $table) {
    //         $table->increments('id');
    //         $table->unsignedBigInteger('member_id')->nullable();            
            
	// 		$table->uuid('uuid');
	// 		$table->string('title', '255');
	// 		$table->longText('description')->nullable();
	// 		$table->json('formated_data')->nullable();
	// 		$table->char('is_active', '1')->nullable()->default('1');
	// 		$table->string('barcode')->nullable();
	// 		$table->string('qrcode')->nullable();
	// 		$table->softDeletes();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::connection('golflinks')->dropIfExists('divisions');
    // }
}