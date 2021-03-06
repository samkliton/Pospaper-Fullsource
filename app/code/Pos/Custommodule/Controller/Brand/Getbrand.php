<?php
 
namespace Pos\Custommodule\Controller\Brand;
 
use Magento\Framework\App\Action\Context;
 
class Getbrand extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
 
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
 
    public function execute()
    {
        $manufacturer = $_POST['manufacturer'];   

        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
        
        $getOptionValue = $objectManager->create('Pos\Manufacturer\Model\Manufacturer')->getCollection();
        $getOptionValue->addFieldToFilter('manufacturer', $manufacturer);
        $mod = [];
        $html = '';
        foreach($getOptionValue as $value){
            $mod[$value->getData('model')] = $value->getData('model');
        }
        asort($mod);

        $html .= '<option value="-1" >Select a Model</option>';
        foreach ($mod as $value){
            $html .= '<option value="'.$value.'" >'.$value.'</option>';
        }
        echo $html;
    }
}