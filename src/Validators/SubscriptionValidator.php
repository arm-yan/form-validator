<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators;

use Armyan\FormValidator\AbstractValidator;

class SubscriptionValidator extends AbstractValidator
{
    public function validate(array $data) : bool
    {
        $this->emptyErrors();

        foreach ($data as $key => $value) {
            if(array_key_exists($key, $this->rules)) {
                foreach($this->rules[$key] as $rule) {
                    if(!$rule->checkData($value)) {
                        $this->addError($key, $rule->getError());
                    }
                }
            }
        }

        return empty($this->getErrors());
    }
}