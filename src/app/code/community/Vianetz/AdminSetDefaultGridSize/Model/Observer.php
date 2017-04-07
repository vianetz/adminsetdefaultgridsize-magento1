<?php
/**
 * Observer
 *
 * @section LICENSE
 * This file is created by vianetz <info@vianetz.com>.
 * The Magento module is distributed under GNU General Public License.
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@vianetz.com so we can send you a copy immediately.
 *
 * @category    Vianetz
 * @package     Vianetz_AdminSetDefaultGridSize
 * @author      Christoph Massmann, <C.Massmann@vianetz.com>
 * @link        http://www.vianetz.com
 * @copyright   Copyright (c) since 2006 vianetz - C. Massmann (http://www.vianetz.com)
 * @license     http://www.gnu.org/licenses/gpl-3.0.txt GNU GENERAL PUBLIC LICENSE
 */

/**
 * AdminSetDefaultGridSize Observer for save default grid limit
 */
class Vianetz_AdminSetDefaultGridSize_Model_Observer
{
    /**
     * @var string
     */
    private $configurationKey = 'vianetzAdminGridSettings';

    /**
     * Read and save last grid view limit as default limit to the admin user extra attribute.
     *
     * Event: core_block_abstract_prepare_layout_before
     *
     * @param Varien_Event_Observer $observer
     *
     * @return Vianetz_AdminSetDefaultGridSize_Model_Observer
     */
    public function changeDefaultLimit(Varien_Event_Observer $observer)
    {
        $block = $observer->getEvent()->getBlock();
        if (! $block instanceof Mage_Adminhtml_Block_Widget_Grid) {
            return $this;
        }

        $defaultLimit = $this->getGridLimit($block->getType());
        if (empty($defaultLimit) === false) {
            $block->setDefaultLimit($defaultLimit);
        }

        $pageLimit = $block->getRequest()->getParam('limit');
        if (empty($pageLimit) === false) {
            $this->saveGridLimit($block->getType(), $pageLimit);
        }

        return $this;
    }

    /**
     * @param string $blockType
     * @param integer $limit
     *
     * @return Vianetz_AdminSetDefaultGridSize_Model_Observer
     */
    private function saveGridLimit($blockType, $limit)
    {
        $extra = $this->getUserExtraData();
        if (isset($extra[$this->configurationKey][$blockType]) === false) {
            $extra[$this->configurationKey][$blockType] = array();
        }
        $extra[$this->configurationKey][$blockType]['limit'] = $limit;

        $this->getUser()->saveExtra($extra);

        return $this;
    }

    /**
     * @param string $blockType
     *
     * @return null|integer
     */
    private function getGridLimit($blockType)
    {
        $extra = $this->getUserExtraData();
        if (isset($extra[$this->configurationKey][$blockType]['limit']) === false) {
            return null;
        }

        return $extra[$this->configurationKey][$blockType]['limit'];
    }

    /**
     * @return array
     */
    private function getUserExtraData()
    {
        $extra = $this->getUser()->getExtra();
        if (is_array($extra) === false) {
            $extra = array();
        }
        if (!isset($extra[$this->configurationKey])) {
            $extra[$this->configurationKey] = array();
        }

        return $extra;
    }

    /**
     * @return Mage_Admin_Model_User
     */
    private function getUser()
    {
        return Mage::getSingleton('admin/session')->getUser();
    }
}
