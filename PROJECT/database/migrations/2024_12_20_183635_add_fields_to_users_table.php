<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('id_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->enum('membership_status', ['active', 'inactive'])->default('inactive');
            $table->date('renewal_date')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id_number', 'contact_number', 'membership_status', 'renewal_date']);
        });
    }
    
};
