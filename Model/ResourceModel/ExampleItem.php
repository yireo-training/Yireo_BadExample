<?php

namespace Yireo\Example\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ExampleItem extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'example_items_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('example_items', 'id');
        $this->_useIsObjectNew = true;
    }
}
