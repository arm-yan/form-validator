<?php
declare(strict_types = 1);

namespace Armyan\FormValidator;


use Armyan\FormValidator\Forms\SubscriptionForm;
use Armyan\FormValidator\Validators\Rules\EmailRule;
use Armyan\FormValidator\Validators\Rules\MaxRule;
use Armyan\FormValidator\Validators\Rules\MinRule;
use Armyan\FormValidator\Validators\Rules\RequiredRule;
use Armyan\FormValidator\Validators\SubscriptionValidator;


$emailRule = new EmailRule();
$requiredRule = new RequiredRule();
$minRule = new MinRule(5);
$maxRule = new MaxRule(6);

$rules = [
    'email' => [
        $emailRule,
        $requiredRule
    ],
    'name' => [
        $minRule,
        $requiredRule
    ],
    'address' => [
        $maxRule
    ]
];

$data = [
    'email' => 'arman.rrrd'
];

$validator = new SubscriptionValidator();
$validator->addRules($rules);
$form = new SubscriptionForm($validator, $data);

$form->validate();