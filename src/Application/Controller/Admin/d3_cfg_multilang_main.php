<?php

namespace D3\Multilang\Application\Controller\Admin;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_main;
use D3\ModCfg\Application\Model\d3pagenavigation;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use D3\Multilang\Application\Model\d3_translations;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\UtilsView;
use stdClass;

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

class d3_cfg_multilang_main extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3_cfg_multilang_main.tpl';
    protected $_iListSize = 0;
    protected $_iCurrListPos = 0;
    /** @var d3pagenavigation $_oPageNavigation */
    protected $_oPageNavigation;
    protected $_sModId = 'd3_multilang';
    public $iAdminListSize = 20;
    public $sSearchText;
    public $sSearchType;
    public $sItemType;
    public $iLangsel_left;
    public $iLangsel_right;
    public $aLangSel = array();
    protected $_sMenuItemTitle = 'd3mxmultilang';
    protected $_sMenuSubItemTitle = 'd3tbclmultilang_translations';

    /**
     * @return string
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     */
    public function render()
    {
        $sRet = parent::render();

        $this->addTplParam('readonly', !$this->d3getSet()->isActive());

        DatabaseProvider::getDb()->Execute("SET NAMES 'utf8'");

        /** @var d3_translations $oTranslation */
        $oTranslation = oxNew(d3_translations::class);
        $this->iAdminListSize = 20;
        $iLangOk = 0;

        $this->sSearchText = Registry::getRequest()->getRequestEscapedParameter('sSearchText');
        $this->sSearchType = Registry::getRequest()->getRequestEscapedParameter('sSearchType');
        $this->sItemType   = Registry::getRequest()->getRequestEscapedParameter('itemtype');
        $this->addTplParam('sItemtype', $this->sItemType);

        if ($this->sSearchText) {
            $this->addTplParam('sSearchText', $this->sSearchText);
            $this->addTplParam('sSearchType', $this->sSearchType);
            $this->addTplParam('whereparam', "&amp;sSearchText=" . $this->sSearchText);
        }

        if (Registry::getSession()->getVariable('langsel_left') !== false
            && Registry::getSession()->getVariable('langsel_left') != ''
        ) {
            $this->iLangsel_left = Registry::getSession()->getVariable('langsel_left');
            $this->addTplParam('langsel_left', $this->iLangsel_left);
            $iLangOk++;
        } elseif ($this->iLangsel_left !== false && $this->iLangsel_left != '') {
            $this->addTplParam('langsel_left', $this->iLangsel_left);
            $iLangOk++;
        } else {
            $this->addTplParam('langsel_left', 'none');
        }

        if (Registry::getSession()->getVariable('langsel_right') !== false
            && Registry::getSession()->getVariable('langsel_right') != ''
        ) {
            $this->iLangsel_right = Registry::getSession()->getVariable('langsel_right');
            $this->addTplParam('langsel_right', $this->iLangsel_right);
            $iLangOk++;
        } elseif ($this->iLangsel_right !== false && $this->iLangsel_right != '') {
            $this->addTplParam('langsel_right', $this->iLangsel_right);
            $iLangOk++;
        } else {
            $this->addTplParam('langsel_right', 'none');
        }

        // ToDo: Suche mit in Anzahl aufnehmen
        $oTranslation->setSearchFilter(
            $this->iLangsel_left,
            $this->iLangsel_right,
            $this->sSearchText,
            $this->sSearchType,
            $this->sItemType
        );
        $this->_iListSize = $oTranslation->getItemCount();

        /** @var d3pagenavigation _oPageNavigation */
        $this->_oPageNavigation = oxNew(d3pagenavigation::class, $this->_iListSize, $this->iAdminListSize);
        $this->_oPageNavigation->addUrlParam('sSearchText', $this->sSearchText);
        $this->_oPageNavigation->addUrlParam('sSearchType', $this->sSearchType);
        $this->_oPageNavigation->generate();
        $this->_iCurrListPos = $this->_oPageNavigation->getCurrentItem();

        $this->addTplParam('d3pagenavi', $this->_oPageNavigation);
        $this->addTplParam('iPage', $this->_oPageNavigation->getCurrentPage());
        $this->addTplParam('aLanguages', Registry::getLang()->getlanguageArray());

        if ($iLangOk == 2) {
            $aTranslList = $oTranslation->getTranslationArray(
                false,
                true,
                true,
                $this->_iCurrListPos - 1,
                $this->iAdminListSize
            );

            $aTranslations = array();

            if (is_array($aTranslList[$this->iLangsel_left]) && count($aTranslList[$this->iLangsel_left])) {
                foreach ($aTranslList[$this->iLangsel_left] as $sIdent => $sTranslation) {
                    $oTranslation = new stdClass;
                    $oTranslation->key = $aTranslList['OXID'][$sIdent];
                    $oTranslation->left = htmlentities($sTranslation, ENT_COMPAT, 'UTF-8');
                    $oTranslation->right = htmlentities($aTranslList[$this->iLangsel_right][$sIdent], ENT_COMPAT, 'UTF-8');
                    $oTranslation->original_left = $aTranslList['orig_'.$this->iLangsel_left][$sIdent];
                    $oTranslation->original_right = $aTranslList['orig_'.$this->iLangsel_right][$sIdent];
                    $aTranslations[$sIdent] = $oTranslation;
                }
            }

            $this->addTplParam('aTranslations', $aTranslations);
        }

        $this->addTplParam('listsize', $this->_iListSize);

        return $sRet;
    }

    public function languageselect()
    {
        $this->aLangSel = Registry::getRequest()->getRequestEscapedParameter('langsel');

        if ($this->aLangSel['left'] !== false && $this->aLangSel['left'] != '') {
            Registry::getSession()->setVariable('langsel_left', $this->aLangSel['left']);
        }

        if ($this->aLangSel['right'] !== false && $this->aLangSel['right'] != '') {
            Registry::getSession()->setVariable('langsel_right', $this->aLangSel['right']);
        }
    }

    public function save()
    {
        $this->addTplParam('msg', 'success');

        /** @var d3_translations $oTranslation */
        $oTranslation = oxNew(d3_translations::class);
        $oTranslation->saveItemList();
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function clearLangCache()
    {
        /** @var d3clrtmp $oClrTmp */
        $oClrTmp = oxNew(d3clrtmp::class);

        if ($oClrTmp->clearLangCache()) {
            Registry::get(UtilsView::class)->addErrorToDisplay('D3_CFG_CLRTMP_SUCCESS');
        }
    }

    /**
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function deleteentry()
    {
        /** @var d3_translations $oTranslation */
        $oTranslation = oxNew(d3_translations::class);
        $sIdent = Registry::getRequest()->getRequestEscapedParameter('deloxid');
        $oTranslation->delete($sIdent);
    }
}
