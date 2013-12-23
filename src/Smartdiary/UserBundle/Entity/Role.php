<?php
namespace Smartdiary\UserBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="role")
 */
class Role implements RoleInterface
{
    /**
     * @var int $id 
     * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     */
    private $id;
    
    /**
     * @var string $description
     *
     * @ORM\Column(type="string", length=100, nullable=false)
     *
     */
    private $description;

    /**
     * @var string $role
     * 
     * @ORM\Column(type="string", length=100, nullable=false)
     * 
     */    
    private $role;

    public function __toString()
    {
        return $this->getDescription();
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return \GestionaCivita\UsertBundle\Entity\Role
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return \GestionaCivita\UsertBundle\Entity\Role
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }
}