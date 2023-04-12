<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Model\ResourceModel\Assembled;

use MarketPc\AssembledPc\Model\Assembled;
use MarketPc\AssembledPc\Model\ResourceModel\Assembled as AssembledResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Assembled::class, AssembledResourceModel::class);
    }
}