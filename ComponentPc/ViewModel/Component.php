<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\ViewModel;

use MarketPc\ComponentPc\Api\Data\ComponentInterface;
use MarketPc\ComponentPc\Api\ComponentRepositoryInterface;
use MarketPc\ComponentPc\Model\ResourceModel\Component\Collection;


use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Component implements ArgumentInterface
{
    private Collection $collection;
    private ComponentRepositoryInterface $componentRepository;
    private RequestInterface $request;

    public function __construct(
        Collection $collection,
        ComponentRepositoryInterface $componentRepository,
        RequestInterface $request
    ) { 
        $this->collection = $collection;
        $this->componentRepository = $componentRepository;
        $this->request = $request;
    }

    public function getList(): array
    {
        return $this->collection->getItems();
    }

    public function getDetail(): ComponentInterface
    {
        $id = (int) $this->request->getParam('id');
        return $this->componentRepository->getById($id);
    }
}