<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCategoryIdInQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('questions_category_id_foreign');
            $table->renameColumn('category_id', 'quiz_id');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('questions_quiz_id_foreign');
            $table->renameColumn('quiz_id', 'category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }
}
