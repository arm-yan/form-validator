<?php declare(strict_types=1);

use Armyan\FormValidator\Forms\SubscriptionForm;
use Armyan\FormValidator\Validators\Rules\EmailRule;
use Armyan\FormValidator\Validators\Rules\MaxRule;
use Armyan\FormValidator\Validators\Rules\MinRule;
use Armyan\FormValidator\Validators\Rules\RequiredRule;
use Armyan\FormValidator\Validators\SubscriptionValidator;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function testValidateWithValidData()
    {
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
            'email' => 'arman@aaa.dd'
        ];
        $validator = new SubscriptionValidator();
        $validator->addRules($rules);
        $form = new SubscriptionForm($validator, $data);

        $this->assertTrue($form->validate());
    }

    public function testValidateWithNoValidEmail()
    {
        $emailRule = new EmailRule();

        $rules = [
            'email' => [
                $emailRule
            ]
        ];

        $data = [
            'email' => 'fake email'
        ];

        $validator = new SubscriptionValidator();
        $validator->addRules($rules);
        $form = new SubscriptionForm($validator, $data);
        $this->assertFalse($form->validate());
        $this->assertEquals($form->getErrors(), ['email' => 'Not valid email']);
    }

    public function testValidateWithNoValidMinRule()
    {
        $minRule = new MinRule(5);

        $rules = [
            'name' => [
                $minRule
            ],
        ];

        $data = [
            'name' => 'Arm'
        ];

        $validator = new SubscriptionValidator();
        $validator->addRules($rules);
        $form = new SubscriptionForm($validator, $data);
        $this->assertFalse($form->validate());
        $this->assertEquals($form->getErrors(), ['name' => 'Length of data must be not less than 5']);
    }

    public function testValidateWithMissingRequiredField()
    {
        $requiredRule = new RequiredRule();

        $rules = [
            'name' => [
                $requiredRule
            ],
        ];

        $data = [
            'name' => ''
        ];

        $validator = new SubscriptionValidator();
        $validator->addRules($rules);
        $form = new SubscriptionForm($validator, $data);
        $this->assertFalse($form->validate());
        $this->assertEquals($form->getErrors(), ['name' => 'Required field']);
    }

}