<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Multilang @version 5.0.0.0 SourceGuardian (23.01.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('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');