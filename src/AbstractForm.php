<?php
declare(strict_types = 1);

namespace Armyan\FormValidator;

/**
 * Class AbstractForm
 * @package Armyan\FormValidator
 */
class AbstractForm
{
    /**
     * Container for validation handler
     *
     * @var AbstractValidator
     */
    protected $validator;

    /**
     * Container for Form data
     *
     * @var array
     */
    protected $data;

    /**
     * AbstractForm constructor.
     *
     * @param AbstractValidator $validator
     * @param array $data
     */
    public function __construct(AbstractValidator $validator, array $data)
    {
        $this->validator = $validator;
        $this->data = $data;
    }

    /**
     * Call the validation handler validate
     *
     * @return bool
     */
    public function validate() : bool
    {
        return $this->validator->validate($this->data);
    }

    /**
     * Add data in data container runtime
     *
     * @param array $data
     * @return AbstractForm
     */
    public function addData(array $data) : AbstractForm
    {
        $this->data[] = $data;

        return $this;
    }

    /**
     * Return the validation errors, if there is
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->validator->getErrors();
    }
}