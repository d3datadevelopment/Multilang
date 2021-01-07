<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\Multilang\Setup;

use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\Exception\d3_cfg_mod_exception;
use D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;
use D3\ModCfg\Application\Model\Exception\d3ShopCompatibilityAdapterException;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\Installwizzard\d3installconfirmmessage;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbcommon;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbfield;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbindizes;
use D3\Multilang\Application\Model\d3_translations;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Application\Model\Shop;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\StandardException;
use OxidEsales\Eshop\Core\Registry;
use ReflectionException;

class d3multilang_update extends d3install_updatebase
{
    public $sModKey = 'd3_multilang';
    public $sModName = 'Übersetzungsassistent';
    public $sModVersion = '4.1.0.2';
    public $sModRevision = '4102';
    public $sBaseConf = 'IM6v2==T2ZQRXcyWDk4ZjE2MUxWL2J5NFVOZG14dlloREM3b2RNMHVlZHFwZXVydVZqWWR2OGdnVVNuY
UZNeWtNQ1QwV3VNeUYrZmxXanRnZG9CSkJUL0J4aGtsNFhFYXdLWlg5NUx4dkZ5QUo3R1N0bXFwUk40N
XFTZUdadmd5L3V6S0FWZ2R6SytVa2FCdUZPUjZNSzBtcTRWSEVnaWRkYk1aR3ArZkczWTZZWDRQYVV2U
VpWbngvbVBiN3FQVit4dFVvaTR0a2IwVFJKcXJveWhEUXFuMlpWUE5CYlZKZmhIcUd3bVU0WGVyNTRqV
EFGeDhoaG5SdWNmbDdGWjRPV3RMWDQ3WExiQWpXNmI2WHZvS0hpUk0zVTBGM2xHMDd2VitqMzZ6K29qQ
kVnQWZRK0JqY2djcFlRUXk4Mnp0emQyaVRJNk5Gei8zdk1hT2UxNFIvbHh5UHZnPT0=';
    public $sRequirements = '';
    public $sBaseValue = 'TyUzQTglM0ElMjJzdGRDbGFzcyUyMiUzQTclM0ElN0JzJTNBMjglM0ElMjJkM19jZmdfbW9kX19hTGljZW5zZUluZm9NYWlsJTIyJTNCYSUzQTIlM0ElN0JzJTNBNDglM0ElMjJVTktOT1dOQ09ORktFWV9fNDc5MzYzODcwMmI2NzcxNWYxZGZiZmM4MzI0NjY5MTQlMjIlM0JzJTNBMTklM0ElMjIyMDEzLTEwLTE3JTIwMDklM0EzOSUzQTUyJTIyJTNCcyUzQTQyJTNBJTIyTk9MSUNLRVlfXzQ3OTM2Mzg3MDJiNjc3MTVmMWRmYmZjODMyNDY2OTE0JTIyJTNCcyUzQTE5JTNBJTIyMjAxMy0xMC0xNyUyMDA5JTNBNDElM0EyNyUyMiUzQiU3RHMlM0EzOCUzQSUyMmQzX2NmZ19tb2RfX2JsTXVsdGlsYW5nX091dHB1dE1pbWVUeXBlJTIyJTNCcyUzQTElM0ElMjIwJTIyJTNCcyUzQTMyJTNBJTIyZDNfY2ZnX21vZF9fc011bHRpbGFuZ19TZXBhcmF0b3IlMjIlM0JzJTNBMSUzQSUyMiU3QyUyMiUzQnMlM0E0MCUzQSUyMmQzX2NmZ19tb2RfX2JsTXVsdGlsYW5nX1NhdmVNaXNzaW5nSXRlbXMlMjIlM0JzJTNBMSUzQSUyMjAlMjIlM0JzJTNBMzElM0ElMjJkM19jZmdfbW9kX19zTXVsdGlsYW5nX0VuY2xvc2VyJTIyJTNCcyUzQTElM0ElMjIlMjIlMjIlM0JzJTNBMzklM0ElMjJkM19jZmdfbW9kX19ibE11bHRpbGFuZ190cmltV2hpdGVTcGFjZXMlMjIlM0JzJTNBMSUzQSUyMjAlMjIlM0JzJTNBNDUlM0ElMjJkM19jZmdfbW9kX19ibE11bHRpbGFuZ19hZGRNYXBwZWRUcmFuc2xhdGlvbnMlMjIlM0JzJTNBMSUzQSUyMjAlMjIlM0IlN0Q';

