<?php

namespace OpenWines\AppBundle\Db\OpenwinesSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;
use OpenWines\AppBundle\Db\OpenwinesSchema\AutoStructure\Appellation as AppellationStructure;

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
     */
    public function __construct()
    {
        $this->structure = new AppellationStructure();
        $this->flexible_entity_class = "\OpenWines\AppBundle\Db\OpenwinesSchema\Appellation";
    }
}