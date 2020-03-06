<?php

namespace Tests\Unit;

use App\Account;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testBelongsToAccount()
    {
        $account = factory(Account::class)->create();

        $user = factory(User::class)->create([
            'account_id' => $account->id,
        ]);

        $this->assertInstanceOf(Account::class, $user->account);
    }

    public function testCanGetUserFullName()
    {
        $account = factory(Account::class)->create();

        $user = factory(User::class)->create([
            'account_id' => $account->id,
            'first_name' => 'John',
            'last_name'  => 'Doe',
        ]);

        $this->assertEquals('John Doe', $user->full_name);
    }

    public function testCanGetUserNameInitials()
    {
        $account = factory(Account::class)->create();

        $user = factory(User::class)->create([
            'account_id' => $account->id,
            'first_name' => 'John',
            'last_name'  => 'Doe',
        ]);

        $this->assertEquals('JD', $user->initials);
    }

    public function testCanCheckIfUserIsActive()
    {
        $account = factory(Account::class)->create();

        $user = factory(User::class)->create([
            'account_id' => $account->id,
        ]);

        $this->assertTrue($user->isActive());
    }

    public function testCanCheckIfUserIsInactive()
    {
        $account = factory(Account::class)->create();

        $user = factory(User::class)->create([
            'account_id'        => $account->id,
            'email_verified_at' => null,
        ]);

        $this->assertFalse($user->isActive());
    }

    public function testCanGetAllActiveUsers()
    {
        $account = factory(Account::class)->create();

        $activeUsers = factory(User::class, 5)->create([
            'account_id' => $account->id,
        ]);

        foreach ($activeUsers as $user) {
            $this->assertTrue($user->isActive());
        }
    }

    public function testCanGetAllInactiveUsers()
    {
        $account = factory(Account::class)->create();

        $inActiveUsers = factory(User::class, 5)->create([
            'account_id'        => $account->id,
            'email_verified_at' => null,
        ]);

        foreach ($inActiveUsers as $user) {
            $this->assertFalse($user->isActive());
        }
    }
}
