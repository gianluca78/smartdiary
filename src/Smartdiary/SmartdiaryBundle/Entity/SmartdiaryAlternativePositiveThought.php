<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Smartdiary\SmartdiaryBundle\Entity\AutomaticNegativeThought
 *
 * @ORM\Entity
 * @ORM\Table(name="smartdiary_alternative_positive_thought")
 */
class SmartdiaryAlternativePositiveThought
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $smartdiaryId
     *
     * @ORM\Column(name="smartdiary_id", type="integer")
     */
    private $smartdiaryId;

    /**
     * @var string $apt
     *
     * @ORM\Column(name="ant", type="string", length=255)
     */
    private $apt;

    /**
     * @var string $slug
     *
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\Slug(fields={"apt"})
     */
    private $slug;

    /**
     * @var string $strenght
     *
     * @ORM\Column(name="strenght", type="integer")
     */
    private $strenght;

    /**
     * @ORM\ManyToOne(targetEntity="Smartdiary", inversedBy="smartdiaryAlternativePositiveThoughts")
     * @ORM\JoinColumn(name="smartdiary_id", referencedColumnName="id")
     */
    private $smartdiary;

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

    public function __toString()
    {
        return $this->apt;
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
     * Set smartdiaryId
     *
     * @param int $smartdiaryId
     * @return AutomaticNegativeThought
     */
    public function setSmartdiaryId($smartdiaryId)
    {
        $this->smartdiaryId = $smartdiaryId;

        return $this;
    }

    /**
     * Get smartdiaryId
     *
     * @return \int 
     */
    public function getSmartdiaryId()
    {
        return $this->smartdiaryId;
    }

    /**
     * Set apt
     *
     * @param string $apt
     * @return SmartdiaryAlternativePositiveThought
     */
    public function setApt($apt)
    {
        $this->apt = $apt;

        return $this;
    }

    /**
     * Get apt
     *
     * @return string 
     */
    public function getApt()
    {
        return $this->apt;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return AutomaticNegativeThought
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
     * Set strenght
     *
     * @param $strenght
     * @return AutomaticNegativeThought
     */
    public function setStrenght($strenght)
    {
        $this->strenght = $strenght;

        return $this;
    }

    /**
     * Get strenght
     *
     * @return \int 
     */
    public function getStrenght()
    {
        return $this->strenght;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return AutomaticNegativeThought
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
     * @return AutomaticNegativeThought
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
     * Set smartdiary
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\Smartdiary $smartdiary
     * @return AutomaticNegativeThought
     */
    public function setSmartdiary(\Smartdiary\SmartdiaryBundle\Entity\Smartdiary $smartdiary = null)
    {
        $this->smartdiary = $smartdiary;

        return $this;
    }

    /**
     * Get smartdiary
     *
     * @return \Smartdiary\SmartdiaryBundle\Entity\Smartdiary 
     */
    public function getSmartdiary()
    {
        return $this->smartdiary;
    }
}
