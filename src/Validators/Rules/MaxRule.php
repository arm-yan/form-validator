<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators\Rules;

use Armyan\FormValidator\Validators\RulesStrategy;

/**
 * Class MaxRule
 * @package Armyan\FormValidator\Validators\Rules
 */
class MaxRule implements RulesStrategy
{
    /**
     * Container for validation handler
     *
     * @var
     */
    protected $errorMessage;

    /**
     * The limit for max rule
     *
     * @var int
     */
    protected $limit;

    /**
     * MaxRule constructor.
     *
     * @param int $limit
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * Check the given data by some logic
     *
     * @param string $data
     * @return bool
     */
    public function checkData(string $data): bool
    {
        if(strlen($data) > $this->limit) {
            $this->errorMessage = "Length of data must be not greater than $this->limit";

            return false;
        }

        return true;
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