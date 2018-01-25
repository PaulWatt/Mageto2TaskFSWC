<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 21/01/2018
 * Time: 16:58
 */

namespace MMGroup\FavStarWarsChars\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper

{
    public function __construct(
        \Magento\Framework\HTTP\Client\Curl $curl,
        \Magento\Framework\Json\Helper\Data $jsonHelper
    ) {
        $this->_curl = $curl;
        $this->jsonHelper = $jsonHelper;
    }

    public function getStarWarsInfo()
    {
        $params = "Content-Type: application/json";
        $this->_curl->get("https://swapi.co/api/people/",$params);
        return $this->jsonHelper->jsonDecode($this->_curl->getBody());
    }
}