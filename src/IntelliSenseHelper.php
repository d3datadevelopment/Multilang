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
    use D3\ModCfg\Application\Controller\Admin\Maintenance\d3cleartmp;
    use OxidEsales\Eshop\Application\Controller\Admin\NavigationController;
    use OxidEsales\Eshop\Application\Controller\Admin\SystemRequirementsMain;

    class d3_navigation_multilang_parent extends NavigationController {}

    class d3_sysreq_main_multilang_parent extends SystemRequirementsMain {}

    class d3cleartmp_multilang_parent extends d3cleartmp {}
}

namespace D3\Multilang\Modules\Application\Model\Maintenance
{
    use D3\ModCfg\Application\Model\Maintenance\d3clrtmp;

    class d3clrtmp_multilang_parent extends d3clrtmp {}
}

namespace D3\Multilang\Modules\Core
{
    use OxidEsales\Eshop\Core\Language;
    use OxidEsales\Eshop\Core\SystemRequirements;

    class d3_oxlang_multilang_parent extends Language {}

    class d3_oxsysrequirements_multilang_parent extends SystemRequirements {}
}