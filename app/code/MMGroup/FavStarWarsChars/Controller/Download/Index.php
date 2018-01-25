<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 23/01/2018
 * Time: 12:26
 */

namespace MMGroup\FavStarWarsChars\Controller\Download;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;

    public function _construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {

        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $post = $this->getRequest()->getPostValue();
        $data = $this->flipData($post);
        $postHeadings = array_keys($data[0]);
        $headings = [];
        foreach ($postHeadings as $heading_id => $heading){
        array_push($headings, __($heading));
    }
        $outputFile = "MyFavouriteStarWarsChars.csv";
        $handle = fopen($outputFile, 'w');
        fputcsv($handle, $headings);

        foreach ($data as $SWChar) {
            $row = [];
            foreach ($SWChar as $attribute => $val) {
                array_push($row,$val);
            }
            fputcsv($handle, $row);
        }
        return $this->resultRedirectFactory->create()->setUrl('../MyFavouriteStarWarsChars.csv'); //magento root
    }

    public function flipData($data)
    {
        $flipData = array();
        foreach ($data as $row => $columns) {
            foreach ($columns as $row2 => $column2) {
                $flipData[$row2][$row] = $column2;
            }
        }
        return $flipData;
    }
}