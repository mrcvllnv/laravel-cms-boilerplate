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
            'account_id' => $account->id
        ]);

        $this->assertInstanceOf(Account::class, $user->account);
    }
}
