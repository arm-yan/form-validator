<?php
declare(strict_types = 1);

namespace Armyan\FormValidator;

use Armyan\FormValidator\Validators\RulesStrategy;

abstract class AbstractValidator
{
    abstract public function validate(array $data) : bool;

    protected $rules;

    protected $errors;

    public function addRules(array $rules) : AbstractValidator
    {
        foreach($rules as $field=>$strategies) {
            $this->applyRules($field, $strategies);
        }

        return $this;
    }

    protected function applyRules(string $field, array $strategies) : void
    {
        foreach ($strategies as $strategy) {
            $this->addRule($field, $strategy);
        }
    }

    public function addRule(string $field, RulesStrategy $strategy): AbstractValidator
    {
        $this->rules[$field][] = $strategy;

        return $this;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function addError(string $key, string $errorMessage)
    {
        $this->errors[$key] = $errorMessage;
    }

    public function emptyErrors()
    {
        $this->errors = [];
    }
}