<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** Run the migrations. */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $blueprint): void {
            $blueprint->uuid('id')->primary();
            $blueprint->string('name', 192);
            $blueprint->string('email')->unique();
            $blueprint->string('password');
            $blueprint->string('avatar')->nullable();
            $blueprint->string('phone')->nullable();
            $blueprint->string('city', 192)->nullable();
            $blueprint->string('address')->nullable();
            $blueprint->string('country', 192)->nullable();
            $blueprint->unsignedInteger('role_id')->nullable();
            $blueprint->boolean('status')->default(true);
            $blueprint->boolean('is_all_warehouses')->default(false);
            $blueprint->integer('default_client_id')->nullable();
            $blueprint->integer('default_warehouse_id')->nullable();
            $blueprint->foreignId('provider_id')->nullable();
            $blueprint->softDeletes();
            $blueprint->rememberToken();
            $blueprint->timestamps();
        });
        // User::create([
        //         'name' => 'Admin',
        //         'email' => 'admin1@gmail.com',
        //         'password' => bcrypt('password'),
        //         'avatar' => 'avatar.png',
        //         'phone' => '0123456789',
        //         'role_id' => 1,
        //         'status' => \App\Enums\Status::ACTIVE,
        //         'is_all_warehouses' => true,
        //         'remember_token' => null,
        //         'created_at' => now(),
        // ]);

        Schema::create('password_reset_tokens', function (Blueprint $blueprint): void {
            $blueprint->string('email')->primary();
            $blueprint->string('token');
            $blueprint->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $blueprint): void {
            $blueprint->string('id')->primary();
            $blueprint->foreignId('user_id')->nullable()->index();
            $blueprint->string('ip_address', 45)->nullable();
            $blueprint->text('user_agent')->nullable();
            $blueprint->longText('payload');
            $blueprint->integer('last_activity')->index();
        });
    }

    /** Reverse the migrations. */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
