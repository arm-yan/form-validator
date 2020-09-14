<?php

namespace Armyan\FormValidator;

class AbstractForm
{
    protected $validator;

    protected $data;

    public function __construct(AbstractValidator $validator, array $data)
    {
        $this->validator = $validator;
        $this->data = $data;
    }

    public function validate() : bool
    {
        return $this->validator->validate($this->data);
    }

    public function addData(array $data) : AbstractForm
    {
        $this->data[] = $data;

        return $this;
    }

    public function getErrors()
    {
        return $this->validator->getErrors();
    }
}