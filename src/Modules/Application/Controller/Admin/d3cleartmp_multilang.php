<?php

namespace D3\Multilang\Modules\Application\Controller\Admin;

 use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
 use D3\Multilang\Application\Model\d3_translations;
 use Doctrine\DBAL\DBALException;
 use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
 use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
 use OxidEsales\Eshop\Core\Exception\StandardException;
 use OxidEsales\Eshop\Core\Registry;
 use OxidEsales\Eshop\Core\UtilsView;

 /**
  * This Software is the property of Data Development and is protected
  * by copyright law - it is NOT Freeware.
  * Any unauthorized use of this software without a valid license
  * is a violation of the license agreement and will be prosecuted by
  * civil and criminal law.
  * http://www.shopmodule.com
  *
  * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
  * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
  * @link      http://www.oxidmodule.com
  */

class d3cleartmp_multilang extends d3cleartmp_multilang_parent
{
    protected $_sMultiLangModId = 'd3_multilang';

    /**
     * @return string
     */
    protected function _d3GetMultiLangModId()
    {
        return $this->_sMultiLangModId;
    }

    /**
     * @return bool|d3_cfg_mod|false
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function d3GetMultiLangSet()
    {
        return d3_cfg_mod::get($this->_d3GetMultiLangModId());
    }

    public function clearTmp()
    {
        $blReturn = false;

        if ($this->d3GetMultiLangSet()->isActive()) {
            if (!Registry::getRequest()->getRequestEscapedParameter('clearall')) {
                if (Registry::getRequest()->getRequestEscapedParameter('importmultilang')) {
                    $this->addTplParam('importMultilang', true);
                    /** @var d3_translations $oTranslation */
                    $oTranslation = oxNew(d3_translations::class);
                    $oTranslation->importInstalled();
                }
            }

            if ($blReturn) {
                Registry::get(UtilsView::class)->addErrorToDisplay(new StandardException('D3_CFG_CLRTMP_SUCCESS'));
            }
        }

        parent::clearTmp();
    }
}
