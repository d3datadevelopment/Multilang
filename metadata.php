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
use D3\Multilang\Modules\Core\d3_oxlang_multilang;
use D3\Multilang\Modules\Application\Controller\Admin\d3cleartmp_multilang;
use D3\Multilang\Modules\Application\Model\Maintenance\d3clrtmp_multilang;
use D3\Multilang\Modules\Application\Controller\Admin\d3_sysreq_main_multilang;
use D3\Multilang\Application\Controller\Admin\d3_cfg_multilang;
use D3\Multilang\Application\Controller\Admin\d3_cfg_multilang_imex;
use D3\Multilang\Application\Controller\Admin\d3_cfg_multilang_licence;
use D3\Multilang\Application\Controller\Admin\d3_cfg_multilang_list;
use D3\Multilang\Application\Controller\Admin\d3_cfg_multilang_main;
use D3\ModCfg\Application\Controller\Admin\Maintenance\d3cleartmp;
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use D3\Multilang\Application\Model\Constants;
use D3\Multilang\Setup\Events;
use OxidEsales\Eshop\Application\Controller\Admin\SystemRequirementsMain;
use OxidEsales\Eshop\Core\Language;

$sMetadataVersion = '2.1';
$sLogo = '<img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> ';

/**
 * Module information
 */
$aModule = [
    'id'            => 'd3_multilang',
    'title'         => [
        'de'            => $sLogo . '&Uuml;bersetzungsassistent',
        'en'            => $sLogo . 'Translation Wizzard',
    ],
    'description'   => [
        'de'            => 'Verwalten Sie die Textbausteine des Shop bequem im Adminbereich',
        'en'            => '',
    ],
    'thumbnail'     => 'picture.svg',
    'version'       => '5.1.0.0',
    'author'        => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'         => 'support@shopmodule.com',
    'url'           => 'http://www.oxidmodule.com/',
    'extend'        => [
        Language::class                 => d3_oxlang_multilang::class,
        d3cleartmp::class               => d3cleartmp_multilang::class,
        d3clrtmp::class                 => d3clrtmp_multilang::class,
        SystemRequirementsMain::class   => d3_sysreq_main_multilang::class,
    ],
    'controllers'   => [
        'd3_cfg_multilang'              => d3_cfg_multilang::class,
        'd3_cfg_multilang_imex'         => d3_cfg_multilang_imex::class,
        'd3_cfg_multilang_licence'      => d3_cfg_multilang_licence::class,
        'd3_cfg_multilang_list'         => d3_cfg_multilang_list::class,
        'd3_cfg_multilang_main'         => d3_cfg_multilang_main::class,
    ],
    'templates'     => [
        '@' . Constants::OXID_MODULE_ID . '/admin/d3_cfg_multilang_imex.tpl' => 'views/smarty/admin/d3_cfg_multilang_imex.tpl',
        '@' . Constants::OXID_MODULE_ID . '/admin/d3_cfg_multilang_main.tpl' => 'views/smarty/admin/d3_cfg_multilang_main.tpl',
        '@' . Constants::OXID_MODULE_ID . '/admin/modcfg-pattern/oxid_lang_file.tpl' => 'views/smarty/admin/modcfg-pattern/oxid_lang_file.tpl',
    ],
    'events'        => [
        'onActivate'    => Events::class.'::onActivate',
        'onDeactivate'  => Events::class.'::onDeactivate',
    ],
    'settings'      => [],
    'blocks'        => [
        [
            'template'  => 'd3cleartmp.tpl',
            'block'     => 'd3cleartmp_additional',
            'file'      => 'views/smarty/blocks/d3cleartmp_multilang.tpl',
        ],
        [
            'template'  => 'd3cleartmp.tpl',
            'block'     => 'd3cleartmp_js_singleitems',
            'file'      => 'views/smarty/blocks/d3cleartmp_multilang_js.tpl',
        ],
    ],
];
