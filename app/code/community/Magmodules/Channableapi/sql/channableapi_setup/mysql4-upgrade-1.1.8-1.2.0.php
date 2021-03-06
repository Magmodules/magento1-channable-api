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

/** @var $installer Mage_Catalog_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

try {
    $installer->run("ALTER TABLE {$this->getTable('channable_items')} CHANGE COLUMN `product_title` `title` varchar(255);");
    $installer->run("ALTER TABLE {$this->getTable('channable_items')} CHANGE COLUMN `qty` `stock` decimal(12,4);");
    $installer->run("ALTER TABLE {$this->getTable('channable_items')} ADD `parent_id` int(11) NOT NULL AFTER `product_id`;");
    $installer->run("ALTER TABLE {$this->getTable('channable_items')} ADD `gtin` varchar(255) DEFAULT NULL AFTER `parent_id`;");
} catch (Exception $e) {
    Mage::log($e->getMessage());
}

$installer->endSetup();
