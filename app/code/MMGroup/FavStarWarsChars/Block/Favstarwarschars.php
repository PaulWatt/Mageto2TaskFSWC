<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 21/01/2018
 * Time: 22:13
 */

namespace MMGroup\FavStarWarsChars\Block;

class FavStarWarsChars extends \Magento\Framework\View\Element\Template
{
    protected $helper;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \MMGroup\FavStarWarsChars\Helper\Data $helper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->helper = $helper;
    }

    public function getStarWarsChars()
    {
       return $this->helper->getStarWarsInfo();
    }

}