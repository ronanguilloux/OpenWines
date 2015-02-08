<?php

namespace OpenWines\WebAppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Cepage
 *
 * @Hateoas\Relation(
 *    "parent",
 *    href = @Hateoas\Route(
 *      "appellations",
 *      parameters = {
 *          "vignobleId"      = "expr(object.getAppellation().getVignoble().getId())",
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
 *          "vignobleId" = "expr(object.getAppellation().getId())",
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
     * @ORM\ManyToOne(targetEntity="Appellation", inversedBy="Appellations")
     * @ORM\JoinColumn(name="Appellation_id", referencedColumnName="id")
     **/
    private $appellation;

    /**
     * @var string
     *
     * @ORM\Column
     */
    private $name;

    /**
     * @var string
     *             ex: "Noiriens" (http://fr.wikipedia.org/wiki/Famille_des_Noiriens)
     *
     * @ORM\Column
     */
    private $famille;

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
     * @param  string $name
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
     * @param  string $more
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
        if (false !== strpos($this->more, ',')) {
            return explode(',', $this->more);
        }

        return $this->more;
    }

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
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
     * @param  \DateTime $updatedAt
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
     * Set Appellation
     *
     * @param  \OpenWines\WebAppBundle\Entity\Appellation $appellation
     * @return Cepage
     */
    public function setAppellation(\OpenWines\WebAppBundle\Entity\Appellation $appellation = null)
    {
        $this->appellation = $appellation;

        return $this;
    }

    /**
     * Get Appellation
     *
     * @return \OpenWines\WebAppBundle\Entity\Appellation
     */
    public function getAppellation()
    {
        return $this->appellation;
    }

    /**
     * Set famille
     *
     * @param  string $famille
     * @return Cepage
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }
}
