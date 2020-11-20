<?php

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

namespace D3\Multilang\Application\Controller\Admin;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\Configuration\d3_cfg_mod;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use D3\Multilang\Application\Model\d3_translations;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;

class d3_cfg_multilang_imex extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3_cfg_multilang_imex.tpl';
    protected $_sExportDir = 'export';
    protected $_sModId = 'd3_multilang';
    protected $_sExportType = '';
    protected $_sImportType = '';
    protected $_sMimeType = '';
    protected $_aImportStatusMessage = array();
    protected $_sMenuItemTitle = 'd3mxmultilang';
    protected $_sMenuSubItemTitle = 'd3tbclmultilang_imex';
    public $aMessages = array();

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function render()
    {
        $this->setImportStatusMessages();

        $this->addTplParam('readonly', !$this->d3getSet()->isActive());

        $oLang = Registry::getLang();
        $aLangList = Registry::getRequest()->getRequestEscapedParameter('lang');
        if (isset($aLangList) && is_array($aLangList) && isset($aLangList['oxident'])) {
            $iLangNr = $aLangList['oxident'];
        } else {
            $iLangNr = 0;
        }
        $this->_aViewData['aImportLanguages'] = $oLang->getLanguageArray($iLangNr);

        return parent::render();
    }

    /**
     * @param $sMessage
     */
    public function addStatusMessage($sMessage)
    {
        $this->aMessages[] = $sMessage;
    }

    /**
     * @return array
     */
    public function getStatusMessages()
    {
        return $this->aMessages;
    }

    /**
     * @param $sIdent
     *
     * @return mixed
     */
    public function getRequParam($sIdent)
    {
        return Registry::getRequest()->getRequestEscapedParameter($sIdent);
    }

    public function setImportStatusMessages()
    {
        $this->_aImportStatusMessage = array(
            'csv'   => array(
                0   => 'D3_MULTILANG_NOT_SUCC',
                1   => 'D3_MULTILANG_SUCC_CSV',
            ),
            'xls'   => array(
                0   => 'D3_MULTILANG_NOT_SUCC',
                1   => 'D3_MULTILANG_SUCC_XLS',
            ),
            'oxid'   => array(
                0   => 'D3_MULTILANG_NOT_SUCC',
                1   => 'D3_MULTILANG_SUCC_OXID',
            ),
        );
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function export()
    {
        /** @var d3_translations $oTranslation */
        $oTranslation = oxNew(d3_translations::class);

        $this->_sExportType = Registry::getRequest()->getRequestEscapedParameter('exporttype');

        if ($this->getExportType() == 'csv') {
            $oTranslation->exportCSV();
        } elseif ($this->getExportType() == 'oxid') {
            $oTranslation->exportOxid();
        }
    }

    /**
     * @return string
     */
    public function getExportType()
    {
        return $this->_sExportType;
    }

    /**
     * @throws DBALException
     */
    public function import()
    {
        /** @var d3_translations $oTranslation */
        $oTranslation = oxNew(d3_translations::class);
        $oTranslation->setController($this);

        header("Content-Type: text/html; charset=UTF-8");

        $this->_sImportType = Registry::getRequest()->getRequestEscapedParameter('type');

        try {
            if ($this->getImportType() == 'csv') {
                $this->_sMimeType = $_FILES['file']['type']['csv'];
                $iImport = $oTranslation->importCSV();
                $this->addTplParam('clrTmp', $iImport);
            } elseif ($this->getImportType() == 'oxid') {
                $this->_sMimeType = $_FILES['file']['type']['oxid'];
                $iImport = $oTranslation->importOxid();
                $this->addTplParam('clrTmp', $iImport);
            } elseif ($this->getImportType() == 'installed') {
                $iImport = $oTranslation->importInstalled();
                $this->addTplParam('clrTmp', $iImport);
            }
        } catch (StandardException $e) {
            Registry::getUtilsView()->addErrorToDisplay($e->getMessage());
        }
    }

    /**
     * @return string
     */
    public function getImportType()
    {
        return $this->_sImportType;
    }

    /**
     * @return null|string
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function getMimeType()
    {
        if ($this->_sMimeType && $this->d3getSet()->getValue('blMultilang_OutputMimeType')) {
            return $this->_sMimeType;
        }

        return null;
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws StandardException
     */
    public function clearLangCache()
    {
        /** @var d3clrtmp $oClrTmp */
        $oClrTmp = oxNew(d3clrtmp::class);

        if ($oClrTmp->clearLangCache()) {
            $this->addStatusMessage(Registry::getLang()->translateString('D3_CFG_CLRTMP_SUCCESS'));
        }
    }

    /**
     * @return d3_cfg_mod
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function d3getSet()
    {
        return d3_cfg_mod::get($this->_sModId);
    }
}
