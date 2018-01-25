<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 21/01/2018
 * Time: 20:00
 */

namespace MMGroup\FavStarWarsChars\Controller\Customer;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;

    protected $session;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->session = $customerSession;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        if (!$this->session->isLoggedIn())
        {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('customer/account/login');
            return $resultRedirect;
        }
        else
        {
            $resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->set(__('My Favourite Star Wars Characters'));
            return $resultPage;
        }
    }

}