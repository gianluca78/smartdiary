<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface,
    Symfony\Component\Validator\ExecutionContextInterface;

/**
 * Smartdiary\SmartdiaryBundle\Entity\AutomaticNegativeThought
 *
 * @ORM\Entity(repositoryClass="Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAutomaticNegativeThoughtRepository")
 * @ORM\Table(name="smartdiary_automatic_negative_thought")
 */
class SmartdiaryAutomaticNegativeThought
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
     * @var int $smartdiaryAlternativePositiveThoughtId
     *
     * @ORM\Column(name="smartdiary_alternative_positive_thought_id", type="integer")
     */
    private $smartdiaryAlternativePositiveThoughtId;

    /**
     * @var string $ant
     *
     * @ORM\Column(name="ant", type="string", length=255)
     */
    private $ant;

    /**
     * @var string $slug
     *
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\Slug(fields={"ant"})
     */
    private $slug;

    /**
     * @var string $strenght
     *
     * @ORM\Column(name="strenght", type="integer")
     */
    private $strenght;

    /**
     * @var SmartdiaryAlternativePositiveThought $alternativePositiveThought
     *
     * @ORM\OneToOne(targetEntity="SmartdiaryAlternativePositiveThought", mappedBy="smartdiary_automatic_negative_thought")
     * @ORM\JoinColumn(name="smartdiary_alternative_positive_thought_id", referencedColumnName="id")
     **/
    private $alternativePositiveThought;

    /**
     * @ORM\ManyToOne(targetEntity="Smartdiary", inversedBy="smartdiary_automatic_negative_thought")
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
        return $this->ant;
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
     * @param \int $smartdiaryId
     * @return AutomaticNegativeThought
     */
    public function setSmartdiaryId(\int $smartdiaryId)
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
     * Set ant
     *
     * @param string $ant
     * @return AutomaticNegativeThought
     */
    public function setAnt($ant)
    {
        $this->ant = $ant;

        return $this;
    }

    /**
     * Get ant
     *
     * @return string 
     */
    public function getAnt()
    {
        return $this->ant;
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

    /**
     * Set smartdiaryAlternativePositiveThoughtId
     *
     * @param integer $smartdiaryAlternativePositiveThoughtId
     * @return SmartdiaryAutomaticNegativeThought
     */
    public function setSmartdiaryAlternativePositiveThoughtId($smartdiaryAlternativePositiveThoughtId)
    {
        $this->smartdiaryAlternativePositiveThoughtId = $smartdiaryAlternativePositiveThoughtId;

        return $this;
    }

    /**
     * Get smartdiaryAlternativePositiveThoughtId
     *
     * @return integer 
     */
    public function getSmartdiaryAlternativePositiveThoughtId()
    {
        return $this->smartdiaryAlternativePositiveThoughtId;
    }

    /**
     * Set alternativePositiveThought
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought $alternativePositiveThought
     * @return SmartdiaryAutomaticNegativeThought
     */
    public function setAlternativePositiveThought(\Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought $alternativePositiveThought = null)
    {
        $this->alternativePositiveThought = $alternativePositiveThought;

        return $this;
    }

    /**
     * Get alternativePositiveThought
     *
     * @return \Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought 
     */
    public function getAlternativePositiveThought()
    {
        return $this->alternativePositiveThought;
    }
}
