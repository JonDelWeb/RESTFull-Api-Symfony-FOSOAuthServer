<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $superAdmin;

    /**
     * @ORM\Column(name="groupe", type="string", nullable=true)
     */
    protected $groupe;
    
    public function __construct()
    {
        parent::__construct();
    }
}