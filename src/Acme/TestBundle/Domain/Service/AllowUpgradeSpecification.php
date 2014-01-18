<?php
namespace Acme\TestBundle\Domain\Service;

use JMS\DiExtraBundle\Annotation As DI;

/**
 * @DI\Service("domain.member.allow_upgrade_spec")
 */
class AllowUpgradeSpecification {

    /**
     * inject services if you need
     */
    private $memberRepository;

    public function isSatisfiedBy($member)
    {
        return ($member->getName() == '1234');
    }
}
