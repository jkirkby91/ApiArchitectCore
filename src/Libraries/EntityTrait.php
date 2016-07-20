<?php

namespace ApiArchitect\Core\Libraries;

use Doctrine\ORM\Events;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\EventSubscriber;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use LaravelDoctrine\ORM\Facades\EntityManager;
use ApiArchitect\Core\Repositories\NodeRepository;

/**
 * Class EntityTrait
 *
 * @package ApiArchitect\Libraries
 * @author James Kirkby <hello@jameskirkby.com>
 */
trait EntityTrait
{

    /**
     * @var
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    public $id;

    /**
     * @var
     *
     * @ORM\OneToOne(targetEntity="Node",fetch="EAGER")
     * @ORM\JoinColumn(name="node_id", referencedColumnName="id")
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    public $nid;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNid()
    {
        return $this->nid;
    }

    /**
     * @param $nid
     * @return $this
     */
    public function setNid($nid)
    {
        $this->nid = $nid;
        return $this;
    }

    /**
     * @ORM\PrePersist
     * @param $event
     */
    public function prePersist($event)
    {
        $entity = $event->getEntity();

        $this->node = EntityManager::getRepository('ApiArchitect\Core\Entities\Node')->create(['nodeType' => $entity->nodeType]);

        $this->setNid($this->node->getId());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->node = EntityManager::getRepository('ApiArchitect\Core\Entities\Node')->update($this->nid,[]);
    }
}