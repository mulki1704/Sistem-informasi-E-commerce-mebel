<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_seeder_creates_loginable_admin_user(): void
    {
        $this->artisan('db:seed', ['--class' => 'adminseeder'])->assertExitCode(0);

        $user = \App\Models\User::where('email', 'mulki1704@gmail.com')->first();

        $this->assertNotNull($user);
        $this->assertSame('admin', $user->role);
        $this->assertTrue(Hash::check('12345678', $user->password));
    }
}
