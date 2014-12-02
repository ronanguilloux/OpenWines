<?php
/**
 * Created by PhpStorm.
 * User: ronan
 * Date: 02/12/2014
 * Time: 13:37
 */

namespace OpenWines\WebAppBundle\Entity;


class Vintage {
    /**
     * @Serializer\Exclude
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Appellation", inversedBy="Vintages")
     * @ORM\JoinColumn(name="Appellation_id", referencedColumnName="id")
     **/
    private $appellation;

    /**
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

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
     * Set description
     *
     * @param string $description
     * @return Vintage
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
     * Set Appellation
     *
     * @param \OpenWines\WebAppBundle\Entity\Appellation $appellation
     * @return Vintage
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Vintage
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
     * @return Vintage
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