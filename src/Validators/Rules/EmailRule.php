<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators\Rules;

use Armyan\FormValidator\Validators\RulesStrategy;

/**
 * Class EmailRule
 * @package Armyan\FormValidator\Validators\Rules
 */
class EmailRule implements RulesStrategy
{
    /**
     * Container for validation error
     *
     * @var
     */
    protected $errorMessage;

    /**
     * Check the given data by some logic
     *
     * @param string $data
     * @return bool
     */
    public function checkData(string $data): bool
    {
        if(filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        $this->errorMessage = 'Not valid email';

        return false;
    }

    /**
     * Return the validation error, if there is
     *
     * @return string
     */
    public function getError(): string
    {
        return $this->errorMessage;
    }
}