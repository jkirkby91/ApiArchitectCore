<?php

namespace ApiArchitect\Core\Abstracts\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Class NodeAbstract
 *
 * @package ApiArchitect\Abstracts\Core\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @ORM\Entity
 */
abstract class NodeAbstract
{

    /**
     * @var
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true, nullable=false)
     */
    protected $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return  $this->id;
    }

    /*
    |--------------------------------------------------------------------------
    | Doctrine Blameable Getters
    |--------------------------------------------------------------------------

    /**
    * @return mixed
    */
    abstract public function getContentChangedBy();

    /*
    |--------------------------------------------------------------------------
    | Doctrine IpTracable Getters/Setters
    |--------------------------------------------------------------------------

    /**
     * Sets createdFromIp.
     *
     * @param string $createdFromIp
     *
     * @return $this
     */
    abstract public function setCreatedFromIp($createdFromIp);

    /**
     * Returns createdFromIp.
     * @return string
     */
    abstract public function getCreatedFromIp();

    /**
     * Sets updatedFromIp.
     *
     * @param string $updatedFromIp
     *
     * @return $this
     */
    abstract public function setUpdatedFromIp($updatedFromIp);

    /**
     * Returns updatedFromIp.
     * @return string
     */
    abstract public function getUpdatedFromIp();

    /*
    |--------------------------------------------------------------------------
    | Doctrine SoftDeletes Getters/Setters
    |--------------------------------------------------------------------------
    */

    /**
     * @return DateTime
     */
    abstract public function getDeletedAt();

    /**
     * @param \DateTime|null $deletedAt
     * @return mixed
     */
    abstract  public function setDeletedAt(\DateTime $deletedAt = null);

    /**
     * Restore the soft-deleted state
     */
    abstract public function restore();

    /**
     * @return bool
     */
    abstract  public function isDeleted();

    /*
    |--------------------------------------------------------------------------
    | Doctrine Timestamp getters/setters
    |--------------------------------------------------------------------------
    */

    /**
     * @return DateTime
     */
    abstract public function getCreatedAt();

    /**
     * @return DateTime
     */
    abstract   public function getUpdatedAt();

    /**
     * @param \DateTime $createdAt
     */
    abstract public function setCreatedAt(\DateTime $createdAt);

    /**
     * @param \DateTime $updatedAt
     */
    abstract  public function setUpdatedAt(\DateTime $updatedAt);
}