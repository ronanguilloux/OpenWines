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
use Hateoas\Helper\LinkHelper;


/**
 * @Serializer\XmlRoot("user")
 *
 * @Hateoas\Relation(
 *    "self",
 *    href = @Hateoas\Route(
 *      "region",
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
 *      "Aocs",
 *      parameters = {
 *          "id"      = "expr(object.getId())",
 *          "_format" = "json"
 *      },
 *      absolute = true
 *     )
 * )
 * @Hateoas\Relation(
 *   name = "more",
 *   href = "expr(object.getMore())"
 * )
 * @ORM\Entity(repositoryClass="OpenWines\WebAppBundle\Repository\RegionRepository")
 * @ORM\Table(name="region")
 **/
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
     * @ORM\OneToMany(targetEntity="aoc", mappedBy="region")
     * @Serializer\Exclude because we list this as a HATEOAS relation
     **/
    private $aocs;

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
        $this->aocs = new ArrayCollection();
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
     * Add AOC
     *
     * @param \OpenWines\WebAppBundle\Entity\Aoc $aoc
     * @return Region
     */
    public function addaoc(\OpenWines\WebAppBundle\Entity\aoc $aoc)
    {
        $this->aocs[] = $aoc;

        return $this;
    }

    /**
     * Remove AOC
     *
     * @param \OpenWines\WebAppBundle\Entity\Aoc $aoc
     */
    public function removeAoc(\OpenWines\WebAppBundle\Entity\Aoc $aoc)
    {
        $this->aocs->removeElement($aoc);
    }

    /**
     * Get AOCs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAocs()
    {
        return $this->aocs;
    }
}
