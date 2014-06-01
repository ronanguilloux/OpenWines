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
 * /**
 * @Serializer\XmlRoot("user")
 *
 * @Hateoas\Relation("self", href = "expr('/regions/' ~ object.getId() ~'.json')")
 * @Hateoas\Relation("more", href = "expr(object.getMore())")
 *
 * @ORM\Entity(repositoryClass="OpenWines\WebAppBundle\Repository\RegionRepository")
 * @ORM\Table(name="region")
 */
Class Region
{
    /**
     * @Serializer\Exclude
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column
     */
    private $name;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="AOC", mappedBy="region")
     **/
    private $AOCs;

    /**
     * @ORM\Column(name="more", type="string", nullable=true)
     * @Serializer\Exclude because we list this as a HATEOAS relation
     */
    private $more;

    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * .ctor()
     */
    public function __construct() {
        $this->AOCs = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Region
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Region
     */
    public function setCreatedAt(\DateTime $createdAt)
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
     * Set description
     *
     * @param string $description
     * @return Region
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
     * Set more
     *
     * @param string $more
     * @return Region
     */
    public function setMore($more)
    {
        $this->more = $more;

        return $this;
    }

    /**
     * Get more
     *
     * @return string 
     */
    public function getMore()
    {
        return $this->more;
    }

    /**
     * Add AOCs
     *
     * @param \OpenWines\WebAppBundle\Entity\AOC $aOCs
     * @return Region
     */
    public function addAOC(\OpenWines\WebAppBundle\Entity\AOC $aOCs)
    {
        $this->AOCs[] = $aOCs;

        return $this;
    }

    /**
     * Remove AOCs
     *
     * @param \OpenWines\WebAppBundle\Entity\AOC $aOCs
     */
    public function removeAOC(\OpenWines\WebAppBundle\Entity\AOC $aOCs)
    {
        $this->AOCs->removeElement($aOCs);
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
}
