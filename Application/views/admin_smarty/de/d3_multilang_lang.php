<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Multilang @version 5.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3038C2613AAQAAAAhAAAABKgAAACABAAAAAAAAAD/t40Wx2lqtZM5Vc1CMLq4t4jkygT03XvquOmR3VoZMuU0Gy4XvdoQNBKImpSYXieuk+gAApO1Q+f5V4Bn6gpS/RGx6uXBQRtdv1VyCGevjQyYRsXtySotPQMcBtB0OcIXZAR0kaHA+opSSjMEOru8CvnIk0TF1nbnIQVYJnNsJ90DfpCwe2ejCSq4or2PXSjXzCbQV1EVHbL3zcLhaZfNegArxpE2jSluCAAAAGgBAADQbbMjfMqVhfpkMWuxQM1SnVJR7W64JkJ0aew2GQKsSVt11Aj+fKhBownyp7slLTQxAWjnYCbWX9tqM9fb6cS/J2eJyn/KGpJvY5yg/lmc7vWI5im4kIwyusITDN5btyEpls/yOvsJnMLe4BsPyuB24q1GuOgMh1oDAogKzCVh2prwGUO9rCG5aFmRWVZ3MYnmDXSPONG5agtx7oaPIv3RFEMhKWFKpfQDI5cFtsCn3X4ujp5wpCTkOVNBY1uFuct4Ifgxpe8x6+2EBrTfvOpz9Nao00DnLen62DGCLz3Lyp6AgWCG5jnxhxhL84/Idqudvdw5bb1IbluTIyAUd4B6N2TSDgEtGJ5WTUBmlF8a4aS3aYOAxVftl0KNgxxMdZM0WOw01vvy6YswZooDesp7t3rvbPDGgOeC6Zms83ZOqkWAkz+122v0cwGH1qm5g3fL29rdUFJmoaeKAc7N4qHuAevYJci6N0NRAAAAYAEAAMLRBpFmpY8iQWp9OQAlxIqy0a+//fs3/wOwvxg39EpXrtkTqod51v4k+xPyQcWD4MmmU+dJquvXxby5OzDzoRyIKTIMxMCa8voBTw6/hVWAaH6Bi4pEI7rL66oiN160CoCpTw1GWAzndnr/DyVsA7uH++a72dxaai86r7Q8+kwW+UoS/Wd75nCTH1K2hxJtdVzAbXBCgbrUvTIZv2DCczQ4fTp1F+aYmsSaAAZDQKWWSa4ZZYJFSGTvyJzeY+GqbOXK9tx8h/KJobAeeHzpd5DoSaJ9eWUX6ZSLJt+rADLpcytReYEG4vpR5KxBsqk5ApnQ/QEUzvdbBJ+0OAi6/VHMYe9iZyV/0g20PmLJV9FpVgt/G2ExJ+NXIa+NUeUK4dG3ucCYUj4P42esDtecUqeo5k8+YMCpnUBtjt5Xd5hK5GkDtvSW3pX76GMaJHn0ydCC9aYzxg3jl8YyzS4ZQ3hSAAAAYAEAAOXqRPYtcZe1K6Z1SOuWRLQi3SiekQVX+c88/QG9Gyk3lJRGRfctE4apjnBIx+02iwHPz11DnnooRv0xmw+F8YNgB8lUPKdQAxdDh/kgFMELJLmf2zlUsGRxaRmSV2GlZZe2BeFNhXYqbYNNEj5u+96RvvOu3jAJqVl0zBuEsRC4wxK8sWjgAMmZRI7r3aGp1476+Mxqxc23pnYWU6YCVk3wIXOVtOpjGUg1qniYXSiQWDonBxJO6E+DYTzM+8VHNooMoVb7KRd2oz2r6IGFqOvkrxRLDRbli2+iFL1//JLjT+MQRDi6OvvrdMPTebzXJhwBvxswMpNwi8wBpT6QqEp5k2DQh7x386X91usMd5Qirftd+I+9RjuVzlSeGdF8DqpBup+7rvC6uAJ/Tm7jD4+HU/+lmiKWAsbobYN4BKjmowcJCpCjcTbqYdyHuNTtanbaLBh7DtSrb0vGQK76QGYAAAAA');
