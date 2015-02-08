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
 *      "appellations",
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
 *      "appellation",
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
 *          "AppellationId" = "expr(object.getId())",
 *          "_format"  = "json"
 *      },
 *      absolute = true
 *     )
 * )
 * @Hateoas\Relation(
 *   name = "more",
 *   href = "expr(object.getMore())"
 * )
 * @ORM\Entity(repositoryClass="OpenWines\WebAppBundle\Repository\AppellationRepository")
 * @ORM\Table(name="appellation")
 * @ORM\HasLifecycleCallbacks
 */
class Appellation
{
    /**
     * @Serializer\Exclude
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(name="appelation_type", type="string", nullable=true)
     * ex: "Appellation/AOP", "IGP"
     */
    private $appelation_type;

    /**
     * @ORM\ManyToOne(targetEntity="Vignoble", inversedBy="Appellations")
     * @ORM\JoinColumn(name="vignoble_id", referencedColumnName="id")
     **/
    private $vignoble;

    /**
     * @ORM\Column
     */
    private $name;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Cepage", mappedBy="cepage")
     * @Serializer\Exclude because we list this as a HATEOAS relation
     **/
    private $cepages;

    /**
     * @ORM\Column(name="area", type="integer", nullable=true, options={"comment" = "hectares"})
     * ex: "7000" (in hectares)
     */
    private $area;

    /**
     * @ORM\Column(name="production", type="integer", nullable=true, options={"comment" = "hectolitres"})
     * ex: "317500" (in hectolitre)
     */
    private $production;

    /**
     * @ORM\Column(name="soil", type="string", nullable=true)
     * ex: "argilo-calcaire,granitique"
     */
    private $soil;

    /**
     * @ORM\Column(name="wine_type", type="string", nullable=true)
     * ex: "vin blanc mousseux"
     */
    private $wine_type;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="more", type="text", nullable=true)
     * @Serializer\Exclude because we list this as a HATEOAS relation
     */
    private $more;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * .ctor()
     */
    public function __construct()
    {
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
     * @param  string      $name
     * @return Appellation
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
     * @param  string      $type
     * @return Appellation
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
     * @param  \OpenWines\WebAppBundle\Entity\Vignoble $vignoble
     * @return Appellation
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
     * @param  \OpenWines\WebAppBundle\Entity\Cepage $cepages
     * @return Appellation
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
     * @param  \DateTime   $createdAt
     * @return Appellation
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
     * @param  \DateTime   $updatedAt
     * @return Appellation
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
     * @param  string      $more
     * @return Appellation
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
        if (false !== strpos($this->more, ',')) {
            return explode(',', $this->more);
        }

        return $this->more;
    }

    /**
     * Set area
     *
     * @param  string      $area
     * @return Appellation
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
     * Set production
     *
     * @param  integer     $production
     * @return Appellation
     */
    public function setProduction($production)
    {
        $this->production = $production;

        return $this;
    }

    /**
     * Get production
     *
     * @return integer
     */
    public function getProduction()
    {
        return $this->production;
    }

    /**
     * Set soil
     *
     * @param  string      $soil
     * @return Appellation
     */
    public function setSoil($soil)
    {
        if (!empty($soil)) {
            $this->soil = sprintf("%s,", $this->soil);
        }
        $this->soil .= $soil;

        return $this;
    }

    /**
     * Get soil
     *
     * @return mixed array or string
     */
    public function getSoil()
    {
        if (false !== strpos($this->soil, ',')) {
            return explode(',', $this->soil);
        }

        return $this->soil;
    }

    /**
     * Set wine
     *
     * @param  string      $wine
     * @return Appellation
     */
    public function setWine($wine)
    {
        $this->wine = $wine;

        return $this;
    }

    /**
     * Get wine
     *
     * @return string
     */
    public function getWine()
    {
        return $this->wine;
    }

    /**
     * Set description
     *
     * @param  string      $description
     * @return Appellation
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
     * Set wine_type
     *
     * @param  string      $wineType
     * @return Appellation
     */
    public function setWineType($wineType)
    {
        $this->wine_type = $wineType;

        return $this;
    }

    /**
     * Get wine_type
     *
     * @return string
     */
    public function getWineType()
    {
        return $this->wine_type;
    }

    /**
     * Set appelation_type
     *
     * @param  string      $appelationType
     * @return Appellation
     */
    public function setAppelationType($appelationType)
    {
        $this->appelation_type = $appelationType;

        return $this;
    }

    /**
     * Get appelation_type
     *
     * @return string
     */
    public function getAppelationType()
    {
        return $this->appelation_type;
    }
}
