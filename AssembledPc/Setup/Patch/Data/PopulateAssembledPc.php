<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\Setup\Patch\Data;



use MarketPc\AssembledPc\Api\AssembledRepositoryInterface;
use MarketPc\AssembledPc\Model\AssembledFactory;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;


class PopulateAssembledPc implements DataPatchInterface
{
    private ModuleDataSetupInterface $moduleDataSetup;

    private AssembledFactory $assembledFactory;
    private AssembledRepositoryInterface $assembledRepository;


    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        AssembledFactory $assembledFactory,
        AssembledRepositoryInterface $assembledRepository
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->assembledFactory = $assembledFactory;
        $this->assembledRepository = $assembledRepository;
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
            "name": true,
            "rate": true,
        */ 

        $assembled = $this->assembledFactory->create();
        $assembled->setData([
            'name' => 'Computadora Moderada',
            'rate' => 3.0,
        ]);
        $this->assembledRepository->save($assembled);


        $this->moduleDataSetup->endSetup();
    }
}