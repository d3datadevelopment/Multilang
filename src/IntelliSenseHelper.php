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

namespace D3\Multilang\Modules\Application\Controller\Admin
{
    class d3_navigation_multilang_parent extends \OxidEsales\Eshop\Application\Controller\Admin\NavigationController {}

    class d3_sysreq_main_multilang_parent extends \OxidEsales\Eshop\Application\Controller\Admin\SystemRequirementsMain {}

    class d3cleartmp_multilang_parent extends \D3\ModCfg\Application\Controller\Admin\Maintenance\d3ClearTmp {}
}

namespace D3\Multilang\Modules\Application\Model\Maintenance
{
    class d3clrtmp_multilang_parent extends \D3\ModCfg\Application\Model\Maintenance\d3clrtmp {}
}

namespace D3\Multilang\Modules\Core
{
    class d3_oxlang_multilang_parent extends \OxidEsales\Eshop\Core\Language {}

    class d3_oxsysrequirements_multilang_parent extends \OxidEsales\Eshop\Core\SystemRequirements {}
}