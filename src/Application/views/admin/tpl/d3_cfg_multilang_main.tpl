[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
<!--
    function DeleteThis( sID)
    {
        blCheck = confirm("[{oxmultilang ident="GENERAL_YOUWANTTODELETE"}]");
        if( blCheck === true)
        {
            var oTransfer = parent.edit.document.getElementById("transfer");
            oTransfer.deloxid.value=sID;
            oTransfer.fnc.value='deleteentry';
            oTransfer.actedit.value=0;
            oTransfer.submit();
        }
    }

    function popUp(evt,currElem)
    {
        var popUpWin = document.getElementById(currElem);
        var y = parseInt(evt.clientY) - 33 - parseInt((17.5*(popUpWin.innerHTML.split(/<br[ 	\/^>]*>/gi).length-1)));
        var x = parseInt(evt.clientX) - 50;


        if(document.all){
            if ( x > document.body.clientWidth - 150 ){
                x = parseInt(document.body.clientWidth) - 150;
                y = y - 15;
            }
        }
        else{
            if ( x > self.innerWidth - 170 ){
                x = parseInt(self.innerWidth) - 170;
            }
        }

        popUpWin.style.top = Math.max(2,y)+'px';
        popUpWin.style.left= Math.max(2,x)+'px';
        popUpWin.style.visibility = "visible";
        window.status = "";
    }

    function popDown(currElem)
    {
        var popUpWin = document.getElementById(currElem);
        popUpWin.style.visibility ="hidden"
    }


    function _groupExp(el)
    {
        var _cur = el.parentNode;

        if (_cur.className === "exp") _cur.className = "";
        else _cur.className = "exp";
    }

-->
</script>

<style type="text/css">
<!--
    .ext_edittext {
        padding: 2px;
    }

    fieldset{
        border: 1px inset black;
        background-color: #F0F0F0;
    }

    legend{
        font-weight: bold;
    }

    dl dt{
        font-weight: normal;
        width: 55%;
    }

    .itemlist td {
        padding: 0 5px;
    }
-->
</style>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="deloxid" value="">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="actedit" value="">
    <input type="hidden" name="page" value="[{$iPage}]">
    <input type="hidden" name="sSearchText" value="[{$sSearchText}]">
    <input type="hidden" name="sSearchType" value="[{$sSearchType}]">
</form>

<table border="0" width="98%">

    [{if $langsel_right != 'none' && $langsel_left != 'none'}]
        [{* Suche *}]
        <tr>
            <td valign="top" class="edittext">

                [{block name="d3_cfg_multilang_main__searchform"}]
                    <form name="searchform" id="searchform" action="[{$oViewConf->getSelfLink()}]" method="post">
                        [{$oViewConf->getHiddenSid()}]
                        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                        <input type="hidden" name="fnc" value="languageselect">
                        <input type="hidden" name="oxid" value="[{$oxid}]">
                        <input type="hidden" name="lstrt" value="[{$lstrt}]">
                        <input type="hidden" name="sSearchType" id="sSearchType" value="default">
                        <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">
                        <fieldset>
                            <legend>[{oxmultilang ident="D3_MULTILANG_SEARCH"}]</legend>
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    [{block name="d3_cfg_multilang_main__searchformelements"}]
                                        <td class="edittext ext_edittext" style="width: 200px;">
                                            <label for="sSearchText">[{oxmultilang ident="D3_MULTILANG_SEARCHDESC"}]</label>
                                        </td>
                                        <td class="edittext ext_edittext" align="left" colspan="2">
                                            <input id="sSearchText" type="text" size="50" name="sSearchText" value="[{$sSearchText}]" class="edittext" style="margin-right: 5px; width: 250px; float: left;" [{$readonly}]>
                                            <span class="d3modcfg_btn icon d3color-blue">
                                                <button type="submit" name="save" [{$readonly}]>
                                                    <i class="fa fa-search"></i>
                                                    [{oxmultilang ident="D3_MULTILANG_SEARCHSTART"}]
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="groupExp">
                                                <div class="">
                                                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                                                        <span style="font-weight: bold;">
                                                            [{oxmultilang ident="D3_MULTILANG_SEARCH_FURTHER"}]
                                                        </span>
                                                    </a>
                                                    <dl>
                                                        <dt style="width: 1px;">
                                                        </dt>
                                                        <dd>
                                                            <span class="d3modcfg_btn icon d3color-blue" style="float: left; margin-right: 5px;">
                                                                <button type="submit" name="save" [{$readonly}] onclick="document.getElementById('sSearchType').value = 'emptyitems';">
                                                                    <i class="fa fa-search"></i>
                                                                    [{oxmultilang ident="D3_MULTILANG_SEARCHEMPTYSTART"}]
                                                                </button>
                                                            </span>

                                                            <span class="d3modcfg_btn icon d3color-blue" style="float: left; margin-right: 5px;">
                                                                <button type="submit" name="save" [{$readonly}] onclick="document.getElementById('sSearchType').value = 'identicalitems';">
                                                                    <i class="fa fa-search"></i>
                                                                    [{oxmultilang ident="D3_MULTILANG_SEARCHIDENTICALSTART"}]
                                                                </button>
                                                            </span>

                                                            <span class="d3modcfg_btn icon d3color-blue" style="float: left; margin-right: 5px;">
                                                                <button type="submit" name="save" [{$readonly}] onclick="document.getElementById('sSearchType').value = 'originalitems';">
                                                                    <i class="fa fa-search"></i>
                                                                    [{oxmultilang ident="D3_MULTILANG_SEARCHORIGINALSTART"}]
                                                                </button>
                                                            </span>

                                                            <select name="itemtype" size="1">
                                                                <option value="all">[{oxmultilang ident="D3_MULTILANG_SEARCHALL"}]</option>
                                                                <option value="frontend" [{if $sItemtype == 'frontend'}] selected[{/if}]>[{oxmultilang ident="D3_MULTILANG_SEARCHFRONTEND"}]</option>
                                                                <option value="backend" [{if $sItemtype == 'backend'}] selected[{/if}]>[{oxmultilang ident="D3_MULTILANG_SEARCHBACKEND"}]</option>
                                                            </select>
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </td>
                                    [{/block}]
                                </tr>
                            </table>
                        </fieldset>
                    </form>
                [{/block}]
            </td>
        </tr>
    [{/if}]

    [{* Sprachwahl *}]
    <tr>
        <td valign="top" class="edittext">
            [{block name="d3_cfg_multilang_main__langselection"}]
                <form name="langsel" id="langsel" action="[{$oViewConf->getSelfLink()}]" method="post">
                    [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                    <input type="hidden" name="fnc" value="languageselect">
                    <input type="hidden" name="oxid" value="[{$oxid}]">
                    <input type="hidden" name="lstrt" value="[{$lstrt}]">
                    <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_MULTILANG_LANGSELECT"}]</legend>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <colgroup>
                                <col width="200">
                                <col>
                                <col width="26">
                                <col>
                                <col width="26">
                                <col width="26">
                            </colgroup>
                            <tr>
                                <td class="edittext ext_edittext">
                                    &nbsp;
                                </td>
                                <td class="edittext ext_edittext" align="left">
                                    <SELECT class="editinput" name="langsel[left]" size="1" style="width:100%; background-color: #F0F0F0; font-weight: bold; border-width:0;" onchange="document.getElementById('langsel').submit();">
                                        <option value="">[{oxmultilang ident="D3_MULTILANG_SELECTLANGUAGE"}]</OPTION>
                                        <option value="">---------------------------</OPTION>
                                        [{foreach from=$aLanguages item=lang key=key}]
                                            <option value="[{$lang->id}]" [{if $langsel_left == $lang->id && $langsel_left != 'none'}]selected[{/if}]>[{$lang->name}]</option>
                                        [{/foreach}]
                                    </SELECT>
                                </td>
                                <td class="edittext ext_edittext" align="left">&nbsp;</td>
                                <td class="edittext ext_edittext" align="left">
                                    <SELECT class="editinput" name="langsel[right]" size="1" style="width:100%; background-color: #F0F0F0; font-weight: bold; border-width:0;" onchange="document.getElementById('langsel').submit();">
                                        <option value="">[{oxmultilang ident="D3_MULTILANG_SELECTLANGUAGE"}]</OPTION>
                                        <option value="">---------------------------</OPTION>
                                        [{foreach from=$aLanguages item=lang key=key}]
                                            <option value="[{$lang->id}]" [{if $langsel_right == $lang->id && $langsel_right != 'none'}]selected[{/if}]>[{$lang->name}]</option>
                                        [{/foreach}]
                                    </SELECT>
                                </td>
                                <td class="edittext ext_edittext" align="left">&nbsp;</td>
                                <td class="edittext ext_edittext" align="left">&nbsp;</td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            [{/block}]
        </td>
    </tr>
</table>

[{if $langsel_right != 'none' && $langsel_left != 'none'}]

    [{* Neueinträge *}]
    [{block name="d3_cfg_multilang_main__newitems"}]
        <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
            [{$oViewConf->getHiddenSid()}]
            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
            <input type="hidden" name="fnc" value="save">
            <input type="hidden" name="oxid" value="[{$oxid}]">
            <input type="hidden" name="lstrt" value="[{$lstrt}]">
            <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">
            <input type="hidden" name="sSearchText" value="[{$sSearchText}]">
            <input type="hidden" name="sSearchType" value="[{$sSearchType}]">
            <input type="hidden" name="page" value="[{$iPage}]">

            <table border="0" width="98%" class="itemlist">
                <tr>
                    <td class="edittext ext_edittext" valign="top" align="left">
                        <fieldset>
                            <legend>[{oxmultilang ident="D3_MULTILANG_NEWITEM"}]</legend>
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <colgroup>
                                    <col width="200">
                                    <col>
                                    <col width="26">
                                    <col>
                                    <col width="26">
                                    <col width="26">
                                </colgroup>
                                <tr>
                                    <td class="edittext ext_edittext">
                                        <input type="text" name="newValues1[key]" class="edittext" value="[{$newValues1.key}]" style="width: 100%;[{if $newValues1.error}] border: 2px solid red;[{/if}]" [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">
                                        <input type="text" size="50" name="newValues1[[{$langsel_left}]]" value="[{$newValues1.$langsel_left}]" class="edittext" style="width: 100%;[{if $newValues1.error}] border: 2px solid red;[{/if}]"[{if $langsel_left == $langsel_right}] disabled[{/if}] [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">
                                        <input type="checkbox" value="0" name="newValues1[original_[{$langsel_left}]]" class="edittext" style="width: 100%;" disabled title="Original Oxid" [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">
                                        <input type="text" size="50" name="newValues1[[{$langsel_right}]]" value="[{$newValues1.$langsel_right}]" class="edittext" style="width: 100%;[{if $newValues1.error}] border: 2px solid red;[{/if}]" [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">
                                        <input type="checkbox" value="0" name="newValues1[original_[{$langsel_right}]]" class="edittext" style="width: 100%;" disabled title="Original Oxid" [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="edittext ext_edittext">
                                        <input type="text" name="newValues2[key]" class="edittext" value="[{$newValues2.key}]" style="width: 100%;[{if $newValues2.error}] border: 2px solid red;[{/if}]" [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">
                                        <input type="text" size="50" name="newValues2[[{$langsel_left}]]" value="[{$newValues2.$langsel_left}]" class="edittext" style="width: 100%;[{if $newValues2.error}] border: 2px solid red;[{/if}]"[{if $langsel_left == $langsel_right}] disabled[{/if}] [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">
                                        <input type="checkbox" value="0" name="newValues2[original_[{$langsel_left}]]" class="edittext" style="width: 100%;" disabled title="Original Oxid" [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">
                                        <input type="text" size="50" name="newValues2[[{$langsel_right}]]" value="[{$newValues2.$langsel_right}]" class="edittext" style="width: 100%;[{if $newValues2.error}] border: 2px solid red;[{/if}]" [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">
                                        <input type="checkbox" value="0" name="newValues2[original_[{$langsel_right}]]" class="edittext" style="width: 100%;" disabled title="Original Oxid" [{$readonly}]>
                                    </td>
                                    <td class="edittext ext_edittext" align="left">&nbsp;</td>
                                </tr>
                            </table>
                        </fieldset>
                    </td>
                </tr>

                [{* Alteinträge *}]
                <tr>
                    <td class="edittext ext_edittext" valign="top" align="left">
                        <fieldset>
                            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                <colgroup>
                                    <col width="200">
                                    <col>
                                    <col width="26">
                                    <col>
                                    <col width="26">
                                    <col width="26">
                                </colgroup>
                                [{foreach from=$aTranslations item=translation}]
                                    <tr>
                                        <td class="edittext ext_edittext">
                                            <input type="text" size="50" name="value[[{$translation->key}]][key]" class="edittext" style="width: 100%;" value="[{$translation->key}]" onkeyup="document.getElementById('org_[{$translation->key}]').checked=false;" [{$readonly}]>
                                        </td>
                                        <td class="edittext ext_edittext" align="left">
                                            <input type="text" size="50" name="value[[{$translation->key}]][[{$langsel_left}]]" class="edittext" style="width: 100%;" value="[{$translation->left}]" onkeyup="document.getElementById('org_[{$translation->key}]_[{$langsel_left}]').checked=false;" [{if $langsel_left == $langsel_right}] disabled[{/if}] [{$readonly}]>
                                        </td>
                                        <td class="edittext ext_edittext" align="left">
                                            <input type="hidden" name="value[[{$translation->key}]][original_[{$langsel_left}]]" value="0">
                                            <input type="checkbox" id="org_[{$translation->key}]_[{$langsel_left}][{if $langsel_left == $langsel_right}]wp[{/if}]" name="value[[{$translation->key}]][original_[{$langsel_left}][{if $langsel_left == $langsel_right}]wp[{/if}]]" class="edittext" value="1" style="width: 100%;" [{if $translation->original_left}]checked[{/if}] title="Original Oxid" [{if $langsel_left == $langsel_right}] disabled[{/if}] [{$readonly}]>
                                        </td>
                                        <td class="edittext ext_edittext" align="left">
                                            <input type="text" size="50" name="value[[{$translation->key}]][[{$langsel_right}]]" class="edittext" style="width: 100%;" value="[{$translation->right}]" onkeyup="document.getElementById('org_[{$translation->key}]_[{$langsel_right}]').checked=false;" [{$readonly}]>
                                        </td>
                                        <td class="edittext ext_edittext" align="left">
                                            <input type="hidden" name="value[[{$translation->key}]][original_[{$langsel_right}]]" value="0">
                                            <input type="checkbox" id="org_[{$translation->key}]_[{$langsel_right}]" name="value[[{$translation->key}]][original_[{$langsel_right}]]" class="edittext" value="1" style="width: 100%;" [{if $translation->original_right}]checked[{/if}] title="Original Oxid" [{$readonly}]>
                                        </td>
                                        <td class="edittext ext_edittext" align="left">
                                            <a id="del.2" class="delete" onmouseover="popUp(event,'item_delete');return true" onmouseout="popDown('item_delete')" title="" href="Javascript:DeleteThis('[{$translation->key}]');" [{$readonly}]>
                                        </td>
                                    </tr>
                                [{/foreach}]
                            </table>
                        </fieldset>
                    </td>
                </tr>

                [{* Speichern *}]
                <tr>
                    <td class="edittext ext_edittext" valign="top" align="left">
                        <table width="100%">
                            <tr>
                                <td class="edittext ext_edittext" align="left"><br>
                                    <span class="d3modcfg_btn icon d3color-green">
                                        <button type="submit" name="save" [{$readonly}]>
                                            <i class="fa fa-check-circle fa-inverse"></i>
                                            [{oxmultilang ident="D3_CFG_MOD_GENERAL_SAVE"}]
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    [{/block}]

    <table border="0" width="98%">
        <tr>
            <td class="edittext ext_edittext" valign="top" align="left">
                [{include file="d3pagenavigation.tpl"}]
            </td>
        </tr>
    </table>
[{else}]
    [{* vorher Sprachwahl *}]
    <table border="0" width="98%">
        <tr>
            <td class="edittext ext_edittext" valign="top" align="left">
                <table width="100%">
                    <tr>
                        <td class="edittext ext_edittext" align="left"><br>
                            [{oxmultilang ident="D3_MULTILANG_CHOOSELANGFIRST"}]
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
[{/if}]

[{include file="d3_cfg_mod_inc.tpl"}]

[{block name="d3_cfg_multilang_main__clrtmp"}]
    [{if $msg == 'success'}]
        <script type="text/javascript">
            if (confirm('[{oxmultilang ident="D3_MULTILANG_CLEARLANGCACHE"}]')) {
                var oTransfer = parent.edit.document.getElementById("transfer");
                oTransfer.fnc.value='clearLangCache';
                oTransfer.submit();
            }
        </script>
    [{elseif $msg == 'newFieldError'}]
        <script type="text/javascript">
            alert('[{oxmultilang ident="D3_MULTILANG_NEWFIELDERROR"}]');
        </script>
    [{/if}]
[{/block}]