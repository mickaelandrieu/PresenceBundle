<?php

namespace Am\PresenceBundle\Entity;

use Doctrine\ORM\EntityManager;
use Am\PresenceBundle\Util\BaseManager;

class WorkManager extends BaseManager
{
    protected $em;
    protected $class;

    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;

        $metadata = $em->getClassMetadata($class);
        $this->class = $metadata->name;
    }

    public function getRepository()
    {
        return $this->em->getRepository('Am\PresenceBundle\Entity\Work');
    }
}