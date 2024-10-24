<?php

namespace Yireo\Example\Model\ResourceModel\ExampleItem;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Yireo\Example\Model\ExampleItem as Model;
use Yireo\Example\Model\ResourceModel\ExampleItem as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'example_items_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
