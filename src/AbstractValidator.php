<?php
declare(strict_types = 1);

namespace Armyan\FormValidator;

use Armyan\FormValidator\Validators\RulesStrategy;

/**
 * Class AbstractValidator
 * @package Armyan\FormValidator
 */
abstract class AbstractValidator
{
    /**
     * Validate the given data by corresponding rule
     *
     * @param array $data
     * @return bool
     */
    abstract public function validate(array $data) : bool;

    /**
     * Container for all rule strategies
     *
     * @var
     */
    protected $rules;

    /**
     * Container for validation errors
     *
     * @var
     */
    protected $errors;

    /**
     * Add rule strategies and apply by keys
     *
     * @param array $rules
     * @return AbstractValidator
     */
    public function addRules(array $rules) : AbstractValidator
    {
        foreach($rules as $field=>$strategies) {
            $this->applyRules($field, $strategies);
        }

        return $this;
    }

    /**
     * Apply validation rules by field keys
     *
     * @param string $field
     * @param array $strategies
     */
    protected function applyRules(string $field, array $strategies) : void
    {
        foreach ($strategies as $strategy) {
            $this->addRule($field, $strategy);
        }
    }

    /**
     * Add rule strategy by field key
     *
     * @param string $field
     * @param RulesStrategy $strategy
     * @return AbstractValidator
     */
    public function addRule(string $field, RulesStrategy $strategy) : AbstractValidator
    {
        $this->rules[$field][] = $strategy;

        return $this;
    }

    /**
     * Return all the validation errors
     *
     * @return array
     */
    public function getErrors() : array
    {
        return $this->errors;
    }

    /**
     * Store validation error, in container
     *
     * @param string $key
     * @param string $errorMessage
     */
    public function addError(string $key, string $errorMessage) : void
    {
        $this->errors[$key] = $errorMessage;
    }

    /**
     * Clear errors container
     */
    public function emptyErrors() : void
    {
        $this->errors = [];
    }
}