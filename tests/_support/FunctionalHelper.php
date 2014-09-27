<?php
namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{

	public function haveAnAccount( $overrides = [] )
	{
		TestDummy::create('Bealeet\Users\User', $overrides);
	}

	public function signIn() {
		$username = 'Foo';
		$email = 'foo@bar.com';
		$password = 'Bar';

		$this->haveAnAccount(compact('username', 'email', 'password'));

		$I = $this->getModule('Laravel4');

		$I->amOnPage('/login');
		$I->fillField('email', $email);
		$I->fillField('password', $password);
		$I->click('.login-button');
	}
}