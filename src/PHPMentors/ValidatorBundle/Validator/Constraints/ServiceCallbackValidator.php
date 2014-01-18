<?php
namespace PHPMentors\ValidatorBundle\Validator\Constraints;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\ConstraintDefinitionException;

class ServiceCallbackValidator extends ConstraintValidator implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * {@inheritdoc}
     */
    public function validate($object, Constraint $constraint)
    {
        if (null === $object) {
            return;
        }

        if (!$this->container->has($constraint->service)) {
            throw new ConstraintDefinitionException;
        }

        $service = $this->container->get($constraint->service);

        if (!method_exists($service, $constraint->method)) {
            throw new ConstraintDefinitionException(sprintf('Method "%s" targeted by ServiceCallback constraint does not exist', $constraint->method));
        }

        $result = call_user_func(array($service, $constraint->method), $object);

        if (false == $result) {
            $this->context->addViolation($constraint->message);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}