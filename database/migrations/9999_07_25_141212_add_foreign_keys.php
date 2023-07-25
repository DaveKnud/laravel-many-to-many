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
        Schema::table('user_projects', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::table('user_types', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });

        Schema::table('project_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('user_project_id');
            $table->foreign('user_project_id')
                ->references('id')
                ->on('user_projects');

            $table->unsignedBigInteger('technology_id');
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_projects', function (Blueprint $table) {

            $table->dropForeign('user_projects_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('user_types', function (Blueprint $table) {
            $table->dropForeign('user_types_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('project_technology', function (Blueprint $table) {
            $table->dropForeign('project_technology_user_project_id_foreign');
            $table->dropForeign('project_technology_technology_id_foreign');

            $table->dropColumn('user_project_id');
            $table->dropColumn('technology_id');
        });
    }
};
