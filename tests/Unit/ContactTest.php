<?php

namespace Tests\Unit;

use App\Account;
use App\Contact;
use App\Organization;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function testBelongsToOrganization()
    {
        $account = factory(Account::class)->create();

        $organization = factory(Organization::class)->create(['account_id' => $account->id]);

        $contact = factory(Contact::class)->create([
            'account_id'      => $account->id,
            'organization_id' => $organization->id,
        ]);

        $this->assertInstanceOf(Organization::class, $contact->organization);
    }

    public function testCanGetContactFullName()
    {
        $account = factory(Account::class)->create();

        $organization = factory(Organization::class)->create(['account_id' => $account->id]);

        $contact = factory(Contact::class)->create([
            'account_id'      => $account->id,
            'organization_id' => $organization->id,
            'first_name'      => 'John',
            'last_name'       => 'Doe',
        ]);

        $this->assertEquals('John Doe', $contact->full_name);
    }

    public function testCanGetContactNameInitials()
    {
        $account = factory(Account::class)->create();

        $organization = factory(Organization::class)->create(['account_id' => $account->id]);

        $contact = factory(Contact::class)->create([
            'account_id'      => $account->id,
            'organization_id' => $organization->id,
            'first_name'      => 'John',
            'last_name'       => 'Doe',
        ]);

        $this->assertEquals('JD', $contact->initials);
    }
}
