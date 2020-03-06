<?php

namespace Tests\Unit;

use App\Account;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;
    
    public function testHasManyUsers()
    {
        $account = factory(Account::class)->create();

        $this->assertInstanceOf(Collection::class, $account->users);
    }

    public function testHasManyOrganizations()
    {
        $account = factory(Account::class)->create();

        $this->assertInstanceOf(Collection::class, $account->organizations);
    }
}
