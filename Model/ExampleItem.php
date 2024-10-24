<?php

namespace Yireo\BadExample\Model;

use Magento\Framework\Model\AbstractModel;
use Yireo\Example\Model\ResourceModel\ExampleItem as ResourceModel;

class ExampleItem extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'bad_example_items_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    public function setTitle($title)
    {
        $this->setData('title', $title);
    }

    public function getTitle()
    {
        return $this->getData('title');
    }

    public function setToken($token)
    {
        $this->setData('token', $token);
    }

    public function getToken()
    {
        return $this->getData('token');
    }

    public function setDescription($description)
    {
        $this->setData('description', $description);
    }

    public function getDescription()
    {
        return $this->getData('description');
    }
}
