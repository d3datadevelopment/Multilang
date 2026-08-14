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
use D3\ModCfg\Application\Model\Exception\d3ParameterNotFoundException;
use D3\ModCfg\Application\Model\Install\d3install_updatebase;
use D3\ModCfg\Application\Model\Installwizzard\d3installconfirmmessage;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbcommon;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbfield;
use D3\ModCfg\Application\Model\Installwizzard\d3installdbindizes;
use D3\Multilang\Application\Model\d3_translations;
use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\Exception;
use OxidEsales\Eshop\Application\Model\Shop;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Exception\ConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class d3multilang_update extends d3install_updatebase
{
    public $sModKey = 'd3_multilang';

    public $sModName = 'Übersetzungsassistent';

    public $sModVersion = '5.1.0.1';

    public $sBaseConf = 'P8hv2==alIxTnR4azNXRERMaS9ocURXejhIMllYbFVJdUszUnJscWNrWmxYRTI5Sm54akI4TldhSVZnO
Fd0NEZjcnY2QkVkSGVEVnA4UEpJWGtEdHZFTUg2ZXJqTG9hT3Z6Z1NxK3BaZnYyUWF3NHJ2aWZyek9lM
2VraitDek1ZdGt2SEpoalhWUXdWNnpoVk8zdFlRNUNuQU9KYlhIZzRCMDd4RFRHam9xRXFBeW5DdjFkS
GFkcFJhODFkcFFBRU9admJvelNkYy9CQ2l0RmIyVUdDNlJ5KzU1WkJQRHp5Q3drQ0t1RjBQYjNzRFVYd
3BxaUJLYjZuNW9hWFNnaGdFaGIzSmIyRkpqYjlqQXZINUdIWDZmMmg2SkJjaGtvNnRKMUJSWXY2eHBTV
3d0Vzd5M0pFZ2I5bUZoclVpaVdKV21MelZ4NzRLM2VHaGJGT0ZpbVRIdnVyck9RPT0=';

    public $sRequirements = '';

    public $sBaseValue = 'TyUzQTglM0ElMjJzdGRDbGFzcyUyMiUzQTclM0ElN0JzJTNBMjglM0ElMjJkM19jZmdfbW9kX19hTGljZW5zZUluZm9NYWlsJTIyJTNCYSUzQTIlM0ElN0JzJTNBNDglM0ElMjJVTktOT1dOQ09ORktFWV9fNDc5MzYzODcwMmI2NzcxNWYxZGZiZmM4MzI0NjY5MTQlMjIlM0JzJTNBMTklM0ElMjIyMDEzLTEwLTE3JTIwMDklM0EzOSUzQTUyJTIyJTNCcyUzQTQyJTNBJTIyTk9MSUNLRVlfXzQ3OTM2Mzg3MDJiNjc3MTVmMWRmYmZjODMyNDY2OTE0JTIyJTNCcyUzQTE5JTNBJTIyMjAxMy0xMC0xNyUyMDA5JTNBNDElM0EyNyUyMiUzQiU3RHMlM0EzOCUzQSUyMmQzX2NmZ19tb2RfX2JsTXVsdGlsYW5nX091dHB1dE1pbWVUeXBlJTIyJTNCcyUzQTElM0ElMjIwJTIyJTNCcyUzQTMyJTNBJTIyZDNfY2ZnX21vZF9fc011bHRpbGFuZ19TZXBhcmF0b3IlMjIlM0JzJTNBMSUzQSUyMiU3QyUyMiUzQnMlM0E0MCUzQSUyMmQzX2NmZ19tb2RfX2JsTXVsdGlsYW5nX1NhdmVNaXNzaW5nSXRlbXMlMjIlM0JzJTNBMSUzQSUyMjAlMjIlM0JzJTNBMzElM0ElMjJkM19jZmdfbW9kX19zTXVsdGlsYW5nX0VuY2xvc2VyJTIyJTNCcyUzQTElM0ElMjIlMjIlMjIlM0JzJTNBMzklM0ElMjJkM19jZmdfbW9kX19ibE11bHRpbGFuZ190cmltV2hpdGVTcGFjZXMlMjIlM0JzJTNBMSUzQSUyMjAlMjIlM0JzJTNBNDUlM0ElMjJkM19jZmdfbW9kX19ibE11bHRpbGFuZ19hZGRNYXBwZWRUcmFuc2xhdGlvbnMlMjIlM0JzJTNBMSUzQSUyMjAlMjIlM0IlN0Q';

    protected $_aUpdateMethods = [
        ['check' => 'checkModCfgItemExist',
              'do'    => 'updateModCfgItemExist'],
        ['check' => 'checkRenameFields',
              'do'    => 'fixRenameFields'],
        ['check' => 'checkDeleteFields',
              'do'    => 'fixDeleteFields'],
        ['check' => 'checkTranslationTableExist',
              'do'    => 'updateTranslationTableExist'],
        ['check' => 'checkOxidField',
              'do'    => 'fixOxidField'],
        ['check' => 'checkFields',
              'do'    => 'fixFields'],
        ['check' => 'checkIdentCollation',
              'do'    => 'fixIdentCollation'],
        ['check' => 'checkIndizes',
              'do'    => 'fixIndizes'],
        ['check' => 'checkFieldsCollation',
              'do'    => 'fixFieldsCollation'],
        ['check' => 'checkMultiLangDbItemsNotExist',
              'do'    => 'importMultiLangItems'],
        ['check' => 'checkModCfgSameRevision',
              'do'    => 'updateModCfgSameRevision'],
    ];

    public $aFields = [
        'OXID'        => [
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXID',
            'sType'       => 'CHAR(32)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXIDENT'        => [
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXIDENT',
            'sType'       => 'VARCHAR(100)',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXTEXT'        => [
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXTEXT',
            'sType'       => 'TEXT',
            'blNull'      => false,
            'sDefault'    => false,
            'sComment'    => '',
            'sExtra'      => '',
            'blMultilang' => true,
            'sForceCollation'   => 'utf8_general_ci',
        ],
        'OXORIGINAL'        => [
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXORIGINAL',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '1',
            'sComment'    => 'item is modified',
            'sExtra'      => '',
            'blMultilang' => true,
        ],
        'OXSTRING'        => [
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXSTRING',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '1',
            'sComment'    => 'item ist string or serialized structure',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
        'OXADMIN'        => [
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'OXADMIN',
            'sType'       => 'TINYINT(1)',
            'blNull'      => false,
            'sDefault'    => '0',
            'sComment'    => 'item is used in admin panel',
            'sExtra'      => '',
            'blMultilang' => false,
        ],
    ];

    public $aIndizes = [
        'OXID' => [
            'sTableName' => 'd3_translations',
            'sType'      => d3database::INDEX_TYPE_PRIMARY,
            'aFields'    => [
                'OXID'   => 'OXID',
            ],
        ],
        'ADMINIDENT' => [
            'sTableName' => 'd3_translations',
            'sType'      => d3database::INDEX_TYPE_UNIQUE,
            'sName'      => 'ADMINIDENT',
            'aFields'    => [
                'OXIDENT'   => 'OXIDENT',
                'OXADMIN'   => 'OXADMIN',
            ],
        ],
    ];

    public $aRenameFields = [
        'OXTEXT_0'        => [
           'sTableName'  => 'd3_translations',
           'mOldFieldNames' => ['oxtext', 'oxtext_0'], // is case sensitive
           'sFieldName'  => 'OXTEXT',
           'blMultilang' => false,
        ],
        'OXTEXT'        => [
           'sTableName'  => 'd3_translations',
           'mOldFieldNames' => ['oxtext'], // is case sensitive
           'sFieldName'  => 'OXTEXT',
           'blMultilang' => true,
        ],
        'OXORIGINAL'        => [
           'sTableName'  => 'd3_translations',
           'mOldFieldNames' => ['oxoriginal'], // is case sensitive
           'sFieldName'  => 'OXORIGINAL',
           'blMultilang' => false,
        ],
    ];

    public $aDeleteFields = [
        'OXISSET'        => [
            'sTableName'  => 'd3_translations',
            'sFieldName'  => 'oxisset',
            'blMultilang' => false,
        ],
    ];

    protected $_aRefreshMetaModuleIds = ['d3_multilang'];

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function checkTranslationTableExist(): bool
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
    public function updateTranslationTableExist(): bool
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
    public function checkOxidField(): bool
    {
        $dbField = oxNew(d3installdbfield::class, $this);
        return $dbField->checkTableFieldNotExist('d3_translations', 'OXIDENT');
    }

    /**
     * @return bool
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixOxidField(): bool
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
            $dbField->addTableField2($tableName, 'OXID', 'CHAR(32)', '', false);

            $queries = [
                sprintf("UPDATE %s SET OXID = MD5(CONCAT(OXIDENT, '-', OXADMIN)) WHERE 1;", $tableName),
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
     * @throws DatabaseConnectionException
     * @throws d3ParameterNotFoundException
     */
    public function checkIdentCollation(): bool
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
    public function fixIdentCollation(): bool
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
        usort($aAvailableCollations, fn($a, $b): int => $this->sortCollations($a, $b));
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
            return $oDbCommon->tableSqlExecute($sSelect, $this->aFields[$sFieldIdent]['sTableName'], false);
        }

        $sMessage = sprintf(
            Registry::getLang()->translateString('D3_MULTILANG_INSTALL_NOCSCOLLATION'),
            $this->aFields[$sFieldIdent]['sFieldName'],
            $this->aFields[$sFieldIdent]['sTableName']
        );
        $oMessage = oxNew(d3installconfirmmessage::class, $this);

        return $oMessage->confirmCustomMessage($sMessage);
    }

    /**
     * @param array $a
     * @param array $b
     *
     * @return int
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function sortCollations(array $a, array $b): int
    {
        $oDatabase = $this->_getDatabaseHandler();
        $sBaseCharset = $oDatabase->getBaseCharset();
        if ($a['Charset'] == $sBaseCharset && $b['Charset'] != $sBaseCharset) {
            return -1;
        }

        if ($a['Charset'] != $sBaseCharset && $b['Charset'] == $sBaseCharset) {
            return 1;
        }

        if (strstr($a['Collation'], '_general_cs') && !strstr($b['Collation'], '_general_cs')) {
            return -1;
        }

        if (strstr($a['Collation'], '_general_cs')) {
            return 0;
        }

        if (!strstr($b['Collation'], '_general_cs')) {
            return 0;
        }

        return 1;
    }

    /**
     * @return string
     * @throws DatabaseConnectionException
     * @throws d3ParameterNotFoundException
     */
    protected function _getIdentCollation(): string
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

    public function checkIndexRefreshMsg(): bool
    {
        return (bool) Registry::getSession()->getVariable('checkIndexRefreshMsg');
    }

    public function fixIndexRefreshMsg(): bool
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
    public function checkContentNoArtItemExist(): bool
    {
        $blRet = false;
        foreach ($this->getShopList() as $oShop) {
            /** @var Shop $oShop */
            $aWhere = [
                'oxloadid' => 'd3extsearch_noarticlefound',
                'oxshopid' => $oShop->getId(),
            ];

            $blRet = $this->_checkTableItemNotExist('oxcontents', $aWhere);

            if ($blRet) {
                return $blRet;
            }
        }

        return $blRet;
    }

    /**
     * @return bool true, if update is required
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function checkMultiLangDbItemsNotExist(): bool
    {
        $blRet = false;

        $qb = ContainerFactory::getInstance()->getContainer()->get(QueryBuilderFactoryInterface::class)->create();
        $qb->select("count('oxid')")
            ->from('d3_translations');

        if ((int) $qb->execute()->fetchOne() === 0) {
            return true;
        }

        return $blRet;
    }

    /**
     * @return bool
     * @throws ContainerExceptionInterface
     * @throws DBALException
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws NotFoundExceptionInterface
     * @throws Exception
     */
    public function importMultiLangItems(): bool
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
}
