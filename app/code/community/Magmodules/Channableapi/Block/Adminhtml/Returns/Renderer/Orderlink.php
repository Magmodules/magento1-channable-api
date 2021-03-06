<?php
/**
 * Magmodules.eu - http://www.magmodules.eu
 *
 * NOTICE OF LICENSE
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to info@magmodules.eu so we can send you a copy immediately.
 *
 * @category      Magmodules
 * @package       Magmodules_Channableapi
 * @author        Magmodules <info@magmodules.eu>
 * @copyright     Copyright (c) 2018 (http://www.magmodules.eu)
 * @license       http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Magmodules_Channableapi_Block_Adminhtml_Returns_Renderer_Orderlink
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    /**
     * @param Varien_Object $row
     *
     * @return string with html link to order view
     */
    public function render(Varien_Object $row)
    {
        /** @var Magmodules_Channableapi_Helper_Data $helper */
        $helper = Mage::helper('channableapi');

        $orderId = $row->getData('magento_order_id');
        $incrementId = $row->getData('magento_increment_id');

        if ($orderId > 0) {
            $url = $helper->getBackendUrl('*/sales_order/view', array('order_id' => $orderId));
            return sprintf('<a href="%s">#%s</a>', $url, $incrementId);
        } else {
            return '<i>' . $helper->__('not found') . '</i>';
        }
    }

}