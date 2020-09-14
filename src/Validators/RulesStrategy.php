<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators;

/**
 * Interface RulesStrategy
 * @package Armyan\FormValidator\Validators
 */
interface RulesStrategy
{
    /**
     * Check the given data by some logic
     *
     * @param string $data
     * @return bool
     */
    public function checkData(string $data): bool;

    /**
     * Return the validation error, if there is
     *
     * @return string
     */
    public function getError(): string;
}