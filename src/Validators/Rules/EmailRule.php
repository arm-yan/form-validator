<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators\Rules;

use Armyan\FormValidator\Validators\RulesStrategy;

class EmailRule implements RulesStrategy
{
    protected $errorMessage;

    public function checkData(string $data): bool
    {
        if(filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        $this->errorMessage = 'Not valid email';

        return false;
    }

    public function getError(): string
    {
        return $this->errorMessage;
    }
}