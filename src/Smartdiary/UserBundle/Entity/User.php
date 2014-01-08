<?php
namespace Smartdiary\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection,
    Symfony\Component\Security\Core\User\UserInterface,
    Symfony\Component\Validator\ExecutionContextInterface;

/**
 * Smartdiary\UserBundle\Entity\User
 *
 * @ORM\Entity(repositoryClass="Smartdiary\UserBundle\Entity\UserRepository")
 * @ORM\Table(name="user")
 */
class User implements UserInterface, \Serializable {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string $surname
     *
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @var string $school
     *
     * @ORM\Column(type="string", length=255)
     */
    private $school;

    /**
     * @var string $birthDate
     *
     * @ORM\Column(name="birth_date", type="date")
     */
    private $birthDate;

    /**
     * @var string $sex
     *
     * @ORM\Column(type="boolean")
     */
    private $sex;

    /**
     * @var string $username
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @var string $slug
     *
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\Slug(fields={"username"})
     */
    private $slug;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=40)
     */
    private $salt;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var string $password
     *
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @var string $email
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @var int $roleId
     *
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     */
    private $roleId;

    /**
     * @var string $teacherEmail
     *
     * @ORM\Column(name="teacher_email", type="string", length=255, nullable=true)
     */
    private $teacher_email;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="create")
     *
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * @var Role
     *
     * @ORM\ManyToOne(targetEntity="Role", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     */
    private $role;

    /**
     * @ORM\OneToMany(targetEntity="\Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation", mappedBy="user")
     */
    private $userProblematicSituations;

    public function __construct()
    {
        $this->isActive = true;
        $this->salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $this->userProblematicSituations = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function eraseCredentials()
    {
    }

    /**
     * @return \Smartdiary\UserBundle\Entity\datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

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
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return \Smartdiary\UserBundle\Entity\Role
     */
    public function getRole()
    {
        return $this->role;
    }

    public function getRoles()
    {
        return array($this->getRole()->getRole());
    }

    /**
     * @return int
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return \Smartdiary\UserBundle\Entity\datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getTeacherEmail()
    {
        return $this->teacher_email;
    }

    public function hasTeacherEmail(ExecutionContextInterface $context)
    {
        if($this->getRole()->getId()==2 && !$this->getTeacherEmail())
        {
            $context->addViolationAt(
                'teacher_email',
                'Email non valida',
                array(),
                null
            );
        }
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param \Smartdiary\UserBundle\Entity\Role $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @param int $roleId
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
    }

    /**
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = \DateTime::createFromFormat('d/m/Y', $birthDate);
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $school
     */
    public function setSchool($school)
    {
        $this->school = $school;
    }

    /**
     * @param string $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @param string $teacher_email
     */
    public function setTeacherEmail($teacher_email)
    {
        $this->teacher_email = $teacher_email;
    }

    /**
     * Serialize the User object
     * @see Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array($this->id, $this->username, $this->password));
    }

    /**
     * Unserialize the User object
     * @see Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list($this->id, $this->username, $this->password) = unserialize($serialized);
    }


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Add userProblematicSituations
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation $userProblematicSituations
     * @return User
     */
    public function addUserProblematicSituation(\Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation $userProblematicSituations)
    {
        $this->userProblematicSituations[] = $userProblematicSituations;

        return $this;
    }

    /**
     * Remove userProblematicSituations
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation $userProblematicSituations
     */
    public function removeUserProblematicSituation(\Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation $userProblematicSituations)
    {
        $this->userProblematicSituations->removeElement($userProblematicSituations);
    }

    /**
     * Get userProblematicSituations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserProblematicSituations()
    {
        return $this->userProblematicSituations;
    }
}
