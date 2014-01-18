<?php
namespace Acme\TestBundle\Domain\Data;

use PHPMentors\ValidatorBundle\Validator\Constraints\ServiceCallback As AssertServiceCallback;

/**
 * @AssertServiceCallback(service="domain.member.allow_upgrade_spec", method="isSatisfiedBy", message="you can't upgrade.")
 */
class Member
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}