<?php

namespace OpenWines\WebAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Cepage
 *
 * @Hateoas\Relation(
 *    "parent",
 *    href = @Hateoas\Route(
 *      "Aocs",
 *      parameters = {
 *          "vignobleId"      = "expr(object.getAOC().getVignoble().getId())",
 *          "_format" = "json"
 *      },
 *      absolute = true
 *    )
 * )
 * @Hateoas\Relation(
 *   name = "self",
 *   href = @Hateoas\Route(
 *      "Aoc",
 *      parameters = {
 *          "vignobleId" = "expr(object.getAOC().getId())",
 *          "id" = "expr(object.getId())",
 *          "_format"  = "json"
 *      },
 *      absolute = true
 *     )
 * )
 * @Hateoas\Relation(
 *   name = "more",
 *   href = "expr(object.getMore())"
 * )
 * @ORM\Table(name="cepage")
 * @ORM\Entity(repositoryClass="OpenWines\WebAppBundle\Repository\CepageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Cepage
{
    /**
     * @Serializer\Exclude
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AOC", inversedBy="AOCs")
     * @ORM\JoinColumn(name="AOC_id", referencedColumnName="id")
     **/
    private $aOC;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="more", type="text", nullable=true)
     * @Serializer\Exclude because we list this as a HATEOAS relation
     */
    private $more;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;

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
     * @return Cepage
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
     * Set more
     *
     * @param string $more
     * @return Cepage
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Cepage
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
     * @return Cepage
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
     * Set AOC
     *
     * @param \OpenWines\WebAppBundle\Entity\AOC $aoc
     * @return Cepage
     */
    public function setAOC(\OpenWines\WebAppBundle\Entity\AOC $aoc = null)
    {
        $this->aOC = $aoc;

        return $this;
    }

    /**
     * Get AOC
     *
     * @return \OpenWines\WebAppBundle\Entity\AOC 
     */
    public function getAOC()
    {
        return $this->aOC;
    }
}
