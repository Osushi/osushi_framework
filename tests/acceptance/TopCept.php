<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage('/');
$I->see('Message');
$I->dontSee('test');
$I->fillField('message', 'test');
$I->click('Send');
$I->see('test');

$I->click('Delete');
$I->dontSee('test');
