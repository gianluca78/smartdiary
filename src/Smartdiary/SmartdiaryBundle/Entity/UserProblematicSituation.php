<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Smartdiary\SmartdiaryBundle\Entity\TeacherProblem
 *
 * @ORM\Entity(repositoryClass="UserProblematicSituationRepository")
 * @ORM\Table(name="user_problematic_situation")
 */
class UserProblematicSituation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int $userId
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string $slug
     *
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\Slug(fields={"title"})
     */
    private $slug;

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
     * @ORM\ManyToOne(targetEntity="\Smartdiary\UserBundle\Entity\User", inversedBy="userProblematicSituations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Smartdiary", mappedBy="smartdiaryUserProblematicSituation")
     */
    private $smartdiaries;

    public function __toString()
    {
        return $this->title;
    }

    public function __construct()
    {
        $this->smartdiaries = new ArrayCollection();
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
     * Set userId
     *
     * @param integer $userId
     * @return UserProblematicSituation
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return UserProblematicSituation
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return UserProblematicSituation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     * Set slug
     *
     * @param string $slug
     * @return UserProblematicSituation
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return UserProblematicSituation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return UserProblematicSituation
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add smartdiaries
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\Smartdiary $smartdiaries
     * @return UserProblematicSituation
     */
    public function addSmartdiary(\Smartdiary\SmartdiaryBundle\Entity\Smartdiary $smartdiaries)
    {
        $this->smartdiaries[] = $smartdiaries;

        return $this;
    }

    /**
     * Remove smartdiaries
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\Smartdiary $smartdiaries
     */
    public function removeSmartdiary(\Smartdiary\SmartdiaryBundle\Entity\Smartdiary $smartdiaries)
    {
        $this->smartdiaries->removeElement($smartdiaries);
    }

    /**
     * Get smartdiaries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSmartdiaries()
    {
        return $this->smartdiaries;
    }

    /**
     * Set user
     *
     * @param \Smartdiary\UserBundle\Entity\User $user
     * @return UserProblematicSituation
     */
    public function setUser(\Smartdiary\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Smartdiary\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
