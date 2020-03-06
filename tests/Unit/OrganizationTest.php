<?php

namespace Tests\Unit;

use App\Account;
use App\Organization;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrganizationTest extends TestCase
{
    use RefreshDatabase;

    public function testHasManyContact()
    {
        $account = factory(Account::class)->create();

        $organization = factory(Organization::class)->create(['account_id' => $account->id]);

        $this->assertInstanceOf(Collection::class, $organization->contacts);
    }
}
