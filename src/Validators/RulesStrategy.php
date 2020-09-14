<?php
declare(strict_types = 1);

namespace Armyan\FormValidator\Validators;


interface RulesStrategy
{
    public function checkData(string $data): bool;

    public function getError(): string;
}