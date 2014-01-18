<?php
namespace PHPMentors\ValidatorBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ServiceCallback extends Constraint
{
    public $method;
    public $service;
    public $message = 'Service callback returns an error.';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }

    /**
     * {@inheritdoc}
     */
    public function validatedBy()
    {
        return 'PHPMentorsServiceCallbackValidator';
    }
}