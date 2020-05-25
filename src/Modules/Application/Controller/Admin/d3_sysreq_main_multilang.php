<?php

namespace D3\Multilang\Modules\Application\Controller\Admin;

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

class d3_sysreq_main_multilang extends d3_sysreq_main_multilang_parent
{
    public function render()
    {
        $sRet = parent::render();

        $aCollations = $this->_aViewData['aCollations'];
        unset($aCollations['d3_translations']);
        $this->_aViewData['aCollations'] = $aCollations;

        return $sRet;
    }
}