<?php

namespace Smartdiary\SmartdiaryBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection,
    Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Smartdiary\SmartdiaryBundle\Entity\Smartdiary
 *
 * @ORM\Entity(repositoryClass="Smartdiary\SmartdiaryBundle\Entity\SmartdiaryRepository")
 * @ORM\Table(name="smartdiary")
 */
class Smartdiary
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $antecedentWhen
     *
     * @ORM\Column(name="antecedent_when", type="string", length=255)
     */
    private $antecedentWhen;

    /**
     * @var int $antecedentWhereId
     *
     * @ORM\Column(name="antecedent_where_id", type="integer", nullable=false)
     */
    private $antecedentWhereId;

    /**
     * @var string $antecedentWhere
     *
     * @ORM\Column(name="antecedent_where_detail", type="string", length=255)
     */
    private $antecedentWhereDetail;

    /**
     * @var int $antecedentWhoId
     *
     * @ORM\Column(name="antecedent_who_id", type="integer", nullable=false)
     */
    private $antecedentWhoId;

    /**
     * @var string $antecedentWho
     *
     * @ORM\Column(name="antecedent_who_detail", type="string", length=255)
     */
    private $antecedentWhoDetail;

    /**
     * @var string $antecedentWhatDetail
     *
     * @ORM\Column(name="antecedent_what_detail", type="string", length=255)
     */
    private $antecedentWhat;

    /**
     * @var string $behavior
     *
     * @ORM\Column(name="behavior", type="string", length=255)
     */
    private $behavior;

    /**
     * @var int $userId
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var int $userProblematicSituationId
     *
     * @ORM\Column(name="user_problematic_situation_id", type="integer", nullable=true)
     */
    private $userProblematicSituationId;

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
     * @var antecedentWhere
     *
     * @ORM\ManyToOne(targetEntity="AntecedentWhere", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="antecedent_where_id", referencedColumnName="id")
     */
    private $antecedentWhere;

    /**
     * @var antecedentWho
     *
     * @ORM\ManyToOne(targetEntity="AntecedentWho", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="antecedent_who_id", referencedColumnName="id")
     */
    private $antecedentWho;

    /**
     * @var user
     *
     * @ORM\ManyToOne(targetEntity="Smartdiary\UserBundle\Entity\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="SmartdiaryAutomaticNegativeThought", mappedBy="smartdiary")
     */
    private $automaticNegativeThoughts;

    /**
     * @ORM\OneToMany(targetEntity="SmartdiaryEmotion", mappedBy="smartdiary")
     */
    private $emotions;

    /**
     * @ORM\OneToMany(targetEntity="SmartdiarySensation", mappedBy="smartdiary")
     */
    private $sensations;

    /**
     * @ORM\ManyToOne(targetEntity="UserProblematicSituation", inversedBy="smartdiaries")
     * @ORM\JoinColumn(name="user_problematic_situation_id", referencedColumnName="id")
     */
    private $smartdiaryUserProblematicSituation;

    /**
     * @ORM\OneToMany(targetEntity="SmartdiaryAlternativePositiveThought", mappedBy="smartdiary")
     */
    private $smartdiaryAlternativePositiveThoughts;

    public function __construct()
    {
        $this->automaticNegativeThoughts = new ArrayCollection();
        $this->emotions = new ArrayCollection();
        $this->sensations = new ArrayCollection();
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
     * Set antecedentWhen
     *
     * @param string $antecedentWhen
     * @return Smartdiary
     */
    public function setAntecedentWhen($antecedentWhen)
    {
        $this->antecedentWhen = $antecedentWhen;

        return $this;
    }

    /**
     * Get antecedentWhen
     *
     * @return string 
     */
    public function getAntecedentWhen()
    {
        return $this->antecedentWhen;
    }

    /**
     * Set antecedentWhereId
     *
     * @param integer $antecedentWhereId
     * @return Smartdiary
     */
    public function setAntecedentWhereId($antecedentWhereId)
    {
        $this->antecedentWhereId = $antecedentWhereId;

        return $this;
    }

    /**
     * Get antecedentWhereId
     *
     * @return integer 
     */
    public function getAntecedentWhereId()
    {
        return $this->antecedentWhereId;
    }

    /**
     * Set antecedentWhereDetail
     *
     * @param string $antecedentWhereDetail
     * @return Smartdiary
     */
    public function setAntecedentWhereDetail($antecedentWhereDetail)
    {
        $this->antecedentWhereDetail = $antecedentWhereDetail;

        return $this;
    }

    /**
     * Get antecedentWhereDetail
     *
     * @return string 
     */
    public function getAntecedentWhereDetail()
    {
        return $this->antecedentWhereDetail;
    }

    /**
     * Set antecedentWhoId
     *
     * @param integer $antecedentWhoId
     * @return Smartdiary
     */
    public function setAntecedentWhoId($antecedentWhoId)
    {
        $this->antecedentWhoId = $antecedentWhoId;

        return $this;
    }

    /**
     * Get antecedentWhoId
     *
     * @return integer 
     */
    public function getAntecedentWhoId()
    {
        return $this->antecedentWhoId;
    }

    /**
     * Set antecedentWhoDetail
     *
     * @param string $antecedentWhoDetail
     * @return Smartdiary
     */
    public function setAntecedentWhoDetail($antecedentWhoDetail)
    {
        $this->antecedentWhoDetail = $antecedentWhoDetail;

        return $this;
    }

    /**
     * Get antecedentWhoDetail
     *
     * @return string 
     */
    public function getAntecedentWhoDetail()
    {
        return $this->antecedentWhoDetail;
    }

    /**
     * Set antecedentWhat
     *
     * @param string $antecedentWhat
     * @return Smartdiary
     */
    public function setAntecedentWhat($antecedentWhat)
    {
        $this->antecedentWhat = $antecedentWhat;

        return $this;
    }

    /**
     * Get antecedentWhat
     *
     * @return string 
     */
    public function getAntecedentWhat()
    {
        return $this->antecedentWhat;
    }

    /**
     * Set behavior
     *
     * @param string $behavior
     * @return Smartdiary
     */
    public function setBehavior($behavior)
    {
        $this->behavior = $behavior;

        return $this;
    }

    /**
     * Get behavior
     *
     * @return string 
     */
    public function getBehavior()
    {
        return $this->behavior;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Smartdiary
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Smartdiary
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
     * @return Smartdiary
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
     * Set antecedentWhere
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\AntecedentWhere $antecedentWhere
     * @return Smartdiary
     */
    public function setAntecedentWhere(\Smartdiary\SmartdiaryBundle\Entity\AntecedentWhere $antecedentWhere = null)
    {
        $this->antecedentWhere = $antecedentWhere;

        return $this;
    }

    /**
     * Get antecedentWhere
     *
     * @return \Smartdiary\SmartdiaryBundle\Entity\AntecedentWhere 
     */
    public function getAntecedentWhere()
    {
        return $this->antecedentWhere;
    }

    /**
     * Set antecedentWho
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\AntecedentWho $antecedentWho
     * @return Smartdiary
     */
    public function setAntecedentWho(\Smartdiary\SmartdiaryBundle\Entity\AntecedentWho $antecedentWho = null)
    {
        $this->antecedentWho = $antecedentWho;

        return $this;
    }

    /**
     * Get antecedentWho
     *
     * @return \Smartdiary\SmartdiaryBundle\Entity\AntecedentWho 
     */
    public function getAntecedentWho()
    {
        return $this->antecedentWho;
    }

    /**
     * Set user
     *
     * @param \Smartdiary\UserBundle\Entity\User $user
     * @return Smartdiary
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

    /**
     * Add automaticNegativeThoughts
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\AutomaticNegativeThought $automaticNegativeThoughts
     * @return Smartdiary
     */
    public function addAutomaticNegativeThought(\Smartdiary\SmartdiaryBundle\Entity\AutomaticNegativeThought $automaticNegativeThoughts)
    {
        $this->automaticNegativeThoughts[] = $automaticNegativeThoughts;

        return $this;
    }

    /**
     * Remove automaticNegativeThoughts
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\AutomaticNegativeThought $automaticNegativeThoughts
     */
    public function removeAutomaticNegativeThought(\Smartdiary\SmartdiaryBundle\Entity\AutomaticNegativeThought $automaticNegativeThoughts)
    {
        $this->automaticNegativeThoughts->removeElement($automaticNegativeThoughts);
    }

    /**
     * Get automaticNegativeThoughts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutomaticNegativeThoughts()
    {
        return $this->automaticNegativeThoughts;
    }

    /**
     * Add emotions
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\Emotion $emotions
     * @return Smartdiary
     */
    public function addEmotion(\Smartdiary\SmartdiaryBundle\Entity\Emotion $emotions)
    {
        $this->emotions[] = $emotions;

        return $this;
    }

    /**
     * Remove emotions
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\Emotion $emotions
     */
    public function removeEmotion(\Smartdiary\SmartdiaryBundle\Entity\Emotion $emotions)
    {
        $this->emotions->removeElement($emotions);
    }

    /**
     * Get emotions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmotions()
    {
        return $this->emotions;
    }

    /**
     * Add sensations
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\Sensation $sensations
     * @return Smartdiary
     */
    public function addSensation(\Smartdiary\SmartdiaryBundle\Entity\Sensation $sensations)
    {
        $this->sensations[] = $sensations;

        return $this;
    }

    /**
     * Remove sensations
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\Sensation $sensations
     */
    public function removeSensation(\Smartdiary\SmartdiaryBundle\Entity\Sensation $sensations)
    {
        $this->sensations->removeElement($sensations);
    }

    /**
     * Get sensations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSensations()
    {
        return $this->sensations;
    }

    /**
     * Set userProblematicSituationId
     *
     * @param integer $userProblematicSituationId
     * @return Smartdiary
     */
    public function setUserProblematicSituationId($userProblematicSituationId)
    {
        $this->userProblematicSituationId = $userProblematicSituationId;

        return $this;
    }

    /**
     * Get userProblematicSituationId
     *
     * @return integer 
     */
    public function getUserProblematicSituationId()
    {
        return $this->userProblematicSituationId;
    }

    /**
     * Set smartdiaryUserProblematicSituation
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation $smartdiaryUserProblematicSituation
     * @return Smartdiary
     */
    public function setSmartdiaryUserProblematicSituation(\Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation $smartdiaryUserProblematicSituation = null)
    {
        $this->smartdiaryUserProblematicSituation = $smartdiaryUserProblematicSituation;

        return $this;
    }

    /**
     * Get smartdiaryUserProblematicSituation
     *
     * @return \Smartdiary\SmartdiaryBundle\Entity\UserProblematicSituation 
     */
    public function getSmartdiaryUserProblematicSituation()
    {
        return $this->smartdiaryUserProblematicSituation;
    }

    /**
     * Add smartdiaryAlternativePositiveThoughts
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought $smartdiaryAlternativePositiveThoughts
     * @return Smartdiary
     */
    public function addSmartdiaryAlternativePositiveThought(\Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought $smartdiaryAlternativePositiveThoughts)
    {
        $this->smartdiaryAlternativePositiveThoughts[] = $smartdiaryAlternativePositiveThoughts;

        return $this;
    }

    /**
     * Remove smartdiaryAlternativePositiveThoughts
     *
     * @param \Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought $smartdiaryAlternativePositiveThoughts
     */
    public function removeSmartdiaryAlternativePositiveThought(\Smartdiary\SmartdiaryBundle\Entity\SmartdiaryAlternativePositiveThought $smartdiaryAlternativePositiveThoughts)
    {
        $this->smartdiaryAlternativePositiveThoughts->removeElement($smartdiaryAlternativePositiveThoughts);
    }

    /**
     * Get smartdiaryAlternativePositiveThoughts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSmartdiaryAlternativePositiveThoughts()
    {
        return $this->smartdiaryAlternativePositiveThoughts;
    }
}
