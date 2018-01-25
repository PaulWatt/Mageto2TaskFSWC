<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 22/01/2018
 * Time: 10:48
 */

namespace MMGroup\FavStarWarsChars\Block;

class Mychars extends \Magento\Framework\View\Element\Template
{
    protected $helper;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \MMGroup\FavStarWarsChars\Helper\Data $helper,
        array $data = []
    ) {
        $this->helper = $helper;
        parent::__construct($context, $data);
    }
    public function transposeData($data)
    {
        $retData = array();
        foreach ($data as $row => $columns) {
            foreach ($columns as $row2 => $column2) {
                $retData[$row2][$row] = $column2;
            }
        }
        return $retData;
    }
    public function getMyChars()
    {
        $MySWChars = $this->getRequest()->getPostValue();
        $MySWChars = $this->transposeData($MySWChars);
        return $MySWChars;
    }

}