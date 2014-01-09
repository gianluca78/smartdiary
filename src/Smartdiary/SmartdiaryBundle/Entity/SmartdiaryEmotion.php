<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Security\Core\User\UserInterface,
    Symfony\Component\Validator\ExecutionContextInterface;

/**
 * Smartdiary\SmartdiaryBundle\Entity\SmartdiaryEmotion
 *
 * @ORM\Entity(repositoryClass="Smartdiary\SmartdiaryBundle\Entity\SmartdiaryEmotionRepository")
 * @ORM\Table(name="smartdiary_emotion")
 */
class SmartdiaryEmotion
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
     * @var string $emotionId
     *
     * @ORM\Column(name="emotion_id", type="integer")
     */
    private $emotionId;

    /**
     * @var string $strenght
     *
     * @ORM\Column(name="strenght", type="integer")
     */
    private $strenght;

    /**
     * @var string $strenghtRevaluation
     *
     * @ORM\Column(name="strenght_revaluation", type="integer")
     */
    private $strenghtRevaluation;

    /**
     * @ORM\ManyToOne(targetEntity="Emotion", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="emotion_id", referencedColumnName="id")
     */
    private $emotion;

    /**
     * @ORM\ManyToOne(targetEntity="Smartdiary", inversedBy="emotions")
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
        return $this->emotion->getLabel();
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
     * @param integer $smartdiaryId
     * @return SmartdiaryEmotion
     */
    public function setSmartdiaryId($smartdiaryId)
    {
        $this->smartdiaryId = $smartdiaryId;

        return $this;
    }

    /**
     * Get smartdiaryId
     *
     * @return integer 
     */
    public function getSmartdiaryId()
    {
        return $this->smartdiaryId;
    }

    /**
     * Set emotionId
     *
     * @param integer $emotionId
     * @return SmartdiaryEmotion
     */
    public function setEmotionId($emotionId)
    {
        $this->emotionId = $emotionId;

        return $this;
    }

    /**
     * Get emotionId
     *
     * @return integer 
     */
    public function getEmotionId()
    {
        return $this->emotionId;
    }

    /**
     * Set strenght
     *
     * @param integer $strenght
     * @return SmartdiaryEmotion
     */
    public function setStrenght($strenght)
    {
        $this->strenght = $strenght;

        return $this;
    }

    /**
     * Get strenght
     *
     * @return integer 
     */
    public function getStrenght()
    {
        return $this->strenght;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SmartdiaryEmotion
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
     * @return SmartdiaryEmotion
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
     * @return SmartdiaryEmotion
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
     * Set strenghtRevaluation
     *
     * @param integer $strenghtRevaluation
     * @return SmartdiaryEmotion
     */
    public function setStrenghtRevaluation($strenghtRevaluation)
    {
        $this->strenghtRevaluation = $strenghtRevaluation;

        return $this;
    }

    /**
     * Get strenghtRevaluation
     *
     * @return integer 
     */
    public function getStrenghtRevaluation()
    {
        return $this->strenghtRevaluation;
    }

    /**
     * Set emotion
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\Emotion $emotion
     * @return SmartdiaryEmotion
     */
    public function setEmotion(\Smartdiary\SmartdiaryBundle\Entity\Emotion $emotion = null)
    {
        $this->emotion = $emotion;

        return $this;
    }

    /**
     * Get emotion
     *
     * @return \Smartdiary\SmartdiaryBundle\Entity\Smartdiary 
     */
    public function getEmotion()
    {
        return $this->emotion;
    }
}
