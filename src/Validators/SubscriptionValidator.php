<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators;

use Armyan\FormValidator\AbstractValidator;

/**
 * Class SubscriptionValidator
 * @package Armyan\FormValidator\Validators
 */
class SubscriptionValidator extends AbstractValidator
{
    /**
     * Validate given data with keys and corresponding rules
     *
     * @param array $data
     * @return bool
     */
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