<?php ?><?php /** This Software is the property of D³ Data Development and is protected by copyright law - it is NOT Freeware.  Any unauthorized use of this software without a valid license key is a violation of the license agreement and will be prosecuted by civil and criminal law.  Inhaber: Thomas Dartsch Alle Rechte vorbehalten  @package Multilang @version 5.0.0.0 SourceGuardian (09.02.2024) @author  Daniel Seifert support@shopmodule.com @copyright (C) 2024, D3 Data Development @see https://www.d3data.de */ ?><?php
if(!function_exists('sg_load')){$__v=phpversion();$__x=explode('.',$__v);$__v2=$__x[0].'.'.(int)$__x[1];$__u=strtolower(substr(php_uname(),0,3));$__ts=(@constant('PHP_ZTS') || @constant('ZEND_THREAD_SAFE')?'ts':'');$__f=$__f0='ixed.'.$__v2.$__ts.'.'.$__u;$__ff=$__ff0='ixed.'.$__v2.'.'.(int)$__x[2].$__ts.'.'.$__u;$__ed=@ini_get('extension_dir');$__e=$__e0=@realpath($__ed);$__dl=function_exists('dl') && function_exists('file_exists') && @ini_get('enable_dl') && !@ini_get('safe_mode');if($__dl && $__e && version_compare($__v,'5.2.5','<') && function_exists('getcwd') && function_exists('dirname')){$__d=$__d0=getcwd();if(@$__d[1]==':') {$__d=str_replace('\\','/',substr($__d,2));$__e=str_replace('\\','/',substr($__e,2));}$__e.=($__h=str_repeat('/..',substr_count($__e,'/')));$__f='/ixed/'.$__f0;$__ff='/ixed/'.$__ff0;while(!file_exists($__e.$__d.$__ff) && !file_exists($__e.$__d.$__f) && strlen($__d)>1){$__d=dirname($__d);}if(file_exists($__e.$__d.$__ff)) dl($__h.$__d.$__ff); else if(file_exists($__e.$__d.$__f)) dl($__h.$__d.$__f);}if(!function_exists('sg_load') && $__dl && $__e0){if(file_exists($__e0.'/'.$__ff0)) dl($__ff0); else if(file_exists($__e0.'/'.$__f0)) dl($__f0);}if(!function_exists('sg_load')){$__ixedurl='https://www.sourceguardian.com/loaders/download.php?php_v='.urlencode($__v).'&php_ts='.($__ts?'1':'0').'&php_is='.@constant('PHP_INT_SIZE').'&os_s='.urlencode(php_uname('s')).'&os_r='.urlencode(php_uname('r')).'&os_m='.urlencode(php_uname('m'));$__sapi=php_sapi_name();if(!$__e0) $__e0=$__ed;if(function_exists('php_ini_loaded_file')) $__ini=php_ini_loaded_file(); else $__ini='php.ini';if((substr($__sapi,0,3)=='cgi')||($__sapi=='cli')||($__sapi=='embed')){$__msg="\nPHP script '".__FILE__."' is protected by SourceGuardian and requires a SourceGuardian loader '".$__f0."' to be installed.\n\n1) Download the required loader '".$__f0."' from the SourceGuardian site: ".$__ixedurl."\n2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="\n3) Edit ".$__ini." and add 'extension=".$__f0."' directive";}}$__msg.="\n\n";}else{$__msg="<html><body>PHP script '".__FILE__."' is protected by <a href=\"https://www.sourceguardian.com/\">SourceGuardian</a> and requires a SourceGuardian loader '".$__f0."' to be installed.<br><br>1) <a href=\"".$__ixedurl."\" target=\"_blank\">Click here</a> to download the required '".$__f0."' loader from the SourceGuardian site<br>2) Install the loader to ";if(isset($__d0)){$__msg.=$__d0.DIRECTORY_SEPARATOR.'ixed';}else{$__msg.=$__e0;if(!$__dl){$__msg.="<br>3) Edit ".$__ini." and add 'extension=".$__f0."' directive<br>4) Restart the web server";}}$__msg.="</body></html>";}die($__msg);exit();}}return sg_load('7A3737B3038C2613AAQAAAAhAAAABKgAAACABAAAAAAAAAD/Rx8j0KOnn5oqxlypCD8w1aMgSdN6fw8t/fWkJn8/TTY5xBoiRCikc5aY7gbccIQQxAc0Fib25ThVA0/JJR97wnBMv+gzdIOaI2A6W6f+9BvYUEt94oM5ju5SpuMAN2qdkKO/EMBau/OblDwxuEptlxN9/V958qrNxul1f1WwB5TfC4qvaXpmKOsl7RvJ+hMl1XDMK8sGH8JIf13ie5W5rHl4mQ3LEMZKCAAAAIgBAAD2IdAuUFLF7YGf5IUoMiE+ZqefuzszZ0Y/LO1GkXZVC5G+FMtccd011I5+kj7MT0XTf5gmU0i5zII1X694eVXQwcPGygi94QJHiVzkomKqe5mRWJcyAAoil0aSBMINtXCxGNhWt5F18HHaCHwFRjZdZ8d6nGDoar43W0StEoZa+Ep+odZ8BxUbAZCEptmBZqlS0LzzFRIxLY7kiioyGpnNXteOKj7qfK2luzywvVlW3xLxHpxR9SDL9djwYaV3vu8EurKIFonQ4yd7BA9iJxzyITfzkLV3naW3839ntXmvBO0H+aUkTy9Uxvz9O9IWapsDctVg74NW2qboMpsoS+biTGqxfY9DbrSk7Ks1AUPrZ/Ma0Ti0WhCJIZB7BnAm6Y+mWipQ52XaxQc+rIUOZzlw8LWabDc4dOk01v+Hwdx3Jq4Nvvem8d402/sI/pT7kNg+6EJqQmaOHeTgzNCSG/FjuOtsRNNqE625nIs5iBQGa7oN1vcXBtOp+dkqupl28Y7Za/NqeecfklEAAAB4AQAA6sNjPAsZUI/ocgdGzk7XH6wHkA+BsOE7LB5ot7tWVVA8DiXSNug8ZxuOOKmjevs79QJEzzQAQgx8RHI0rQtoifpuFCuN8ocalmLI7Honlit3O/MZuZkVHl63LpjRVQksEDbIKzvbq3J+Mu2mFGj53e0gx0L73FTc6vhk7XncFxn1811rEB7E10m/C7AOmsOn7S/P2H6XsaZdMw1/PwlgV+Dv3LUwD18gG+/VLCyrosxXwmJIr6v3enr93W52HnCqfHKEXBwG6yJ7ptYVzgt8SStsvpCAEOhM1V4QmvjZs0G/sN9CuYttfqGZnAz/dtSI4eNwwbS3kx5JfuDR1KwFEmKX0cbtzoHEOjSUwjMBSMM8JartvWloyIE+0kyhSwkYikDnVWo1dZdSNkt0sDOFprrigKPwjEcgivcf5uhm1cEjB5hAtByZjFhodyhCYkNmGMCZ7VqnW93mb7XhMMR90ONmvPwrKeKwXL7yP4mJh20/UYXin0OGYlIAAAB4AQAAYpbwDFikpl/nMpYYowSnzjhGVFyxhsYrBzdUx9A0X8UyhtrS+biSbEJ2CTpzSl9rmGaJxFnpLn9UO++4i11GRtKmN3APSt/pR544ZogPzB8ZFWwGCHsA8zL+9L3bw6mDfynPbCjWl3L8QHFkLDJh0sDk4eMfFq/l4QI/9ZhWhD0Shj3aHRr+ykVD5wsL52v6RiENGhDFC9tTbj5SgBaH1S1FAzFJNV3aci2GFMIFn7LETH78084ywk5KuStWhnqh5lITezBF058gP2JLvBRaHR8o6Hzx76MhcT/dFV9RQC4BFZGO3E7oXuUxhDJ3FhJL2+3dMHI/fFeQ3k7pZAjSHZxsc3a+Jo80IcpNfFzpi0nB+5y+llwzgx+YZS7f0fbkwrMDJZtBnzgl2NWDIfUBSd2Ux7bJokgJ1hH0rTB19pjOhkf0xX+maSSkAzHBEw08QH+DZFwsE0BJolunhqDGithpiARLkLxpPh7YRBgq5oprSZ1oTxhHsQAAAAA=');
