<?php 
$I = new FunctionalTester($scenario);

$I->am('a guest');
$I->wantTo('sign up for a Bealeet account');

$I->amOnPage('/');
$I->click('Register');

$I->seeCurrentUrlEquals('/register');
$I->fillField('Username', 'JohnDoe');
$I->fillField('Email', 'john@doe.com');
$I->fillField('Email Confirmation', 'john@doe.com');
$I->fillField('Password', 'johndoecom');
$I->fillField('Password Confirmation', 'johndoecom');
$I->click('.register-button');

$I->canSeeInDatabase('users', array(
	'username' => 'JohnDoe',
	'email' => 'john@doe.com'
));

$I->seeCurrentUrlEquals('');

$I->assertTrue(Auth::check());