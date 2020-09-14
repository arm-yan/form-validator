<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators\Rules;

use Armyan\FormValidator\Validators\RulesStrategy;

/**
 * Class RequiredRule
 *
 * @package Armyan\FormValidator\Validators\Rules
 */
class RequiredRule implements RulesStrategy
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
        if($data != '') {
            return true;
        }

        $this->errorMessage = 'Required field';

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