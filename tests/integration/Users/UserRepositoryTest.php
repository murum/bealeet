<?php

use Bealeet\Users\User;
use Bealeet\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;

class UserRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected function _before()
    {
		$this->repo = new UserRepository;

		User::truncate();
    }

    /** @test */
    public function it_gets_paginated_users()
    {
		// Given I have 26 users
		$users = TestDummy::times(26)->create('Bealeet\Users\User');

		// When I fetch 2 pages
		$paginatedUsers = $this->repo->getPaginated();

		// Then I should recieve 2 pages with 25 and 1 users.
		$this->assertEquals('2', $paginatedUsers->getLastPage());
		$this->assertEquals('26', $paginatedUsers->getTotal());

		// Empty DB table
		User::truncate();
    }

	/** @test */
	public function it_saves_a_user()
	{
		// Given I have an unsaved user
		$user = TestDummy::create('Bealeet\Users\User', [
			'username' => 'SaveUserTester',
			'email' => 'save@tester.com',
			'password' => 'EmptyStuff',
			'profile' => 'User for testing save process of UserRepository',
		]);

		// When I try to persist this user
		$this->repo->save($user);

		// Then it should be saved
		$this->tester->seeRecord('users',[
			'username' => 'SaveUserTester'
		]);
	}

	/** @test */
	public function it_finds_a_user_by_the_username()
	{
		// Given I have a user with a given username
		$user = TestDummy::create('Bealeet\Users\User', [
			'username' => 'FindByUsername',
		]);

		// When I try to fetch the user by username
		$foundUser = $this->repo->findByUsername('FindByUsername');

		// Then it should be found
		$this->assertInstanceOf('Bealeet\Users\User', $foundUser);
	}

	/** @test */
	public function it_finds_a_user_by_the_id()
	{
		// Given I have a user with a given ID
		$user = TestDummy::create('Bealeet\Users\User', [
			'id' => 4128912
		]);

		// When I try to fetch the user by id
		$foundUser = $this->repo->findById(4128912);

		// Then it should be found
		$this->assertInstanceOf('Bealeet\Users\User', $foundUser);
	}

	/** @test */
	public function it_follows_another_user()
	{
		// Given I have a two users
		list($sam, $john) = TestDummy::times(2)->create('Bealeet\Users\User');

		// and one user follows another user
		$this->repo->follow($sam->id, $john);

		// Then I should see that user in the list of those that $john follows...
		$this->tester->seeRecord('follows', [
			'user_id' => $john->id,
			'user_id_to_follow' => $sam->id
		]);
	}

}