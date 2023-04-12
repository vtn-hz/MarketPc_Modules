<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Model\ResourceModel\Foreignkey;

use MarketPc\AssembledPc\Model\Foreignkey;
use MarketPc\AssembledPc\Model\ResourceModel\Foreignkey as ForeignKeyResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Foreignkey::class, ForeignKeyResourceModel::class);
    }

    public function getParent(string $parentTable, array $columnsCondition) : Collection {
        $sqlCond = ''; $index = 0;
        foreach ($columnsCondition as $column1 => $column2) {
            $sqlCond .= "{$column1} = {$column2}";
            $index = $index + 1;

            if ($index < count($columnsCondition)) {
                $sqlCond .= ' AND ';
            }
        }
        
        return $this->join(
            [$parentTable => $this->getTable($parentTable)], 
            $sqlCond, 
            ['*']
        );
    }
}