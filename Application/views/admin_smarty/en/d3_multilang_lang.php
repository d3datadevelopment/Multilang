<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Multilang @version 5.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3038C2613AAQAAAAhAAAABKgAAACABAAAAAAAAAD/VizvR//9CgAPb7eI7vFOi1pVjQ/ywDNK/4l39rlpBBpOt+LKvTn0eKkvCuf+2nmniMBFceSUmNQwUn2n9JZrDrl1CKbqzLRMMWiw+qdkhCnLg3+8BetRKBHAUGmwIoJkIoSHXxwsxv5JiX5u3LKq6mtfq4xtFFwzxhbs10unJnusT/iuDLGQZLe6QoiNAUDrs8mZZ84GyDKkE08pTsHbvGEsQ42MIt26CAAAAGgBAAC9SIvgmYDmMmFAnj/q9vABGapnnbb3g7mtnr4/yFHUQWY4MUbs904eUAKuZnNx0oKhuZ2qci4o2G5F97qS+DqgW3i6VpImdHJvnyYMhA54HzZxx5Nyt45u2Q95P01aCfDtJGNAvwng7YR3EED2FvPBCT2FzSYR4mcKRmrCkF1HbeCfP5eusEhyE1jWXfeCn3W93uius6WlE7Iw68gjtcaJ25wEl1ziipU3bGq5TQGHBhUENBezjif4mhBJujORjJQdXnogcl4psl4rW1UIwsCVkvAZv25fvLkIe3mfiPf4FTiQ2dJ1ErOD8Yzcav3hj99CTgMPlwMFdnPAehqXxnLufThrYmTtnECOubsL6pfIsllGrdGpfYIu0ss3hW/t9h/Jp2chX/3T2VxAXPw+SaXi0SV1K3eIDIA2hvPsiXXHWzl7TL6NUgiqIG//xc1AkvE1NaBIR18H4FOsrpZwiMWdsgV/J/JJSFBRAAAAYAEAALXMZtt+JXVBqRfmMwmMFgKmeLm//euXwZRU5PbNpEWQJe+VvYLRLDwd9S99u60kVBiMulMF3vv0u5vfYrfIF08aveVPhA5z/CSRL6P5HBQ/RyIyfSteZOsBOoLjlRTZDVOR80PQBKoG7gT5RtcJbfgcIVDP9gfm5n/HrKkGw2+gHiyleaDPOy6XKnMk2QIddiEVmC3YHjCoWmEypV7jzI1TjdCq9jpnFZ+uzVWPIdtMNIYTsJ588liXCPy/oYLMdeNRiaVCWZb3T+mLwLRjPXulao5AYr5OQZNZVsuZOejhfbqZ6cuU77WoJkuuXQAFD1eIM4gQprhyyZKLrV64e3YEJAQtDOtwPgrLbW6GfNRmBza1rpRKV9FQAuxwmuXgO7spO22Ka5N8m+BW791UCHGfPgi62MatW5SCR1/2lJBmQa+bWp1BDoaWYxA+LXARO+UVXPzTcXROBrdAV5Bq8/xSAAAAYAEAALsNSTq2/BX3nk8CQS5NEehFhcjNGJRyvpkJfRA1VB/bUPRhCdD3xN1A5q893yBMTcy6VQ0V3rJ3+eKqH+knAbGnCfhLwBwRTv02xh5DSwuPmLXBU8/T3UgeA8oIcdvWs/MfIRuSMpWy1OJQJYC+LUw2zCdbMnLWTT5H/1+c6rw9cjWMdU7GyaS0YWxDLN2nBJDZJBFZZjqcoSu/+5fZBZme9GuT4dKbsxOg3nJYT4xGtPJYzPGL1+WfrAw/b9x5iXWRerD08LUE/k817i+YNj4zM4FrOTD9PkXshb1sQH6Gg6MTnl2ltOT0DhYpg8n1/7i9yRfNZ3bU7op0x7plKPmCU9wWT/08rzLIZf422Z4KbmozmrOhyvGQoKyI50t7KDa2ak/OiWT25xopsDhwnHzqmAiXMiXYKH7ffCOroyPdYOAwG/h8tMaCxrdKHF5U0s6vnGwXHZrbN62DCr1CK+YAAAAA');
