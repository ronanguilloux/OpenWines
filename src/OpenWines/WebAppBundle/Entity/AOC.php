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
 * @Hateoas\Relation(
 *    "parent",
 *    href = @Hateoas\Route(
 *      "aocs",
 *      parameters = {
 *          "vignobleId"      = "expr(object.getVignoble().getId())",
 *          "_format" = "json"
 *      },
 *      absolute = true
 *    )
 * )
 * @Hateoas\Relation(
 *   name = "self",
 *   href = @Hateoas\Route(
 *      "aoc",
 *      parameters = {
 *          "id" = "expr(object.getId())",
 *          "vignobleId" = "expr(object.getVignoble().getId())",
 *          "_format"  = "json"
 *      },
 *      absolute = true
 *     )
 * )
 * @Hateoas\Relation(
 *   name = "cepages",
 *   href = @Hateoas\Route(
 *      "cepages",
 *      parameters = {
 *          "vignobleId" = "expr(object.getVignoble().getId())",
 *          "AOCId" = "expr(object.getId())",
 *          "_format"  = "json"
 *      },
 *      absolute = true
 *     )
 * )
 * @Hateoas\Relation(
 *   name = "more",
 *   href = "expr(object.getMore())"
 * )
 * @ORM\Entity(repositoryClass="OpenWines\WebAppBundle\Repository\AOCRepository")
 * @ORM\Table(name="AOC")
 * @ORM\HasLifecycleCallbacks
 */
Class AOC
{
    /**
     * @Serializer\Exclude
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Vignoble", inversedBy="AOCs")
     * @ORM\JoinColumn(name="vignoble_id", referencedColumnName="id")
     **/
    private $vignoble;

    /**
     * @ORM\Column
     */
    private $name;

    /**
     * @ORM\Column
     * ex: "produit", "géographique", etc.
     */
    private $type;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cepage", mappedBy="cepage")
     * @Serializer\Exclude because we list this as a HATEOAS relation
     **/
    private $cepages;

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
        $this->cepages = new ArrayCollection();
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
     * @return AOC
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
     * Set type
     *
     * @param string $type
     * @return AOC
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set vignoble
     *
     * @param \OpenWines\WebAppBundle\Entity\Vignoble $vignoble
     * @return AOC
     */
    public function setVignoble(\OpenWines\WebAppBundle\Entity\Vignoble $vignoble = null)
    {
        $this->vignoble = $vignoble;

        return $this;
    }

    /**
     * Get vignoble
     *
     * @return \OpenWines\WebAppBundle\Entity\Vignoble
     */
    public function getVignoble()
    {
        return $this->vignoble;
    }

    /**
     * Add cepages
     *
     * @param \OpenWines\WebAppBundle\Entity\Cepage $cepages
     * @return AOC
     */
    public function addCepage(\OpenWines\WebAppBundle\Entity\Cepage $cepages)
    {
        $this->cepages[] = $cepages;

        return $this;
    }

    /**
     * Remove cepages
     *
     * @param \OpenWines\WebAppBundle\Entity\Cepage $cepages
     */
    public function removeCepage(\OpenWines\WebAppBundle\Entity\Cepage $cepages)
    {
        $this->cepages->removeElement($cepages);
    }

    /**
     * Get cepages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCepages()
    {
        return $this->cepages;
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

    /**
     * Set more
     *
     * @param string $more
     * @return AOC
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
}
