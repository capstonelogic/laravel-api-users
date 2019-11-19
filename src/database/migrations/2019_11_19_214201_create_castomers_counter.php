<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use CapstoneLogic\Stats\Model\Stats;

class CreateCastomersCounter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Stats::create([
            'title' => 'Customers',
            'key' => 'customers',
            'icon' => '<i class="fas fa-users"></i>',
            'css_classes' => 'text-white bg-primary',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
