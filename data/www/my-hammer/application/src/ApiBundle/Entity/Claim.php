<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Claim
 *
 * @ORM\Table(name="claim")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\ClaimRepository")
 */
class Claim
{
    public function __construct()
    {
        $this->setCreated( new \DateTime() );
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(min="5", max="50")
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="zip", type="integer")
     * @Assert\NotBlank(message="Must be in 5-digits format")
     * @Assert\Length(min="5", max="5")
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string")
     * @Assert\NotBlank()
     * @Assert\Length(min="2", max="50")
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank()
     * @Assert\Length(min="15")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="due_date", type="datetime")
     * @Assert\NotBlank(message="Please provide date in future. Format: YYYY-MM-DD")
     * @Assert\GreaterThan("today")
     *
     */
    private $dueDate;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status = 0;

    /**
     * @ORM\ManyToOne(targetEntity="ApiBundle\Entity\Category")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     * @Assert\NotBlank(message="Undefined category")
     *
     */
    private $category;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Claim
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
     * Set zip
     *
     * @param integer $zip
     *
     * @return Claim
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return int
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set city
     *
     * @param integer $city
     *
     * @return Claim
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Claim
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Claim
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Claim
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set dueDate
     *
     * @param string $dueDate
     *
     * @return Claim
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return string
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Claim
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param int $category
     */
    public function setCategory( $category )
    {
        $this->category = $category;
    }
}

