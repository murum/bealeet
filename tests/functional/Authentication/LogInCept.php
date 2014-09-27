<?php 

$I = new FunctionalTester($scenario);

$I->am('a Bealeet member');
$I->wantTo('login to my Bealeet account');

$I->signIn();

$I->amOnPage('/');
$I->see('Welcome back!');

$I->assertTrue(Auth::check());