<?php

namespace D3\Multilang\Application\Controller\Admin;

use D3\ModCfg\Application\Controller\Admin\d3_cfg_mod_licence;
use D3\ModCfg\Application\Model\Log\d3log;

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

class d3_cfg_multilang_licence extends d3_cfg_mod_licence
{
    protected $_sModId = 'd3_multilang';

    protected $_hasNewsletterForm = false;

    protected $_sLogType = d3log::ERROR;

    protected $_sMenuItemTitle = 'd3mxmultilang';
    protected $_sMenuSubItemTitle = 'd3tbcllib_support';
}
