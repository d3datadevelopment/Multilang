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

use D3\ModCfg\Application\Controller\Admin\Maintenance\d3cleartmp;
use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;
use D3\Multilang\Setup\Events;
use OxidEsales\Eshop\Application\Controller\Admin\SystemRequirementsMain;
use OxidEsales\Eshop\Core\Language;

$sMetadataVersion = '2.0';
$sLogo = '<img src="https://logos.oxidmodule.com/d3logo.svg" alt="(D3)" style="height:1em;width:1em"> ';

/**
 * Module information
 */
$aModule = [
    'id'          => 'd3_multilang',
    'title'       => [
        'de'    => $sLogo . '&Uuml;bersetzungsassistent',
        'en'    => $sLogo . 'Translation Wizzard'
    ],
    'description' => [
        'de' => 'Verwalten Sie die Textbausteine des Shop bequem im Adminbereich',
        'en' => '',
    ],
    'thumbnail'   => 'picture.png',
    'version'     => '4.1.0.1',
    'author'      => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com/',
    'extend'      => [
        Language::class     => D3\Multilang\Modules\Core\d3_oxlang_multilang::class,
        d3cleartmp::class   => D3\Multilang\Modules\Application\Controller\Admin\d3cleartmp_multilang::class,
        d3clrtmp::class     => D3\Multilang\Modules\Application\Model\Maintenance\d3clrtmp_multilang::class,
        SystemRequirementsMain::class    => D3\Multilang\Modules\Application\Controller\Admin\d3_sysreq_main_multilang::class,
    ],
    'controllers'       => [
        'd3_cfg_multilang'         => D3\Multilang\Application\Controller\Admin\d3_cfg_multilang::class,
        'd3_cfg_multilang_imex'    => D3\Multilang\Application\Controller\Admin\d3_cfg_multilang_imex::class,
        'd3_cfg_multilang_licence' => D3\Multilang\Application\Controller\Admin\d3_cfg_multilang_licence::class,
        'd3_cfg_multilang_list'    => D3\Multilang\Application\Controller\Admin\d3_cfg_multilang_list::class,
        'd3_cfg_multilang_main'    => D3\Multilang\Application\Controller\Admin\d3_cfg_multilang_main::class,
    ],
    'templates'   => [
        'd3_cfg_multilang_imex.tpl' => 'd3/multilang/Application/views/admin/tpl/d3_cfg_multilang_imex.tpl',
        'd3_cfg_multilang_main.tpl' => 'd3/multilang/Application/views/admin/tpl/d3_cfg_multilang_main.tpl',
        'd3_oxid_lang_file_pattern.tpl' => 'd3/multilang/Application/views/admin/tpl/modcfg-pattern/oxid_lang_file.tpl',
    ],
    'events'      => [
        'onActivate'    => Events::class.'::onActivate',
        'onDeactivate'  => Events::class.'::onDeactivate',
    ],
    'settings'    => [],
    'blocks'      => [
        [
            'template' => 'd3cleartmp.tpl',
            'block'    => 'd3cleartmp_additional',
            'file'     => 'Application/views/admin/blocks/d3cleartmp_multilang.tpl',
        ],
        [
            'template' => 'd3cleartmp.tpl',
            'block'    => 'd3cleartmp_js_singleitems',
            'file'     => 'Application/views/admin/blocks/d3cleartmp_multilang_js.tpl',
        ],
    ]
];
