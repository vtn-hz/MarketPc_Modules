<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Setup\Patch\Data;

use MarketPc\AssembledPc\Model\ForeignkeyFactory;
use MarketPc\AssembledPc\Model\ResourceModel\Foreignkey;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class PopulateForeignkey implements DataPatchInterface
{
    private ModuleDataSetupInterface    $moduleDataSetup;
    private ForeignkeyFactory           $foreignkeyFactory;
    private Foreignkey                  $foreignkeyRepository;

    public function __construct(
        ModuleDataSetupInterface    $moduleDataSetup,
        ForeignkeyFactory           $foreignkeyFactory,
        Foreignkey                  $foreignkeyRepository
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->foreignkeyFactory = $foreignkeyFactory;
        $this->foreignkeyRepository = $foreignkeyRepository;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        
        $foreignkey = $this->foreignkeyFactory->create();
        $foreignkey->setData([
            'id_marketpc_assembledpc' => 1,
            'id_marketpc_componentpc' => 1
        ]);
        $this->foreignkeyRepository->save($foreignkey);

        $foreignkey->setData([
            'id_marketpc_assembledpc' => 1,
            'id_marketpc_componentpc' => 2
        ]);
        $this->foreignkeyRepository->save($foreignkey);

        $foreignkey->setData([
            'id_marketpc_assembledpc' => 1,
            'id_marketpc_componentpc' => 3
        ]);
        $this->foreignkeyRepository->save($foreignkey);

        $foreignkey->setData([
            'id_marketpc_assembledpc' => 2,
            'id_marketpc_componentpc' => 1
        ]);
        $this->foreignkeyRepository->save($foreignkey);

        $foreignkey->setData([
            'id_marketpc_assembledpc' => 2,
            'id_marketpc_componentpc' => 4
        ]);
        $this->foreignkeyRepository->save($foreignkey);


        $this->moduleDataSetup->endSetup();
    }
}