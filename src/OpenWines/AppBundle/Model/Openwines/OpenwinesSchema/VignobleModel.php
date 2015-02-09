<?php

namespace OpenWines\AppBundle\Model\Openwines\OpenwinesSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;
use OpenWines\AppBundle\Model\Openwines\OpenwinesSchema\AutoStructure\Vignoble as VignobleStructure;

/**
 * VignobleModel
 *
 * Model class for table vignoble.
 *
 * @see Model
 */
class VignobleModel extends Model
{
    use WriteQueries;

    /**
     * __construct()
     *
     * Model constructor
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->structure = new VignobleStructure();
        $this->flexible_entity_class = "\OpenWines\AppBundle\Model\Openwines\OpenwinesSchema\Vignoble";
    }
}
