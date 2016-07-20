<?php

namespace ApiArchitect\Core\Entities;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use LaravelDoctrine\ACL\Roles\HasRoles;
use LaravelDoctrine\ACL\Mappings as ACL;
use Illuminate\Contracts\Auth\CanResetPassword;
use ApiArchitect\Log\Contracts\DatabaseLogContract;
use LaravelDoctrine\ACL\Permissions\HasPermissions;
use LaravelDoctrine\ACL\Contracts\HasRoles as HasRolesContract;
use LaravelDoctrine\ORM\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use LaravelDoctrine\ACL\Contracts\HasPermissions as HasPermissionContract;
use LaravelDoctrine\ORM\Contracts\Auth\Authenticatable as AuthenticatableContract;

/**
 * Class User
 *
 * @package ApiArchitect\Entities
 * @author James Kirkby <hello@jameskirkby.com>
 *
 * @TODO this is coupled to requiring database logging, need way to dynamically enable logging
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="ApiArchitect\Core\Repositories\UserRepository")
 * @ORM\Table(name="users", indexes={@ORM\Index(name="search_idx", columns={"email"})})
 */
class User extends Thing implements AuthenticatableContract, HasRolesContract, HasPermissionContract, DatabaseLogContract, CanResetPassword
{

    use AuthenticatableTrait, HasRoles, HasPermissions, CanResetPasswordTrait;

    /**
     * @var string
     */
    public $nodeType;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->nodeType = 'User';
    }

    /**
     * @Gedmo\Versioned
     * @Gedmo\Blameable(on="create")
     * @Gedmo\IpTraceable(on="create")
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    protected $userName;

    /**
     * @ORM\Column(type="string", length=254, unique=true)
     * @Gedmo\Versioned
     */
    protected $email;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection|\LaravelDoctrine\ACL\Contracts\Role[]
     * @ACL\HasRoles()
     * @Gedmo\Versioned
     */
    protected $roles;

    /**
     * @ACL\HasPermissions
     * @Gedmo\Versioned
     */
    public $permissions;

    /**
     * Returns user name, required for Doctrine behaviours loggable
     * @return mixed
     */
    public function getUserName()
    {
        return $this->getName();
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection|\LaravelDoctrine\ACL\Contracts\Role[]
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:ApiArchitect\Entities\User,username',
            'password' => 'required|confirmed|min:8',
        ]);
    }
}