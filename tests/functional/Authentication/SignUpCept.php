<?php 
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign up for a Bealeet account');

$I->amOnPage('/');
$I->click('Register');

$I->seeCurrentUrlEquals('/register');
$I->fillField('username', 'JohnDoe');
$I->fillField('email', 'john@doe.com');
$I->fillField('email_confirmation', 'john@doe.com');
$I->fillField('password', 'johndoecom');
$I->fillField('password_confirmation', 'johndoecom');
$I->click('.register-button');

$I->canSeeInDatabase('users', array(
	'username' => 'JohnDoe',
	'email' => 'john@doe.com'
));

$I->seeCurrentUrlEquals('');

$I->assertTrue(Auth::check());