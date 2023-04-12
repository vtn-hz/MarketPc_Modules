<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\Model\ResourceModel\Component;

use MarketPc\ComponentPc\Model\Component;
use MarketPc\ComponentPc\Model\ResourceModel\Component as ComponentResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Component::class, ComponentResourceModel::class);
    }
}