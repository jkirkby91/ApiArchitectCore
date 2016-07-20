<?php

namespace ApiArchitect\Core\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use ApiArchitect\Core\Contracts\SemanticContract;
use ApiArchitect\Core\Abstracts\Entities\EntityAbstract;

/**
 * Class Thing
 *
 * @package ApiArchitect\Entities
 *
 * @ORM\Entity
 * @Gedmo\Loggable
 */
class Thing extends EntityAbstract implements SemanticContract
{

    /**
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}