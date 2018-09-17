<?php

$sLangName  = "[{$sLangName}]";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation

[{foreach from=$aTranslations item="translation" key="ident"}]
[{strip}]
    [{capture assign="sIdent"}][{$encloser}][{$ident}][{$encloser}][{/capture}]
    [{$sIdent|str_pad:$maxIdentLength:' ':1}] => [{$encloser}][{$translation}][{$encloser}],
[{/strip}]
[{/foreach}]
);
