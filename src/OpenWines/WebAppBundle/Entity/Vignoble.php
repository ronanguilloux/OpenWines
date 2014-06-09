<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 29/05/2014
 * Time: 17:41
 */

namespace OpenWines\WebAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * @Serializer\XmlRoot("user")
 *
 * @Hateoas\Relation(
 *   name = "parent",
 *   href = @Hateoas\Route(
 *      "vignobles",
 *      parameters = {
 *          "_format" = "json"
 *      },
 *      absolute = true
 *      )
 * )
 * @Hateoas\Relation(
 *    "self",
 *    href = @Hateoas\Route(
 *      "vignoble",
 *      parameters = {
 *          "id"      = "expr(object.getId())",
 *          "_format" = "json"
 *      },
 *      absolute = true
 *    )
 * )
 * @Hateoas\Relation(
 *   name = "aocs",
 *   href = @Hateoas\Route(
 *      "aocs",
 *      parameters = {
 *          "vignobleId" = "expr(object.getId())",
 *          "_format"  = "json"
 *      },
 *      absolute = true
 *     )
 * )
 * @Hateoas\Relation(
 *   name = "more",
 *   href = "expr(object.getMore())"
 * )
 * @ORM\Entity(repositoryClass="OpenWines\WebAppBundle\Repository\VignobleRepository")
 * @ORM\Table(name="vignoble")
 * @ORM\HasLifecycleCallbacks
 **/
Class Vignoble
{

    /**
     * @Serializer\Exclude
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="departments", type="string", nullable=true)
     */
    private $departments; // "|" - separated string

    /**
     * @ORM\Column(name="area", type="decimal", nullable=true)
     */
    private $area; // Km2

    /**
     * @ORM\OneToMany(targetEntity="AOC", mappedBy="vignoble")
     * @Serializer\Exclude because we list this as a HATEOAS relation
     **/
    private $AOCs;

    /**
     * @ORM\Column(name="more", type="text", nullable=true)
     * @Serializer\Exclude because we list this as a HATEOAS relation
     */
    private $more;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * .ctor()
     */
    public function __construct() {
        $this->aocs = new ArrayCollection();
    }

    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $this->setUpdatedAt(new \DateTime('now'));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    /** All the rest below comes from Doctrine Entity Generator: */

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
     * Set name
     *
     * @param string $name
     * @return Vignoble
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Vignoble
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
     * Set departments
     *
     * @param string $departments
     * @return Vignoble
     */
    public function setDepartments($departments)
    {
        if(is_array($departments)) {
            $departments = implode('|', $departments);
        }

        $this->departments = $departments;

        return $this;
    }

    /**
     * Get departments
     *
     * @return string 
     */
    public function getDepartments()
    {
        return expolode('|', $this->departments);
    }

    /**
     * Set area
     *
     * @param string $area
     * @return Vignoble
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set more
     *
     * @param string $more
     * @return Vignoble
     */
    public function setMore($more)
    {
        if (!empty($more)) {
            $this->more = sprintf("%s,", $this->more);
        }
        $this->more .= $more;

        return $this;
    }

    /**
     * Get more
     *
     * @return mixed array or string
     */
    public function getMore()
    {
        if (false !== strpos($this->more, ',')){
            return explode(',', $this->more);
        }

        return $this->more;
    }

    /**
     * Add AOCs
     *
     * @param \OpenWines\WebAppBundle\Entity\AOC $aocs
     * @return Vignoble
     */
    public function addAOC(\OpenWines\WebAppBundle\Entity\AOC $aocs)
    {
        $this->AOCs[] = $aocs;

        return $this;
    }

    /**
     * Remove AOCs
     *
     * @param \OpenWines\WebAppBundle\Entity\AOC $aocs
     */
    public function removeAOC(\OpenWines\WebAppBundle\Entity\AOC $aocs)
    {
        $this->AOCs->removeElement($aocs);
    }

    /**
     * Get AOCs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAOCs()
    {
        return $this->AOCs;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return AOC
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
     * @return AOC
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

}
