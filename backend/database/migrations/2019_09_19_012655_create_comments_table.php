<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->text('comment');
            $table->timestamps();
        });
        // ! Inserting comments.
        DB::statement("COMMENT ON COLUMN comments.user_id IS 'User id for who own the comment'");
        DB::statement("COMMENT ON COLUMN comments.post_id IS 'Post id for the comment belongs to'");
        DB::statement("COMMENT ON COLUMN comments.comment IS 'Post comment'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
