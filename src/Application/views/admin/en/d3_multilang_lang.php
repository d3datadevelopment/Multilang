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

$sLangName  = 'Deutsch';

// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(
    'charset'                                   => 'UTF-8',

    'd3mxmultilang'                             => '<i class=\'fa fa-comments\'></i> Translation Wizzard',
    'd3mxmultilang_settings'                    => 'Settings',
    'd3tbclmultilang_translations'              => 'Translations',
    'd3tbclmultilang_imex'                      => 'Import / Export',

    'D3_MULTILANG_TRANSL'                       => 'Translation Wizzard',
    'D3_MULTILANG_METADATA_TITLE'				=> 'D³ Translation Wizzard',
    'D3_MULTILANG_METADATA_DESC'				=> 'Manage all shop multilang items comfortable in admin panel.',

    'D3_MULTILANG_SEARCH'                       => 'search',
    'D3_MULTILANG_CHOOSELANGFIRST'              => 'Please choose both languages first.',
    'D3_MULTILANG_SEARCHDESC'                   => 'Search in selected languages<br>and in idents:',
    'D3_MULTILANG_SEARCHSTART'                  => 'start search',
    'D3_MULTILANG_SEARCHEMPTYSTART'             => 'search empty items',
    'D3_MULTILANG_SEARCHIDENTICALSTART'         => 'search identical items',
    'D3_MULTILANG_SEARCHALL'                    => 'show all items',
    'D3_MULTILANG_SEARCHFRONTEND'               => 'show frontend items only',
    'D3_MULTILANG_SEARCHBACKEND'                => 'show backend items only',
    'D3_MULTILANG_LANGSELECT'                   => 'language selection',
    'D3_MULTILANG_SELECTLANGUAGE'               => 'choose language',
    'D3_MULTILANG_NEWITEM'                      => 'new items',
    'D3_MULTILANG_SAVE'                         => 'save',
    'D3_MULTILANG_EXPORT'                       => 'export',
    'D3_MULTILANG_FILETYPECSV'                  => 'CSV file',
    'D3_MULTILANG_FILETYPEOXID'                 => 'Oxid eShop Format',
    'D3_MULTILANG_FILETYPEINSTALLED'            => 'installed language item files',
    'D3_MULTILANG_STARTEXPORT'                  => 'start export',
    'D3_MULTILANG_IMPORT'                       => 'import',
    'D3_MULTILANG_IMPORTSTARTCSV'               => 'import CSV file',
    'D3_MULTILANG_IMPORTSTARTOXID'              => 'import Oxid file',
    'D3_MULTILANG_IMPORTSTARTINSTALLED'         => 'import installed language item files',
    'D3_MULTILANG_IMPORTOXIDLANG'               => 'insert in language',
    'D3_MULTILANG_IMPORTOVERWRITE'              => 'overwrite existing items',
    'D3_MULTILANG_SETORIGINAL'                  => 'imported items are originals',
    'D3_MULTILANG_IGNOREMIME'                   => 'ignore file format',
    'D3_MULTILANG_IGNOREMIME_DESC'              => 'To avoid import errors, the format of the import file is checked. In some cases, the format may fit, but it can not be verified. Then make sure that your import file is suitable and activate this option.',
    'D3_MULTILANG_ISADMIN'                      => 'imported items are admin panel translations',
    'D3_MULTILANG_SUCC_CSV'                     => '%d items from CSV file imported. Please clear the TMP folder.',
    'D3_MULTILANG_ERR_CSV_MIME'                 => '%d items from CSV file imported. Can\'t check file format.',
    'D3_MULTILANG_SUCC_OXID'                    => '%d items from OXID file imported. Please clear the TMP folder.',
    'D3_MULTILANG_ERR_OXID_MIME'                => '%d items from OXID file imported. Can\'t check file format.',
    'D3_MULTILANG_SUCC_INSTALLED'               => '%d items from installed language files imported. Please clear the TMP folder.',
    'D3_MULTILANG_NOT_SUCC'                     => 'Wrong file format, import canceled. Please check the file.',
    'D3_MULTILANG_SUCCEXP'                      => 'exported to: %s',
    'D3_MULTILANG_DEMOEXP'                      => 'In the demo mode of the module, the export is unfortunately not available.',
    'D3_MULTILANG_MODCFG_SAVEMISS'              => 'missing language items were created automatically',
    'D3_MULTILANG_MODCFG_TRIMWHITESPACES'       => 'remove whitespaces at the beginning and the end of translated text',
    'D3_MULTILANG_MODCFG_MIME'                  => 'Import: display found filetype (debug)',
    'D3_MULTILANG_MODCFG_SEPARATOR'             => 'CSV field separator',
    'D3_MULTILANG_MODCFG_ENCLOSER'              => 'text enclosure',
    'D3_MULTILANG_SETTINGS'                     => 'base settings',
    'D3_MULTILANG_CLEARLANGCACHE'               => "To activate your new language items it's required, to clear the language cache in TMP folder. Do you want do this now?",
    'D3_MULTILANG_NEWFIELDERROR'                => "The marked items can't inserted, because the ident still exists.",
    'D3_MULTILANG_SUCC_COUNT'                   => ' items - ',

    'D3_MULTILANG_XLS_CREATOR'                  => 'D³ Translation Wizzard Module for Oxid eShop',
    'D3_MULTILANG_XLS_TITLE'                    => 'translations',
    'D3_MULTILANG_XLS_LOCALEERR'                => 'Unable to set language setting "%s" - setting is "en_us"',
    'D3_MULTILANG_XLS_LANG'                     => 'language',

    'D3_MULTILANG_CLEARTMP_IMPORT'              => '<img src="../modules/d3/modcfg/public/d3logo.php" alt="D³" title="D³ Data Development"> <b>Translation Wizzard</b>: import text items first',

    'D3_MULTILANG_INSTALL_EXECIMPORT'           => 'Before using the module, it is necessary to import the used test items. Have this done automatically in the installation process or start the import before activating the module in the admin area of your shop.',
    'D3_MULTILANG_INSTALL_IMPORTSUCC'           => '%i text items imported from existing files',
    'D3_MULTILANG_INSTALL_NOCSCOLLATION'        => 'The database does not provide a case-sensitive collation for the %1$s field of the %2$s table. Please provide a suitable collation and adjust the database field accordingly. Until then, you can not use identically named identifiers with different capitalization.',

    'D3_MULTILANG_EXC_NOIMPORTFILE'             => 'No import file was loaded.'
);