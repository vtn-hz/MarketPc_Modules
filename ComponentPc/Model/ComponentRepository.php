<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\Model;

use MarketPc\ComponentPc\Api\Data\ComponentInterface;
use MarketPc\ComponentPc\Model\ResourceModel\Component as ComponentResourceModel;
use MarketPc\ComponentPc\Api\ComponentRepositoryInterface;


use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class ComponentRepository implements ComponentRepositoryInterface {
    private ComponentFactory $componentFactory;
    private ComponentResourceModel $componentResourceModel;

    public function __construct(
        ComponentFactory $componentFactory,
        ComponentResourceModel $componentResourceModel
    ) {
        $this->componentFactory = $componentFactory;
        $this->componentResourceModel = $componentResourceModel;
    }

    public function getById(int $id): ComponentInterface
    {
        $component = $this->componentFactory->create();
        $this->componentResourceModel->load($component, $id);

        if (!$component->getId()) {
            // Need Handle
            throw new NoSuchEntityException(__('"%1" ID doesnt exist.', $id));
        }

        return $component;
    }

    public function save(ComponentInterface $component): ComponentInterface
    {
        try {
            $this->componentResourceModel->save($component);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $component;
    }

    public function deleteById(int $id): bool
    {
        $component = $this->getById($id);

        try {
            $this->componentResourceModel->delete($component);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }
}