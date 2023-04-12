<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\Setup\Patch\Data;

use MarketPc\ComponentPc\Api\ComponentRepositoryInterface;
use MarketPc\ComponentPc\Model\ComponentFactory;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class PopulateComponentPc3 implements DataPatchInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;
    private ComponentFactory $componentFactory;
    private ComponentRepositoryInterface $componentRepository;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        ComponentFactory $componentFactory,
        ComponentRepositoryInterface $componentRepository
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->componentFactory = $componentFactory;
        $this->componentRepository = $componentRepository;
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

        /*
            "model": true
            "type": true
            "price": true
        */ 

        $component = $this->componentFactory->create();
        $component->setData([
            'model' => 'Nvidia Msi Ventus Xs Geforce Rtx 2080',
            'type' => 'Placa Grafica',
            'price' => 250000
        ]);
        $this->componentRepository->save($component);

        $this->moduleDataSetup->endSetup();
    }
}