    protected $_aUpdateMethods = array(
        array('check' => 'checkModCfgItemExist',
              'do'    => 'updateModCfgItemExist'),
        array('check' => 'checkRenameFields',
              'do'    => 'fixRenameFields'),
        array('check' => 'checkDeleteFields',
              'do'    => 'fixDeleteFields'),
        array('check' => 'checkTranslationTableExist',
              'do'    => 'updateTranslationTableExist'),
        array('check' => 'checkOxidField',
              'do'    => 'fixOxidField'),
        array('check' => 'checkFields',
              'do'    => 'fixFields'),
        array('check' => 'checkIdentCollation',
              'do'    => 'fixIdentCollation'),
        array('check' => 'checkIndizes',
              'do'    => 'fixIndizes'),
        array('check' => 'checkFieldsCollation',
              'do'    => 'fixFieldsCollation'),
        array('check' => 'checkMultiLangDbItemsNotExist',
              'do'    => 'importMultiLangItems'),
        array('check' => 'hasUnregisteredFiles',
              'do'    => 'showUnregisteredFiles'),
        array('check' => 'checkModCfgSameRevision',
              'do'    => 'updateModCfgSameRevision'),
    );

    public $aFields = array(
        'OXID'        => array(
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXIDENT'        => array(
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXIDENT',
            'sType'       => 'VARCHAR(100)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXTEXT'        => array(
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXTEXT',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => true,
            'sForceCollation'   => 'utf8_general_ci'
        ),
        'OXORIGINAL'        => array(
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXORIGINAL',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '1',
            'sComment'    => 'item is modified',
            'sExtra'      => '',
            'blMultilang' => true,
        ),
        'OXSTRING'        => array(
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXSTRING',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '1',
            'sComment'    => 'item ist string or serialized structure',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
        'OXADMIN'        => array(
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXADMIN',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'item is used in admin panel',
            'sExtra'      => '',
            'blMultilang' => false,
        ),
    );

    public $aIndizes = array(
        'OXID' => array(
            'sTableName' => 'd3_translations',
            'sType'      => d3database::INDEX_TYPE_PRIMARY,
            'aFields'    => array(
                'OXID'   => 'OXID'
            ),
        ),
        'ADMINIDENT' => array(
            'sTableName' => 'd3_translations',
            'sType'      => d3database::INDEX_TYPE_UNIQUE,
            'sName'      => 'ADMINIDENT',
            'aFields'    => array(
                'OXIDENT'   => 'OXIDENT',
                'OXADMIN'   => 'OXADMIN',
            ),
        ),
    );

    public $aRenameFields = array(
        'OXTEXT_0'        => array(
           'sTableName'  => 'd3_translations',
           'mOldFieldNames' => array('oxtext', 'oxtext_0'), // is case sensitive
           'sFieldName'  => 'OXTEXT',
           'blMultilang' => false,
        ),
        'OXTEXT'        => array(
           'sTableName'  => 'd3_translations',
           'mOldFieldNames' => array('oxtext'), // is case sensitive
           'sFieldName'  => 'OXTEXT',
           'blMultilang' => true,
        ),
        'OXORIGINAL'        => array(
           'sTableName'  => 'd3_translations',
           'mOldFieldNames' => array('oxoriginal'), // is case sensitive
           'sFieldName'  => 'OXORIGINAL',
           'blMultilang' => false,
        ),
    );

    public $aDeleteFields = array(
        'OXISSET'        => array(
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'oxisset',
            'blMultilang' => false,
        ),
    );

    protected $_aRefreshMetaModuleIds = array('d3_multilang');

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkTranslationTableExist()
    {
        return $this->_checkTableNotExist('d3_translations');
    }

    /**
     * @return bool
     * @throws ConnectionException
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function updateTranslationTableExist()
    {
        $blRet = false;
        if ($this->checkTranslationTableExist()) {
            $this->setInitialExecMethod(__METHOD__);
            $blRet  = $this->_addTable2('d3_translations', $this->aFields, $this->aIndizes, 'D3 multilang', 'MyISAM');
        }

        return $blRet;
    }

    /**
     * true, if OXIDENT doesn't exist
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkOxidField()
    {
        $dbField = oxNew(d3installdbfield::class, $this);
        return $dbField->checkTableFieldNotExist('d3_translations', 'OXIDENT');
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixOxidField()
    {
        $tableName = oxNew(d3_translations::class)->getCoreTableName();
        $ret = true;

        if ($this->checkOxidField()) {
            $dbIndex = oxNew(d3installdbindizes::class, $this);
            if ($dbIndex->exist($tableName, 'PRIMARY')) {
                $dbIndex->dropTableIndex($tableName, 'PRIMARY');
            }
            if ($dbIndex->exist($tableName, 'ADMINIDENT')) {
                $dbIndex->dropTableIndex($tableName, 'ADMINIDENT');
            }

            $dbField = oxNew(d3installdbfield::class, $this);
            $dbField->fixRenameField2($tableName, 'OXID', 'OXIDENT');
            $dbField->addTableField2($tableName, 'OXID', 'CHAR(32)', '', FALSE);

            $queries = [
                "UPDATE $tableName SET OXID = MD5(CONCAT(OXIDENT, '-', OXADMIN)) WHERE 1;",
            ];

            $dbCommon = oxNew(d3installdbcommon::class, $this);
            $dbCommon->executeMultipleQueries($queries);

            if ($this->hasExecute()) {
                $this->setRequiredViewUpdate('d3_translations');
                d3database::getInstance()->resetFieldCache();
            }
        }

        return $ret;
    }

    /**
     * @return bool
     * @throws DatabaseConnectionException
     * @throws d3ParameterNotFoundException
     */
    public function checkIdentCollation()
    {
        $sFieldCollation = $this->_getIdentCollation();

        $sPattern = '@.*_cs|.*_bin@';
        return false == preg_match($sPattern, $sFieldCollation);
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws d3ParameterNotFoundException
     */
    public function fixIdentCollation()
    {
        $sFieldIdent = 'OXIDENT';
        $sFieldCollation = $this->_getIdentCollation();

        $sGeneralPattern = '@(.*)_ci@';
        preg_match($sGeneralPattern, $sFieldCollation, $aGeneralMatches);

        $sBinPattern = '@(.*)_general_ci@';
        preg_match($sBinPattern, $sFieldCollation, $aBinMatches);

        $oDatabase = $this->_getDatabaseHandler();

        $sAvailableCollationSelect = "SHOW COLLATION WHERE Collation IN(
		    '".$aGeneralMatches[1]."_cs', 'utf8_general_cs', 'latin1_general_cs',
		    '".$aBinMatches[1]."_bin', 'utf8_bin', 'latin1_bin' 
		)";

        $aAvailableCollations = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll($sAvailableCollationSelect);
        usort($aAvailableCollations, array($this, 'sortCollations'));

		if (count($aAvailableCollations)) {
	        $sSelect = 'ALTER TABLE `'.$this->aFields[$sFieldIdent]['sTableName'].'` CHANGE `'.
	            $this->aFields[$sFieldIdent]['sFieldName'].'` `'.$this->aFields[$sFieldIdent]['sFieldName'].'` '.
	            $this->aFields[$sFieldIdent]['sType'].' CHARACTER SET '.$oDatabase->getBaseCharset().
	            ' COLLATE '.$aAvailableCollations[0]['Collation'].' NOT NULL;';

	        $this->setActionLog(
	            'SQL',
	            $sSelect,
	            $this->getInitialExecMethod(__METHOD__)
	        );

	        /** @var d3installdbcommon $oDbCommon */
	        $oDbCommon = oxNew(d3installdbcommon::class, $this);
	        $blRet = $oDbCommon->tableSqlExecute($sSelect, $this->aFields[$sFieldIdent]['sTableName'], false);
        } else {
			/** @var d3installconfirmmessage $oMessage */
			$sMessage = sprintf(
				Registry::getLang()->translateString('D3_MULTILANG_INSTALL_NOCSCOLLATION'),
				$this->aFields[$sFieldIdent]['sFieldName'],
				$this->aFields[$sFieldIdent]['sTableName']
			);
			$oMessage = oxNew(d3installconfirmmessage::class, $this);
			$blRet = $oMessage->confirmCustomMessage($sMessage);
		}

        return $blRet;
    }

    /**
     * @param $a
     * @param $b
     *
     * @return int
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function sortCollations($a, $b)
    {
	    $oDatabase = $this->_getDatabaseHandler();
	    $sBaseCharset = $oDatabase->getBaseCharset();

    	if ($a['Charset'] == $sBaseCharset && $b['Charset'] != $sBaseCharset) {
    		return -1;
	    } elseif ($a['Charset'] != $sBaseCharset && $b['Charset'] == $sBaseCharset) {
    		return 1;
        }

	    if (strstr($a['Collation'], '_general_cs') && !strstr($b['Collation'], '_general_cs')) {
		    return -1;
	    } elseif (!strstr($a['Collation'], '_general_cs') && strstr($b['Collation'], '_general_cs')) {
	    	return 1;
	    }

	    return 0;
    }

    /**
     * @return string
     * @throws DatabaseConnectionException
     * @throws d3ParameterNotFoundException
     */
    protected function _getIdentCollation()
    {
        if ($this->getCacheHandler()->has(__METHOD__)) {
            return $this->getCacheHandler()->get(__METHOD__);
        }

        startProfile(__METHOD__);

        $myConfig = Registry::getConfig();
        $sSelect = 'select c.COLLATION_NAME from INFORMATION_SCHEMA.tables t ' .
            'LEFT JOIN INFORMATION_SCHEMA.columns c ON t.TABLE_NAME = c.TABLE_NAME  ' .
            'where t.TABLE_SCHEMA = "' . $myConfig->getConfigParam('dbName') . '" ' .
            'and t.TABLE_NAME = "d3_translations" ' .
            'and c.TABLE_SCHEMA = "' . $myConfig->getConfigParam('dbName') . '" ' .
            'and c.COLUMN_NAME = "OXIDENT" ' .
            ' LIMIT 1';

        $sCollation = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getOne($sSelect);
        $this->getCacheHandler()->set(__METHOD__, $sCollation);

        stopProfile(__METHOD__);

        return $sCollation;
    }

    /**
     * @return bool
     */
    public function checkIndexRefreshMsg()
    {
        if (Registry::getSession()->getVariable('checkIndexRefreshMsg')) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    public function fixIndexRefreshMsg()
    {
        $blRet = true;

        if (Registry::getSession()->getVariable('checkIndexRefreshMsg')) {
            Registry::getSession()->setVariable('checkIndexRefreshMsg', false);
            $this->_confirmMessage('D3_EXTSEARCH_UPDATE_GENPHONETIC');
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkContentNoArtItemExist()
    {
        $blRet = false;
        foreach ($this->getShopList() as $oShop) {
            /** @var $oShop Shop */
            $aWhere = array(
                'oxloadid' => 'd3extsearch_noarticlefound',
                'oxshopid' => $oShop->getId(),
            );

            $blRet = $this->_checkTableItemNotExist('oxcontents', $aWhere);

            if ($blRet) {
                return $blRet;
            }
        }

        return $blRet;
    }

    /**
     * @return bool true, if update is required
     * @throws DatabaseConnectionException
     */
    public function checkMultiLangDbItemsNotExist()
    {
        $blRet = false;

        // change this to your inividual check criterias
        $sSql  = "SELECT count(`oxid`) ";
        $sSql .= "FROM `d3_translations` WHERE 1;";

        if ($this->getDb()->getOne($sSql) == 0) {
            $blRet = true;
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function importMultiLangItems()
    {
        $this->setInitialExecMethod(__METHOD__);

        if ($this->checkMultiLangDbItemsNotExist()) {
            if ($this->hasExecute()) {
                /** @var d3_translations $oTranslation */
                $oTranslation = oxNew(d3_translations::class);
                $iImport = $oTranslation->importInstalled();
                $this->setActionLog(
                    'MSG',
                    sprintf(Registry::getLang()->translateString('D3_MULTILANG_INSTALL_IMPORTSUCC'), $iImport),
                    $this->getInitialExecMethod(__METHOD__)
                );
            } else {
                $this->setActionLog(
                    'MSG',
                    Registry::getLang()->translateString('D3_MULTILANG_INSTALL_EXECIMPORT'),
                    $this->getInitialExecMethod(__METHOD__)
                );
            }
            $this->setUpdateBreak(true);
        }

        return true;
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     * @throws StandardException
     * @throws ReflectionException
     * @throws d3ParameterNotFoundException
     */
    public function hasUnregisteredFiles()
    {
        return $this->_hasUnregisteredFiles('d3_multilang', array('blocks', 'd3FileRegister'));
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws ReflectionException
     * @throws StandardException
     * @throws d3ShopCompatibilityAdapterException
     * @throws d3_cfg_mod_exception
     */
    public function showUnregisteredFiles()
    {
        return $this->_showUnregisteredFiles('d3_multilang', array('blocks', 'd3FileRegister'));
    }
}
