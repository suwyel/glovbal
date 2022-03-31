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
        Schema::create('generels', function (Blueprint $table) {
            $table->id();


            $table->string('name');
            $table->longText('value');


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
        Schema::dropIfExists('generels');
    }
};




// $table->string('team_one_name');
// $table->string('team_one_image_type');
// $table->string('team_one_url')->nullable();
// $table->string('team_one_image')->nullable();
// $table->string('team_two_name');
// $table->string('team_two_image_type');
// $table->string('team_two_url')->nullable();
// $table->string('team_two_image')->nullable();
// $table->string('match_title');
// $table->string('match_time');
// $table->string('match_date');


//   protected $fillable = [
//         'team_one_image_type',
//         'team_one_url',
//         'team_one_image',
//         'team_two_name',
//         'team_two_image_type',
//         'team_two_url',
//         'team_two_image',
//         'match_title',
//         'match_time',
//         'match_date',
//     ];
