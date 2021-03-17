<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOriginalTweetIdToTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->bigInteger('original_tweet_id')->unsigned()->index()->nullable();
            //Deletes RTs if origianl tweet is deleted
            //DO LATE:: Change this to show original tweet was deleted
            $table->foreign('original_tweet_id')->references('id')->on('tweets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
            $table->dropColumn('original_tweet_id');
        });
    }
}
