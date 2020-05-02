<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedWorkshopconnectionToWorkshopImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshop_images', function (Blueprint $table) {
            $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workshop_images', function (Blueprint $table) {
            $table->dropForeign('workshop_images_workshop_id_foreign');
        });
    }
}
