<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators\Rules;


use Armyan\FormValidator\Validators\RulesStrategy;

class RequiredRule implements RulesStrategy
{
    protected $errorMessage;

    public function checkData(string $data): bool
    {
        if($data != '') {
            return true;
        }

        $this->errorMessage = 'Required field';

        return false;
    }

    public function getError(): string
    {
        return $this->errorMessage;
    }
}