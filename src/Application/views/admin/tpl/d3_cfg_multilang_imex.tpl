[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
<!--
    [{if $updatelist == 1}]
        UpdateList('[{$oxid}]');
    [{/if}]

    function UpdateList( sID)
    {
        var oSearch = parent.list.document.getElementById("search");
        oSearch.oxid.value=sID;
        oSearch.fnc.value='';
        oSearch.submit();
    }

    function EditThis( sID)
    {
        var oTransfer = document.getElementById("transfer");
        oTransfer.oxid.value=sID;
        oTransfer.cl.value='';
        oTransfer.submit();

        var oSearch = parent.list.document.getElementById("search");
        oSearch.actedit.value = 0;
        oSearch.oxid.value=sID;
        oSearch.submit();
    }

    function _groupExp(el)
    {
        var _cur = el.parentNode;

        if (_cur.className == "exp") _cur.className = "";
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

    div.options {
        float: left;
        width: 50%;
    }
-->
</style>

[{if $oView->getStatusMessages()}]
    <div class="errorbox">
        [{foreach from=$oView->getStatusMessages() item="sMessage"}]
            <p>[{$sMessage}]</p>
        [{/foreach}]
    </div>
[{/if}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="actshop" value="[{$shop->id}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

<table border="0" style="width: 98%;">
    <tr>
        <td style="vertical-align: top;" class="edittext">

            [{block name="d3_cfg_multilang_imex__setform"}]
                <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
                    [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                    <input type="hidden" name="fnc" value="save">
                    <input type="hidden" name="oxid" value="[{$oxid}]">
                    <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">

                    [{if $oView->getValueStatus() == 'error'}]
                        <hr>
                        <span style="font-weight: bold;">[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_DESC"}]</span>
                        <br>
                        <br>
                        <span class="d3modcfg_btn fixed icon status_attention">
                            <input type="submit" value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_NOCONFIG_BTN"}]">
                            <span></span>
                        </span>
                        <div style="float: none; clear: both;"></div>
                    [{else}]
                        [{block name="d3_cfg_multilang_imex__settings"}]
                            [{include file="d3_cfg_mod_active.tpl"}]

                            <div class="groupExp">
                                <div class="">
                                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                                        <span style="font-weight: bold;">
                                            [{oxmultilang ident="D3_MULTILANG_SETTINGS"}]
                                        </span>
                                    </a>
                                    <dl>
                                        <dt>
                                            <label for="blMultilang_SaveMissingItems">[{oxmultilang ident="D3_MULTILANG_MODCFG_SAVEMISS"}]</label>
                                        </dt>
                                        <dd>
                                            <input type="hidden" name="value[d3_cfg_mod__blMultilang_SaveMissingItems]" value="0">
                                            <input id="blMultilang_SaveMissingItems" class="edittext ext_edittext" type="checkbox" name="value[blMultilang_SaveMissingItems]" value='1' [{if $edit->getValue('blMultilang_SaveMissingItems') == 1}]checked[{/if}]>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>
                                            <label for="sMultilang_Separator">[{oxmultilang ident="D3_MULTILANG_MODCFG_SEPARATOR"}]</label>
                                        </dt>
                                        <dd>
                                            <input id="sMultilang_Separator" class="edittext ext_edittext" size="3" maxlength="1" type="text" name="value[sMultilang_Separator]" value='[{if $edit->getValue('sMultilang_Separator')}][{$edit->getValue('sMultilang_Separator')}][{else}]|[{/if}]'>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>
                                            <label for="sMultilang_Encloser">[{oxmultilang ident="D3_MULTILANG_MODCFG_ENCLOSER"}]</label>
                                        </dt>
                                        <dd>
                                            <input id="sMultilang_Encloser" class="edittext ext_edittext" size="3" maxlength="1" type="text" name="value[sMultilang_Encloser]" value='[{if $edit->getValue('sMultilang_Encloser')}][{$edit->getValue('sMultilang_Encloser')}][{else}]"[{/if}]'>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>
                                            <label for="blMultilang_trimWhiteSpaces">[{oxmultilang ident="D3_MULTILANG_MODCFG_TRIMWHITESPACES"}]</label>
                                        </dt>
                                        <dd>
                                            <input type="hidden" name="value[d3_cfg_mod__blMultilang_trimWhiteSpaces]" value="0">
                                            <input id="blMultilang_trimWhiteSpaces" class="edittext ext_edittext" type="checkbox" name="value[blMultilang_trimWhiteSpaces]" value='1' [{if $edit->getValue('blMultilang_trimWhiteSpaces') == 1}]checked[{/if}]>
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>
                                            <label for="blMultilang_addMappedTranslations">[{oxmultilang ident="D3_MULTILANG_MODCFG_ADDMAPPEDTRANSLATIONS"}]</label>
                                        </dt>
                                        <dd>
                                            <input type="hidden" name="value[d3_cfg_mod__blMultilang_addMappedTranslations]" value="0">
                                            <input id="blMultilang_addMappedTranslations" class="edittext ext_edittext" type="checkbox" name="value[blMultilang_addMappedTranslations]" value='1' [{if $edit->getValue('blMultilang_addMappedTranslations') == 1}]checked[{/if}]>
                                            [{oxinputhelp ident="D3_MULTILANG_MODCFG_ADDMAPPEDTRANSLATIONS_DESC"}]
                                        </dd>
                                    </dl>
                                    <dl>
                                        <dt>
                                            <label for="blMultilang_OutputMimeType">[{oxmultilang ident="D3_MULTILANG_MODCFG_MIME"}]</label>
                                        </dt>
                                        <dd>
                                            <input type="hidden" name="value[d3_cfg_mod__blMultilang_OutputMimeType]" value="0">
                                            <input id="blMultilang_OutputMimeType" class="edittext ext_edittext" type="checkbox" name="value[d3_cfg_mod__blMultilang_OutputMimeType]" value='1' [{if $edit->getValue('blMultilang_OutputMimeType') == 1}]checked[{/if}]>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        [{/block}]
                        <span class="d3modcfg_btn icon d3color-green">
                            <button type="submit" name="save">
                                <i class="fa fa-check-circle fa-inverse"></i>
                                [{oxmultilang ident="D3_CFG_MOD_GENERAL_SAVE"}]
                            </button>
                        </span>
                    [{/if}]

                </form>
                <div class="clear"></div><br>
            [{/block}]

            [{block name="d3_cfg_multilang_imex__mime"}]
                [{if $oView->getMimeType()}]
                    Mime-Type: [{$oView->getMimeType()}]<br><br>
                [{/if}]
            [{/block}]

            [{block name="d3_cfg_multilang_imex__export"}]
                [{if $oView->getValueStatus() != 'error'}]
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_MULTILANG_EXPORT"}]</legend>
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td class="edittext ext_edittext">
                                    <form name="export" id="export" action="[{$oViewConf->getSelfLink()}]" method="post">
                                        [{$oViewConf->getHiddenSid()}]
                                        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                        <input type="hidden" name="fnc" value="export">
                                        <input type="hidden" name="oxid" value="[{$oxid}]">
                                        <input type="hidden" name="lstrt" value="[{$lstrt}]">
                                        <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">

                                        [{block name="d3_cfg_multilang_imex__exporttype"}]
                                            <input type="radio" id="exportcsv" name="exporttype" value="csv" [{if $exporttype == 'csv' || !$exporttype}]checked[{/if}] [{$readonly}]> <label for="exportcsv">[{oxmultilang ident="D3_MULTILANG_FILETYPECSV"}]</label><br>
                                            <input type="radio" id="exportoxid" name="exporttype" value="oxid" [{if $oView->getExportType() == 'oxid'}]checked[{/if}] [{$readonly}]> <label for="exportoxid">[{oxmultilang ident="D3_MULTILANG_FILETYPEOXID"}]</label><br>
                                        [{/block}]
                                        <br>
                                        <span class="d3modcfg_btn icon d3color-blue">
                                            <button type="submit" name="save" [{$readonly}]>
                                                <i class="fa fa-download"></i>
                                                [{oxmultilang ident="D3_MULTILANG_STARTEXPORT"}]
                                            </button>
                                        </span>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                [{/if}]
            [{/block}]

            <br>

            [{block name="d3_cfg_multilang_imex__import"}]
                [{if $oView->getValueStatus() != 'error'}]
                    <fieldset>
                        <legend>[{oxmultilang ident="D3_MULTILANG_IMPORT"}]</legend>

                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <colgroup>
                                <col width="30%">
                            </colgroup>

                            [{block name="d3_cfg_multilang_imex__importinstalled"}]
                                <tr>
                                    <td class="edittext ext_edittext">
                                        <span style="font-weight: bold;">[{oxmultilang ident="D3_MULTILANG_FILETYPEINSTALLED"}]:</span>
                                    </td>
                                    <td class="edittext ext_edittext">
                                        <form name="import" id="import" action="[{$oViewConf->getSelfLink()}]" method="post">
                                            [{$oViewConf->getHiddenSid()}]
                                            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                            <input type="hidden" name="fnc" value="import">
                                            <input type="hidden" name="type" value="installed">
                                            <input type="hidden" name="oxid" value="[{$oxid}]">
                                            <input type="hidden" name="lstrt" value="[{$lstrt}]">
                                            <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">

                                            <span class="d3modcfg_btn icon d3color-blue">
                                                <button type="submit" name="save">
                                                    <i class="fa fa-upload"></i>
                                                    [{oxmultilang ident="D3_MULTILANG_IMPORTSTARTINSTALLED"}]
                                                </button>
                                            </span>
                                        </form>
                                    </td>
                                </tr>
                            [{/block}]

                            [{block name="d3_cfg_multilang_imex__importcsv"}]
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext ext_edittext">
                                        <span style="font-weight: bold;">[{oxmultilang ident="D3_MULTILANG_FILETYPECSV"}]:</span>
                                    </td>
                                    <td class="edittext ext_edittext">
                                        <form name="import" id="import" enctype="multipart/form-data" action="[{$oViewConf->getSelfLink()}]" method="post">
                                            <div class="options">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                                [{$oViewConf->getHiddenSid()}]
                                                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                                <input type="hidden" name="fnc" value="import">
                                                <input type="hidden" name="type" value="csv">
                                                <input type="hidden" name="oxid" value="[{$oxid}]">
                                                <input type="hidden" name="lstrt" value="[{$lstrt}]">
                                                <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">
                                                <input class="editinput" name="file[csv]" type="file" [{$readonly}] accept="text/comma-separated-values">
                                                <br>
                                                <span class="d3modcfg_btn icon d3color-blue">
                                                    <button type="submit" name="save" [{$readonly}]>
                                                        <i class="fa fa-upload"></i>
                                                        [{oxmultilang ident="D3_MULTILANG_IMPORTSTARTCSV"}]
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="options">
                                                <input type="hidden" name="overwrite_csv" value="0">
                                                <input type="checkbox" id="overwrite_csv" name="overwrite_csv" value="1" [{if $oView->getRequParam('overwrite_csv') == "1"}]checked[{/if}] [{$readonly}]> <label for="overwrite_csv">[{oxmultilang ident="D3_MULTILANG_IMPORTOVERWRITE"}]</label><br>
                                                <input type="hidden" name="original_csv" value="0">
                                                <input type="checkbox" id="original_csv" name="original_csv" value="1" [{if $oView->getRequParam('original_csv') == "1"}]checked[{/if}] [{$readonly}]> <label for="original_csv">[{oxmultilang ident="D3_MULTILANG_SETORIGINAL"}]</label><br>
                                                <input type="hidden" name="ignore_mime" value="0">
                                                <input type="checkbox" id="ignore_mime" name="ignore_mime" value="1" [{if $oView->getRequParam('ignore_mime') == "1"}]checked[{/if}] [{$readonly}]> <label for="ignore_mime">[{oxmultilang ident="D3_MULTILANG_IGNOREMIME"}] [{oxinputhelp ident="D3_MULTILANG_IGNOREMIME_DESC"}]</label>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            [{/block}]

                            [{block name="d3_cfg_multilang_imex__importoxid"}]
                                <tr>
                                    <td colspan="2">
                                        <hr>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="edittext ext_edittext">
                                        <span style="font-weight: bold;">[{oxmultilang ident="D3_MULTILANG_FILETYPEOXID"}] (PHP):</span>
                                    </td>
                                    <td class="edittext ext_edittext">
                                        <form name="import" id="import" enctype="multipart/form-data" action="[{$oViewConf->getSelfLink()}]" method="post">
                                            <div class="options">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                                [{$oViewConf->getHiddenSid()}]
                                                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                                <input type="hidden" name="fnc" value="import">
                                                <input type="hidden" name="type" value="oxid">
                                                <input type="hidden" name="oxid" value="[{$oxid}]">
                                                <input type="hidden" name="lstrt" value="[{$lstrt}]">
                                                <input type="hidden" name="editval[d3_cfg_mod__oxid]" value="[{$oxid}]">
                                                <input class="editinput" name="file[oxid]" type="file" [{$readonly}]>
                                                <br>
                                                <label for="phpinlang">[{oxmultilang ident="D3_MULTILANG_IMPORTOXIDLANG"}]</label>
                                                <select name="lang[oxid]" size="1" id="phpinlang" [{$readonly}]>
                                                    [{foreach from=$aImportLanguages item=lang}]
                                                        <option value="[{$lang->id}]" [{if $lang->selected}]SELECTED[{/if}]>[{$lang->name}]</option>
                                                    [{/foreach}]
                                                </select>
                                                <br>

                                                <span class="d3modcfg_btn icon d3color-blue">
                                                    <button type="submit" name="save" [{$readonly}]>
                                                        <i class="fa fa-upload"></i>
                                                        [{oxmultilang ident="D3_MULTILANG_IMPORTSTARTOXID"}]
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="options">
                                                <input type="hidden" name="overwrite_oxid" value="0">
                                                <input type="checkbox" id="overwrite_oxid" name="overwrite_oxid" value="1" [{if $oView->getRequParam('overwrite_oxid') == "1"}]checked[{/if}] [{$readonly}]> <label for="overwrite_oxid">[{oxmultilang ident="D3_MULTILANG_IMPORTOVERWRITE"}]</label><br>
                                                <input type="hidden" name="original_oxid" value="0">
                                                <input type="checkbox" id="original_oxid" name="original_oxid" value="1" [{if $oView->getRequParam('original_oxid') == "1"}]checked[{/if}] [{$readonly}]> <label for="original_oxid">[{oxmultilang ident="D3_MULTILANG_SETORIGINAL"}]</label><br>
                                                <input type="hidden" name="admin_oxid" value="0">
                                                <input type="checkbox" id="admin_oxid" name="admin_oxid" value="1" [{if $oView->getRequParam('admin_oxid') == "1"}]checked[{/if}] [{$readonly}]> <label for="admin_oxid">[{oxmultilang ident="D3_MULTILANG_ISADMIN"}]</label><br>
                                                <input type="hidden" name="ignore_mime" value="0">
                                                <input type="checkbox" id="ignore_mime" name="ignore_mime" value="1" [{if $oView->getRequParam('ignore_mime') == "1"}]checked[{/if}] [{$readonly}]> <label for="ignore_mime">[{oxmultilang ident="D3_MULTILANG_IGNOREMIME"}] [{oxinputhelp ident="D3_MULTILANG_IGNOREMIME_DESC"}]</label>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            [{/block}]

                        </table>
                    </fieldset>
                [{/if}]
            [{/block}]
        </td>
    </tr>
</table>

[{include file="d3_cfg_mod_inc.tpl"}]

[{block name="d3_cfg_multilang_imex__clrtmp"}]
    [{if $clrTmp}]
        <script type="text/javascript">
            if (confirm('[{oxmultilang ident="D3_MULTILANG_CLEARLANGCACHE"}]')) {
                var oTransfer = parent.edit.document.getElementById("transfer");
                oTransfer.fnc.value='clearLangCache';
                oTransfer.submit();
            }
        </script>
    [{/if}]
[{/block}]