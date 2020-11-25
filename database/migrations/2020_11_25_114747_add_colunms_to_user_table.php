<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunmsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->unsignedTinyInteger('role')->default(9)->comment('회원 레벨');
                $table->boolean('is_receive_marketing_agree')->default(true)->comment('광고 마케팅 수신 동의 여부');

                $table->string('phone_number')->nullable()->comment('휴대폰번호');
                $table->text('about')->nullable()->comment('자기소개');
                $table->string('profile')->nullable()->comment('프로필사진');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                //
            }
        );
    }
}
