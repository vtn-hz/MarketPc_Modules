<?php declare(strict_types=1);

namespace MarketPc\ComponentPc\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\Result\ForwardFactory;

class Index implements HttpGetActionInterface
{
    private ForwardFactory $forwardFactory;
    public function __construct(
        ForwardFactory $forwardFactory
    ) { $this->forwardFactory = $forwardFactory; }

    public function execute(): Forward {
        /** @var Forward $forward */
        $forward = $this->forwardFactory->create();
        return $forward->setController('component')->forward('list');
    }
}