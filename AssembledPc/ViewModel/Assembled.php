<?php declare(strict_types=1);

namespace MarketPc\AssembledPc\ViewModel;

use MarketPc\AssembledPc\Api\Data\AssembledInterface;
use MarketPc\AssembledPc\Api\AssembledRepositoryInterface;


use MarketPc\AssembledPc\Model\ResourceModel\Assembled\Collection;
use MarketPc\AssembledPc\Model\ResourceModel\Foreignkey\Collection as CollectionForeignkey;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Assembled implements ArgumentInterface
{
    private CollectionForeignkey $collectionFk;
    private Collection $collection;
    private AssembledRepositoryInterface $assembledRepository;
    private RequestInterface $request;

    public function __construct(
        CollectionForeignkey $collectionFk,
        Collection $collection,
        AssembledRepositoryInterface $assembledRepository,
        RequestInterface $request
    ) { 
        $this->collectionFk = $collectionFk;
        $this->collection = $collection;
        $this->assembledRepository = $assembledRepository;
        $this->request = $request;
    }

    public function getList(): array
    {
        return $this->collection->getItems();
    }

    public function getDetail(): AssembledInterface
    {
        $id = (int) $this->request->getParam('id');
        return $this->assembledRepository->getById($id);
    }

    public function getComponents(): array
    {
        $id = (int) $this->request->getParam('id');
        $collection = $this->collectionFk
            ->getParent('marketpc_componentpc',
                ['marketpc_componentpc.id' => 'main_table.id_marketpc_componentpc',
                'main_table.id_marketpc_assembledpc' => $id]
        );
    
        return $collection->getItems(); 
    }
}