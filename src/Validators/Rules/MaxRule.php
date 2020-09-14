<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators\Rules;

use Armyan\FormValidator\Validators\RulesStrategy;

class MaxRule implements RulesStrategy
{
    protected $errorMessage;

    protected $limit;

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function checkData(string $data): bool
    {
        if(strlen($data) > $this->limit) {
            $this->errorMessage = "Length of data must be not greater than $this->limit";

            return false;
        }

        return true;
    }

    public function getError(): string
    {
        return $this->errorMessage;
    }
}