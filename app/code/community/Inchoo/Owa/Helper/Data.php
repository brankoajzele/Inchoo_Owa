<?php
/**
 * @author Branko Ajzele <ajzele@gmail.com>
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
class Inchoo_Owa_Helper_Data extends Mage_Core_Helper_Data 
{
    const CONFIG_XML_PATH_SETTINGS_ACTIVE = 'inchoo_owa/settings/active';
    const CONFIG_XML_PATH_SETTINGS_SITE_ID = 'inchoo_owa/settings/site_id';
    const CONFIG_XML_PATH_SETTINGS_OWA_BASE_URL = 'inchoo_owa/settings/owa_base_url';
    
    public function isModuleEnabled($moduleName = null)
    {
        if (Mage::getStoreConfig(self::CONFIG_XML_PATH_SETTINGS_ACTIVE) == '0') {
            return false;
        }
        
        return parent::isModuleEnabled($moduleName = null);
    }
    
    public function isModuleOutputEnabled($moduleName = null)
    {
        $siteId = $this->getSiteId();
        
        if (empty($siteId)) {
            return false;
        }
        
        return parent::isModuleOutputEnabled($moduleName);
    }
    
    public function getSiteId()
    {
        $siteId = Mage::getStoreConfig(self::CONFIG_XML_PATH_SETTINGS_SITE_ID);
        return trim($siteId);
    }
    
    public function getOwaBaseUrl()
    {
        $owaBaseUrl = Mage::getStoreConfig(self::CONFIG_XML_PATH_SETTINGS_OWA_BASE_URL);
        return trim($owaBaseUrl);
    }    
}
