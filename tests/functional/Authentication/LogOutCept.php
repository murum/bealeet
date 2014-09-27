<?php

$I = new FunctionalTester($scenario);

$I->am('a Bealeet member');
$I->wantTo('log out of my Bealeet account');

$I->signIn();

$I->click('.signout-button');

$I->amOnPage('');

$I->assertTrue( ! Auth::check());