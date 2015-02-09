<?php

namespace OpenWines\AppBundle\Model\Openwines\OpenwinesSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;
use OpenWines\AppBundle\Model\Openwines\OpenwinesSchema\AutoStructure\Appellation as AppellationStructure;

/**
 * AppellationModel
 *
 * Model class for table appellation.
 *
 * @see Model
 */
class AppellationModel extends Model
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
        $this->structure = new AppellationStructure();
        $this->flexible_entity_class = "\OpenWines\AppBundle\Model\Openwines\OpenwinesSchema\Appellation";
    }
}
