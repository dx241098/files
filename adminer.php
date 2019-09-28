<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.6.3
*/error_reporting(6135);$Uc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Uc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Ai=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Ai)$$X=$Ai;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$g;return$g;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($u){$ke=substr($u,-1);return
str_replace($ke.$ke,$ke,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($kg,$Uc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($kg)){foreach($X
as$ae=>$W){unset($kg[$y][$ae]);if(is_array($W)){$kg[$y][stripslashes($ae)]=$W;$kg[]=&$kg[$y][stripslashes($ae)];}else$kg[$y][stripslashes($ae)]=($Uc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Na=false){static$li=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Na?array_flip($li):$li));}function
min_version($Ri,$ye="",$h=null){global$g;if(!$h)$h=$g;$fh=$h->server_info;if($ye&&preg_match('~([\d.]+)-MariaDB~',$fh,$B)){$fh=$B[1];$Ri=$ye;}return(version_compare($fh,$Ri)>=0);}function
charset($g){return(min_version("5.5.3",0,$g)?"utf8mb4":"utf8");}function
script($ph,$ki="\n"){return"<script".nonce().">$ph</script>$ki";}function
script_src($Fi){return"<script src='".h($Fi)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($C,$Y,$eb,$he="",$mf="",$jb="",$ie=""){$I="<input type='checkbox' name='$C' value='".h($Y)."'".($eb?" checked":"").($ie?" aria-labelledby='$ie'":"").">".($mf?script("qsl('input').onclick = function () { $mf };",""):"");return($he!=""||$jb?"<label".($jb?" class='$jb'":"").">$I".h($he)."</label>":$I);}function
optionlist($sf,$Zg=null,$Ji=false){$I="";foreach($sf
as$ae=>$W){$tf=array($ae=>$W);if(is_array($W)){$I.='<optgroup label="'.h($ae).'">';$tf=$W;}foreach($tf
as$y=>$X)$I.='<option'.($Ji||is_string($y)?' value="'.h($y).'"':'').(($Ji||is_string($y)?(string)$y:$X)===$Zg?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($C,$sf,$Y="",$lf=true,$ie=""){if($lf)return"<select name='".h($C)."'".($ie?" aria-labelledby='$ie'":"").">".optionlist($sf,$Y)."</select>".(is_string($lf)?script("qsl('select').onchange = function () { $lf };",""):"");$I="";foreach($sf
as$y=>$X)$I.="<label><input type='radio' name='".h($C)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Ja,$sf,$Y="",$lf="",$Wf=""){$Ph=($sf?"select":"input");return"<$Ph$Ja".($sf?"><option value=''>$Wf".optionlist($sf,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Wf'>").($lf?script("qsl('$Ph').onchange = $lf;",""):"");}function
confirm($He="",$ah="qsl('input')"){return
script("$ah.onclick = function () { return confirm('".($He?js_escape($He):'Are you sure?')."'); };","");}function
print_fieldset($t,$pe,$Ui=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$pe</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Ui?"":" class='hidden'").">\n";}function
bold($Va,$jb=""){return($Va?" class='active $jb'":($jb?" class='$jb'":""));}function
odd($I=' class="odd"'){static$s=0;if(!$I)$s=-1;return($s++%2?$I:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($y,$X=null){static$Vc=true;if($Vc)echo"{";if($y!=""){echo($Vc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$Vc=false;}else{echo"\n}\n";$Vc=true;}}function
ini_bool($Nd){$X=ini_get($Nd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($Qi,$N,$V,$F){$_SESSION["pwds"][$Qi][$N][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($Q){global$g;return$g->quote($Q);}function
get_vals($G,$e=0){global$g;$I=array();$H=$g->query($G);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$e];}return$I;}function
get_key_vals($G,$h=null,$ih=true){global$g;if(!is_object($h))$h=$g;$I=array();$H=$h->query($G);if(is_object($H)){while($J=$H->fetch_row()){if($ih)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($G,$h=null,$n="<p class='error'>"){global$g;$wb=(is_object($h)?$h:$g);$I=array();$H=$wb->query($G);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($h)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$I;}function
unique_array($J,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$I=array();foreach($v["columns"]as$y){if(!isset($J[$y]))continue
2;$I[$y]=$J[$y];}return$I;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($y);}function
where($Z,$p=array()){global$g,$x;$I=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$e=escape_key($y);$I[]=$e.($x=="sql"&&preg_match('~^[0-9]*\.[0-9]*$~',$X)?" LIKE ".q(addcslashes($X,"%_\\")):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$e = ".q($X)." COLLATE ".charset($g)."_bin";}foreach((array)$Z["null"]as$y)$I[]=escape_key($y)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$p=array()){parse_str($X,$cb);remove_slashes(array(&$cb));return
where($cb,$p);}function
where_link($s,$e,$Y,$of="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($e)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$of:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($f,$p,$L=array()){$I="";foreach($f
as$y=>$X){if($L&&!in_array(idf_escape($y),$L))continue;$Ga=convert_field($p[$y]);if($Ga)$I.=", $Ga AS ".idf_escape($y);}return$I;}function
cookie($C,$Y,$se=2592000){global$ba;return
header("Set-Cookie: $C=".urlencode($Y).($se?"; expires=".gmdate("D, d M Y H:i:s",time()+$se)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($ad=false){if(!ini_bool("session.use_cookies")||($ad&&@ini_set("session.use_cookies",false)!==false))session_write_close();}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Qi,$N,$V,$l=null){global$dc;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($dc))."|username|".($l!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Qi!="server"||$N!=""?urlencode($Qi)."=".urlencode($N)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($A,$He=null){if($He!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$He;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($G,$A,$He,$wg=true,$Bc=true,$Mc=false,$Xh=""){global$g,$n,$b;if($Bc){$xh=microtime(true);$Mc=!$g->query($G);$Xh=format_time($xh);}$sh="";if($G)$sh=$b->messageQuery($G,$Xh,$Mc);if($Mc){$n=error().$sh.script("messagesPrint();");return
false;}if($wg)redirect($A,$He.$sh);return
true;}function
queries($G){global$g;static$pg=array();static$xh;if(!$xh)$xh=microtime(true);if($G===null)return
array(implode("\n",$pg),format_time($xh));$pg[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$g->query($G);}function
apply_queries($G,$T,$yc='table'){foreach($T
as$R){if(!queries("$G ".$yc($R)))return
false;}return
true;}function
queries_redirect($A,$He,$wg){list($pg,$Xh)=queries(null);return
query_redirect($pg,$A,$He,$wg,false,!$wg,$Xh);}function
format_time($xh){return
sprintf('%.3f s',max(0,microtime(true)-$xh));}function
remove_from_uri($Hf=""){return
substr(preg_replace("~(?<=[?&])($Hf".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$Ib){return" ".($E==$Ib?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($y,$Qb=false){$Sc=$_FILES[$y];if(!$Sc)return
null;foreach($Sc
as$y=>$X)$Sc[$y]=(array)$X;$I='';foreach($Sc["error"]as$y=>$n){if($n)return$n;$C=$Sc["name"][$y];$fi=$Sc["tmp_name"][$y];$yb=file_get_contents($Qb&&preg_match('~\.gz$~',$C)?"compress.zlib://$fi":$fi);if($Qb){$xh=substr($yb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$xh,$Bg))$yb=iconv("utf-16","utf-8",$yb);elseif($xh=="\xEF\xBB\xBF")$yb=substr($yb,3);$I.=$yb."\n\n";}else$I.=$yb;}return$I;}function
upload_error($n){$Ee=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?'Unable to upload a file.'.($Ee?" ".sprintf('Maximum allowed file size is %sB.',$Ee):""):'File does not exist.');}function
repeat_pattern($Uf,$qe){return
str_repeat("$Uf{0,65535}",$qe/65535)."$Uf{0,".($qe%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($Q,$qe=80,$Dh=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$qe).")($)?)u",$Q,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$qe).")($)?)",$Q,$B);return
h($B[1]).$Dh.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($kg,$Dd=array()){$I=false;while(list($y,$X)=each($kg)){if(!in_array($y,$Dd)){if(is_array($X)){foreach($X
as$ae=>$W)$kg[$y."[$ae]"]=$W;}else{$I=true;echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$Nc=false){$I=table_status($R,$Nc);return($I?$I:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$I=array();foreach($b->foreignKeys($R)as$q){foreach($q["source"]as$X)$I[$X][]=$q;}return$I;}function
enum_input($U,$Ja,$o,$Y,$sc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$_e);$I=($sc!==null?"<label><input type='$U'$Ja value='$sc'".((is_array($Y)?in_array($sc,$Y):$Y===0)?" checked":"")."><i>".'empty'."</i></label>":"");foreach($_e[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$eb=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$I.=" <label><input type='$U'$Ja value='".($s+1)."'".($eb?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$I;}function
input($o,$Y,$r){global$wi,$b,$x;$C=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Ea=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ea[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ea);$r="json";}$Fg=($x=="mssql"&&$o["auto_increment"]);if($Fg&&!$_POST["save"])$r=null;$jd=(isset($_GET["select"])||$Fg?array("orig"=>'original'):array())+$b->editFunctions($o);$Ja=" name='fields[$C]'";if($o["type"]=="enum")echo
h($jd[""])."<td>".$b->editInput($_GET["edit"],$o,$Ja,$Y);else{$td=(in_array($r,$jd)||isset($jd[$r]));echo(count($jd)>1?"<select name='function[$C]'>".optionlist($jd,$r===null||$td?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($jd))).'<td>';$Pd=$b->editInput($_GET["edit"],$o,$Ja,$Y);if($Pd!="")echo$Pd;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ja value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ja value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$_e);foreach($_e[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$eb=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$s]' value='".(1<<$s)."'".($eb?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'>";elseif(($Vh=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($Vh&&$x!="sqlite")$Ja.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Ja.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Ja>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ja cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Ge=(!preg_match('~int~',$o["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$o["length"],$B)?((preg_match("~binary~",$o["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$o["unsigned"]?1:0)):($wi[$o["type"]]?$wi[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$Ge+=7;echo"<input".((!$td||$r==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($Ge?" data-maxlength='$Ge'":"").(preg_match('~char|binary~',$o["type"])&&$Ge>20?" size='40'":"")."$Ja>";}echo$b->editHint($_GET["edit"],$o,$Y);$Vc=0;foreach($jd
as$y=>$X){if($y===""||!$X)break;$Vc++;}if($Vc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Vc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($o["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Sc=get_file("fields-$u");if(!is_string($Sc))return
false;return$m->quoteBinary($Sc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$I=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$C=bracket_escape($y,1);$I[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$m->primary),);}return$I;}function
search_tables(){global$b,$g;$_GET["where"][0]["val"]=$_POST["query"];$ch="<ul>\n";foreach(table_status('',true)as$R=>$S){$C=$b->tableName($S);if(isset($S["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$H=$g->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$H||$H->fetch_row()){$gg="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>";echo"$ch<li>".($H?$gg:"<p class='error'>$gg: ".error())."\n";$ch="";}}}echo($ch?"<p class='message'>".'No tables.':"</ul>")."\n";}function
dump_headers($Bd,$Qe=false){global$b;$I=$b->dumpHeaders($Bd,$Qe);$Ef=$_POST["output"];if($Ef!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Bd).".$I".($Ef!="file"&&!preg_match('~[^0-9a-z]~',$Ef)?".$Ef":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$J[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($r,$e){return($r?($r=="unixepoch"?"DATETIME($e, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$e)"):$e);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$Tc=@tempnam("","");if(!$Tc)return
false;$I=dirname($Tc);unlink($Tc);}}return$I;}function
file_open_lock($Tc){$hd=@fopen($Tc,"r+");if(!$hd){$hd=@fopen($Tc,"w");if(!$hd)return;chmod($Tc,0660);}flock($hd,LOCK_EX);return$hd;}function
file_write_unlock($hd,$Kb){rewind($hd);fwrite($hd,$Kb);ftruncate($hd,strlen($Kb));flock($hd,LOCK_UN);fclose($hd);}function
password_file($i){$Tc=get_temp_dir()."/adminer.key";$I=@file_get_contents($Tc);if($I||!$i)return$I;$hd=@fopen($Tc,"w");if($hd){chmod($Tc,0660);$I=rand_string();fwrite($hd,$I);fclose($hd);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$Wh){global$b;if(is_array($X)){$I="";foreach($X
as$ae=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($ae):"")."<td>".select_value($W,$_,$o,$Wh);return"<table cellspacing='0'>$I</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$I=$b->editVal($X,$o);if($I!==null){if(!is_utf8($I))$I="\0";elseif($Wh!=""&&is_shortable($o))$I=shorten_utf8($I,max(0,+$Wh));else$I=h($I);}return$b->selectVal($I,$_,$o,$X);}function
is_mail($pc){$Ha='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$cc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Uf="$Ha+(\\.$Ha+)*@($cc?\\.)+$cc";return
is_string($pc)&&preg_match("(^$Uf(,\\s*$Uf)*\$)i",$pc);}function
is_url($Q){$cc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($cc?\\.)+$cc(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($R,$Z,$Vd,$md){global$x;$G=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($Vd&&($x=="sql"||count($md)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$md).")$G":"SELECT COUNT(*)".($Vd?" FROM (SELECT 1$G GROUP BY ".implode(", ",$md).") x":$G));}function
slow_query($G){global$b,$hi,$m;$l=$b->database();$Yh=$b->queryTimeout();$mh=$m->slowQuery($G,$Yh);if(!$mh&&support("kill")&&is_object($h=connect())&&($l==""||$h->select_db($l))){$fe=$h->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$fe,'&token=',$hi,'\');
}, ',1000*$Yh,');
</script>
';}else$h=null;ob_flush();flush();$I=@get_key_vals(($mh?$mh:$G),$h,false);if($h){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$sg=rand(1,1e6);return($sg^$_SESSION["token"]).":$sg";}function
verify_token(){list($hi,$sg)=explode(":",$_POST["token"]);return($sg^$_SESSION["token"])==$hi;}function
lzw_decompress($Ra){$Yb=256;$Sa=8;$lb=array();$Hg=0;$Ig=0;for($s=0;$s<strlen($Ra);$s++){$Hg=($Hg<<8)+ord($Ra[$s]);$Ig+=8;if($Ig>=$Sa){$Ig-=$Sa;$lb[]=$Hg>>$Ig;$Hg&=(1<<$Ig)-1;$Yb++;if($Yb>>$Sa)$Sa++;}}$Xb=range("\0","\xFF");$I="";foreach($lb
as$s=>$kb){$oc=$Xb[$kb];if(!isset($oc))$oc=$fj.$fj[0];$I.=$oc;if($s)$Xb[]=$fj.$oc[0];$fj=$oc;}return$I;}function
on_help($rb,$jh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $rb, $jh) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$J,$Di){global$b,$x,$hi,$n;$Ih=$b->tableName(table_status1($a,true));page_header(($Di?'Edit':'Insert'),$n,array("select"=>array($a,$Ih)),$Ih);if($J===false)echo"<p class='error'>".'No rows.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$C=>$o){echo"<tr><th>".$b->fieldName($o);$Rb=$_GET["set"][bracket_escape($C)];if($Rb===null){$Rb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Rb,$Bg))$Rb=$Bg[1];}$Y=($J!==null?($J[$C]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($J[$C])?array_sum($J[$C]):+$J[$C]):$J[$C]):(!$Di&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Rb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$C]:($Di&&$o["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".'Save'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Di?'Save and continue edit':'Save and insert next')."' title='Ctrl+Shift+Enter'>\n",($Di?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."...', this); };"):"");}}echo($Di?"<input type='submit' name='delete' value='".'Delete'."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$hi,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃþÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ýÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒÞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Þn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1ÌŽs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŽŒFÃ©”vt2ž‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅŽÃžôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PÐ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛÐ889¤È ŽQØýŒî2#8Ð­£’˜6mú²†ðjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ð¼o(Úó¥ÉkÔ7½sàù>Œî†!ÐR\"*nSý\0@P\"Áè’(‹#[¶¥£@g¹oü­’znþ9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ðè!°üë*cì÷>ÎŽ¬E7DñLJ© 1Èä·ã`Â8(áÕ3M¨ó\"Ç39é?Ee=Ò¬ü~ù¾²ôÅîÓ¸7;ÉCÄÁ›ÍE\rd!)Âa*¯5ajo\0ª#`Ê38¶\0Êí]“eŒêˆÆ2¤	mk×øe]…Á­AZsÕStZ•Z!)BR¨G+Î#Jv2(ã öîc…4<¸#sB¯0éú‚6YL\r²=£…¿[×73Æð<Ô:£Šbx”ßJ=	m_ ¾ÏÅfªlÙ×t‹åIªƒHÚ3x*€›á6`t6¾Ã%UÔLòeÙ‚˜<´\0ÉAQ<P<:š#u/¤:T\\> Ë-…xJˆÍQH\nj¡L+jÝzðó°7£•«`ÝðŽ³\nkƒƒ'“NÓvX>îC-TË©¶œ¸†4*L”%Cj>7ß¨ŠÞ¨­õ™`ù®œ;yØûÆqÁrÊ3#¨Ù} :#ní\rã½^Å=CåAÜ¸ÝÆŽs&8Ž£K&»ô*0ÑÒtÝSÉÔÅ=¾[×ó:\\]ÃEÝŒ/Oà>^]ØÃ¸Â<èØ÷gZÔV†éqº³ŠŒù ñËx\\­è•ö¹ßÞº´„\"J \\Ã®ˆû##Á¡½D†Îx6êœÚ5xÊÜ€¸¶†¨\rHøl ‹ñø°bú r¼7áÔ6†àöj|Á‰ô¢Û–*ôFAquvyO’½WeM‹Ö÷‰D.Fáö:RÐ\$-¡Þ¶µT!ìDS`°8D˜~ŸàA`(Çemƒ¦òý¢T@O1@º†X¦â“\nLpð–‘PäþÁÓÂm«yf¸£)	‰«ÂˆÚGSEI‰¥xC(s(a?\$`tE¨n„ñ±­,÷Õ \$a‹U>,èÐ’\$ZñkDm,G\0å \\iú£%Ê¹¢ n¬¥¥±·ìÝÜgÉ„b	y`’òÔ†ËWì· ä——¡_CÀÄT\niÏH%ÕdaÀÖiÍ7íAt°,Á®J†X4nˆ‘”ˆ0oÍ¹»9g\nzm‹M%`É'Iü€Ðž-èò©Ð7:pð3pÇQ—rEDš¤×ì àb2]…PF ý¥É>eÉú†3j\n€ß°t!Á?4ftK;£Ê\rÎžÐ¸­!àoŠu?ÓúPhžÒ0uIC}'~ÅÈ2‡vþQ¨ÒÎ8)ìÀ†7ìDIù=§éy&•¢eaàs*hÉ•jlAÄ(ê›\"Ä\\Óêm^i‘®M)‚°^ƒ	|~Õl¨¶#!YÍf81RSŽ Áµ!‡†è62PÆC‘ôl&íûäxd!Œ| è9°`Ö_OYí=ðÑGà[EÉ-eLñCvT¬ )Ä@j-5¨¶œpSg».’G=”ÐZEÒö\$\0¢Ñ†KjíU§µ\$ ‚ÀG'IäP©Â~ûÚð ;ÚhNÛŽG%*áRjñ‰X[œXPf^Á±|æèT!µ*NððÐ†¸\rU¢Œ^q1V!ÃùUz,ÃI|7°7†r,¾¡¬7”èÞÄ¾BÖùÈ;é+÷¨©ß•ˆAÚpÍÎ½Ç^€¡~Ø¼W!3PŠI8]“½vÓJ’Áfñq£|,êè9Wøf`\0áq”ZÎp}[Jdhy­•NêµY|ï™Cy,ª<s A{eÍQÔŸòhd„ìÇ‡ ÌB4;ks&ƒ¬ñÄÝÇaÞøÅûé”Ø;Ë¹}çSŒËJ…ïÍ)÷=dìÔ|ÎÌ®NdÒ·Iç*8µ¢dlÃÑ“E6~Ï¨F¦•Æ±X`˜M\rÊž/Ô%B/VÀIåN&;êùã0ÅUC cT&.E+ç•óƒÀ°Š›éÜ@²0`;ÅàËGè5ä±ÁÞ¦j'™›˜öàÆ»Yâ+¶‰QZ-iôœyvƒ–I™5Úó,O|­PÖ]FÛáòÓùñ\0üË2™49Í¢™¢n/Ï‡]Ø³&¦ªI^®=ÓlŽ©qfIÆÊ= Ö]x1GRü&¦e·7©º)Šó'ªÆ:B²B±>a¦z‡-¥‰Ñ2.¯ö¬¸bzø´Ü#„¥¼ñ“ÄUá“ÆL7-¼w¿tç3Éµñ’ôe§ŠöDä§\$²#÷±¤jÕ@ÕG—8Î “7púÜðR YCÁÐ~ÁÈ:À@ÆÖEU‰JÜÙ;67v]–J'ØÜäq1Ï³éElôQÐ†i¾ÍÃÎñ„/íÿ{k<àÖ¡MÜpoì}ÐèrÁ¢qŒØžìcÕÃ¤™_mÒwï¾^ºu–´ÅùÚüù½«¶Çlnþ”™	Žý_‘~·Gønèæ‹Ö{kÜžßwãÞù\rj~—K“\0ÏÝü¦¾-îúÏ¢B€;œà›öb`}ÁCC,”¹-¶‹LÐ8\r,‡¿klýÇŒòn}-5Š3u›gm¸òÅ¸À*ß/äôÊùÏî×ô`Ë`½#xä+B?#öÛN;OR\r¨èø¯\$÷ÎúöÉkòÿÏ™\01\0kó\0Ð8ôÍaèé/t úû#(&Ìl&­ù¥p¸Ïì‚…þâÎiM{¯zp*Ö-g¨Âèv‰Å6œkë	åˆðœd¬Ø‹¬Ü×ÄA`6ƒlX)+d šð¾7 è\r ¾ ÀÚcj6êÍ\rp½\rÐÕ\r\"oPâ7Ý\rÊ\0Ð\0¾y ÇPÝý\rQ7ðóàZÑ4Q ççÚp/¨y\r±±##Dñ; ¾Ÿ¨<–gÀ\0fi2®)fÑ\\	m‘Gh\rñ#±n ßðí@[ ÊG‘\"SqmŠ¤\r€¿‘#è»(Aj¦ñqÑ£%ôÉÌ‘3qE‰„\0r–ÌÑ ¾Â›0ý÷ÑâšÝÍÎ.­ÓQ7ÑˆW‘É‘uÛ‘ð„õ ý@ò¨HúŒq'vsä0ê\nä+0®„ÐÂSGëpÜO`Ï\r)cÙ#ˆÂÒ‘¥R=\$€ÆR\rÒGÑ‹\$R?%2C²[\0ØÄ~²!±\\À‹pË#@¾ÒO(rg%’?ra\$‰±)r](²›&’?&Ñ#&R',\rqV3Ò\"Hém+àÈl’Q\"\0Û4÷\$rË,ñ’=’ ÍÛ&2;.²H@`è¯ÊÎa…§’ñ\$²_*RIS&ÈÐq ä_È1°1+1’ÅÀÖ ó3)2ÒV7•³2lòÚ„!1g-‘2f`Ò×,Qó7ñù0qgÓ]!q»óm6Š¦‹³_²M7 ¿‚Á7³o6Qîààókpý3³g9”ªs‰ 36ü\r©:S9Ó;— “\r9‘-\0ÆYÓ§0QÕ<b#<ÓÒw/ GÀ…>r\rÅß=3ï^&Q;Ñ£?q 0\"Á0HÐ™‘|¡áÓÊ–Sà˜i‹à@*ÓT­2ÙT#Žˆ «\0°C°’07]?‘Ý&ª›ÔE³…DÑ;:/½3ýE±5ÓËEQŒeÓËT\"©mž©ËÉ5‘E;óŸ´#=48ñò*Èò©ˆøLSÒ5HrñJE TO\rÔ…J´J“ÓJóÓÀeG)8B8©,&òGÊ²ç€è	Ðê›+M€¦ÊÉ²¬ë^*±¯ëGËÚ14ò6Ë\$.\"æ‹¢ïI4w!\$L Ü8bêA2ûLÃ'M?MFú\$Ü,´à“ðNr´ê/4ïBJÚÂ¨");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n8œÅ3)°Ë7œ…†81ÐÊx:\nOg#)Ðêr7\n\"†è´`ø|2ÌgSi–H)N¦S‘ä§\r‡\"0¹Ä@ä)Ÿ`(\$s6O!ÓèœV/=Œ' T4æ=„˜iS˜6IO“ÊerÙxî9*Åº°ºn3\rÑ‰vƒCÁ`õšÝ2G%¨YãæáþŸ1™Ífô¹ÑÈ‚l¤Ã1‘\ny£*pC\r\$ÌnTª•3=\\‚r9O\"ã	Ààl<Š\rÇ\\€³I,—s\nA¤Æeh+Mâ‹!q0™ýf»`(¹N{c–—+wËñÁY£–pÙ§3Š3ú˜+I¦Ôj¹ºýŽÏk·²n¸qÜƒzi#^rØÀº´‹3èâÏ[žèºo;®Ë(‹Ð6#ÀÒŽ\":cz>ß£C2vÑCXÊ<P˜Ãc*5\nº¨è·/üP97ñ|F»°c0ƒ³¨°ä!ƒæ…!¨œƒ!‰Ã\nZ%ÃÄ‡#CHÌ!¨Òr8ç\$¥¡ì¯,ÈRÜ”2…Èã^0·á@¤2Œâ(ð88P/‚à¸Ý„á\\Á\$La\\å;càH„áHX„•\nÊƒtœ‡á8A<ÏsZô*ƒ;IÐÎ3¡Á@Ò2<Š¢¬!A8G<Ôj¿-Kƒ({*\r’Åa1‡¡èN4Tc\"\\Ò!=1^•ðÝM9O³:†;jŒŠ\rãXÒàL#HÎ7ƒ#TÝª/-´‹£pÊ;B Â‹\n¿2!ƒ¥Ít]apÎŽÝî\0RÛCËv¬MÂI,\rö§\0Hv°Ý?kTÞ4£Š¼óuÙ±Ø;&’ò+&ƒ›ð•µ\rÈXbu4Ý¡i88Â2Bä/âƒ–4ƒ¡€N8AÜA)52íúøËåÎ2ˆ¨sã8ç“5¤¥¡pçWC@è:˜t…ã¾´Öešh\"#8_˜æcp^ãˆâI]OHþÔ:zdÈ3g£(„ˆ×Ã–k¸î“\\6´˜2ÚÚ–÷¹iÃä7²˜Ï]\rÃxO¾nºpè<¡ÁpïQ®UÐn‹ò|@çËó#G3ðÁ8bA¨Ê6ô2Ÿ67%#¸\\8\rýš2Èc\ræÝŸk®‚.(’	Ž’-—J;î›Ñó ÈéLãÏ ƒ¼žWâøã§“Ñ¥É¤â–÷·žnû Ò§»æýMÎÀ9ZÐs]êz®¯¬ëy^[¯ì4-ºU\0ta ¶62^•˜.`¤‚â.Cßjÿ[á„ % Q\0`dëM8¿¦¼ËÛ\$O0`4²êÎ\n\0a\rA„<†@Ÿƒ›Š\r!À:ØBAŸ9Ù?h>¤Çº š~ÌŒ—6ÈˆhÜ=Ë-œA7XäÀÖ‡\\¼\r‘Q<èš§q’'!XÎ“2úT °!ŒD\r§Ò,K´\"ç%˜HÖqR\r„Ì ¢îC =Ží‚ æäŽÈ<c”\n#<€5Mø êEƒœyŒ¡”“‡°úo\"°cJKL2ù&£ØeRœÀWÐAÎTwÊÑ‘;åJˆâá\\`)5¦ÔÞœBòqhT3§àR	¸'\r+\":‚8¤ÀtV“Aß+]ŒÉS72Èð¤YˆFƒ¼Z85àc,æô¶JÁ±/+S¸nBpoWÅdÖ\"§Qû¦a­ZKpèÞ§y\$›’ÐÏõ4I¢@L'@‰xCÑdfé~}Q*”ÒºAµàQ’\"BÛ*2\0œ.ÑÕkF©\"\r”‘° Øoƒ\\ëÔ¢™ÚVijY¦¥MÊôO‚\$Šˆ2ÒThH´¤ª0XHª5~kL©‰…T*:~P©”2¦tÒÂàB\0ýY…ÀÈÁœŸj†vDÐs.Ð9“s¸¹Ì¤ÆP¥*xžª•b¤o“õÿ¢PÜ\$¹W/“*ÃÉz';¦Ñ\$ž*ùÛÙédâmíÃƒÄ'b\rÑn%ÅÄ47Wì-Ÿ’àöÕ ¶K´µ³@<ÅgæÃ¨bBÑÿ[7§\\’|€VdR£¿6leQÌ`(Ô¢,Ñd˜å¹8\r¥]S:?š1¹`îÍYÀ`ÜAåÒ“%¾ÒZkQ”sMš*Ñ×È{`¯J*w¶×ÓŠ>îÕ¾ôDÏû›>ïeÓ¾·\"åt+poüü–ö¶ÅW\$ãÜÍûQá”@Èƒ3t`¶†˜¶-k7gæä ]ÓÊlî´EÀ¹^dW>nvÀtölzPH¨—FvWõV\nÕh;¢”BáD°Ø³/ö:J³Ý\\Ê+ %¥ñ–÷îá]úúÑŠ½£wa×Ý«¸‡ñ=¼X®ò†›Nû/ŒÐw“Jñ_[át)5ô½ùQR2lž-:›Y9Ó&l R;¯u#S	ý ht kÏE!lØúÔ>SH€ÀX<,ðO¸YyÐƒ%L–]\0ž	‚Ó^ßdwÐ3í,Sc¡Qt˜e=‘M:4üÿÔ2]”êPîTÃsŽÕn:©ºu>î/Ÿdœ¼ Þí´a‹'%è“íÝÁqÒ¨&@ÖË•ÁîŒ–H·Gâ@w8pñÀœÁÎ¤Z\n«Ø{¶[²t2„Ãàa–´>	´wŒJî^+u~ÃoøåÂµXkÕ¦BZkË±ÃX=ÈË0>ªt¯¢lÅƒ)Wb€Ü¦øõ'ÃAÒ,áím†Y—,‹A’ÁñŠeï#V¹ñ+n1I©ÎÊÁE+[âüïØ[¯û-RšmK9Ç¹~ã‹÷L€-3O˜ÊÁ`_0súËL;›°¸Âà]6õ¥|¤‡hÿVÇT:Š‚ÞžerMÎÉaõ\$~e‘9¥>ááãˆÁÐ”Á\rÕÊ\\”ÁôJ1Ãš¼ÁÐ%¢=0{ö	ŸÌç|Þ—tÚ¼“=¾Âó€Qç|\0?õã[g@u?É|Äö4Ý*‚µc-7Ñ4\ri'^ÙÑå¿n;œú»ù‰Š¦(»á¦Ï{KÇhñnfµïÚZÏ}l³èêçÅ]\rä”þpJ>Ñ,gp{Ÿ;Î\0µ½u)ÚÕsèN‘'ýÊçãHÙøC9M5ðê*ø`êk’ã¬Ž öþ©AhYÂ©*–©ªŠjJ˜Ç…PN+^ D°*¸«Ã€îÐ€DªÚPäì€LQ`O&–£\0Ø}\$…Â6Zn>²Ë0Û ÜeÀ\n€š	…trp!hV¤'PyÐ^‰*|r%|\nr\r#Ž°„@w®»íÐT.Rvâ8ìjâ\nmB¥ïÄp¨Ï úY0¨Ï¢ëm\0è@P\r8ÀY\rGØÝd’	ÀQGP%EÎ/@]\rÀÊÀ{\0ÌQÔàÀbR M\rFÙç|¢è%0SDr§ÂÈ žf/–àÂÜ\":Ümo²ÞƒÂ%ß@æ3H¦x\0Âl\0ÌÅÚ	‘€W ßåÚ\nç8\r\0}®@žDÉñ`#±t‚ä.€jEoDrÇ¢lbÀØÙåtìf4¸0€À¤%Ñ0’åÒkªz2\rñŸ îW@Â’ç%\r\n~1€‚X ¤ÙñºD2!°ôO‚*‡¤²{0<E¦‹k*më0Ä±þÖÎ|\r\næ^iÀ ¨³!.§r ò §ˆüÌöèîfñòÄ¬Àù+:ŽïžÅ‹JúB5\$LÜèòP½ìÒLÄ‚«à¶ Z@ºìêÌ`^PðL%5%jp‘HâWÀðonøökA#&ö’8Ùò<K6Ì/–ù²ŽÌ¢ÌíäúòXWe+&›%ÄÑ²c&rjíñ'%Òx‚²°¾ÅnK¥2û2Ö¶‹làê*á.ürŽÍÎ¢‰‚‚*Ð\r+jpBgê{ ²ž0ë%1(ªŠîZ‹`Q#±ÔŽân*hò òv¢BâÏðÀ\\F\n‚WÅr f\$ó93äG4%d b”:JZ!“,€‰_ ûf%2€Ë6s*F€Ñ¨Òº³EQ½q~²Ž`tsÖÒ€‘’‰(`Ú\rÀš®#€R©¬°±R®ró¶XêÞ:R›)òA*3¿\$lË*Î½:\"XlÌÔtbKÝ-„ÂšÒO>Rõ-¥d¡Ç=¤ò\$Sô\$å2ÀŠ}7Sf¹â[Œ}\"@È] [6S|SE_>¥q-ä@z`í;´0±óÆ»ËÁCÑ*¯¦[ÀÒÀ{D°ÞjC\nfås–Pò6'€ŽèÈ• QE“’æN\\%rño÷7oúG+dW4A*€Ð#TqEÎf•¾%ùD´Zæ3–§2.ì‰ÅRkâ€z@¶@»E³D¢`CÂV!CæäÅ•\0±ÔÛIþ)38ŽŽM3Â@Ù3L‡âZB³1F@Läh~G³1MÄÑÑ6ñ‚Ó4äXÑ”ò}ÆžfŠË¢IN€ó34ðÀXÔBtd³8\nbtNãàQb;ÍÜ‘D‚ÕL\0Ô¯\"\n‚žßäVÑÍ6ÑÀ]UõcVf„ñÅD`‡Mñ6ÓO44sJ•‹555“\\x	Î<5[FÜßµy7m÷)@SV­ÈÄž#êx‚Õ8 Õ¸Ñ‹¬£`·\\`Ý-Šv2²ýÕp¥œ·+v§€ûU«­LêxY.¤ž‰›\0005(ž@òð´â°µ[U@#µVJuX4íu_ï\"JO(Dtý_	5s½^ õ¡ƒ ÑÅÄ5·^»^Và¾Iêæ\rg&] ¨\r\"ZCI¥6µÊ#µÎ\r©¨Ü“‡³]7´ qÕ0Ùó6}o¾’—`uš€ab(ñXÓD fýMÖN)ýVÕUUFÐ¾ø“=jSWiÅ\"\\B1ÄžØE0¶ µamPÀí&<¥O_ŽL–ò‘Â.c1Z* ÀR\$åh¶ùmvý[v>Ý­íp•ˆŠ(åË0ð˜°œcP£om\0R´ýp÷&‹w+KQs6†}5[söJ£Õô2µù/€úàO òV*)ËRµ.Du33–F\rÂ;­ãv4ÙµþHù	_!ô­2Œµkª¦»+ª»%ð:É_,ÔeoèÏF¨ÌAJ¶OÈ\"%¬\n‹k5`z %|Ã%ÄÎ«g|ÀÏ}l¶v2n7Ê~\0Î	¨YRHúË@Öír’­xN-Jp\0ð¼‚å‹f#€Û@Ë€mvÔx…˜\r–ü–2WMO/°\nD¯Û7Ï}2ð’òäVWãWèêwÉ€7å€ñËHÆk„¨ð]¸\$ÔMz\\òe.føRZØa†Bä¹µ QdÍKZ“àvtÀØ€w4¯\0æZ@à	÷ôBc;Îb–ã>ÚBþ	3mÍn\nëo ÏJ3”ækŒ(Ü£‚\"àyG\$:\rØÅ†èÝŽ“G6€É²J¥çyÑñQö\\Qú÷if÷­Þø©(ïm)/r“\$ùJÅ/HÌ]*òò½ó‡g¹ZOD÷Ñ¬Šƒ]1Îg22˜¿±—ˆï«fÉ=HT…ˆ]NÂ&¦ÀÄM\0Ö[8x‡È®Eæ–â8&LÖVmœvÀ±ª”j„×˜ÇFåÄ\\™–	™šž&sá@Q™ \\\"òb€°	àÄ\rBsšIwœ	œYÉœÂN š7ÇC/&Ù«`¨\n\nÃ™[k˜¹´*A– ñTÏV*UZtz{Š.‚çy˜S‰ š#É3¢ipzW@yC\nKT»˜1@|„z#äü€_CJz(Bº,VÔ(Kº_¡ºdO—©€Pà@X…tƒÐ…¦ºc;úWZzW¥_Ù \0ÞŠÂCFøxR  	à¦\n…„àŽº°PÆA¡è&Žšš é›,ÖpfV|@N¨\"¾\$€[…i’Š­•¢àð¦´àZ¥\0Zd\\\"…|¢W`ºÆ]ºÌtzÐo\$â\0[°èÞ±uežçë±É™¬bhU-¡‚,€r ãLk8§ Ö«†V&Úal§ØëàdíŒ×2;	 '-¡¶Jyu—›a©µÝ\0 ÷¨•a£{s¶[9V\0´‡F«‘R ÂVB0S;Dº>L4º&‡ZHO1…\0ÊwgÊºS¥tK¤¨R…z¦¨Úi¼Ú+½3õw­§z’X¢]¨(G\$°¨¯ªD+°tÕ¹á(#ª”©™oc”:	ÀàY6¼\0–è&¹¼	@¦	àœü)ÂÒ!›‡´¦w€»œ# tÐxºNDóÀ•Äš)êõC£ÊFZÂpÀÄa—Ä*FÄb¹	¯ƒÍ¼ÀŒ£ãÄ£ù¤åçSi/S¼!‡€zéUH*Î4ºë¤ËÙ0ùKÀ-¸/“­À-k`°nÜLiÊJë~ÂwàJn¾Ã\"í`Ó=ìØV¶3OÄ¯8tä>µûvoëâE.®ƒRz`Þ‹p·P œÔE\\ÙÍÉ§Î3LçlïÑ¥s]T‘‡‡oV¯ñ€\n ¤	*‚\r¼@7)¦ÊDüm0WÝ5Ó€ßÓÇ°¨wÝÔb”ÈÝ|	Ç¼JV¼èÀœ\"‚ur\rä&N0NöB¨d¦ËdÐ8îDð¨€_Í«×^Tö®H#]„dá+úv€~ÀU,ÐPR%ñ‡…ùÉÒßxÔÕÁfAÁ»CÁümÀƒ»Í¸·¹’ÛcÃÇyÅœD)ú›ÕuHà÷ßpþpª^u\0èéˆ°²Œ}¡{Ñ¡Å\rgäsÇQM¤Y‡2j\r—|0\0X×â@qÍŒ•I`ö»5F6±NÖþV@Ó”sEïp’õ¬#\rþP¾T÷–DeW†Ø¼ñ›­ãÛz!Ã»çž:üDMV(¢©~X¸9£\0å£@˜¿­40N¬Ü½~”QÐ[TÜÄeþqSv\"Õ\"hã\0R-ühZ³d—ñ…ÀÜF5´PèÓ`³9ÂD&xs9WÖ—5Er@oÌwkb“1ðÝPO-OþOxlHöD6/Ö¿­méÞ ¾²3¥7T¨KÈ~54¬	ñp#µI”>YIN\\5€Ø‚NÓƒ­‡—õMûòpr&œGíxMÈsqŒ€—ø.Fÿ–Í8§Cs±Ž h€e5ÄüÒÝð°±ò*àbø)SÚª¾†Ì­Ùeú0É-Xú {ú5|±i–Ö¢a‚ãÈ•6z‚Þ½ƒ/Y‰³ÿÛŽM¦ Æƒì Ê\nR*8r oø @7¡8BfåzùKÃr‚¹øA\$Ë°	p‘\0?…ÿ d¨kÃ|45}ÀAÿÃ€ØÉ¶óW¿ñJÀ2k Gi\0\"¡€žÀd€èí8‘\0 >móÂó `8¯wÙ7Éo4âcGhœ±QÐ(í€¨Ö8@\$<\0p¤Ò0³÷˜L¦eX+„Ja€{ëBÒà´h¶Ø8èCy„òêP2ºÓ®Ÿ*ÓEHê2½ÅÝDqS‡Û˜ïpŒ0ÙI‚²ƒk½`ÞûSí\nâÂ›:éùBœ7Ûàèð{-™ÂôÐ`î€õð…6¸A W¡Ü–\rþp†W#ôä¡?¹þ¢{\0Ðßô¼ØÎcD œ[<„Ðfà--špÔŒ´*B„]„nW°²^Ž R70\rã+N¨GN³\$(\0±#+yó@Þ@iD(8@\rÀhÊÕHˆHe¢¥ÐÌzzÀ{1é…À°h„ÙW1F°Who&aÉœÞd6¡½Ýjw˜èÉü»¥Â`h{v`REÝ\nj†£å`êÜ·¾ÔÇÆ*Üˆ°Ê¸}ªY¡ñ	\rY‡H¶6¥#\0ð¥å»†êÞa¼Á Q¨HEl4ýd¤ÜípëÚ#™†¨ƒ¡¨oÓbr+_)\r`‚Ð!Ð|dQ•>ª¹=QÊ¡€âÎ¶×EOB'‘>ôPì®ôÓ¶Ø A\rnK‚iµä 	ŠÁô„	ˆ%<	Ão;‚S„@ã!	²x’à:ˆ†ÝA‘+\\1d\$ùjOœÉ7š%Æ	å/Šœ¶’gu„z*°G‚Hê5\"8–‚,Ÿ]raq¨«î/ h‹ø#Ãõ­\$ /tnÍö8yºÝ-®O‚ý˜H±bÔ­<âZ×!©œ…1¡ì`É.(uo›À…­|`GËSèÔBaM	Ú‚9ÆžîD@£õ1‰B€tDÐøÊ¡@?o©(H–‚qC¯¶8E¼TcncRÃ‚6©N%¼rHj¾à2G\0‰a´¤q ™rÁÇz9b>(PãŸxèÇ<÷)ôx#Å8óèª¹t³ˆÕh„2vÇñWo2UëÎÎt³˜+=Àl#êóÏjþD¥	0¤å‹›&R£cè\$•*Ì‘-Z`àÀ\rŠê;Ë|Aùpà=1Ô	1í•íÆˆ¨bEv(^€X¥P2=\0}‚W‘ˆ÷G¾<°šÊG¡¹‘øøR#PƒHÜ®r9	£ƒYû´!’LB¤‘‘4€NC„ZˆîIC´‘ÔMLm¢Â,Áf@eY x›BS(Ó+Ø<4YŒ)-Ø\rz?\$à€Ü\"\"º 6ªEù\r)z‘’Ä@È‘¢’r„¤*åƒæJÈìœ‹Àˆ%\$ùeýJû˜‹\0Aå\$Ú°/5ÕÑB0Sô¤œxº“IºQ)ó•<¦¬4YS‘&‘{Š¼bã+IG=>¡\rPY`Z¸D•`¦”U²¢ªF1€Šø4d8X(ÃÀ°úC%Ž`ãœ­0ËI\$ƒ7WÂpÇ,™œAcÀ–é&ÔŒép\$:å>]Ô.†VY²É\$pð ¢Ò]ôé`;ú€eú\0Ö0ã\nªØK+Û@DLáS€ˆr(on°M\0@9§É%ƒ\"”WSÈ\"¸ÍßÃ ä¥™ÊÙ©Ø»j¬_J-ÀörÊœàÉÞ5Ð\\ý2€5>Ze\"0°Œ%9y¦^®WMax&a)D«LÀ¾³2Q›’¼ýt? =,À/o¸f…3I¢Jž\$\r;ð€¸7ñ}Ä\r“W @¸Ò°•M|\r³YšØÂ]5ôœ\\*s:ŒÎFV!€´àkÙ†ÌRóý…L3LÂ	Š÷52°M€sb›\$ÒÂÄô7Ž\0lÂy˜¬à&¾ 9Í|m!¹œ0J€ç4ÀÌTSd—¹äG’öÑnKéV:l¿D'/ù:Zsòÿ\n¿…yè%¼–iüðÍÖ,@Ò²L ±j1<Í3Ä¨“D2/;šæ'PÝ»ì±œ‚`ï“æÓqKÈ°¬fIäLÕ DÝ¬„4¦3 ³’OHóJÚ	q&”÷ˆ’‰Xì¡!¨ôr)FÀXx¹à^QwOP”Êh•ÄÕž-_…>Äa£°±(	„ãx%£™K‚bð<ÉEƒj7‘„ÞÌö¬†hHt“`Ž.r‰P‡ˆØx ï\"{\0006CVQE‹&€Å>éÞ…Žwé³–e'?BÔ9x§>:\"ƒ73 ¤ŠxT\0e”óåšj	Å…[tèÒœ\"ä(\\Ke¢zÆr¸€õ–e> “ª«\0002hÊ‡¢­X¬a<”JtU¢z`µé”?ëë#’ûìº2-¼®4hFY|Cþœ\"MÉyÆ”Kd ½–“EÕ7¦¼“+(U²Ê–XöÔ /DºñÞ)å\"Œ¶²‘Ø¨Þ‰joh¡Fz4tàËìD×ŒëG‡õRZŒÄ‡¤È¿\0ÅFV4QÑ6v£bûi=G¢;Ï¬‹kÌd+\n>ÆEœÊ\0ã2f{‰‚âß!J”¢QìšJØ˜9Í(2ó#\\Zéü,–ÑQÜ¥Ž3?8`â	bwR6àÙ\n*ã‹€©Æ’ù(tþ§L*ôS¡d¤\0x’) (Œ*„wH]7O±N‚v(Ð“dg€q	\nLp„ÐL„N‰ÚH@ð1‘œóäM ±		nÔúz‘ŽŸe4!!	€º'æ§-t£ë°ÊAQPº‰ùL,„“¢ã7»„\\Ûií™åÀ^À\$, |Z¶€(S9©ë…à\n* +ª˜TÊD„z?(TÍ>„×L¬¦Ã¦šòRüÂ¨°\$äzÐ´iÌ¼WÍ¨€DsÒ{)Ô@ … ÄÁ	vùPäÀgáqIVÒ¨€€·á\n )Æ! 8|\$pZã*ú!7A°˜ôÎNŠÉjïNW£ˆ€U¬§ÛQú–¤)üeFšUA“S¥x\0[Nˆð£2º·ðX :SÏT„~ÆS*T4	¥3ªÎ]9ÕF¥Œ©]:–KUg;¨ü*AyÝaÀá1j|8Î«ËÀ­IÄMR“ÂVh7uU¦ºì„r,‘h…%<q¸R@N9äÞ§Àk­	ÀB|¤™¾„8’–r •»‘ØôDÐ @\"„É‹¤z\r²¦ä”ô„OÀ_Èª§QÑ\0\0®¿À|¬]€fá\nz£¦º„ UeHÄ„/k+ÌTF?‘°*03†!­\0·’I™£ t	f\0(Så¡UÐëZA¸F°ª1\0 ÝkŽ]ùîWZNÆQ¬„Ü‚‡‚¡%É°x1„Ù'ªÌ!-,×Ç¶vzg’Å#ŽGhÞ;fÛPH£9Bj uø\nÙAÑVRŠ“ª1K+œMN!²åSÎ¼äÍYˆ½vdZ\\,Îÿ“gÙ¨Ÿ±²ýœ\"}W¡ÆYÉµöt±Pšá¿g‹,¸ÝËÛà	\0bµ-·hB/@®ÌŽ€/ˆMìñ´JØÀY\0”ÐëÛ)\nÜæI±?vÒ	¨ÑÈ”1¦”\$Ê(‘w\r+ôn á®äsµs¬QfQÇO‘Pö.Dú¡¬bV\0-ÇJ<‡i;[¢¬—=#ÑÉn,j?)à\" ¼”lYL.±¥¥„A::úˆ¤ÿªBxOF7æ€´ð`Üú’dØ¢}â}=Ói)@Ðº‹é\$ qË·(y%ŠŒhuzb2á3Æ§–†.à-hÉoOà€¢¬\0`¸‘êVZ„Ü&yît9C–“¡é‹­Z¹¸Ò‘€Z!àXãUœ¸ºÓ.k´ìV#8¡G€}»Q¤áu8cÎ«t¤bE>¤v§Â{@{QP]<§aryŸÉj\\ÀÎ\$jºxænc6k©;qsçT˜¼ÌK¾ …“€jJ±ŸÕn\\C©{Ö®Ð`gð°„6›5ð¯RkétêáÔò½·s•|@ë_0Î…5:BØ3úøÏÁrÑ¡È&‚ã´¸¸\0Ò»Ÿ‘&¤×ˆ°ŠíøœÔ¡žò‡SXÊ•÷G«mžÊ¶Wr,j‹q\0\$ÞºsW½Pî.A\n4À9(uð£.Ðl’VãJuíÔŒ‰+ÝAœuC“>hl6óÞ2•‘ðGÌeÔÉNâ›Än¯=»'ÅÓ~ù´Ãžó©â«PÒ€É%0zžuøÚrß\0À 9uEÒs\"²þß\\Í×˜º­ç¶^ûúà(3ÂÕ‘S%<+ì9åñÔ¾Û×«€\0þ…Ú~'Ìž÷Ö“<+ó,iá:´È@˜›Nû \$Øoõ²û™Îø ¨]ý§ž’Õê»Zâ!ý¿]ûn,Ëøxìõ>_Ôf‘éW\0006‡Ä%ò}I\nhß€wâÀãúÇƒ -¡´H@_¶Vi„œ“‰{ªÆüRÓ÷^†Û”}5žb,!5àÐHˆp/šÉk<­¢<¬jh|i åk‚áhLvÝ„\n¾`¢[à€¬WC6Âíz\n¢g•âr×öu=¡˜!zCÅ£ÊÔîŸe#€Ûnj…Î\0`^;=Eî*@Ëy¨% ˆôLQeÓÀèŒ2­A1,µòC¤ixðtƒÒ G­]qìO(Ä™±\n³V9dráD'5@x\$‹r6‰’;\"Ç££ç¨7Ã\0M0Å†H_#äcàpn>­¤<aa­q@gÖ2±ƒlm-Ï£¶Æú¤±Â8âø?8Ä†7p¼¹Ôä>˜‹jiµêñNú\$#E/¥0˜µs\ní»B\r *Ûðz·ášoyn[Î™¦Ý 6·a¦©ô£g8ÝqCØ·â¼œªIá¹rNF›È«•1ÀŸ70ÒÅñðØ/i(ÉBâ0§à˜¸ZÁº(ïÌ+SöJÒ,–ä¼91/Y+jxÓ±F„±ÐAÉãkòfÂJee\r¹CÍ³rzï…m”ÊÖh@9é°OÈ× Øì‚ÙGK™AdÆÐÇOH’Ùê=· Ò<&`ð‡K¦PAÈ!WO;-ÑXŒL…çmå’Kzá7-e[u¼”p¨qÈýŸo/œ`C’‚„KX¡fîið¯ÀY7=…Mæ/ªFÖRÅÛ”TødùïY\"=`Â1¡k’1Õh‘\rí˜Ôðf@N˜“zè(@ó‘„ü³	hü\0ÆçäÝÕI»}PJKrì’ˆpR`x¸¦÷ƒü¨fo¢áË(A€¿[—û19¥(&jo<·¬I@p	@Ðó³„üä¼ï,yÌ	nIs^ÐŽÑ«:Y¤Žvc•šØ9q.C¤8übW¡–V?ã×Ò…²9 \$ué@5#S(4Y‘ÉÆK…“§6¿!ëáN6<õ|v1­å§3ÊŠ:³ù!˜ÔáÝ`ÈõM‚Þl›”¬¦f`šZ§ÍJ=±±GXóY)_lÊÐæT¶)P•™`æ%ìÚ:È!Z\"lYSöUØ¤(ßÅY1Z¡ë‹ˆrv)F`æK~=Y>¹»šSÑôšc®äÊé!lÄ•ÄDèÀ‰ÜBrF\$ÄìRA:Í\\ŠP¡4ÔVÕR6<ŽOºSÒ_BCS+”„†ç'Vˆþ2T#LcìF»NBD%ÿGüWñnRéSÈê„·IœŠ\n'k‰0­Âˆˆ¢O¨ÐŽáêö…8rÝ¯ASí?ŠæxmÇäyvëÐ¿aŸbû¶Í°á,¨íÐ…A”¸ˆ¶†Î]pJ\\\\ÖXiØ­ë‰Eu‰ûB)ðª ÈõZ@Î \"œÈgg0{©•nêà'APR«‰Ù¨vÓ~º0Rýwì€±\"‡½õ·‰´€HŸJø®ÒÎ–Ù\\›\r}i?ã‘Ò’:«†2¸ÝÏg€¼{Iü3)ÝáB©ÑÍ™Z÷s£à`.ì#2ÀvtãœX³IGU>`)Ì%àÀº(|ëf<Îš_ÏÞ¯€Ï‘_GÞ<‘»_ ËŸˆ†ŽÎø‚[:¦6G8°ÈlÜ#J(ø¡JC—¥î`†ÚÎwFÀw\"b !,´!Úrê@ÜK(§€¼\n@AsVÀùS«Ö¹Ö4û_\nsÙ eÚ‹j¶þ)&Ê3Þ{ª‡kÀáâQ—³G³cûÛX^L{ñC\nïmùÛèA¶æDÜû1O?(êÜ(°¶ÿ·è2\"UL‹Å+#o”¸@áÙçXÉ\0ÜÙ­²¦¼^n_pëeQË™X}%²¿*ÒÀe’mõ{ˆGN‡ÅXlÃqé]R\\Z‹v!¹) ö°›xdÎ€,ÈcK¶Ïé®‡ÇmÍôÍI~Œï†ØÝK‘{+¬ÎGÝ¥ê=@QÓÖ,1!aEOc›À#6<uÚrB¿\n¦È²†ÔdH‰t›ªõõ	¶{Cî<x3ˆÙèHª£1¹ŽKœwBˆ\0´„u‘¨²'Ó†Qƒ^‚¼ò•¥‚…içrRvôVÉ·¹lSß.O)Õö™[±ªxSÝtöŸÅc)¡…¿k¥B‡Õ+¯Àv“çúB¤‘w™.øwCÁ˜‚2¡ªÝ2d¬.HÁÞp+a\\H§·[Á\$}nNN7Ÿ•H’.ßS\r¨È’TÁÂ²w†	*HÆg\\Þ\$Ù,©:KBOx»†>ðÎþ¼5äƒðîÓ¶˜…‰Àu2Çnë½¼`œŠYqÆD´ÂãxwMBŽn•2>ÇGÚÚ„…ŒÆ‘YaKâw(2`˜…†Úw¯©Œ‹1mº-:™&LD8îU”œ8l÷Á\\<ŒÅã	°«zùa‡•”:,ªK'¸%7:ï’ú˜MýÇˆêU[žüø*;K¶’Íjª;/wGü“ˆ\nù†§^…eV'ŽÇ,«É;¡¼B6ŸG¤1ÃËOKW”ÒÕø(iÑX\npí±CÚ©c6’^ñ˜ã·€=¡^Ã»cQ±ÀRp`\$	ÀD(\0D£>{ñ¦ETïcÂI\r{þ„ç†\$o‘R	ÄZZÈ4*•Ã??¸+jõ¼ðn›¼Q`ÍîóÅXº3‹	\$âÑ¸M’\n×‰w¦\"dáW¸þ–~@’'¡IÎá­«ú0+-ª±w–ÝäŠyÅ6§vÈ½'ØÔ†:Y)Y0\0±*)?'ú«Çžv§¦ÉfIÚ\néžÂzÐ9ñ.ñb¦×!¯c•E°[¤ÒFéº™ksÞ}ºùBv¦gñ5ÝV‡”Â,)J\$«ÂjÇZŠJ¥\$ˆY„Ä×—9þ\0œ\n‹ú™¼.^J•’Ú‹±bÖìmI0:gúý§ÿ—’†Ë—ATPÇIù]~!ý‚;D­ºÂèå	°z½¶<P»Q>ƒm»‚Þ`ùÊ?%Y•T\n\0D\0Š\0'†”H@0`À<×­È10à(®mê-¬‚Éž7A\0À~š~ê¡Ä¤?t’hÑ”.w%)0	#c«ªï\"ÌcÖï´àjfWéþ\0\0p¥CûœkCÄæ8Âç85+i:¾ò[„8òb³ïlÀ[\"¹³µä5S§y\0èäïÁ*¤Qî”6VñsÀ9»7!­;\"½Åcæ)„OìQ,óÛÔ±©†\r¨7í,*†0aQ©u?ç_C|åÝ¢‚÷Š´R(o(¦<j(¿àTv° \rî‚›|_\"³3úæm“âS7DÄ!×¸òhî|ž¡Ÿ(Ã&@:ò¼	\"-ÞŽùø&Mu;ê,ÀbÐº=p>A6É­®®ä7€»à- WW9âO,½o'ñv2×<€3\0õ÷ hû¯@`ï 3TX¾Ïš|Ù\"FC_ÌÂ~xäüØÌ`Å¸'f¤Q-4šû¡Îú/Ò`'ôª©=Aú\$>‡ô`PßÀ_G(–žEŸ¤&/JÁIàv'¦mé¤§zpÞžFo¨	ê/[úåiðØ‹…G*ƒ¾y¡(ñ¾<¡ãŸ7qëY .öçœªÁçBµ¥™\ràl´r\nUnÆ§ùT>ÖóÍûäÔÿ	šQ©ð÷_Ÿ|Áï×ÂKÚå8óÚ‰ýeçá_¯ÞxzõxLÔð·p14õødý‚¡¼U#4tÐKô¹ý\$í!û§ààp”w²‚ƒð¯Zxôè³_£…ñïi5T?}ðËC¡î‘‘{ÏÈþ¥öh/Gzj\$.BçÒ¨™=#èÏ|í†ÿ*¨‡ºýIë©ôw/¾Àaîx`*©ª*³è]ý¤å©>a?'}FJSÜïÖÔ–A0ÿá'À½ïðëÊŸö0:63Á¯·Ð»ýõn'ãî…’U/Ör’|=slb0ð¦\0WêšrB—Ê¤‡™¦@TšÐ~\$ŸˆüHŸŽ÷ÿ‹	”¨D\\ü©ê-øÄþ(ÿŒá©–Bé—MÁÕz+ò%¹(‘êiÓèã¹ƒ¯I”¿…5/è.y/öº¾\$À{Q}p‹Ü»dI†\\ÿÕŽ€Bø\0V0¼B¼9ö{T\$nÐ8\$ZøeîPÄ³íôÖ%9ã&´×ÀVµËb­x}g\"%h÷Ÿ†*Ù¸vOw³Ë¾Ï/ŸoéL,“†ý=Á—V¯æ5Bg¢ Ï¶Ž3ìÓ>È~¢`\nxi×\"²’v@ð²Ìþ‚£n×£ÜÏ³yacêGÀ'%[•º4`nåö47!5™Þ€rùŸÚÆÉ‰ïè>z¡(Y—tÙû0®ù€Và…P€ZXT`2€~ClÎô‚[oånÀt8jB\0dÔ\0000 –VÙùgæÀù† @V!‹h\0006d<œî‰=[ WÀÀŠÓûfà@pb‰Äa€èÙ¼¥s;ÐÚéG<Ž~aâŸ?®N²L¥‚¿ò\"(»ïø?¦%Ëx#ƒ7Â|S…äO¤Æ“)–B4Àæ+üæ*ì!éù)6#±+?'Ÿ¶ô(XÇÏÿ·ÙJO\0 €");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0œF£©ÌÐ==˜ÎFS	ÐÊ_6MÆ³˜èèr:™E‡CI´Êo:C„”Xc‚\ræØ„J(:=ŸE†¦a28¡xð¸?Ä'ƒi°SANN‘ùðxs…NBáÌVl0›ŒçS	œËUl(D|Ò„çÊP¦À>šE†ã©¶yHchäÂ-3Eb“å ¸b½ßpEÁpÿ9.Š˜Ì~\nŽ?Kb±iw|È`Ç÷d.¼x8EN¦ã!”Í2™‡3©ˆá\r‡ÑYŽÌèy6GFmYŽ8o7\n\r³0¤÷\0DbcÓ!¾Q7Ð¨d8‹Áì~‘¬N)ùEÐ³`ôNsßð`ÆS)ÐOé—·ç/º<xÆ9Žo»ÔåµÁì3n«®2»!r¼:;ã+Â9ˆCÈ¨®‰Ã\n<ñ`Èó¯bè\\š?`†4\r#`È<¯BeãB#¤N Üã\r.D`¬«jê4ÿŽŽpéar°øã¢º÷>ò8Ó\$Éc ¾1Écœ ¡c êÝê{n7ÀÃ¡ƒAðNÊRLi\r1À¾ø!£(æjÂ´®+Âê62ÀXÊ8+Êâàä.\rÍÎôƒÎ!x¼åƒhù'ãâˆ6Sð\0RïÔôñOÒ\n¼…1(W0…ãœÇ7qœë:NÃE:68n+ŽäÕ´5_(®s \rã”ê‰/m6PÔ@ÃEQàÄ9\n¨V-‹Áó\"¦.:åJÏ8weÎq½|Ø‡³XÐ]µÝY XÁeåzWâü Ž7âûZ1íhQfÙãu£jÑ4Z{p\\AUËJ<õ†káÁ@¼ÉÃà@„}&„ˆL7U°wuYhÔ2¸È@ûu  Pà7ËA†hèÌò°Þ3Ã›êçXEÍ…Zˆ]­lá@MplvÂ)æ ÁÁHW‘‘Ôy>Y-øYŸè/«›ªÁî hC [*‹ûFã­#~†!Ð`ô\r#0PïCË—f ·¶¡îÃ\\î›¶‡É^Ã%B<\\½fˆÞ±ÅáÐÝã&/¦O‚ðL\\jF¨jZ£1«\\:Æ´>N¹¯XaFÃAÀ³²ðÃØÍf…h{\"s\n×64‡ÜøÒ…¼?Ä8Ü^p\"ë°ñÈ¸\\Úe(¸PƒNµìq[g¸Árÿ&Â}PhÊà¡ÀWÙí*Þír_sËP‡hà¼àÐ\nÛËÃomõ¿¥Ãê—Ó#§¡.Á\0@épdW ²\$Òº°QÛ½Tl0† ¾ÃHdHë)š‡ÛÙÀ)PÓÜØHgàýUþ„ªBèe\r†t:‡Õ\0)\"Åtô,´œ’ÛÇ[(DøO\nR8!†Æ¬ÖšðÜlAüV…¨4 hà£Sq<žà@}ÃëÊgK±]®àè]â=90°'€åâøwA<‚ƒÐÑaÁ~€òWšæƒD|A´††2ÓXÙU2àéyÅŠŠ=¡p)«\0P	˜s€µn…3îr„f\0¢F…·ºvÒÌG®ÁI@é%¤”Ÿ+Àö_I`¶ÌôÅ\r.ƒ N²ºËKI…[”Ê–SJò©¾aUf›Szûƒ«M§ô„%¬·\"Q|9€¨Bc§aÁq\0©8Ÿ#Ò<a„³:z1Ufª·>îZ¹l‰‰¹ÓÀe5#U@iUGÂ‚™©n¨%Ò°s¦„Ë;gxL´pPš?BçŒÊQ\\—b„ÿé¾’Q„=7:¸¯Ý¡Qº\r:ƒtì¥:y(Å ×\nÛd)¹ÐÒ\nÁX; ‹ìŽêCaA¬\ráÝñŸP¨GHù!¡ ¢@È9\n\nAl~H úªV\nsªÉÕ«Æ¯ÕbBr£ªö„’­²ßû3ƒ\ržP¿%¢Ñ„\r}b/‰Î‘\$“5§PëCä\"wÌB_çŽÉUÕgAtë¤ô…å¤…é^QÄåUÉÄÖj™Áí Bvhì¡„4‡)¹ã+ª)<–j^<Lóà4U* õBg ëÐæè*nÊ–è-ÿÜõÓ	9O\$´‰Ø·zyM™3„\\9Üè˜.oŠ¶šÌë¸E(iåàžœÄÓ7	tßšé-&¢\nj!\rÀyœyàD1gðÒö]«ÜyRÔ7\"ðæ§·ƒˆ~ÀíàÜ)TZ0E9MåYZtXe!Ýf†@ç{È¬yl	8‡;¦ƒR{„ë8‡Ä®ÁeØ+ULñ'‚F²1ýøæ8PE5-	Ð_!Ô7…ó [2‰JËÁ;‡HR²éÇ¹€8pç—²Ý‡@™£0,Õ®psK0\r¿4”¢\$sJ¾Ã4ÉDZ©ÕI¢™'\$cL”R–MpY&ü½Íiçz3GÍzÒšJ%ÁÌPÜ-„[É/xç³T¾{p¶§z‹CÖvµ¥Ó:ƒV'\\–’KJa¨ÃMƒ&º°£Ó¾\"à²eo^Q+h^âÐiTð1ªORäl«,5[Ý˜\$¹·)¬ôjLÆU`£SË`Z^ð|€‡r½=Ð÷nç™»–˜TU	1Hyk›Çt+\0váD¿\r	<œàÆ™ìñjG”ž­tÆ*3%k›YÜ²T*Ý|\"CŠülhE§(È\rÃ8r‡×{Üñ0å²×þÙDÜ_Œ‡.6Ð¸è;ãü‡„rBjƒO'Ûœ¥¥Ï>\$¤Ô`^6™Ì9‘#¸¨§æ4Xþ¥mh8:êûc‹þ0ø×;Ø/Ô‰·¿¹Ø;ä\\'( î„tú'+™òý¯Ì·°^]­±NÑv¹ç#Ç,ëvð×ÃOÏiÏ–©>·Þ<SïA\\€\\îµü!Ø3*tl`÷u\0p'è7…Pà9·bsœ{Àv®{·ü7ˆ\"{ÛÆrîaÖ(¿^æ¼ÝE÷úÿë¹gÒÜ/¡øžUÄ9g¶î÷/ÈÔ`Ä\nL\n)À†‚(Aúað\" žçØ	Á&„PøÂ@O\nå¸«0†(M&©FJ'Ú! …0Š<ïHëîÂçÆù¥*Ì|ìÆ*çOZím*n/bî/ö®Ôˆ¹.ìâ©o\0ÎÊdnÎ)ùŽi:RŽÎëP2êmµ\0/vìOX÷ðøFÊ³ÏˆîŒè®\"ñ®êöî¸÷0õ0ö‚¬©í0bËÐgjðð\$ñné0}°	î@ø=MÆ‚0nîPŸ/pæotì€÷°¨ð.ÌÌ½g\0Ð)o—\n0È÷‰\rF¶é€ b¾i¶Ão}\n°Ì¯…	NQ°'ðxòFaÐJîÎôLõéðÐàÆ\rÀÍ\r€Öö‘0Åñ'ð¬Éd	oepÝ°4DÐÜÊ¦q(~ÀÌ ê\r‚E°ÛprùQVFHœl£‚Kj¦¿äN&­j!ÍH`‚_bh\r1Ž ºn!ÍÉŽ­z™°¡ð¥Í\\«¬\rŠíŠÃ`V_kÚÃ\"\\×‚'Vˆ«\0Ê¾`ACúÀ±Ï…¦VÆ`\r%¢’ÂÅì¦\rñâƒ‚k@NÀ°üBñíš™¯ ·!È\n’\0Z™6°\$d Œ,%à%laíH×\n‹#¢S\$!\$@¶Ý2±„I\$r€{!±°J‡2HàZM\\ÉÇhb,‡'||cj~gÐr…`¼Ä¼º\$ºÄÂ+êA1ðœE€ÇÀÙ <ÊL¨Ñ\$âY%-FDªŠd€Lç„³ ª\n@’bVfè¾;2_(ëôLÄÐ¿Â²<%@Úœ,\"êdÄÀN‚erô\0æƒ`Ä¤Z€¾4Å'ld9-ò#`äóÅ–…à¶Öãj6ëÆ£ãv ¶àNÕÍf Ö@Ü†“&’B\$å¶(ðZ&„ßó278I à¿àP\rk\\§—2`¶\rdLb@Eöƒ2`P( B'ã€¶€º0²& ô{Â•“§:®ªdBå1ò^Ø‰*\r\0c<K|Ý5sZ¾`ºÀÀO3ê5=@å5ÀC>@ÂW*	=\0N<g¿6s67Sm7u?	{<&LÂ.3~DÄê\rÅš¯x¹í),rîinÅ/ åO\0o{0kÎ]3>m‹”1\0”I@Ô9T34+Ô™@e”GFMCÉ\rE3ËEtm!Û#1ÁD @‚H(‘Ón ÃÆ<g,V`R]@úÂÇÉ3Cr7s~ÅGIói@\0vÂÓ5\rVß'¬ ¤ Î£PÀÔ\râ\$<bÐ%(‡Ddƒ‹PWÄîÐÌbØfO æx\0è} Üâ”lb &‰vj4µLS¼¨Ö´Ô¶5&dsF Mó4ÌÓ\".HËM0ó1uL³\"ÂÂ/J`ò{Çþ§€ÊxÇYu*\"U.I53Q­3Qô»J„”g ’5…sàúŽ&jÑŒ’Õu‚Ù­ÐªGQMTmGBƒtl-cù*±þ\rŠ«Z7Ôõó*hs/RUV·ðôªBŸNËˆ¸ÃóãêÔŠài¨Lk÷.©´Ätì é¾©…rYi”Õé-Sµƒ3Í\\šTëOM^­G>‘ZQjÔ‡™\"¤Ž¬i”ÖMsSãS\$Ib	f²âÑuæ¦´™å:êSB|i¢ YÂ¦ƒà8	vÊ#é”Dª4`‡†.€Ë^óHÅM‰_Õ¼ŠuÀ™UÊz`ZJ	eçºÝ@Ceíëa‰\"mób„6Ô¯JRÂÖ‘T?Ô£XMZÜÍÐ†ÍòpèÒ¶ªQv¯jÿjV¶{¶¼ÅCœ\rµÕ7‰TÊžª úí5{Pö¿]’\rÓ?QàAAÀèŽ‹’Í2ñ¾ “V)Ji£Ü-N99f–l JmÍò;u¨@‚<FþÑ ¾e†j€ÒÄ¦I‰<+CW@ðçÀ¿Z‘lÑ1É<2ÅiFý7`KG˜~L&+NàYtWHé£‘w	Ö•ƒòl€Òs'gÉãq+Lézbiz«ÆÊÅ¢Ð.ÐŠÇzW²Ç ùzd•W¦Û÷¹(y)vÝE4,\0Ô\"d¢¤\$Bã{²Ž!)1U†5bp#Å}m=×È@ˆwÄ	P\0ä\rì¢·‘€`O|ëÆö	œÉüÅõûYôæJÕ‚öE×ÙOuž_§\n`F`È}MÂ.#1á‚¬fì*´Õ¡µ§  ¿zàucû€—³ xfÓ8kZR¯s2Ê‚-†’§Z2­+ŽÊ·¯(åsUõcDòÑ·Êì˜ÝX!àÍuø&-vPÐØ±\0'LïŒX øLÃ¹Œˆo	Ýô>¸ÕŽÓ\r@ÙPõ\rxF×üE€ÌÈ­ï%Àãì®ü=5NÖœƒ¸?„7ùNËÃ…©wŠ`ØhX«98 Ìø¯q¬£zãÏd%6Ì‚tÍ/…•˜ä¬ëLúÍl¾Ê,ÜKa•N~ÏÀÛìú,ÿ'íÇ€M\rf9£w˜!x÷x[ˆÏ‘ØG’8;„xA˜ù-IÌ&5\$–D\$ö¼³%…ØxÑ¬Á”ÈÂ´ÀÂŒ]›¤õ‡&o‰-39ÖLù½zü§y6¹;u¹zZ èÑ8ÿ_•Éx\0D?šX7†™«’y±OY.#3Ÿ8 ™Ç€˜e”Q¨=Ø€*˜™GŒwm ³Ú„Y‘ù ÀÚ]YOY¨F¨íšÙ)„z#\$eŠš)†/Œz?£z;™—Ù¬^ÛúFÒZg¤ù• Ì÷¥™§ƒš`^Úe¡­¦º#§“Øñ”©Žú?œ¸e£€M£Ú3uÌåƒ0¹>Ê\"?Ÿö@×—Xv•\"ç”Œ¹¬¦*Ô¢\r6v~‡ÃOV~&×¨^gü šÄ‘Ùž‡'Î€f6:-Z~¹šO6;zx²;&!Û+{9M³Ù³d¬ \r,9Öí°ä·WÂÆÝ­:ê\rúÙœùã@ç‚+¢·]œÌ-ž[gž™Û‡[s¶[ižÙiÈq››y›éxé+“|7Í{7Ë|w³}„¢›£E–ûW°€Wk¸|JØ¶å‰xmˆ¸q xwyjŸ»˜#³˜e¼ø(²©‰¸ÀßžÃ¾™†ò³ {èßÚ y“ »M»¸´@«æÉ‚“°Y(gÍš-ÿ©º©äí¡š¡ØJ(¥ü@ó…;…yÂ#S¼‡µY„Èp@Ï%èsžúoŸ9;°ê¿ôõ¤¹+¯Ú	¥;«ÁúˆZNÙ¯Âº§„š k¼V§·u‰[ñ¼x…|q’¤ON?€ÉÕ	…`uœ¡6|­|X¹¤­—Ø³|Oìx!ë:¨œÏ—Y]–¬¹Ž™c•¬À\r¹hÍ9nÎÁ¬¬ë€Ï8'—ù‚êà Æ\rS.1¿¢USÈ¸…¼X‰É+ËÉz]ÉµÊ¤?œ©ÊÀCË\r×Ë\\º­¹ø\$Ï`ùÌ)UÌ|Ë¤|Ñ¨x'ÕœØÌäÊ<àÌ™eÎ|êÍ³ç—â’Ìé—LïÏÝMÎy€(Û§ÐlÐº¤O]{Ñ¾×FD®ÕÙ}¡yu‹ÑÄ’ß,XL\\ÆxÆÈ;U×ÉWt€vŸÄ\\OxWJ9È’×R5·WiMi[‡Kˆ€f(\0æ¾dÄšÒè¿©´\rìMÄáÈÙ7¿;ÈÃÆóÒñçÓ6‰KÊ¦Iª\rÄÜÃxv\r²V3ÕÛßÉ±.ÌàRùÂþÉá|Ÿá¾^2‰^0ß¾\$ QÍä[ã¿D÷áÜ£å>1'^X~t1\"6Lþ›+þ¾Aàžeá“æÞåI‘ç~Ÿåâ³â³@ßÕ­õpM>Óm<´ÒSKÊç-HÉÀ¼T76ÙSMfg¨=»ÅGPÊ°›PÖ\r¸é>Íö¾¡¥2Sb\$•C[Ø×ï(Ä)žÞ%Q#G`uð°ÇGwp\rkÞKe—zhjÓ“zi(ôèrO«óÄÞÓþØT=·7³òî~ÿ4\"ef›~íd™ôíVÿZ‰š÷U•-ëb'VµJ¹Z7ÛöÂ)T‘£8.<¿RMÿ\$‰žôÛØ'ßbyï\n5øƒÝõ_ŽàwñÎ°íUð’`eiÞ¿J”b©gðuSÍë?Íå`öážì+¾Ïï Mïgè7`ùïí\0¢_Ô-ûŸõ_÷–?õF°\0“õ¸X‚å´’[²¯Jœ8&~D#Áö{P•Øô4Ü—½ù\"›\0ÌÀ€‹ý§ý@Ò“–¥\0F ?* ^ñï¹å¯wëÐž:ð¾uàÏ3xKÍ^ów“¼¨ß¯‰y[Ôž(žæ–µ#¦/zr_”g·æ?¾\0?€1wMR&M¿†ù?¬St€T]Ý´Gõ:I·à¢÷ˆ)‡©Bïˆ‹ vô§’½1ç<ôtÈâ6½:W{ÀŠôx:=Èî‘ƒŒÞšóø:Â!!\0x›Õ˜£÷q&áè0}z\"]ÄÞo•z¥™ÒjÃw×ßÊÚÁ6¸ÒJ¢PÛž[\\ }ûª`S™\0à¤qHMë/7B’€P°ÂÄ]FTã•8S5±/IÑ\rŒ\n îO¯0aQ\n >Ã2­j…;=Ú¬ÛdA=­p£VL)Xõ\nÂ¦`e\$˜TÆ¦QJÍó®ælJïŠÔîÑy„IÞ	ä:ƒÑÄÄBùbPÀ†ûZÍ¸n«ª°ÕU;>_Ñ\n	¾õëÐÌ`–ÔuMòŒ‚‚ÂÖm³ÕóÂLwúB\0\\b8¢MÜ[z‘&©1ý\0ô	¡\r˜TÖ×› €+\\»3ÀPlb4-)%Wd#\nÈårÞåMX\"Ï¡ä(Ei11(b`@fÒ´­ƒSÒóˆjåD†bf£}€rï¾‘ýD‘R1…´bÓ˜AÛïIy\"µWvàÁgC¸IÄJ8z\"P\\i¥\\m~ZR¹¢vî1ZB5IŠÃi@x”†·°-‰uM\njKÕU°h\$o—ˆJÏ¤!ÈL\"#p7\0´ P€\0ŠD÷\$	 GK4eÔÐ\$\nGä?ù3£EAJF4àIp\0«×FŽ4±²<f@ž %q¸<kãw€	àLOp\0‰xÓÇ(	€G>ð@¡ØçÆÆ9\0TÀˆ˜ìGB7 - €žøâG:<Q™ #Ã¨ÓÇ´û1Ï&tz£á0*J=à'‹J>ØßÇ8q¡Ð¥ªà	€OÀ¢XôF´àQ,ÀÊÐ\"9‘®pä*ð66A'ý,y€IF€Rˆ³TˆÏý\"”÷HÀR‚!´j#kyFÀ™àe‘¬z£ëéÈðG\0Žp£‰aJ`C÷iù@œT÷|\n€Ix£K\"­´*¨Tk\$c³òÆ”aAh€“! \"úE\0OdÄSxò\0T	ö\0‚žà!FÜ\n’U“|™#S&		IvL\"”“…ä\$hÐÈÞEAïN\$—%%ù/\nP†1š“²{¤ï) <‡ð L å-R1¤â6‘¶’<@O*\0J@q¹‘Ôª#É@Çµ0\$tƒ|’]ã`»¡ÄŠA]èÍìPá‘€˜CÀp\\pÒ¤\0™ÒÅ7°ÄÖ@9©bmˆr¶oÛC+Ù]¥JrÔfü¶\rì)d¤’Ñœ­^hßI\\Î. g–Ê>¥Í×8ŒÞÀ'–HÀf™rJÒ[rçoã¥¯.¹v„½ï#„#yR·+©yËÖ^òù›†F\0á±™]!É•ÒÞ”++Ù_Ë,©\0<@€M-¤2WòâÙR,c•Œœe2Ä*@\0êP €Âc°a0Ç\\PÁŠˆO ø`I_2Qs\$´w£¿=:Îz\0)Ì`ÌhŠÂ–Áƒˆç¢\nJ@@Ê«–\0šø 6qT¯å‡4J%•N-ºm¤Äåã.É‹%*cnäËNç6\"\rÍ‘¸òè—ûŠfÒAµÁ„põMÛ€I7\0™MÈ>lO›4ÅS	7™cÍì€\"ìß§\0å“6îps…–ÄÝåy.´ã	ò¦ñRKð•PAo1FÂtIÄb*ÉÁ<‡©ý@¾7ÐË‚p,ï0NÅ÷: ¨N²m ,xO%è!‚Úv³¨˜ gz(ÐM´óÀIÃà	à~yËö›h\0U:éØOZyA8<2§²ð¸ÊusÞ~lòÆÎEð˜O”0±Ÿ0]'…>¡ÝÉŒ:ÜêÅ;°/€ÂwÒôäì'~3GÎ–~Ó­äþ§c.	þ„òvT\0cØt'Ó;P²\$À\$ø€‚Ð-‚s³òe|º!•@dÐObwÓæc¢õ'Ó@`P\"xôµèÀ0O™5´/|ãU{:b©R\"û0…Ñˆk˜Ðâ`BD\nk€Pãc©á4ä^ p6S`Ü\$ëf;Î7µ?lsÅÀß†gDÊ'4Xja	A‡…E%™	86b¡:qr\r±]C8ÊcÀF\n'ÑŒf_9Ã%(¦š*”~ŠãiSèÛÉ@(85 T”Ë[þ†JÚ4I…l=°ŽQÜ\$dÀ®hä@D	-Ù!ü_]ÉÚH–ÆŠ”k6:·Úò\\M-ÌØðò£\r‘FJ>\n.‘”qeGú5QZ´†‹' É¢ž½Û0ŸîzP–à#Å¤øöÖéràÒít½’ÒÏËŽþŠ<QˆT¸£3D\\¹„ÄÓpOE¦%)77–Wt[ºô@¼›Žš\$F)½5qG0«-ÑW´v¢`è°*)RrÕ¨=9qE*K\$g	‚íA!åPjBT:—Kû§!×÷H“ R0?„6¤yA)B@:Q„8B+J5U]`„Ò¬€:£ðå*%Ip9ŒÌ€ÿ`KcQúQ.B”±Ltbª–yJñEê›Té¥õ7•ÎöAmÓä¢•Ku:ŽðSji— 5.q%LiFºšTr¦Ài©ÕKˆÒ¨z—55T%U•‰UÚIÕ‚¦µÕY\"\nSÕm†ÑÄx¨½Ch÷NZ¶UZ”Ä( Bêô\$YËV²ã€u@è”»’¯¢ª|	‚\$\0ÿ\0 oZw2Ò€x2‘ûk\$Á*I6IÒn• •¡ƒI,€ÆQU4ü\n„¢).øQôÖaIá]™À èLâh\"øf¢ÓŠ>˜:Z¥>L¡`n˜Ø¶Õì7”VLZu”…e¨ëXúè†ºB¿¬¥B‰º’¡Z`;®ø•J‡]òÑ€žäS8¼«f \nÚ¶ˆ#\$ùjM(¹‘Þ¡”„¬a­Gí§Ì+Aý!èxL/\0)	Cö\nñW@é4€ºáÛ©• ŠÔRZƒ®â =˜Çî8“`²8~â†hÀìP °\r–	°žìD-FyX°+Êf°QSj+Xó|•È9-’øs¬xØü†ê+‰VÉcbpì¿”o6HÐq °³ªÈ@.€˜l 8g½YMŸÖWMPÀªU¡·YLß3PaèH2Ð9©„:¶a²`¬Æd\0à&ê²YìÞY0Ù˜¡¶SŒ-—’%;/‡TÝBS³PÔ%fØÚý• @ßFí¬(´Ö*Ñq +[ƒZ:ÒQY\0Þ´ëJUYÖ“/ý¦†pkzÈˆò€,´ðª‡ƒjÚê€¥W°×´e©JµFèýVBIµ\r£ÆpF›NÙ‚Ö¶™*Õ¨Í3kÚ0§D€{™Ôø`q™•Ò²Bqµe¥D‰cÚÚÔVÃE©‚¬nñ×äFG E›>jîèÐú0g´a|¡Shì7uÂÝ„\$•†ì;aô—7&¡ë°R[WX„ÊØ(qÖ#Œ¬P¹Æä×–Ýc8!°H¸àØVX§ÄŽ­jøÊZŽô‘¡¥°Q,DUaQ±X0‘ÕÕ¨ÀÝËGbÁÜlŠBŠt9-oZü”L÷£¥Â­åpË‡‘x6&¯¯MyÔÏsÒ¿–èð\"ÕÍ€èR‚IWU`c÷°à}l<|Â~Äw\"·ðvI%r+‹Rà¶\n\\ØùÃÑ][‹Ñ6&Á¸ÝÈ­Ãa”ÓºìÅj¹(Ú“ðTÑ“À·C'Š…´ '%de,È\n–FCÅÑe9C¹NäÐ‚-6”UeÈµŒýCX¶ÐV±ƒ¹ýÜ+ÔR+ºØ”Ë•3BÜÚŒJð¢è™œ±æT2 ]ì\0PèaÇt29Ï×(i‹#€aÆ®1\"S…:ö· ˆÖoF)kÙfôòÄÐª\0ÎÓ¿þÕ,ËÕwêƒJ@ìÖVò„Žµéq.e}KmZúÛïå¹XnZ{G-»÷ÕZQº¯Ç}‘Å×¶û6É¸ðµÄ_žØÕ‰à\nÖ@7ß` Õï‹˜C\0]_ ©Êµù¬«ï»}ûGÁWW: fCYk+éÚbÛ¶·¦µ2S,	Ú‹Þ9™\0ï¯+þWÄZ!¯eþ°2ûôà›—í²k.OcƒÖ(vÌ®8œDeG`Û‡ÂŒöL±õ“,ƒdË\"CÊÈÖB-”Ä°(þ„„„p÷íÓp±=àÙü¶!ýk’ØÒÄ¼ï}(ýÑÊB–kr_Rî—Ü¼0Œ8a%Û˜L	\0é†Àñ‰b¥²šñÅþ@×\"ÑÏr,µ0TÛrV>ˆ…ÚÈQŸÐ\"•rÞ÷P‰&3báP²æ- x‚Ò±uW~\"ÿ*èˆžŒNâh—%7²µþK¡Y€€^A÷®úÊC‚èþ»p£áîˆ\0ð..`cÅæ+ÏŠâGJ£¤¸H¿À®E‚…¤¾l@|I#AcâÿD…|+<[c2Ü+*WS<ˆràãg¸ÛÅ}‰Š>iÝ€!`f8ñ€(c¦èÉQý=fñ\nç2Ñc£h4–+q8\na·RãBÜ|°R“×ê¿ÝmµŠ\\qÚõgXÀ –ÏŽ0äXä«`nîF€îìŒO pÈîHòCƒ”jd¡fµßEuDV˜bJÉ¦¿å:±ï€\\¤!mÉ±?,TIa˜†ØaT.L€]“,JŒ?™?Ï”FMct!aÙ§RêF„Gð!¹Aõ“»rrŒ-pŽXŸ·\r»òC^À7áð&ãRé\0ÎÑf²*àA\nõÕ›Háã¤yîY=Çúè…l€<‡¹AÄ_¹è	+‘ÎtAú\0B•<Ay…(fy‹1Îc§O;pèÅá¦`ç’4Ð¡Mìà*œîf†ê 5fvy {?©àË:yøÑ^câÍuœ'‡™€8\0±¼Ó±?«ŠgšÓ‡ 8BÎ&p9ÖO\"zÇõžrs–0ºæB‘!uÍ3™f{×\0£:Á\n@\0ÜÀ£pÙÆ6þv.;àú©„Êb«Æ«:J>Ë‚‰é-ÃBÏhkR`-ÜñÎðawæxEj©…÷Árž8¸\0\\Áïô€\\¸Uhm› ý(mÕH3Ì´í§S™“Áæq\0ùŸNVh³Hy	—»5ãMÍŽe\\g½\nçIP:Sj¦Û¡Ù¶è<Ž¯Ñxó&ŒLÚ¿;nfÍ¶cóq›¦\$fð&lïÍþi³…œàç0%yÎž¾tì/¹÷gUÌ³¬dï\0e:ÃÌhïZ	Ð^ƒ@ç ý1€Ïm#ÑNów@ŒßOððzGÎ\$ò¨¦m6é6}ÙÒÒ‹šX'¥I×i\\QºY€¸4k-.è:yzÑÈÝH¿¦]ææxåGÏÖ3ü¿M\0€£@z7¢„³6¦-DO34Þ‹\0ÎšÄùÎ°t\"Î\"vC\"JfÏRÊžÔúku3™MÎæ~ú¤ÓŽ5V à„j/3úƒÓ@gG›}Dé¾ºBÓNq´Ù=]\$é¿I‡õÓž”3¨x=_j‹XÙ¨fk(C]^jÙMÁÍF«ÕÕ¡ŒàÏ£CzÈÒVœÁ=]&ž\r´A<	æµÂÀÜãç6ÙÔ®¶×´Ý`jk7:gÍî‘4Õ®áë“YZqÖftu|hÈZÒÒ6µ­iã€°0 ?éõéª­{-7_:°×ÞtÑ¯íck‹`YÍØ&“´éIõlP`:íô j­{hì=Ðf	àÃ[byž¢Ê€oÐ‹B°RS—€¼B6°À^@'4æø1UÛDq}ìÃNÚ(Xô6j}¬cà{@8ãòð,À	ÏPFCàð‰Bà\$mv˜¨Pæ\"ºÛLöÕCS³]›ÝàEÙÞÏlU†Ñfíwh{o(—ä)è\0@*a1GÄ ( D4-cØóP8£N|R›†âVM¸°×n8G`e}„!}¥€Çp»‡Üòý@_¸ÍÑnCtÂ9ŽÑ\0]»u±î¯s»ŠÝ~èr§»#Cn p;·%‹>wu¸ÞnÃwû¤Ýžê.âà[ÇÝhT÷{¸Ýå€¼	ç¨Ë‡·JðÔÆ—iJÊ6æ€O¾=¡€‡ûæßE”÷Ù´‘ImÛïÚV'É¿@â&‚{ª‘›òö¯µ;íop;^–Ø6Å¶@2ç¯lûÔÞNï·ºMÉ¿r€_Ü°ËÃ´` ì( yß6ç7‘¹ýëîÇ‚“7/Ápðe>|ßà	ø=½]Ðocû‘á&åxNm£‰çƒ»¬ào·GÃN	p—‚»˜x¨•Ã½Ýðƒy\\3àø‡Â€'ÖI`râG÷]Ä¾ñ7ˆ\\7Ú49¡]Å^p‡{<Zá·¸q4™uÎ|ÕÛQÛ™àõp™ýši\$¶@oxñ_<Àæ9pBU\"\0005— iä×‚»¸Cûp´\nôi@‚[ãœÆ4¼jÐ„6bæP„\0Ÿ&F2~ŽÀù£¼ïU&š}¾½¿É˜	™ÌDa<€æzx¶k£ˆ‹=ùñ°r3éË(l_”…FeF›ž4ä1“K	\\ÓŽldî	ä1H\r½€ùp!†%bGæXfÌÀ'\0ÈœØ	'6Àžps_›á\$?0\0’~p(H\n€1…W:9ÕÍ¢¯˜`‹æ:hÇB–èg›BŠk©ÆpÄÆót¼ìˆEBI@<ò%Ã¸Àù` êŠyd\\Y@D–P?Š|+!„áWÀø.:ŸLe€v,Ð>qóAÈçº:ž–îbYéˆ@8Ÿd>r/)ÂBç4ÀÐÎ(·Š`|é¸:t±!«‹Á¨?<¯@ø«’/¥ S’¯P\0Âà>\\æâ |é3ï:VÑuw¥ëçx°(®²Ÿœ4€ÇZjD^´¥¦Lý'¼ìÄC[×'ú°§®éjÂº[ E¸ó uã°{KZ[s„ž€6ˆ‚S1Ìz%1õc™£B4ˆB\n3M`0§;çòÌÂ3Ð.”&?¡ê!YAÀI,)ðå•l†W['ÆÊIÂ‡Tjƒè>F©¼÷S§‡ BÐ±Pá»caþÇŒuï¢NÝÏÀøHÔ	LSôî0”ÕY`ÂÆÈ\"il‘\rçB²ëã/Œôãø%P€ÏÝN”Gô0JÆX\n?aë!Ï3@MæF&Ã³Öþ¿,°\"î€èlbô:KJ\rï`k_êb÷üAáÙÄ¯Ìü1ÑI,ÅÝîüˆ;B,×:ó¾ìY%¼J ŽŠ#v”€'†{ßÑÀã„ž	wx:\ni°¶³’}cÀ°eN®Ñï`!wÆ\0ÄBRU#ØSý!à<`–&v¬<¾&íqOÒ+Î£¥sfL9QÒBÊ‡„ÉóäbÓà_+ï«*€Su>%0€Ž™©…8@l±?’L1po.ÄC&½íÉ BÀÊqh˜¦ó­’Ážz\0±`1á_9ð\"–€è!\$øŒ¶~~-±.¼*3r?øÃ²Àd™s\0ÌõÈ>z\nÈ\0Š0 1Ä~‘ô˜Jð³ðú”|SÞœô k7gé\0ŒúKÔ d¶ÙaÉîPgº%ãw“DôêzmÒûÈõ·)¿‘ñŠœj‹Û×Âÿ`k»ÒQà^ÃÎ1üŒº+Îåœ>/wbüGwOkÃÞÓ_Ù'ƒ¬-CJ¸å7&¨¢ºðEñ\0L\r>™!ÏqÌîÒ7ÝÁ­õoŠ™`9O`ˆàƒ”ö+!}÷P~EåNÈc”öQŸ)ìá#ûï#åò‡€ì‡ÌÑøÀ‘¡¯èJñÄz_u{³ÛK%‘\0=óáOŽX«ß¶Cù>\n²€…|wá?ÆF€Åê„Õa–Ï©UÙåÖb	N¥YïÉhŠ½»é‘/úû)ÞGÎŒ2ü™¢K|ã±y/Ÿ\0éä¿Z”{éßP÷YG¤;õ?Z}T!Þ0ŸÕ=mN¯«úÃfØ\"%4™aö\"!–ÞŸúºµ\0çõï©}»î[òçÜ¾³ëbU}»Ú•mõÖ2±• …ö/tþî‘%#.ÑØ–Äÿse€Bÿp&}[ËŸŽÇ7ã<aùKýïñ8æúP\0™ó¡g¼ò?šù,Ö\0ßßˆr, >¿ŒýWÓþïù/Öþ[™qýk~®CÓ‹4ÛûGŠ¯:„€X÷˜Gúr\0ÉéŸâ¯÷ŸL%VFLUc¯Þä‘¢þŽHÿybP‚Ú'#ÿ×	\0Ð¿ýÏì¹`9Ø9¿~ïò—_¼¬0qä5K-ÙE0àbôÏ­üš¡Žœt`lmêíËÿbŒàÆ˜; ,=˜ 'S‚.bÊçS„¾øCc—ƒêëÊAR,„ƒíÆXŠ@à'…œ8Z0„&ìXnc<<È£ð3\0(ü+*À3·@&\r¸+Ð@h, öò\$O’¸„\0Å’ƒèt+>¬¢‹œbª€Ê°€\r£><]#õ%ƒ;Nìsó®ÅŽ€¢Êð*»ïcû0-@®ªLì >½Yp#Ð-†f0îÃÊ±aª,>»Ü`ÆÅàPà:9ŒŒo·ð°ov¹R)e\0Ú¢\\²°Áµ\nr{Ã®X™ÒøÎ:A*ÛÇ.Dõº7Ž»¼ò#,ûN¸\rŽE™Ô÷hQK2»Ý©¥½zÀ>P@°°¦	T<ÒÊ=¡:òÀ°XÁGJ<°GAfõ&×A^pã`©ÀÐ{ûÔ0`¼:ûð€);U !Ðe\0î£½Ïc†p\r‹³ ‹¾:(ø•@…%2	S¯\$Y«Ý3é¯hCÖì™:O˜#ÏÁLóï/šé‚ç¬k,†¯Kåoo7¥BD0{ƒ¡jó ìj&X2Ú«{¯}„RÏx¤ÂvÁä÷Ø£À9Aë¸¶¾0‰;0õá‘à-€5„ˆ/”<Üç° ¾NÜ8E¯‘—Ç	+ãÐ…ÂPd¡‚;ªÃÀ*nŸ¼&²8/jX°\rš>	PÏW>Kà•O’¢VÄ/”¬U\n<°¥\0Ù\nIk@Šºã¦ƒ[àÈÏ¦Â²œ#Ž?€Ùã%ñƒ‚èË.\0001\0ø¡kè`1T· ©„¾ë‚Él¼šÀ£îÅp®¢°Á¤³¬³…< .£>íØ5ŽÐ\0ä»	O¬>k@Bn¾Š<\"i%•>œºzÄ–ç“ñáºÇ3ÙPƒ!ð\rÀ\"¬ã¬\r ‰>šadàöó¢U?ÚÇ”3P×Áj3£ä°‘>;Óä¡¿>žt6Ë2ä[ÂðÞ¾M\r >°º\0äìP®‚·Bè«Oe*Rn¬§œy;« 8\0ÈËÕoæ½0ýÓøiÂøþ3Ê€2@Êýà£î¯?xô[÷€ÛÃLÿaŽ¯ƒw\ns÷ˆ‡ŒA²¿x\r[Ñaª6Âclc=¶Ê¼X0§z/>+šª‰øW[´o2ÂøŒ)eî2þHQPéDY“zG4#YD…ö…ºp)	ºHúpŽ˜&â4*@†/:˜	á‰T˜	­Ÿ¦aH5‘ƒëh.ƒA>œï`;.Ÿ­îY“Áa	Âòút/ =3…°BnhD?(\n€!ÄBúsš\0ØÌDÑ&D“J‘)\0‡jÅQÄyŽhDh(ôK‘/!Ð>®h,=Ûõ±†ãtJ€+¡Sõ±,\"M¸Ä¿´NÑ1¿[;øÐ¢Š¼+õ±#<ìŒI¤ZÄŸŒP‘)ÄáLJñDéìP1\$Äîõ¼Q‘>dO‘¼vé#˜/mh8881N:øZ0ZŠÁèT •BóCÇq3%°¤@¡\0Øï\"ñXD	à3\0•!\\ì8#h¼vìibÏ‚T€!dª—ˆÎüV\\2óÀSëÅÅ’\nA+Í½pšxÈiD(ìº(à<*öÚ+ÅÕE·ÌT®¾ BèS·CÈ¿T´æÙÄ e„Aï’\"á|©u¼v8ÄT\0002‘@8D^ooƒ‚ø÷‘|”Nù˜ô¥ÊJ8[¬Ï3ÄÂõîJz×³WL\0¶\0ž€È†8×:y,Ï6&@”À E£Ê¯Ý‘h;¼!f˜¼.Bþ;:ÃÊÎ[Z3¥™Â«‚ðn»ìëÈ‘­éA¨’ÓqP4,„óºXc8^»Ä`×ƒ‚ôl.®üº¢S±hÞ”°‚O+ª%P#Î¡\n?ÛÜIB½ÊeË‘O\\]ÎÂ6ö#û¦Û½Ø(!c) Nõ¸ºÑ?EØ”B##D íDdo½åPAª\0€:ÜnÂÆŸ€`  ÚèQ„³>!\r6¨\0€‰V%cbHF×)¤m&\0B¨2Ií5’Ù#]ú˜ØD>¬ì3<\n:MLðÉ9CñÊ˜0ãë\0“¨(á©H\nþ€¦ºM€\"GR\n@éø`[Ãó€Š˜\ni*\0œð)ˆü€‚ìu©)¤«Hp\0€Nˆ	À\"€®N:9qÛ.\r!´JÖÔ{,Û'æÙŠ4…B†úÇlqÅ¨ŸXc«Â4ß‹N1É¨5«WmÇ3\nÁF€„`­'‘ˆÒŠxàƒ&>z>N¬\$4?ó›ÃïÂ(\nì€¨>à	ëÏµPÔ!CqÍŒ¼Œp­qGLqqöG²yÍH.«^àž\0zÕ\$€AT9Fs†Ð…¢D{ía§øcc_€GÈz†)ó³‡ Ü}QÆÅhóÌHBÖ¸<‚y!L­“€Û!\\‚²ˆî ø'’H(‚ä-µ\"ƒin]Äžˆ³­\\¨!Ú`M˜H,gÈŽí»*ÒKfë*\0ò>Â€6¶ˆà6ÈÖ2óhJæ7Ù{nqÂ8àßôÉHÕ#cHã#˜\r’:¶–7Ê8àÜ€Z²˜ZrD£þß²`rG\0äl\n®Iˆi\0<±äãô\0Lg…~¨ÃE¬Û\$¹ÒP“\$Š@ÒPÆ¼T03ÉHGH±lÉQ%*\"N?ë%œ–	€Î\nñCrWÉC\$¬–pñ%‰uR`ÀË%³òR\$–<‘`ÖIfxª¯÷\$/\$„”¥\$œš’O…(‹Ë\0æË\0RY‚*Ù/	ê\rÜœC9€ï&hhá=IÓ'\$–RRIÇ'\\•a=EÔ„òuÂ·'Ì™wIå'T’€€‘üÿ©¾ãK9%˜d¢´·‚!ü”ÀÊÊÀÒj…ì¡íÓÊ&Ðæ„vÌŸ²\\=<,œEùŒ`ÛYÁò\\Ÿ²‚¤*b0>²r®à,d–pdŒŒÌ0DD Ì–`â,T ­1Ý% P‘ž¤/ø\ròb¹(Œ£õJÑèÍîT0ò``Æ¾ÞèíóJ”t©’©ÊŸ((dÇÊªáh+ <Éˆ+H%i‡Èô‹²•#´`­ ÚÊÑ'ô£B>t˜¯J€Z\\‘`<Jç+hR·ÊÔ8î‰€àhR±,J]gò¨Iä•è0\n%J¹*ÐY²¯£JwDœ°&Ê–D±®•ÉÐœªR§K\"ß1Qò¨Ë ”²AJKC,ä´mV’»Ž²›ÊÙ-±òÏKI*±r¨ƒ\0ÇL³\"ÆKb(üªóJ:qKr·dùÊŸ-)ÁžË†#Ô¸²Þ¸[ºA»@•.[–Ò¨Ê¼ß4º¡¯.™1ò®J½.Ì®¦u#J“‡Ág\0Æãò‘§£<Ë&”’ðK¤+½	M?Í/d£Ê%'/›¿2YÈä>­\$Í¬lº\0†©+ø—Á‰}-tº’Í…*ê‰Rä\$ß”òÌK».´Á­óJHûÊ‰‡2\r„¿B‚½(PÍÓÌ6\"ü–nf†\0#Ð‡ ®Í%\$ÄÊ[€\nÐnoLJ°ŒÅÓÂe'<¯ó…‡1KíÁyÌY1¤Çs¥0À&zLf#üÆ³/%y-²Ë£3-„Â’ÍK£L¶ÎÉ×0œ³’ë¸[,¤ËÌµ,œ±’«„§0”±Ó(‹.DÀ¡@ÏÁ2ïL+.|£’÷¤É2è(³L¥*´¹S:\0Ù3´ÌíóG3lÌÁaËl³@L³3z4­Ç½%Ì’ÍLÝ3»…³¼!0Š33=Lù4|È—¡à+\"°Êé4´Ëå7Ë,\$¬SPM‘\\±Î?JŠY“Ì¡¹½+(Âa=K¨ì4œ¤³CÌ¤<Ð…=\$,»³UJ]5h³W &tÖI%€é5¬Ò³\\M38g¢Í5HŠN?W1Hš±^ÊÙÔ¸“YÍ—Ø Í.‚N3MŸ4Ã…³`„Ži/P‰7ÖdM>šd¯/LRÎÜâ=K‘60>¯I\0[ðõ\0ßÍ\r2ôÔòZ@Ï1„Û2ÿ°7È9äFG+ä¯ÒœÅ\r)àhQtL}8\$ÊBeC#Á“r*HÈÛ«Ž-›Hý/ØËÒ6Èß\$øRC9ÂØ¨!‚€Å7ük/PË0Xr5ƒ¡3D„¼<TÁÔ’q¯Kô©³nÎH§<µFÿ:1SLÎrÀ%(ÿu)¸Xr—1Ñ€nJÃIÌ´S£\$\$é.Î‡9Ôé²IÎŸÒ3 ¨LÃl”“¯Î™9äÅC•N #Ô¡ó\$µ/ÔésÉ9«@6Êt“²®Nñ9¼´·NÉ:¹’Â¡7ó Ó¬Í:DáÓÁM)<#–ÓÃM}+ñ2ÎNþñ²›O&„ð¢JNy*ŒòòÙ¸[;ñóÎO\"mÚÄóÅMõ<c Â´‚°±8¬K²,´ÓÇN£=07s×JE=Tá³ÆO<Ôô³£Jé=D“Ó:ÏC<Ì“àË‰=äèó®KÊ»Ì³ÈL3¬÷­„LTÐ€3ÊS,œ.¨ÿÏq-Œñsç7Í>‚?ó¼7O;Ü `ùOA9´óñÏ»\$œüÁOÑ;ìý`9ÎnÇIAŒxpÜöE=O¹<ü²5ÏÎ„ý2¸O?d´Ž„´Œ`NòiOÿ>Œþ3½P	?¤òÔOžmœúSðMôË¬·†=¹(ãdã¤AÈ­9“‘\0í#üä²@ƒ­9DŽÁÉ&ÜýòŠ‚?œ “Ði9»\nà/€ñAÝóòÈ­A¤ýSËPo?kuN5¨~4ÜãÆ6††Ø=ò–Œ“*@(®N\0\\Û”dGåüp#è¤> 0À«\$2“4z )À`ÂW˜ð +\0Š‘80£è¦• ¤ª”äz\"TÐä0Ô:\0Š\ne \$€ŽrM”=¡r\n²N‰P÷Cmt80ðú #¤ØJ= &ÐÆ3\0*€Bú6€\"€ˆéèú€#Ì>˜	 (Q\nŒðê´8Ñ1C\rt2ƒECˆ\n`(Çx?j8N¹\0¨È[À¤QN>£©à'\0¬x	cêªð\nÉ3×Chü`&\0²Ð´8Ñ\0ø\näµ¦úO`/€„¢A`#ÐìXcèÐÏD ÿtR\n>¼ÔdÑBòD´LÐÄÌõ‰äÐÍDt4ÐÖ j”pµGAoQoG8,-sÑÖðÔK#‡);§E5´TQÑGÐ4Ao\0 >ðtMÓD8yRG@'PõC°	ô<PõCå\"”K\0’xüÔ~\0ªei9Ðìœv))ÑµGb6‰€±H\r48Ñ@‚M‰:€³FØtQÒ!H•”{R} ôURpÍÔO\0¥I…t8¤ØðûÎÇ[D4FÑD#ÊÑ+D½'ôMÊ•À>RgIÕ´ŠQïJ¨””UÒ)EmàüTZ­Eµ'ãê£iEÝ´£ÒqFzAªº>ý)T‹Q3HÅ#TLÒqIjNT½¼…&CøÒhX\nT›ÑÙK\0000´5€ˆ¢JHÑ\0“FE@'Ñ™Fp´hS5F\"ÎoÑ®e%aoS E)  €“DU «Q—FmÎÑ£M´ÑÑ²e(tnÒ “U1Ü£~>\$ñßÇ‚’­(hÕÇ‘Güy`«\0’ê 	ƒíG„ò3Ô5Sp(ýõPãGí\$”œ#¤¨	©†©N¨\nôV\$ö]ÔœPÖ=\"RÓ¨?Lzt·ƒ1L\$\0ÔøG~å ,‰KNý=”ëÒGMÅ”…¤NS€)ÑáO]:ÔŠS}Ý81àRGe@Cí\0«OPðSõNÍ1ôÝT!P•@ÑÝS€ðÿÕS‰G`\nÉ:€“P°j”7R€ @3üÑ\n‘ üã÷â£”DÓ æúLÈÏ¼Ž 	èë\0ùQ5ôµ©CPúµSMP´v4†º?h	hëT‡D0úÑÖàõ>&ÒITxôO¼?•@U¤÷R8@%Ô–ŒõK‰€§NåKãóRyE­E#ýù @ýÃøä%Là«Q«Q¨µ£ª?N5\0¥R\0úÔTëFåÔ”RŸSí!oTEÂC(Ï¶ÈýÄµ\0„?3iîSS@U÷QeMµƒ	KØ\n4PÕCeS”‘\0NC«P‚­Oõ! \"RTûõ€S¥NÕÁU5OU>UiIÕPU#UnKPô£UYTè*ÕC«U¥/\0+º¸Å)ÈÚ:ReAà\$\0øŽ¤xòÇWDº3Ãêà`üÚüçU5ÒIHUY”ô:°P	õe\0–MJi€ƒµÃýQø>õ@«T±C{›ÕuÑì?Õ^µv\0WR]U}Cöê1-5+Uä?í\rõW<¸?5•JU-SXüÕLÔß \\tÕ?ÒsMÕb„ÕƒVÜt§TŒ>ÂMU+Ö	EÅcˆÏÔ9Nm\rRÇƒCý8ŽSÇX•'RÒéXjCI#G|¥!QÙGh•tðQ¸ý )<¹YÐ*ÔÐRmX0üôö½M£›õOQßYýhÀ«ßduÕ¤ÕZ(ýAo#¥NlyN¬V€Z9IÕºM•¦V«ZuOÕ…TÕTÅEÕ‡Ö·SÍeµµÖÊ\nµXµªSÛQERµ³ÔÙ[MF±VçO=/õ­¨>õgÕ¹TíVoUT³Z’N€*T\\*ÃïÐ×S-pµSÕÃVÕq€ÒM(ÏQ=\\-UUUV­C•Ä×ZØ\nu’V\$?M@UÎWJ\r\rUÐÔ\\å'U×W]…W”£W8ºN '#h=oCóÐýF(üé:9ÕYu•†¤÷V-UÓ9Ÿ]ÒC©:U¿\\\nµqW—™à(TT?5Páª\$ R3ÕâºŸC}`>\0®E]ˆ#Rêà	ƒÿ#R¥)²W–’:`#óGõ)4ŠRÀý;õáViD%8À)Ç“^¥Qõé#”h	´HÂŽX	ƒþ\$Nýx´š#i xûÔ’XRõ€'Ô9`m\\©†¨\nEÀ¦Q±`¥bu@×ñN¥dT×#YYý„µ®GV]j5#?L¤xt/#¬”å#é…½O­PÕëQæ¢6•££Ï^í† €šŽðüÖØM\\R5t´Óšpà*€ƒXˆV\"WÅD€	oRALm\rdGN	ÕÖÀú6”p\$PåºŸE5Ôý†©Tx\n€+€‹C[¨ôVŽŒýÖ8U•Du}Ø»F\$.ªËQ-;4È€±NX\n.XñbÍ•\0¯b¥)–#­NýG4KØÐZS”^×´M¶8Øód­\"C‚¬>ÅÕdHe\nöY8¥Ñ.ê ú°ˆÒFúD”½W1cZ6”›QâKHü@*\0¿^¸úÖ\\QßF‚4U3Y|‘=˜Ó¤éE›ÔÛ¤¦?-™47YƒPm™hYw_\ršVe×±M˜±ßÙe(0¶ÔFÕ\r !ÒPUI•uÑ7Qå•CèÑŽ?0ÿµÝgu\rqà¤§Y-Qèó°èú=g\0…\0M#÷U×S5Zt®ÖŸae^•\$>²ArV¯_\r;tî¬’¨”HW©Zí@HÕØhzDèÚ\0«S2Jµ HIåO 'ÇeígÉ6¹[µR”<¸?È /ÒKM¤ö–Ø\n>½¤HáZ!iˆö¤ŸTX6–Ò×iºC !Ó›g½à ÒG }Q6žÑ4>äwà!Ú™C}§VBÖ>åªUQÚ‘jª8cïUTàû–'<‚>ÈýõôHC]¨VšÑ7jj3v¥¤å`0ÃèÈ23ö°Ðòxû@U—k \n€:Si5žÕ#Yì-wî”ÕàéM?céÒMQÅGQÕÑƒb`•ò\0Ž@õËÒ§\0M¥à)ZrKXûÖŸÙWl­²öÍlå³TM×D\r4—QsS¥40ÑsQÌõmYãh•d¶ÂC`{›V€gEÈ\n–»XkÕà'Óè,4ú¼¹^í¢6Æ#<4éNXnM):¹·OM_6d€–æõ¸Ãõ[\"KU²nžÖ?l´x\0&\0¿R56ŸT~> ô†Õ¸?”Jnž€’ ˆÏZ/iÒ6ôÎÚglÍ¦ÖUÛáF}´.ž£¼JLöCTbMŽ4ÍÓcLõTjSD’}JtŒ€Z›ªµÇ:±L­€´d:‰Ez”Ê¤ª>ÖV\$2>­µŽ¢[ãpâ6öÔRŽ9uêW.?•1®£RHužèÛR¸?58Ô®¤íDÝÆuƒ£çpûcìZà?œr×» Eaf°}5wY´ëå‚Ï’ÒêÅW‚wT[Sp7'Ô_aEk \"[/i¥¿#ÿ\$;m…fØ£WOüô”ÔFò\r%\$Íju-t#<Å!·\n:«KEA£íÒÑ]À\nUæQ­KEÀ #€¿Xå¨÷5[Ê>ˆ`/£ÍDµÊÖ­VEpà)åI%ÏqßÜûníx):¤§le¢´Õ[eÕ\\•eV[j…–£éÑ7 -+ÖßGWEwt¯WkEÅ~uìQ/mõ#ÔW—`ýyu“Ç£DÝAö'×±\r±•Õ™OD )ZM^€³u-|v8]‹g½‘hö×ÅLà–W\0øÈû6ËX†‘=YÔd½Q­7Ï“”Ï9£çÍ²r <ÃÖêD³ºB`c 9¿’È`D¬=wx©I%ä,á„¬†è²àêƒj[ÑšÖíßOÿ‹´ ``ŽÅ|¸òòÆÞø¤Œ˜¼í.Ì	AOŠÀÄ	·‰@å@ 0h2í\\âÐ€M{eã€9^>ô•â@7\0òôË‚W’€ò\$,íÉÅš¡@Ø€Òâ•å×w^fmå‰,\0ÏyD,×^X€.¯Ö†©7ã·›Ã×2ÝÅf;¥€6«\n”¤Ž…^ŸzC©×§mz…én–^ˆô”&LFFê,°ö[€¥eÈõaXy9h€!:zÍ9còQ9bÅ !€¦µGw_WÉg¥9©ÓS+t®ÚápÝtÉƒ\nm+–œÞÙ_ð	¡ª\\¼’k5£ÒÜ]Æ4ˆ_h•9 Ù÷N…—Å]%|¥ˆ7ËÖœŽ];”ï|ñµ ßXýÍ9Õ|åñ×ÌG¢“¨[×Ô\0‘}Uñ”çßMCI:ÒqO¨VÔƒa\0\rñRÍ6Ï€Ã\0ø@H¢ÅP+rìS¤Wãè€øp7äI~p/ø HÏ^Ýê²ü¤¬E§-%û¥Ì»Í&.ÎÄ+¸JÑ’;:³¶«!“ýÐNð	Æ~öª‰€/“WÄÂ!„BèL+Â\$ðíq§=ü¿+Ñ`/Æ„e„\\±ÒÏxÀpE‘lpSÂJSÝ¢½ö6à‡_¹(Å¯©Äéb\\OÆÊ&ì¼\\Ð59\0ûÂ€9nñøD¸{¡\$á¸‹K‘v2	d]èv…CÕþÅÕ?tf|WÜ:£Ô¨p&¿àLn„Îè³žî{;ˆçÚGR9øT.y¹üïI8€¹´\rl° ú	Tè n”3¼öðT.ƒ9´è3› š¼Zès¡¯ÑÒGñþŽˆ:	0£¦£zè­Ý.Œ]ÀçÄ£Q›?àgT»%ñ™ÕxŒÕŒ.„šÔÇn<ì£-â8BË³,Bòì˜rgQþ¢íßó„ÉŽ`Úá2é„:îµ½{…gëÄs„øgóZ¿•… ×Œ<æ×w{¦˜ƒbU9ˆ	`5`4„\0BxMpð‘8qnahé†@Ø¼í†-â(—>S|0®…¾¥…3á8h\0Ñ«µCÔzLQž@¶\n?†¸`AÀ >2šÂ,÷á˜ñN&Œ«xˆl8sah1è|˜B‡É‡DxBÞ#V—‹V–×Š`Wâa'@›‡¬	X_?\nì¾  •_â. ØP¼r2®bUarÀI¸~áñ…S“àú\0×…\" 2€ÖþÀ>b;…vPh{[°7a`Ë\0êË²j—oŒ~·ûþvÍÙ|fv†4[½\$¶«{ó¯P\rvæBKGbpëÈÅø™–OŠ5Ý 2\0j÷Ù„LŽ€î)ÇmáÈV¡ejBB.'R{C¤ïV'`Ø‚ ‰Ž%­Ç€Ð\$ Oå\0˜`‚’«4 ÌNò>;4£³¢/ÌÏ€´À*Âø\\5„ÅÁ!†û`X*Þ%îÄNÍ3SõAMôþËÆ”,þ1¬²®í\\¯²caÏ§ ³ù@Ø¬Ëƒ¸B/„¬Íø0`óv2ï¡„§Œ`hDÅJO\$ç…@p!9˜!¥\n1ø7pB,>8F4¯åf Ï€:“ñ7Â„î3›£3…¿à°T8—=+~Øn«Îâ\\Äe¸<br·þ øFØ²° ¹C¡N‹:c€:Ôl–<\r›ã\\3à>ñ˜‡À6ONnŠä!;áñ@›twë^Fé€Là;€×º,^aÈ\ra\"ÞÀÚ®'ú:„vàJe4Ã×;•ñ_d\r4\rÌ:ÛüÀ¬S˜à2€[c€„XÿÊ¦Pl˜\$¹Þ£i“wåd#ŽB šb›Î×¤õ’™`:†€Ï~ <\0Ñ2Ù·—‘RŒÂÆPÈ\r¸J8D¡t@ìEŽè\0\rÍœ6öóäÞ7•½ä˜YÏ£ú\"åäÀš\rüƒ¦Àš3ƒ¡.˜+«z3±;_ÊŸvLÝäÓwJ¿94ÀIJa,A¦ñˆ¯;ƒs?ÖN\nR‡!Ž§Ý†Om…sÈ_æà-zÛ­w„€ÛzÜ­7¡ÍÅzî÷–M”ˆ€o¿”¥æ\0¢ƒa”ÅÝ¹4å8èPfñYå?”òi—–eBÎSà1\0ÉjDTeK”®UYSå?66R	¦cõ6Ry[c÷”°5Ù]BÍ”ÖRù_eA)&ù[å‡•XYRW–6VYaeU•fYeåw•ŽU¹båw”Eë°Ê†;z¤^W«9–ä×§äÝ–õë\0<Þ˜èeê9SåÎ¤daª	”_-îá‰L×8Ç…ÍQöèTH[!<p\0£”Py5ˆ|—#ê‘P³	×9vàš2Â|Ç¸áfao†á,j8×\$A@kñƒ¿ŽaË‘½bócñÈf4!4¨‘¶cr,;™‘æ‘öbÆ=€Â;\0°øÅº…˜†cdÃæX¾bìx™a™Rx0Aãh£+wðxN[˜ÜB·pÚƒ¿w™TÀ8T%™šMšl2à‡½¡šð—}¡Ès.kY„˜0\$/èfU€=þØs„gKÃ¡ˆM› õ?ÿ›ç`4c.Ôø!¡&€åˆ†g°ûfà/þf1=¯›V AE<#Ì¹¡f\n») Šë›Npò“ã`.\"\"»Açœ¤ã—üq¸X“ Ù¬:aÉ8™¹f¯™Vsó‹G™ÞrŽ:æVÞÆcÔgVl™g=`ã“WŽËýyÒgUÀË™ªáº¼îeT= ã€á€Æx 0â M¼@ˆ»šÂ%Îºb½œþw™ÆfÛÙOøç­˜Ü*0¯…®|tá°%±™PÈÍpæúgKžù¬?pô@JÀ<BÙŸ#­`1„î9þ2çg¶!3~ØÜçînläÅfŠØVhù¬Ž.Ñ€à…aCÑù•?³Šû-à1œ68>A¤ˆaÈ\r—¦y‹0 Öi‘J«} à¹© Ðz:\r¡)‘Sþ‚¡@¢åh@äöƒY¹ã´mCEg¡cyÏ†‚<õàÍh@¼@«zh<WÙÄ`Â•¨±:zOãÎÖ\rÍêW«“°V08Ùf7™(Gyƒ²`St#ï„f†#ƒ²œC(9ÈÂ˜Ø€dùææ8T:¯»Œ0ºè qµ  79·á£phAgÜ6Š.ãæ7Fr™bä ÈjšèA5î…†ƒá¡a1úÚh•ZCh:–%¹ÎgU¢ðD9ÖÅÉˆ„×¹Ïé0~vTi;VvSš„wœØ\rÎƒ?àÇf²£…ÿ¥nŠÏ›iY™ìaº¬3 Î‡9Õ,\n™Ãr‘‰,/,@.:èY>&…šFÑ)ú™¶}šb£€èiOÝiæš:dèAŒn˜šc=¤L9O’h{¦ 8hY.’ÙÀ®¾‡®‡…œüÇ\r¬Ö‡£À›Šé1Q¯U	”C‘hô†eÿO‰›°+2oÌÎìÞN‹˜÷§øzpè¢(þ]Óh€å¢Z|¬O¡cÑzDáþ;õT\0j¡\0…8#>ÎŽÁ=bZ8Fjóìé;íÞºTé…¡w®Í)¦ýøN`æë¨¤Ã…B{ûƒz\ró¡c“Óè|dTG“iœ/ûú!i†Ê0±¼ø'`Z:ŠCHï(8Âê`V¥™Úãöª\0Üê§©†£WïßÇª˜ÕzgG¾‘…ƒ½²-[ÃÐ	iœêN\rqºé«n„„“o	Æ¥fEJý¡apb¹ê}6£…Õ=o¤–„,tèY+ö®EC\rÖPx4=¼¾™Ù@‡‰¦.†‘F£[¡zqçÜèX6:FG¨ #°û\$@&­ab¤þhE:²ƒå¬ä`¶S­1—1g1©þ„2uhY‹¬_:Bß¡dcï–*ÿ­†\0úÆ—FYFœ:Ë£ªn„ØÌ=Û¨H*Z¼Mhk/ëƒ¡žzÙ¹ï‹´]šÁh@ôæ©Øã1\0˜øZKùž¢ëÎÆè^+º,vfós®š>ˆ¤’Oã|èÀÊsÃ\0Öœ5öXé‹îÑ¯F„÷n¿Aˆr]|ÏIi4è…þ ØÂC° h@Ø¹´Ÿž–cß¥¨6smOÃå‰™›gX¬V2¦6g?~ÖÃYÕÑ°†súcl \\RŠ\0Œ¨cœA+Œ1°„›ùÌé\n(ÑúÃÌ^368cz:=z÷‚(äø ;è£¨ñsüF¶@`;ì€,>yTßï&–•d½L×Ÿœÿ%Òƒ-ëCHL8\r‡Çbû°°£úMj]4Ym9üÛüÐZÚBøïP}<ŸûàX²¯‰Ì¥á+gÅ^ØMÞ + B_Fd¬X„ø‹lówÈ~î\râ½‹è\":ÔêqA1X¾ìæ²Ðø¯3ÖÎ“Eáh±4ßZZÂó¸& …ææ1~!Nfã´öo—ˆ™\nMeÜà¬„îëXIÎ„íG@V*X¯†;µY5{Vˆ\nè»ÏTéz\rF 3}m¶Ôp1í[€>©tèe¶w™Ÿæë@VÖz#‚2Äï	iôôÎ{ã9ƒ‚pÌ»gh‘Šæ+[elU‰¦ÛAßÙ¶Ó¼i1Ä!Œ¾ommµ*Kà‡ê}¶°!íÆ³í¡®Ý{me·f`“—mè˜CÛz=žnÞ:}g° T›mLu1FÜÚ}=8¸ZáíèOžÛmFFMf¤…OO€ðîáÀ‹ƒèøß/¼éõ¸Þ“šå€þV™oqj³²èn!+½òµüZ¨ËI¹.Ì9!nG¹\\„›3a¹~…O+Îå::îK@Œ\nÚ@ƒ‘¤Hph‘´\\BÄõdmfvCèžÓPÛ\" æ½Û.nW&–ên¢øHYþ+\r¶“Äz÷i>MfqÛ¤î­ºùÝQc‚[­H+æÀo¤Ñ*ú1'¤÷#ÄEw€D_Xí)>Ðs£„-~\rT=½£žà÷ˆà- íy§m§¹æð{„hóŸÌjÚMè)€^ž¹ïÀ'@Vå¡+iÈîÎò›Ÿåµ†É;F“ D[Îb!¼¾´B	¦¤:MP‹îóÛ­oC¼vAE?éC²IiYÍ„#þp¶P\$kâJÞq½.É07œþöxˆl¦sC|ï½¾bo–2äXª>Mô\rl&»Ç:2ã~ÛÑcQ²îò²æoÑÞdá‚-þèUÜRo‚YšnM;’n©#–ß\0–P¾fðÚPo×¿(CÚv<Ê¬ø[òoÛ¸”šû×fÑ¿ÖüÁ;ßáº–õ[úYŸ.o®Up¿®pUŒø”.ž ©B!'\0‹òã<Tñ:1±À¾ šã¤î<„›ðnˆîF³ðƒI¢Ç”´‚V0ÊÇRO8‰wøÎ,aFú¼É¥¹[´ÎŸ…ñYOù«‰€/\0™Ùox÷ÇQð?§°:Ù‹ëÆè`h@:ƒ«¿öÑ/Mím¼x:Û°c1¤Öàû¯ív²;„‚è^æØÆ@®õ@£úð½ÂÇ\n{¯¼Âî‹à;ç‘´B¼í¸8‘º gå’ä\\*gåyC)Û„E^ýOÄh	¡³¦Aƒu>Æèü@àDÌ†Yæ¼í›â`o»<>Àƒp‰™ŠÄ·’q,Y1Q¨Áß¸†/qgŒ\0+\0âæå‡Dÿƒç?¶þ î©Úßîk:ù\$©û¬í×¥6~I¥…=@ŽíÑ!¾ùvÚzOñš²â+ÍõÆ9Çi³–›¼aïð†êû…gòðôî¿—¹ÿ?š0Gn˜q²]{Ò¸,FáÃøO¡â„Þ <_>f+¢,ñÌ	»Ôñ±&ôœ†ðíÂ·¼yêÇ©Oü:¬UÂ¯ˆLÆ\nÃÃºI:2³¿-;_Ä¢È|%éå´¿!Îõfž\$¦ˆ†Xr\"Kniîñ—ÀÐ\$8#›g¤t-›€r@LÓåœè@S£<‘rN\nD/rLdQkà£“”ªõÄîeðåäãÐ­åø\n=4)ƒB˜”Ë×šôÌZ-|Hb¡†‘HkÊ*	ÖQ!Ð'êG ž›Ybt!¿Ê(n,ìP³OfqÑ+X“Y±ÿ‚ë\"b F6ÖÌr fò\"ÒÜ³!N¡ó^¼¦r±B_(í\"¨KÊ_-<µò *Q÷ò¨Ù/,)H\0„‰²rç\"z2(¹tÙ‡.F>†‡#3â®Ø¦268shÙ þ¨Æ‘I1Sn20¶çÊ-«4’ÚÇ2Aœs(¬4ä¼Ë¶Š\0ÆÝ#„årþK'ËÍ·G'—7&\n>xßüÜJØGO8,ó…0¼â‹ù8”ÑÓ\0óW9’ÝIˆ?:3nº\r-w:³ÂÌÅ×;3È‰”!Ï;³Üêƒ˜˜Z’RMƒ+>ÖÜðÊé0/=R…'1Ï4Õ8ûÑÏmÿ%È¥}Ï‡9»;‚=ÏnQöã=ÏhhLõ·GÏkWÎ\rô	%Ø4ÒœsñÎ–J€3sÛ4—@™U‚%\$ÜÑN;Ì?4­»óNÚÏ2|ÊóZÚ3Øh\0Ï3“5€^Àxi2d\r|ûM·Ê£bh|Ý#vÇ` \0”ê®äàû\$\r2h#ú¤?³ˆI\n’¼+o-œŠ?6`á¹½¿.\$µšøKY%ØÂJ?¦c°RN#K:°KáELÁ>:Á¥@ŒãjP‘Ìn_t&slm’'æÐ©É¸Óœ²Œ½—ã;6Û—HU5#ìQ7U ýWYÜU bNµ–Wû_ûª©;TCø[Ý<Ú–>ÅÇõ‰WýCUÔ6X#`MI:tùÓµ€ö	u#`­fu«\$«t­öXó`f<Ô;båghöÑÕ9×7ØS58õ¬Ý#^–-õ\0êÀúîÕ¹R*Ö'£¨(õðõqZå££êX¹QÝFUvÔW GWíñÓTêÇWô~Ú­^§WöÄÁÕýJ=_Ø—bmÖÝbV\\l·/ÚMÕÿTmTOXuÊ=_ýITvvu‹a\rL_ÕqR/]]mÒsu=H=uÑg o\\UÕ…gM×	XVU À%õhý¡53U™\\=¡öQßØM¹v‡€¡gåmàõue¡ˆÙûhÿbÝMÝGCeO5®ÔÖO5…ÔYÙi=eÕ	GTURvOa°*ÝivWX•J5<õ¯bu ]ˆ×Öðúµ<õÃÙÕ\$u3v#×'eöuÑR5m•Šv‹D5.vŽŒõW=ŸU_å(´\\VØÏ_<õ÷SÍn)Ü1M%QháZ‡T…f5EÕ'ÕÍW½ŠvÅUmiÕ‚UÔÕ]aW©U§dRváÙ-YUZuÙUV—UiRV™õ³ÓÇ[£íZMU§\\=Âv{ÛXýµ¼wQ÷huHvÇ×gqÝ´w!Úoqt¢U{TGqý{÷#^G_ubQ„êå•i9Qb>ÚNUdº±k…½5hPÙmu[•\0¦êÅ_¶é[õY-ðô÷rõÈÕ(ÖCrMeýJõ!h?QrX3 xÿÈÏ#‡÷xÖ<Û{u5~ƒíÑ-ÝuŽëYyQ\r-”î\0ùuÕ£uuÙ¿pUÚ…•)–PåÜ\r<u«S›0ÝÉw¹ß-iÝóÔ!ÌÖŠøB÷áÆd]ùèÅ‡ÔÆEêðvlmQÝ6k¼ÒJ´ˆwí¦ÄžØÃãŒED¶UÙR“ev:XßcØNW}`-¨tÓH#e„bº±u€ãó	~B7ê ?ƒ	OPœCWµ×SEÍ•V>¶“×UÛ7ßžç‰Ôám»Ó‚¬zÿ=µƒÍØ1º™ƒ+ ¹mÃI,>µX7àä] .‡½*	^îŠã°N…º.èÎ/\"„˜)Ð	…¯‚sž®|à¤çÓŸÐlÁ}ã¸ŽÍç!óîƒ‘5n±p„j£¾h’}½èðm“EázHÂaO0d=A|wëß³ãë×šÎìu²œŸvùØ¼G€x#®…b”cSðo-‰ùtOm`C‹ò^MŒÅ@ë´h­n\$k´`þ`HD^PEà[äŒ]¹¨rR¸mž=‚.ñÙ‡>Ayi‚ \"ú€ò	Ö·oã-,.œ\nq+À¥åfXdŠ«¶ã*ß½ˆKÎØƒ'Üê Ð%aôÿ‡ù9pûæ—øKLM„à!þ,èÊËŽ¨ŒzX#˜Vá†uH%!Àœ63œJ¾ryÕíùq_èu	úWù±‡Æ|@3b1åÈ7|~wï±³þíA7“ÒÂ›è™	¼™9cS&{ãäÒ%VxðïkZO‰×w‰Ur?®„’ªN Î|…CÉ#Å°õåÕ¯ ¹/ú™9ftŽEw¸CÁºa¦^\0øO<þW¦{Yã=éŸeë˜ýnÉ„ígyf0h@ìSÝ\0:C©´^€¸VgpE9:85Ã3æÞ§áºð@»áŽj_ª[Þ+«êÇ©xƒ^“ê®†~@Ñ‡Wª¸ãã“œ†9x—FC˜¿­.ãšçöük^IŽû¡pU9üØSŸØ÷½—œ\$óóø\r4´…ù\0ÎèO°ã‘Ä)L[Âp?ì.PECSìI1nm{Å?žPîWAß²Á;€ñìD°;SºaKføò›%?´XõÞ+¤B>½ù9¿¯ÙGj˜cžz‘AÍŽ÷:êa³n0bJ{o¥·!3À­!'’ØKÃÅíùÔ}ã\\èÎ3Wøê5îxÏÉÁL;ƒ2Î¶n—a;²í×ºXÓ›]Éoºœxû{ä¦5Þ™jX÷ˆð—¶vÓšéãqÞÊEE{Ñ€4Á¾öÄ{íÙç	Ì\nöÊ>ù™aï¯·¾üì§ïØLûÔûåïÿ½ûìñ'ð½Þé{ë\n‰—>JøßŒŒá¸Ó—†÷YÏ\rOÊ½ð‘t¯ÿû¥-OÃ¦ü4Ôÿ9Fü;ð§Á»ÔüGðøIªFßì1ÂoÿßóñO²¾éa{w—0Ó»ï¤Æ¯;ñ”„‘lüoñàJÐTb\rwÇ2®Jµþ=D#ònÁ:ÉyñûSø^ã,.¿?(ÈI\$¯ÊÆ¯í¨á3÷Ãsð4MÊaCRÉÆÍGÌ‘œúIß°n<ûzyÑXN¾ð?õâ.Ãî=—àñ´DÇ¼\r›žØé\nÕó¨\roõý\nÐŸCl%ÁÍYÎû¥ß°ÏàGÑþÚ}#VÐ%ý(ÔÿÒà3æÉ˜ržð};ôû×¿GÉÌnö[ª{¥¹–“_<m4[	I¥¢À¼q°µ?ð0cVýnms„³nMõõˆ\"Nj1õw?@ì\$1¦þ>ðÒ^øÕû¥ö\\Ì{nÂ\\Ìžé7Ÿ„¿ÙŸic1ïÚÿhooê·?j<GöxŸlÏù©Sèr}ÍÃÚ|\"}•÷/Ú?sç¬tIäåê¼&^ý1eóÓtãô,*'F¸ß=/Fkþ,95rVâáøàÀºì‘ˆÛo9Íø/FÀ–_†~*^×ã{ÐIÆö¯ã_ƒ‚²Œ“^n„øþNŸŠ~øáÅAí¦‘d©åñþUøwäqY±åî´T¸2ÀéGä?‡&–§æô:yùè%Ÿ–Xç˜JÛCþd	WèßŽ~úG!†´J}›—¤úìùõÄB-Óï±;îûœhÃ*ó¼R´ìöE¶ ~âæó.«~Éçæ SAqDVxÂîÍ='íÉEÙ(^Šû¢~›ùø¿›çòéçïo7~‚M[§Qãî(³Üy¸ùnPÑ>[WX{qÔaÏ¤ÆÉý.&NÚ3]ñúHYïÝûƒëÛ[¶ÁÙ&ü8?Ñ3„‹›¦¶§Ý†Ú»¶á#Œ¦ÎBðe6ë…@–“[°¤£ûàÐG\rÎ+ý§}ü˜÷ÁÿÏ_Ýç7–|N„§«Þ4~(zÁ~“»¹ï§%›–?±ßÓÈ[¹ø1žSª]xØköÑKxO^éA€‰rZ+ºÿ»½*ÂWö¯kþwD(¹ø»R:æý\0•§íù'¤Šó“m!OÐ\näÅuè‚Æó.[ PÆ!¹²}×Ïm Ûï1pñuüâ,T©çL 	Â€0}â&PÙ¥\n€=Dÿ=¾ñÐ\rÂšA/·o@äü2ãt 6àDK³¶\0ÈÂƒq†7„l ¼ðBêŠúÌ(ƒ;[ñˆkr\r‘;#‘ÃäƒlÅ”\r³<}zb+ÔÐOñ[€WrXƒ`Z Å£†Pm'Fn ¼‰îSpß-°\0005À`d¨Ø÷P„ÁÚÇ¾·Û;²Ìn\0‚5fïP„¿EJäwûÛ ¹.?À;¶§NòÞ¥,;Æ¦Ï-[7·ÞeþÚiÅâ-“ÖîdÙŽ<[~”6k:&Ð.7‡]\0ó©ûë–ù/µ59 ñÁ@eT:ç…˜¯3ÅdsÝú5äœ5f\0ÐPµöHB–•í°½º8JÔLS\0vI\0ˆ™Ç7DmÆaž3e×íŽ?B³ª\$´.E‹ÐfË@ªnúƒ‰bòGbÁÏq3Ÿ|üšPaËˆøÏ¯X7Tg>Â.ÚpØï™’5¸«AHÅµ’Š3Sð,˜Á@Ô#&wµî3†ôm[ÏÀòIíÑ¥Ó^“Ì¤J1?©gTá½#ÏS±=_„‚_±	«£ÉVq/CÛ¾·Ý€Î|ËôáþD ƒg>Ü„õëé 6\rŠ7}q”ÆÅ¤‹JGïB^î†\\g´Ýõüœ&%­Ø[ª2IxÃ¬ªñ6\03]Á3Œ{É@RUàÙMö v<å1Š¿‘¾sz±uP’5ŸªF:Òiî|À`­qÓ÷†V| »¦\nkâ}Ð'|Žgd†!¨8¦ <,ëP7˜m¦»||»ÿ¶IŽAÓ]BB ÏFö0XÏú³	ŠDÖß`W µÁqm¦OL‘	ì¸.Í(Áp‚¼Òä¶\"!‹ýª\0âÍAïÃô‡‰ÁV€–7kƒŒM¸\$ÓN0\\Õ§ƒ\"‹f‘á Çëñ È\0uqž—,Œ 5ÆãA6×pÎÎÈ\nðÎjY³7[pK°ð4;lœ5n©Á@â\\fûÐl	¦‚MöùûPÁç3®—C HbÐŒ©¸cEpP‰ÚÐ4eooeù{\r-àš2.ÔÖ¥½ŒP50uÁ²°G}Äâ\0îËõ¨<\röœ!¸œ~Êýµ¾óñ¹\n7F®d¶ýà“œ>·Ôa¢Ù%ºc6Ôž§õMÀ¥|òàd‹û·ìOÓ_¨?J„æªC0Ä>ÐÁ&7kM4ª`%fílðÎ˜B~¢wxÑÚZGéP†2¯à0ü=ž*pð†@ˆBeÈ”ØÏ|2Ä\r³?q¸Ð8í¸ë±ñÍÐŠ(·yráö 0àî>œ>ÀE?wÜ|r]Ö%AvàýÁÅä@Ž+ÝXÁªAgâÉÛÿsû®CÐûAXmNÒú4\0\rÚÍ½8JÝJðÇ¸DÒšó´:=	•ðó‡ëÆS™4¯ñF;	¬\\&Öè†P!6%\$iäxi4c½0Bá;62=ÚÛ1ÂùÌˆPCØåÂƒmËÍ“dpc+Ò5Šå\$/rCR†`£MQ¤6(\\á2A ¦¹\\ªŒlGòl¬\0Bq°¤P¯r²ûøBµ‰ê›Ñ‚¹_6LlË!BQŽ‰IÂŽGÀåÜØðXRbs¡]B—Hržã˜`ÎX‹ä\$på±8ð„•	nbR,Â±…L \"ÂE%\0’aYB¦sœ…ÍD,!Æ×Ï›pN9RbG·4ÆþM¬Œt…¸œ¬jUô¤À§y\0ìÝ%\$.˜iL!xÂìÒ“Å(Ä.‘)6T(’I…ìa%ÒKÈ]mÄt¥ô…ú&‚óG7ÇITMóBú\rzaÂØ])vaˆ%œ†²41TÁjÍ¹(!…¬Þ¡¨\\\\ÆWÂÜ\\t\$¤0Åæ%á”\0aK\$èTšF(YàC@‚ºHÏŽÐHã€nD’dÃ†Wp˜ÉhZ¯'áZC,/Ž¡\$û¦£—J¡FB¨uÜ¬Q:Î¥ÂAö‰:-a#”ì=jb¨§lÕUg;{R°€Uº±EWnÔUa»Vâî•Nj¬§u‹GÉ*¨yÖ¹%ÝÒ@Åï*Ìä«ÕYxê±_ó²§z€]ë)v\"£çRÕåL¯VIvê=`›¾'ª°UÝ) S\r~R˜•™\ni”Å)5S¦åD49~Êb”;)3‡,¦9M3¯HsJkTœÃœ‡(¢†ú—uJ‰][\$uf¨íob£µ¹\n.,îYÜµ9j1'µŒ!ö1\$J¶‘gÚ¤ÕŸÄ†U0­ÓZuah£±·cH¥,ÃYt²ñKbö5—ë5–’/dY¬³AUšÒ…©‹[W>¨_Vÿ\rˆ‘*·õ©j£§-T±… zÖYÊd•c®m‡Ò¹±Ø:¹€üË[Ut-{ªµýl	£i+a)».[º•_:Ú5žähƒò­WÂ§Ém»¥%JI‘´[T«h>š®µ·°•™;ËXÌºdêÂŸS›d‰Væ;\rÆ±!Nˆ“K&—AˆJu4B…ÁdgÎ¢.Vp¢ámb‹…)ÇV!U\0Gä¸¨“`‹Ð­\\…qâŸ7Qöb«VL¥Þ:äÕ‚úƒó¬Z.­Nò˜Ä*–ÔU]Z´læzë…Îöù®ÇR D1IŸåÂ£Ñr:\0<1~;#ÀJbà¦ÊM˜yÝ+™Û”/\"Ï›j<3æ#“–ÌŒêñ¡…:P.}êe÷ïòD\"qÙyJýGŒû·sopŒ¯²þXŒ\rÝ³d–Þ\rxJ%–í‰ÏÆ¼O:%yyãÅ,‡”%{Î3<îXÃ¸ÏÌ÷¯zÂEÎz(\0 €D_÷½Ÿ.2+Ög®bºcÚxìpgÞ¨Áß|9CPŽûî˜48U	Q§/Aq®ÝQ¼(4 7e\$D“‰v:ŒV¡b×ûN4[ùˆiv°Àê2ñ\r•X1¼˜AJ(<PlFÐ\0¾¨€\\zÝ)ÑçšW€(ü4ôÈÃÚï¢ p•™ÓõÊ`µÇ\r³da6”¯üOÖímña´}qÅ`ÂÀ6Pƒ'hàç3§|š’îÃf jÈÿAæƒz‰ø£+ŒDŒUWøDíþÞ5ÅÄ%#é°x“3{«¶L\r-Í™]:jd×P	jüf½q:Z÷\"sadÒ)óGØ3	¤+ðŠr„NKö1Qþ½ç†x=>û\"¤°-á:ÊFÍõœIÙƒ*í@ÔŸÇy»Tí\\Uè¨ãŠY~ÂŠ‰Žäâš‚3Då€Á™ã¨f,s¢8HV¯'Ét9v(:ÖB9ñ\\Zš¡…(‘&‚E8¯ƒÍW\$X\0»\nŒž9«WBÀ’bÁÃ66j9Ð âÊˆ„ƒ?,š¬| ùa¾g1²\nPs \0@%#K„¸€ \r\0Å§\0çˆÀ0ä?ÀÅ¡,ä\0ÔhµÑh€\08\0l\0Ö-ÜZ±jbàÅ¬\0p\0Þ-Ùf`ql¢ä€0\0i-Ü\\ps¢è€7‹e\"-ZðlbßEÑ,ä\0ÈÌ]P ¢ÚE¶‹b\0Ú/,Zðà\rÀ\0000‹[f-@\rÓ¯EÚ‹Ï/„Z8½‘~\"ÚÅÚ‹­ö.^ÒÎQw€ÅÏ‹‚\0Ö/t_È¼ÀâèEð‹Ö\0æ0d]µ€búÅ¤‹|\0ÈÄ\\Ø¼‚¢íE¤\0af0tZÀÑnJô\0l\0Î0L^˜´Qj@ÅáŒJˆ´^¸¹q#F(Œ1º/ì[µ1Š¢ãÆŒIæ.Ü^8»\0[ŒqØÌ[Ã‘l\"åÆ Œ€\0æ0,dè¶À€Æ\rŒÌ„cøµ{cEÁ\0oâ0¬]°\0\rc%ÅÛ‹—ðˆ8½w¢åÆZ‹µ-Ä\\ºñ{ãÅÖ‹Gª/\\bp„…@1Æ\0a²1ù‹ÈÏÑsã!Å¨Œ/î/Ì]8¹‘~c\"ÅÛ‹Åþ2ôcÎ‘m£\"€9Œqš/\\^fQ~cÆ_‹£Î-\$iž\"Ö\0003ŒË¬¤fXºqx#\09Œ—Z.´i¸ÈŒ@FˆŒ‰3tZHÉ \rcK€b\0j’/DjøÉ1¨ââÆIh´aÈñv€Æ©OZ4œZòÌÑ‚#YE¨\0i–.hHÒÑsX/F<‹Ï†.äjøËñ­bèÆÍ\0mV/d\\èØñ‹b÷E³‹£ž3T^(ÝÑˆcKFR‹Õù‚ô]X¶q½¢øÅà—’6Ô]hÓñžc6EÄ‹ó66Üh‘Ÿãn\0005sn/dn¸Ô`\r\"ÑFŒ³Ú-D`ÈÕ‘‹ãN€2‹Y”¤bxÀñ”#\\Åë‹‡V3x·1x€FxŒ¾\0Ê6Œb°q£ƒÇ!Žž8|^‚ÌÑubåÆàÕ-ôrØäq¼ã:ÆéŽ%ö0Œppñ”#Ç‹¢\0Æ6ÔfÕÑÇ¢âÅ¬dÒ0„qH´±¾£\$Ç@‹qò-¼^B4±¦\"ú\08Ž1ª/lnxÏ‘ âêG3:0tjhÒ~@Æ¼Ž¥¦3¤vHÆñ¹bÜG(Že„4gØºqÂã2Æ1ŒÉ-ŒnXËñº\"ãF<Qž1\\j¸¸1®ãÈEÇ‹Çä³4m¨Õñªã[ô‹nÁz7üyhÞ1§#ÆÞŽ/‚3\\xÐqÍKG‚ŒÿÆ6äo˜Ñ1{£°FJ×š6¼lXéqâ£„Æu©Þ9œr(¿1Òã‡Gc\0Åf:„rX½ #ÐÅ½\0iÞ<\\}×ñåbîF½\0sÖ7Üy2ÌÑæ#uFe›\">4iØÅ¿âÔÆçŒé\n<{¸ã‘£âÆ‰ŒJ;¬]ØÄ1Å#ÎÆ0ÙJ;4^èÂD½ãóÇ®‹Ÿ¨³4i¨À(H#ÚÆEŒx–/¤nøû1ðã/Ç¡‹åj6,l˜Û1tã/\0005%ï0„]xü‘¶£GG5!’0¤€¨×ñÚâé–rŒq¢2Ì¨Þ‘ÎãNFPo\"4ô_˜·1×dÇ%‹e ²3¬s8é‘üã†G5Ž“ æ6Ô[Hë“cØHjYš;ô[è¾‘˜bë! Žyò@Ä\\¸½qØ#WHN‡Ž;ÌcÆQèã:Ç-%ª.œkXÆ‘ý£ÚGÍŒÏ†1Df¨ß‘ºcWFl¡!‚0ü€™²c EÜ©Ž;l˜Ñq\"ëF©ß¢7\\\\¨ùñâ£ÔÆO‹qþ.T|\"?‘ñã™ÆE³f9TyYÑ©ãSG1ûÂA\$f9R\n\"ÞÆxŒ¹>Bœ…HÚñß¤\0ÇŒ¶:\$e¹1œ£³F?=º3Tu)\nq¹béÇ~ËÎ<TøÎ±Ðc‰H.‘m~CôwHÊ±¸#/ÈI]~3ä^ˆºÑ„#§Æ>‘Y®4Œ^¸ÎQjcÊÇKŒ1\"Ò8¬|6Ñåc\"ÇB‘µ\"b4ãèæ%œ¢ÔÈG\0e\"’/t‹¨´1r£1Æe!v2„yÀ±õä<Ç †8\\o¨ÊÑ’#tÅÑ\rz@´}HÂ‘èbïÆèy î1Ì\\¨ðëdeGŽÁZ3Œ~ér)ã1È¿‹Û†Bl~H½²:£dF£‘-Î?”k8´qèc(FÍ‹ŠKÞ5|myñ€c1Æ<’*@´jØáò1ãÛÅ¾Œ‹>I´ZèÍQjä•È2ŒÉ\$0¤‹hµQˆäVFTŒ	\$ÆAl~öqÚ£È±Ž\$Ö>\\pÙ\rq‚\$/Èu%ï!®Jq \$ ãtE²‹GN-Tq)ò\"¢ÛHÊŒË¦=ì–XÉ2-£H’«š8\\nˆµRW\$HŒë\"¢C\\_¹\0»d\$Çf‘³\".D„u	'Q£zEíŒÙ&0toˆóqjãúÆ¿Œ³R@d—øÉä£ùÇu##¶LLkÉ*qó\$*GÄ‘iÎ@TŠi‘lãòEª‘ƒÎ5Œ˜¾r\\d–I–‘µ\"/ÌZÉ0’j\$TÅþŒz5Ld3’£ëÉ’oÂ.Tq¹!1{£Æ‹åÖ9œZ¸¾QÕbÓFŒwJ94nˆÒÄÖä{É(“-Ž8·2h¤uÈé“;\$†-Dkøårs£‡Hž™#¡‚ôY7ò\"Ø/E¿’Ó 	\$j¢^ò-£]Ç7Ž[\"N\$’èÂ‘“¤WÈ‘¯Ö/]à\$²+€1Ga/&IDnøÂ’@\$åÆ!‹ç\$Î-Œk!Q¨âùÊ)(N/\$t¸Ý¹äëÆOKzP´tXÜò[\0’GŽ’w(*K\$vˆË1ócÉ'“ÞGÌžIòxd­È\n“AÒ8\\rX·Òa£÷I”iNœI%\$½ã’Æ_‘÷ª6¤fçQþ#–ÈI”5#ŽF´—ØºñÏ#³Eâ’•\"î3\$¢IÜc‡Hˆ‹ÝvR|ùQ€¤cE¸ñ:R„eº±hä¶EÎfK`8þr.#·E³s®0L…˜üRä†F©‹·!\nC\$`Èöñ´\$ôH?’ËnPÜe™!ñš¥@F'”¿–/œ‡¸¶ÄÖäÿÊ”¯%ÂN,hÈÌrF\$öÈþŒÇ3´tøæÒ€¥Åæ’!1<„ÉCQÏ%ÉÃ’¹æJäZØf.Ý6Å†œ·±C‰¥ÊÔœ.²[þ™BÒ¿xëàƒè\0NRn`šÈùY\n’%+N¨IMs:Ã¹Ydƒef¬B[¶°ÝnÆ¹YŠòm¨ÁR®×’ûÉY¯ÚC„XŒëÛj³çU+Vk,¯\0Pëýb@e²¹¥x¬„V¾ºyT¤7ˆuî«[Jï•È±\nD¯§eR¿¬mx&°lÀ\0)Œ}ÚJ¼,\0„IØZÆµ\$k!µ¨ñYb²Áœ°€RÂ‡e/Q¾Àk°5.Áe‘­5•À¨žW‘`ª¥\0)€Yv\"VÂ\0•Ã\n‡%—å–`Yn¯Õ¡aôÔxÃ†Q!,õ`\"‰	_.Ÿå©Æ–tm\$•\"“²J«¤ÖÀ§ŽvÆ%‰M9j‚°	æ–§Ä*³KpÖ”’;\\R ¼ü3(§õŠ^¯:}–Èï|>Âµa-'U%w*‰#>¤@Ì¬e–Jÿ¤;Pw/+¹á5E\rjn¡ÐÃd–ô¢^[ú¯§cÎ°¥uËz\\Ø1mi\"x‚„påÃ;£ÌîˆæˆP)äøªÇ#„±Ø’¡…Ë!Aª;¨ß	4ì³a{`aV{KUàÊ8ã¨Ÿ0''o€2ˆ¨¢ycÌ¸9]Ké@ºÒ—^ðlBˆâOrëÔã,du¤¾8¤?õ‰€Õ%¼gB»ˆî‚ÆYn+ã%c¬e\0Œ°ñà¤±Yr@fì‹(]Ö¼¨\nbizîÖn€SS2£ÁGdBPjŠ¹Ö@€(—È¥¦!à-çv²´eÚ*c\0„ª4Jæç‚’ùÕÙ,“UÈ	dºÉeðj'TˆH]ÔŠÔG!œ)u‹ÕÖ¯Ÿ•Ò¯ùZËB5ûÌ“WŽ‰0\n±á¡ÔR«ÁW…\\¦Q jÄ^rÊ%lÌ˜3,ÒYy×Éf3&Ì•ÜŽÕQ:Ïµ2„mÉR)”T€¾(KRÁ 0ªÊ”@«ìY´¢Y:£Ùe3\r%´¨°Tö%­X”Á¹‡STÔ.J\\ë0ÙhôÄ…ŠD!Ä:—uæêÉU\"¾ÅÁo+7–\"„µ“f'º­R\0°‘ÞJõ2S–2è#nm »ÁIåŠœý\"Xü³²[Ö€Ñì} J¨¯c¼9p0ªüÕQ»(U\0£xDEW‚Œ.LõÁ=<BÔ0+½)ZS V;â\\âµI{5I‘AôÖÃ,dW²uè5Ew\n\$%Ò…ˆ½2i_\$ÈÙ+ìæO,Œ¬‡íX‹´Õ‘Jg&J¡úG’º%\\J“·b.ÄÝ^L‹TòFlŒè–¹]k#f@L·G€ÄT¼Ù—ÒÍHÏÌ\"–q1SÌ°ù‰jVÉ(Î™„ìZVzßÅ†³,§ÊèG.1Fû±gNÊ;×1ÃŠV¬¦5EÍò5`ò\0Ctè=F\ná¹›Î±•K‡þ™Ö\0­ÛŠ±%¨ËD]Q\$\r\0‡3J\\,Í™š³<T4*£™Á.ÒYK²D«QƒéLïS%,ŠgÔÇåª§Ö<Ëë™u0–ôÍUÄ‰Ö*x(©åNÂ’Yv!þ¥yÍ	wÅ4fdª¥rG•‰M \$äê‰^;ºéîÝæˆ)<Pã]DÒ%%Ó;ÔjÊåšI0æaÓu^Jp—[)¦v©3RhRúEöÀ\næ–L_š#5|Ü¾Õm3Pñ*¨\\Y51X’’	i³N—Èñ\$\"°ºaü­õh*KUÝÌïV8¨åuò±%&„ræ¯Ëš ²5oŒÕçg³;ÝrMl[Æ¨ögœ³ùª’·UÍq™ê¹šh|ÔeO2·f MlW2AP„×¹˜’ÍÀÍv~eD¬eñ3UÓ«l‡E62iüÎõìÓUbÌï˜¬«õUŒ¬©¨îøýªVðêiI!\$i¨Ê­&Z:½–xm!Å†“.ÖOÍfwÒ¯!”ÌÓkÝ¤Íƒ™6b\"«I™J]]:T™6ÒVrú¹}’ÜÇ«]™®±‘U¢Ž	ys7fÔMÅ™ÿ3ˆŒÜÎYœó:T_MÍw%3ÆnÏ¥\nÎæz*™í3âhƒ·	»`U–²Lÿš‡,¥Û„Ð5¨óvfƒ»Ã›Ù42_Q‰¼hÝÇÍuD§\no£¹)¤ÄœÕ«M9¿7foÛ¼©¤rÖÝÇÎWB~iTÝeyQTâN\nšd¦pr§#›óM§;’˜…4æpª¼„têÿ–(;š›³5	|¬àÇ‚Š­',AV7Ü”ÔåUAö&ìÍRœP¯\"äÕy‡Ò·•‰) [ŠnÌÕñ-3V•Ë,?œs6ºpŠù†3ŽfµÎAšÛ9k|ÝÉ®S†f¬*@œ•5Þg¼¾É¿2·Í}œŒ®þUüÝ™‘ðùæHÎF›l%®pÂ«Ie³be—MÙSO\rŽ[¼æi²3fÉÎLVá®rÙu®Š¾¥ÛNA›:î%r„Úy3Q_Ì¸›W.ÑÕÈ^Sl@&ÌÁ5ÖYlÂÌ1åæÎ}VxêžgÊ…§^SnÕÌÍQ!:5×ZÞiZCÔˆ:¿›•3qgé%DáõÝª{U¡3’tZ¹`ûÓu%w:ÉZQ:QìÏÇW fî‡í›¿9Jplê)Ö3xÔvÌþK7žb#«ù½«çX+Jš(¢Âh´ìP*Ó´«Î›þ¢!×”ìÅSLçh*'¤¨\npBù™ÚªgNÊ§8BuÒªéÂŽ¯çÎŒ½8niêˆIÍs¸USÍIš‡;vvÚ³UõsR•7Nu×8©H|íéÅÓ·§ÌŽœ«8òq´ÕÙÞ+'ÑßÍ`œx¢9Rˆ	Õ®ºçMaR8úxä)¸'!Ïœ;±U¬×YÖ“’ÝsNIg:ÕKTëy¯3®gŽÍYìëÊkäãÉÜ³n'LO(œ¿3šw4ñ4î»¦ÇÏœÚêþl¬ñÎJ½–ªw½9Ý\\ìç•óóhf(¢_~ìòà}9Nö¦Õ\0–´åb\"¢Yé¤ƒTh,Úž¤@ú±D¡û€\$€Iž·;ŽeüèUÊn¨³ž·,¹OªÆ	Xÿg´-ÀžÉ+>ti'G‚öŽlª%\0­8âVBËU1«ye\0KTÆ4ûÁÈm’ºV2)\r]I/\rFù…ÔXˆ×Àß¨ña·­GŠÂ¹ò*ˆ§»žÿ>ERì÷ðî®¥ž‡ÑZ›-)I\$®¹íç:¦aË\0¾FybaÙg«w§­(ß_@§v}öiõÊ³î€S^Ë25DÔ³Ð	ÈôURO±ŸJHÖ\\ØisðfÆËKšN±€qi÷Sg×OÂŸ\n²F~|«µÏ*@gR€_Q<9sÜ¬3i+Ø—².Cw²²ê|‚øyË6aìOÜY9¶Œ¶É–\nëÔ½-([®±†_ˆ}íSû]c¤S=Â¤ÎÙþÎÍÔYÎàU-> <ú©µ\n<ÖsOôQ4F¦^}\0007uäk(/‹ŸÛ/5{Lÿ9µ\0§¬Ð &³Š[<ÏõŸsÛ\0&Íè#…@hÌéª3©V}ÐH¢Š*Üw+]'DÐ& @§Ö])µè;TGe3\\Îên®ÑßËd\$:¦uN4Åyktê-dR!7–­Ée4(P!•Ÿ-þ9À4ç_PMGbÄ±w…«ØÉ6O§S¦F‚âí)§Šyh0+€ž²§qT|·Š+uÔÿÎ+ A¬?òÞ	öTè3.q 41T´¸e›€\n:P ø¯–{Tî\n³ëh?«šTïAùS£­*«åÒ+åu¥>ú\\ê¾ZéíÊîYì·¢wEJö%·’s—L±¾dªšyÀ+\rCèœß¡'Añl,Òyå3þç²ËÍ—`º	_*ÑPû ThKDV²·–~5	à0´+á¼,š-?­]œºò3ëÖKå—`¯^†¸¤I42(]ªwž.æ†rÄÊËê]¬\nYÆ¨B†£­Ð	³í–}Ð‹R ¾ÉgØ}:H§ðJÄWP²ê„\"Þµ—ðôV\\¬<——? >½å—áÿ§Ü¬Ý†¿=¦…:Ÿ\n0×è\\+ñS–´æfÝUŒ³í‰U,…WCÖˆè•On¨òÎ…¢§.†e9|R÷I'©[×/º²ÄÙü2ù›«QžÓBn:ÆIõ\nö§g¼9Æ\rü,ÓR6³ýçÒQ\$XÝ+¸>–©±`\nù)/_8QiÔùµê—=‡êv?5v\0 \n¨çÉLG¥Dmˆw\\ëFÖŒ‡Ñ¢¯ÁdêŸµ}s‰\"‘ÃYv¤|â™J*´9h­¡Ñ@XEUÑ*Þ(oQ]\$Bžˆ,ûéÜƒ•KTœv¤AptCÉƒ\n×C,/˜<¡­Ú™EW‹-VïP¡¢=Wÿ*%Kê—-Q`9	(Êú59Ó€èm)ËX¸¨@ç2ø ýT@ˆÛ\nS–¯‘bd×EÎ´a€+€DXîá|UÚ	‹	’¡F® 2ú%5\nj•m«€WÙ+xêKŒæVÌ3#„¶CTÃek¤™–&Î,£l¬jbd7)Ó“\"\n+ìPüºb’èIŠ@è3Ñ•ÜµjUÒÌEsÞÔ)D¢fë’ƒõŠû•ÇPZ3AÎŒÕ\nwThð—²ªÛ˜Å4Zäª<Êuß©ßdqâËŠu(÷ž“bKG±à¥éÀnÓTï®ˆ]z¨f%#3IËfS¨®&}µ@D†@++ù¤Aíhª¿\nªï€U—Þ¥|B¡;”…UmÑÙU…E•N¥!ôx2±1Ò\0§GmvH~õÁHèTê)öW®³YNý\"åk5©ÑvT#=µÚ¥Ê<\n}‘#R3YƒHÅRÍIÍ³Ü¦;ÌÑRl£1léuB%TQJî™*ºêˆÙ'ºEë0i¬dw,¥zÊÍ¥:\$†¦;Í? üîj‘¿)§ô)ÔÊ\$32J}Å&‡[³\$¨õÌ¤;DnýE×´À+0ÛaZ{¨èC èû€(¤ê:“¸ ÚO@hø²D£æ\0¡‰`PTou“³ÄïF®\rQv‚û¨˜o½Ü¡\$Sîö+˜Ò#7À¤Izr…pk DW”ˆFsÍ9™ Qê  Ð°1€gÀÅ#•\0\\Là\$Ø 3€g©XŽyôy œ-3h›ÀþÃ!†nXèô]+±—	É€c\0È\0¼bØÅ\0\r‰ü‡-{ž\0ºQ(ðQÔ\$s€0…ºém(°[RuòVÆ÷ÒØ>Æ¼+àJ[©6à‘ÒàJ\0Ö—ú\\´¶ã,Òé‚Kš3ý.ê]a_\0RòJ Æ—`š^Ô¶ClRÛIKî–ù\n \$®nÅÒä¥ïKj–©\n€šÁ©~/¥ªmn˜].ª`ô¿ijÒâ¦#K¾˜f:`\0…éŒ€6¦7Kâ–¨zcôÂ\0’Òõ¦/K®–­/ªdôÄé‡FE\0aLŽ˜¤dZ`ƒJé†S‘ÏÊ™…2ØÍ4Î@/Æ(Œ‹Lò™õ0ª`´Ä©†€_ŽLþ™]4ZhôÐ©šSD¦M˜…4:cÑé‹SR¥×M—E4šiò€éžSG¦EMj˜å4zdÔÕ©–SFKLª›%4ªeÔÏ%\$ÓlKM2–õ1ÈÚ”Ôi¦Ó©MV›­.¸Ú”Öi´Ó©Lz›/ˆ÷ôÛ£Ó„¦ÑMæ›,`Š_ôàimSŠ¦gMÆœ€jg‘òéÇÓ5¦9.›…9j_òéºS¥µ.›Å9ê_±òé¾Sˆ¦‹.œ7Úrò)ÉÓ%§[2m8ºuTæé™S±§3M:]3ºq”èänÓ±§KNˆ1|^ÒktÏ\"ÒÓH§gKjž-;zcñiÎÓš§–\r<ê_²-iÊÓ¸¥ñ\"ÖžU.¹´óiëRÚ‘kOFží=:\\ôÏ\$ZÓ©§MLE­5úxôø©ÂÓ»_\"Öœ=<\0ñtéÙSç¦9OÒž­1Š~”öi²Óô§¹Oêí>ê~qœ)òF¸¨’ =6:~ÔõãJÔ‘ÏP:ŸÍ=¨åTÿ)¢Æ«§ÿPJ8õ@êwôô©÷Ç*§ÍOÊ5]>ªt÷£•T\n§å!\" 6Y	)€ÈH¨/Pªž…3É	éð†/‘P~ àù	ªÓ®¨!\"ŸC’ÌÔýj¡ ¨eNJ¡üˆêˆñÔ*%Ô4¦1Q¡ÅCZ‡Q‘jTBQ.¢\rE)\0004Ëê\$€2¨SM+å<j„t¿j0Ô,¦9Q†¡}F\0\$±s©žTa¨KÎ£]Ecj*€'K»M¾—MGx½ÕRÇT1¦#Qê¡¥GªŠ5ª:Ôz¨Lš¡4u6z•\"j\"TˆKuNÖ£ýGÚg\$jFSÜ¨ïQ2¤¥Høîµ\"êMTƒ©%R¤•HzŽÕ\$ª,Ôw¨Re.\$rªzµ)©ÛÔ¦©-Qö ÍJ„¹‘Êª@Ô°©=R&/IÊ•1†*]T³‹À7¼˜¾QÒåD&Ó©qN¦_(´q²c[TwŒQRôå´œJš\0nâ÷T­¨û.¦˜956cÔÜŒÕSz¥H˜Á•7ªRÔ}ŽSr8¥NŠšÕ\"bÖTè§ÁQÞ5MNŠ–õ#ãçÔè©ESÂ§-H˜Á7\"ÜTü©_Sê§}GØÌ•?*yÔ©‹‡Sò§½P*Ÿ5#âöÔÜÏT:§]PÊŸõC*€Ô‰‹T:¨-K8Æ5Cª„ÕªR¦--MÈ¾•HªˆÕ ª'T‚¨­HøËõHªŒÔÑ‹×TŠ¨íRª£õ,âéÔÜ‹GTÚ©-SJ¤õM*”Ô©‹UTÚ©mMH¸õMª˜Õ>ªgSD³5MÈÂ•RªœÕHªwU\"©íK8ÕÕRª ÔÚŒ¡U*ª-U*¨ànÂ¾TÙIR­,t¢Z«ÕêY¶IUF«51ª¬µW)vÕk‹_KÆ«pJ«5Zj­Å¯©R4r\n¬^jIÓCKº„‚ª}UÊ“_ª°Ô›ªãO¬=N·R*¯F-ª½Rž¬%Wš‹Õcê¦Õ\\ŽaV>«EYj–µdªªÔÃ«UÎ¬µWXÍ5*ÈÕ‹’¹Uy‚õZŠ°1kã™Õ¨«7Vš¬R\\HÍ5h*ÖU¢©ÏUÆ§M[Š²±kêvÕ¸«3Vò­}[(ä5WªzÕ¸«iB­Oº®1¯ê¯Tý«—V®;­[øîµpRæGu«;T@0>\0‚ê/I³ªÿW`í]¦ô\0ªîÆ8«¿PŠ¯]ÈÍ1m*ïÕÇyUz¨mW¡õ|ªÝ“[«¡Ö¯…]J¬ÑˆêøU±««ö¯…Z*¤5\\j‘Ö«ëZªô`ZÁ5~ª®Eì¬Wú«4ZšÁ5h£QÕ^‹cXZ®•Sú®1o«Vª¹U&«TºÄ5}cU^›Xš°dm*³±’kUu¥«SfG=[¹õjäsÕ¿‘ÏX¦Kc\n®iRâHç«i#ž±uWt»µª½¥º«»XÂÕcÄ¹•«U†¬”rÚ¢õUZ‹Õ‡ƒNE¢¬‘Xº¬…4ÚÈudê·Eä¬eV^²íKÉànâòV8‹sXÂ¥ÍfÇõ/ÂhJ³-J]Ó‚…™ÓÎÁÕzO›±<Eh‰\$å‹“·¡ó\0Kœë<bw„ñ…>·”øNž\")]b£	â+zê.cS.¢iFç	ã£µQNQ«éV*ªéÛÎúÞO[X¤nxŠ¤P	k­§oNø£}<aOò§Iß“Áh·ºšT;òrñ‰‰¤ƒVD6Qß;zŠ]j×~'’:ë–[Ivôó7^Ê‘§ÖÁžjëºw[«ùæîºçœÊÅ†¥:u ÅDs#¦¿Î\\wµ<n|*á‰hëmÎKv;YÒˆ±Ú3á]Œ«^#—Zªj¥gy³jÄ§Y,”%;3¾³ÊÚù×.ÈW\"‘Ã\$Ù3>gÚœºÏÓÏ¦ªVTóZj¥hYÝjžkD*!šh&XzËiª•¥+GV—­\"¥æ¸Z:Ò¤§+‡NoG¥Zjj¥iÉ]ÊžkOÐ_­Ö¬ÔmjIª•¨§t¯–#½[âj\rnŠãê©×Ðn™ßZ¥_,Õé†ógÎÄš©:¹¼Å9‰Áÿ«[L2®W=TÔ×0®ãf¶\0P®U6\ns%7isYæ?£¿uá3¾’½nb5¡«Ÿ»šX|G~l•&×k¤¥·M§ †¯ú¶ŒÏy¡S–É)Î]œÜ­r·¶Ù¸µ¸æìÖê›Å?Õ}u'n0W-Î¹®æb·´ÇªìõŸk?»vQý7…Ü}p\nìõÀ’ÍÙ®Z*»9)Êá5Þ•ZW­-ZB¸²Œ:ìõã«ŠW\0WZfp•GpõîÍÙ®:Fpú¤ŠäUÙëSN/™Ï\\©Ü%s9¬S{§ ×8®ÏZÍasÊÛ“’+¢N^®“9™MÕ{…P5Óç ×Q®ÔîJº¢«y§õÕè;œÚîz¸ƒÂÕYÚV Ä3—:ïœDÅIŠÃ+ç‡ý¯£19M;º¥Œ’ô¨“V´®š\rQ{êÉÕ®•¶Å+£ƒFCLÄ¹ŠN¥–©Ôˆ\\ùÞ)\$iŒŽÛN'\0¦°PŠÂšõÊÇ]XÌ^s1òf&Š\"'<OøóšÌ¡ËL\0¹\"‡@Ö”¥%ä6úÂUAõ1ýi(zÌèÝ€\rÒÕ‚ä±ÈbZÀ”+IQOï3€ºË\r=*Ä‰ ‰)ñ¨!Áž Ð`ª¼h°ˆ,Ð«mGPCËA Ù²íƒA„Œ(ZÅ°%ƒtì,h/Á‰ˆi–Èk¬«¡XEJ6ð±„IDèÈ¬\"›\nïaU- ›«\nvŽy°_€ÄÂÂ›Ú«¯k	a½B<ÇVÂƒÛD»/P»ôaîÁ)9Lã¶(Z‚°8êvvÃ¹Øk	§oÐZXkäÑå§|´&°.Âæ±C¹’Øá°`€1€]7&Ä™+™H¤CBcX“B7xXó|1“€0¦ãaš6š°ubpJLÇ…–(·š÷mbl8I¶*Rö—@tk0€—¡¯ÅxXÛÁÓ;ÁÅ al]4s°t¿íÅªð0§c‡'´ælß`8MŒ8‘ÀÃ€D4w`p?@706gÌˆ~K±\r‚Û “P´…Ùbh€\"&¯\nìq‘PDÈÐÎó\$Ð(Í0QP<÷°àÀã¬Q!X´…xúÔ5€ˆR·`w/2°2#ŠÀ¸Ž `¬»‘1†/ˆÜ\r¡Ö:Â²–±¢£B7öV7ZŒ›gMYúH3È „ÙbÎ	ZÁÓJÅöGâwÙgl^Æ-‘R-!Íl“7Ì²Lõ†Æ°<1 íQC/Õ²h¼à)ÏWž6C	÷*dˆþ6]VK!mì…ØÜã€05G\$–R˜µ4¯±=Cw&[æ«YP²›dÉš³')VK,¨5eÈ\rÞÊè†K+ï1„X)bÛe)ÄâuF2A#EÑ&g~‘e¡y’fp5¨lYl²Ôœ5õƒö¿Ö\nÂŠÙm}`‚(¬M Pl9Yÿfø±ýÖ]€Vl-4ŽÃ©¦«ÂÁ>`À•/û³fPE™i‹\0k™vÆ\0ßfhS0±&ÍÂ¦lÍ¼¢#fuåÌû5	i%ÿ:Fd€ö9Ž™Ø€G<ä	{ö}ìÂs[7\0á¬Îž3íft:+.È”–p >ØÕ±£@!Pas6q,À³—1bÇ¬Å‹ãZK°ê±Ü-ú“ar`•?RxXÁé‘¡ÏVïú˜#Ä¤ÔzÂ; ÀD€•¾H²Á1¥’6D`žþYê`÷RÅPÖ‹>-Æ!\$Ùù³ì×~Ï€ÐÅà`>Ùï³õhÔ0ô1†À¬–&\0Ãh—ëûI–wlûZ„\$“\\\r¡8¶~,\nºo_áÀB2D´–ƒa1ê³àÇ©=¢v<ÏkF´p``”kBF¶6 ÄÖ²—hÆÉT TÖŽ	‡@?drÑå‰€JÀH@1°G´dnÁÒw‡Æ%äÚJGšÒ0bðTf]m(Øk´qg\\í½ó¸–¬ë°ê ÈÑˆ3vk'ý^d´¨AXÿ™~ÇW™VsÂ*¼Ê±æd´ûM À¬@?²ÄÓ}§6\\–m9<Î±i”Ý§›ˆÔ¬h½^s}æ-¦[Kœs±qãbÎÓ-“öOORm8\$ÞywÄì##°Œ@â·\0ôÒØ¤ 5F7ö¨ƒ X\nÓÀ|JË/-S™W!fÇ† 0¶,w½¨D4Ù¡RU¥T´ž’îÕðZXÇ=í`‰W\$@âÔ¥(‹XG§‹ÒŠµ—a>Ö*ûY¶²ˆ\n³ü\nŒìš!«[mjœµŠ0,mu¬W@ FXúÚÎòðü=­ (¦ý­b¿ý<!\n\"”ª83Ã'¦‚(R™Ý\n>”ù@¨W¦r!L£HÅkÌ\rˆE\nWÆÞ\r¢‚'FHœ\$£‹ääÀm„È=ÔÛ¥{LY—…&ÑÜ£_\0ŽÆüÝ#¢ä”€[„9\0¤\"ÔÒ@8ÄiKª¹ö0Ùl‰ÑÐp\ngî‚Û'qbF–Øyá«cl@9Û(#JU«Ý²ƒ{io­‘¥.{ÔÍ³4ÞVÍŠVnFÉxðÑüzÎ QàÞž\$kSa~Ê¨0s@£À«%…y@•À5HŽ†NÎÍ¦´@†x’#	Ü« /\\¥Ö?<hÚ‚ù…¼ITŒ :3Ã\n%—¸");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0!„©ËíMñÌ*)¾oú¯) q•¡eˆµî#ÄòLË\0;";break;case"cross.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0#„©Ëí#\naÖFo~yÃ._wa”á1ç±JîGÂL×6]\0\0;";break;case"up.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMQN\nï}ôža8ŠyšaÅ¶®\0Çò\0;";break;case"down.gif":echo"GIF89a\0\0\0001îîî\0\0€™™™\0\0\0!ù\0\0\0,\0\0\0\0\0\0 „©ËíMñÌ*)¾[Wþ\\¢ÇL&ÙœÆ¶•\0Çò\0;";break;case"arrow.gif":echo"GIF89a\0\n\0€\0\0€€€ÿÿÿ!ù\0\0\0,\0\0\0\0\0\n\0\0‚i–±‹ž”ªÓ²Þ»\0\0;";break;}}exit;}if($_GET["script"]=="version"){$hd=file_open_lock(get_temp_dir()."/adminer.version");if($hd)file_write_unlock($hd,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$g,$m,$dc,$lc,$vc,$n,$jd,$pd,$ba,$Od,$x,$ca,$je,$kf,$Vf,$Ah,$ud,$hi,$ni,$wi,$Ci,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$If=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$If[]=true;call_user_func_array('session_set_cookie_params',$If);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Uc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'en';}function
lang($mi,$bf=null){if(is_array($mi)){$Yf=($bf==1?0:1);$mi=$mi[$Yf];}$mi=str_replace("%d","%s",$mi);$bf=format_number($bf);return
sprintf($mi,$bf);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$Yf=array_search("SQL",$b->operators);if($Yf!==false)unset($b->operators[$Yf]);}function
dsn($ic,$V,$F,$sf=array()){try{parent::__construct($ic,$V,$F,$sf);}catch(Exception$_c){auth_error(h($_c->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($G,$xi=false){$H=parent::query($G);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch();return$J[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$dc=array();class
Min_SQL{var$_conn;function
__construct($g){$this->_conn=$g;}function
select($R,$L,$Z,$md,$uf=array(),$z=1,$E=0,$gg=false){global$b,$x;$Vd=(count($md)<count($L));$G=$b->selectQueryBuild($L,$Z,$md,$uf,$z,$E);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$md&&$Vd&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($md&&$Vd?"\nGROUP BY ".implode(", ",$md):"").($uf?"\nORDER BY ".implode(", ",$uf):""),($z!=""?+$z:null),($E?$z*$E:0),"\n");$xh=microtime(true);$I=$this->_conn->query($G);if($gg)echo$b->selectQuery($G,$xh,!$I);return$I;}function
delete($R,$qg,$z=0){$G="FROM ".table($R);return
queries("DELETE".($z?limit1($R,$G,$qg):" $G$qg"));}function
update($R,$O,$qg,$z=0,$M="\n"){$Oi=array();foreach($O
as$y=>$X)$Oi[]="$y = $X";$G=table($R)." SET$M".implode(",$M",$Oi);return
queries("UPDATE".($z?limit1($R,$G,$qg,$M):" $G$qg"));}function
insert($R,$O){return
queries("INSERT INTO ".table($R).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($R,$K,$eg){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$Yh){}function
convertSearch($u,$X,$o){return$u;}function
value($X,$o){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$o):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($Sg){return
q($Sg);}function
warnings(){return'';}function
tableHelp($C){}}$dc["sqlite"]="SQLite 3";$dc["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$bg=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($Tc){$this->_link=new
SQLite3($Tc);$Ri=$this->_link->version();$this->server_info=$Ri["versionString"];}function
query($G){$H=@$this->_link->query($G);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$e=$this->_offset++;$U=$this->_result->columnType($e);return(object)array("name"=>$this->_result->columnName($e),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($Tc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Tc);}function
query($G,$xi=false){$Ne=($xi?"unbufferedQuery":"query");$H=@$this->_link->$Ne($G,SQLITE_BOTH,$n);$this->error="";if(!$H){$this->error=$n;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$y=>$X)$I[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$Uf='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Uf\\.)?$Uf\$~",$C,$B)){$R=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($Tc){$this->dsn(DRIVER.":$Tc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($Tc){if(is_readable($Tc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Tc)?$Tc:dirname($_SERVER["SCRIPT_FILENAME"])."/$Tc")." AS a")){parent::__construct($Tc);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$eg){$Oi=array();foreach($K
as$O)$Oi[]="(".implode(", ",$O).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Oi));}function
tableHelp($C){if($C=="sqlite_sequence")return"fileformat2.html#seqtab";if($C=="sqlite_master")return"fileformat2.html#$C";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){global$g;return(preg_match('~^INTO~',$G)||$g->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$M):" $G WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$M."LIMIT 1)");}function
db_collation($l,$ob){global$g;return$g->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($k){return
array();}function
table_status($C=""){global$g;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){$J["Rows"]=$g->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($C!=""?$I[$C]:$I);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$g;return!$g->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$g;$I=array();$eg="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$J){$C=$J["name"];$U=strtolower($J["type"]);$Rb=$J["dflt_value"];$I[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Rb,$B)?str_replace("''","'",$B[1]):($Rb=="NULL"?null:$Rb)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($eg!="")$I[$eg]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$I[$C]["auto_increment"]=true;$eg=$C;}}$sh=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$sh,$_e,PREG_SET_ORDER);foreach($_e
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($I[$C])$I[$C]["collation"]=trim($B[3],"'");}return$I;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$sh=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$sh,$B)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$_e,PREG_SET_ORDER);foreach($_e
as$B){$I[""]["columns"][]=idf_unescape($B[2]).$B[4];$I[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$I){foreach(fields($R)as$C=>$o){if($o["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$vh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$h);foreach(get_rows("PRAGMA index_list(".table($R).")",$h)as$J){$C=$J["name"];$v=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$h)as$Rg){$v["columns"][]=$Rg["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$vh[$C],$Bg)){preg_match_all('/("[^"]*+")+( DESC)?/',$Bg[2],$_e);foreach($_e[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$I[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$I[""]["columns"]||$v["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$C))$I[$C]=$v;}return$I;}function
foreign_keys($R){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$J){$q=&$I[$J["id"]];if(!$q)$q=$J;$q["source"][]=$J["from"];$q["target"][]=$J["to"];}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$g->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
check_sqlite_name($C){global$g;$Jc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Jc)\$~",$C)){$g->error=sprintf('Please use one of the extensions %s.',str_replace("|",", ",$Jc));return
false;}return
true;}function
create_database($l,$d){global$g;if(file_exists($l)){$g->error='File exists.';return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$_c){$g->error=$_c->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$g;$g->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$g->error='File exists.';return
false;}}return
true;}function
rename_database($C,$d){global$g;if(!check_sqlite_name($C))return
false;$g->__construct(":memory:");$g->error='File exists.';return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$C,$p,$bd,$tb,$tc,$d,$La,$Of){$Ii=($R==""||$bd);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Ii=true;break;}}$c=array();$Cf=array();foreach($p
as$o){if($o[1]){$c[]=($Ii?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$Cf[$o[0]]=$o[1][0];}}if(!$Ii){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$C&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($R,$C,$c,$Cf,$bd))return
false;if($La)queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($C));return
true;}function
recreate_table($R,$C,$p,$Cf,$bd,$w=array()){if($R!=""){if(!$p){foreach(fields($R)as$y=>$o){if($w)$o["auto_increment"]=0;$p[]=process_field($o,$o);$Cf[$y]=idf_escape($y);}}$fg=false;foreach($p
as$o){if($o[6])$fg=true;}$gc=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$gc[$X[1]]=true;unset($w[$y]);}}foreach(indexes($R)as$de=>$v){$f=array();foreach($v["columns"]as$y=>$e){if(!$Cf[$e])continue
2;$f[]=$Cf[$e].($v["descs"][$y]?" DESC":"");}if(!$gc[$de]){if($v["type"]!="PRIMARY"||!$fg)$w[]=array($v["type"],$de,$f);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$bd[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$de=>$q){foreach($q["source"]as$y=>$e){if(!$Cf[$e])continue
2;$q["source"][$y]=idf_unescape($Cf[$e]);}if(!isset($bd[" $de"]))$bd[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($bd));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$C":$C)." (\n".implode(",\n",$p)."\n)"))return
false;if($R!=""){if($Cf&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$Cf).") SELECT ".implode(", ",array_map('idf_escape',array_keys($Cf)))." FROM ".table($R)))return
false;$ti=array();foreach(triggers($R)as$ri=>$Zh){$qi=trigger($ri);$ti[]="CREATE TRIGGER ".idf_escape($ri)." ".implode(" ",$Zh)." ON ".table($C)."\n$qi[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$w))return
false;foreach($ti
as$qi){if(!queries($qi))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$C,$f){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($R."_"))." ON ".table($R)." $f";}function
alter_indexes($R,$c){foreach($c
as$eg){if($eg[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Ti){return
apply_queries("DROP VIEW",$Ti);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Ti,$Qh){return
false;}function
trigger($C){global$g;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$si=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$si["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$g->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);$df=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($df?" OF":""),"Of"=>($df[0]=='`'||$df[0]=='"'?idf_unescape($df):$df),"Trigger"=>$C,"Statement"=>$B[4],);}function
triggers($R){$I=array();$si=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$J){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$si["Timing"]).')\s*(.*)\s+ON\b~iU',$J["sql"],$B);$I[$J["name"]]=array($B[1],$B[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ROWID()");}function
explain($g,$G){return$g->query("EXPLAIN QUERY PLAN $G");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Vg){return
true;}function
create_sql($R,$La,$Bh){global$g;$I=$g->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$C=>$v){if($C=='')continue;$I.=";\n\n".index_sql($R,$v['type'],$C,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$I;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($j){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$g;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$I[$y]=$g->result("PRAGMA $y");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$rf){list($y,$X)=explode("=",$rf,2);$I[$y]=$X;}return$I;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Oc);}$x="sqlite";$wi=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Ah=array_keys($wi);$Ci=array();$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$jd=array("hex","length","lower","round","unixepoch","upper");$pd=array("avg","count","count distinct","group_concat","max","min","sum");$lc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$dc["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$bg=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($wc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$F){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Ri=pg_version($this->_link);$this->server_info=$Ri["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$o){return($o["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$xi=false){$H=@pg_query($this->_link,$G);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);$I=false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);$I=true;}else$I=new
Min_Result($H);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$e);$I->name=pg_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$e);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($N,$V,$F){global$b;$l=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
quoteBinary($Sg){return
q($Sg);}function
query($G,$xi=false){$I=parent::query($G,$xi);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$I;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$eg){global$g;foreach($K
as$O){$Di=array();$Z=array();foreach($O
as$y=>$X){$Di[]="$y = $X";if(isset($eg[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Di)." WHERE ".implode(" AND ",$Z))&&$g->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}function
slowQuery($G,$Yh){$this->_conn->query("SET statement_timeout = ".(1000*$Yh));$this->_conn->timeout=1000*$Yh;return$G;}function
convertSearch($u,$X,$o){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$o["type"])?$u:"CAST($u AS text)");}function
quoteBinary($Sg){return$this->_conn->quoteBinary($Sg);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($C){$te=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$te[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$C).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$wi,$Ah;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2])){if(min_version(9,0,$g)){$g->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$g)){$Ah['Strings'][]="json";$wi["json"]=4294967295;if(min_version(9.4,0,$g)){$Ah['Strings'][]="jsonb";$wi["jsonb"]=4294967295;}}}return$g;}return$g->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$M):" $G".(is_view(table_status1($R))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$M."LIMIT 1)"));}function
db_collation($l,$ob){global$g;return$g->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($k){return
array();}function
table_status($C=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", CASE WHEN c.relhasoids THEN 'oid' ELSE '' END AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($C!=""?$I[$C]:$I);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$I=array();$Ca=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$B);list(,$U,$qe,$J["length"],$wa,$Fa)=$B;$J["length"].=$Fa;$db=$U.$wa;if(isset($Ca[$db])){$J["type"]=$Ca[$db];$J["full_type"]=$J["type"].$qe.$Fa;}else{$J["type"]=$U;$J["full_type"]=$J["type"].$qe.$wa.$Fa;}$J["null"]=!$J["attnotnull"];$J["auto_increment"]=preg_match('~^nextval\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$J["default"],$B))$J["default"]=($B[1]=="NULL"?null:(($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2]));$I[$J["field"]]=$J;}return$I;}function
indexes($R,$h=null){global$g;if(!is_object($h))$h=$g;$I=array();$Jh=$h->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$f=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Jh AND attnum > 0",$h);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Jh AND ci.oid = i.indexrelid",$h)as$J){$Cg=$J["relname"];$I[$Cg]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$Cg]["columns"]=array();foreach(explode(" ",$J["indkey"])as$Kd)$I[$Cg]["columns"][]=$f[$Kd];$I[$Cg]["descs"]=array();foreach(explode(" ",$J["indoption"])as$Ld)$I[$Cg]["descs"][]=($Ld&1?'1':null);$I[$Cg]["lengths"]=array();}return$I;}function
foreign_keys($R){global$kf;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$B)){$J['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$ze)){$J['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ze[2]));$J['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$ze[4]));}$J['target']=array_map('trim',explode(',',$B[3]));$J['on_delete']=(preg_match("~ON DELETE ($kf)~",$B[4],$ze)?$ze[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($kf)~",$B[4],$ze)?$ze[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
view($C){global$g;return
array("select"=>trim($g->result("SELECT view_definition
FROM information_schema.views
WHERE table_schema = current_schema() AND table_name = ".q($C))));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$g;$I=h($g->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$I,$B))$I=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\1<b>\2</b>',$B[2]).$B[4];return
nl_br($I);}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" ENCODING ".idf_escape($d):""));}function
drop_databases($k){global$g;$g->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($C,$d){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($R,$C,$p,$bd,$tb,$tc,$d,$La,$Of){$c=array();$pg=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $e";else{$Ni=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($e!=$X[0])$pg[]="ALTER TABLE ".table($R)." RENAME $e TO $X[0]";$c[]="ALTER $e TYPE$X[1]";if(!$X[6]){$c[]="ALTER $e ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $e ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Ni!="")$pg[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Ni!=""?substr($Ni,9):"''");}}$c=array_merge($c,$bd);if($R=="")array_unshift($pg,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($pg,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$C)$pg[]="ALTER TABLE ".table($R)." RENAME TO ".table($C);if($R!=""||$tb!="")$pg[]="COMMENT ON TABLE ".table($C)." IS ".q($tb);if($La!=""){}foreach($pg
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($R,$c){$i=array();$ec=array();$pg=array();foreach($c
as$X){if($X[0]!="INDEX")$i[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$ec[]=idf_escape($X[1]);else$pg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($i)array_unshift($pg,"ALTER TABLE ".table($R).implode(",",$i));if($ec)array_unshift($pg,"DROP INDEX ".implode(", ",$ec));foreach($pg
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Ti){return
drop_tables($Ti);}function
drop_tables($T){foreach($T
as$R){$P=table_status($R);if(!queries("DROP ".strtoupper($P["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Ti,$Qh){foreach(array_merge($T,$Ti)as$R){$P=table_status($R);if(!queries("ALTER ".strtoupper($P["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($Qh)))return
false;}return
true;}function
trigger($C,$R=null){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$K=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($C));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$J)$I[$J["trigger_name"]]=array($J["action_timing"],$J["event_manipulation"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($C,$U){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($C));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($C).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($C,$J){$I=array();foreach($J["fields"]as$o)$I[]=$o["type"];return
idf_escape($C)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($g,$G){return$g->query("EXPLAIN $G");}function
found_rows($S,$Z){global$g;if(preg_match("~ rows=([0-9]+)~",$g->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Bg))return$Bg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$g;return$g->result("SELECT current_schema()");}function
set_schema($Ug){global$g,$wi,$Ah;$I=$g->query("SET search_path TO ".idf_escape($Ug));foreach(types()as$U){if(!isset($wi[$U])){$wi[$U]=0;$Ah['User types'][]=$U;}}return$I;}function
create_sql($R,$La,$Bh){global$g;$I='';$Kg=array();$eh=array();$P=table_status($R);$p=fields($R);$w=indexes($R);ksort($w);$Yc=foreign_keys($R);ksort($Yc);if(!$P||empty($p))return
false;$I="CREATE TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." (\n    ";foreach($p
as$Qc=>$o){$Lf=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$Kg[]=$Lf;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$_e)){$dh=$_e[1];$rh=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($dh):"SELECT * FROM $dh"));$eh[]=($Bh=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $dh;\n":"")."CREATE SEQUENCE $dh INCREMENT $rh[increment_by] MINVALUE $rh[min_value] MAXVALUE $rh[max_value] START ".($La?$rh['last_value']:1)." CACHE $rh[cache_value];";}}if(!empty($eh))$I=implode("\n\n",$eh)."\n\n$I";foreach($w
as$Fd=>$v){switch($v['type']){case'UNIQUE':$Kg[]="CONSTRAINT ".idf_escape($Fd)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$Kg[]="CONSTRAINT ".idf_escape($Fd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($Yc
as$Xc=>$Wc)$Kg[]="CONSTRAINT ".idf_escape($Xc)." $Wc[definition] ".($Wc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$I.=implode(",\n    ",$Kg)."\n) WITH (oids = ".($P['Oid']?'true':'false').");";foreach($w
as$Fd=>$v){if($v['type']=='INDEX')$I.="\n\nCREATE INDEX ".idf_escape($Fd)." ON ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." USING btree (".implode(', ',array_map('idf_escape',$v['columns'])).");";}if($P['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." IS ".q($P['Comment']).";";foreach($p
as$Qc=>$o){if($o['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($P['nspname']).".".idf_escape($P['Name']).".".idf_escape($Qc)." IS ".q($o['comment']).";";}return
rtrim($I,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$P=table_status($R);$I="";foreach(triggers($R)as$pi=>$oi){$qi=trigger($pi,$P['Name']);$I.="\nCREATE TRIGGER ".idf_escape($qi['Trigger'])." $qi[Timing] $qi[Events] ON ".idf_escape($P["nspname"]).".".idf_escape($P['Name'])." $qi[Type] $qi[Statement];;\n";}return$I;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Oc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$g;return$g->result("SHOW max_connections");}$x="pgsql";$wi=array();$Ah=array();foreach(array('Numbers'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Date and time'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Strings'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binary'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'Network'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometry'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$wi+=$X;$Ah[$y]=array_keys($X);}$Ci=array();$pf=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$jd=array("char_length","lower","round","to_hex","to_timestamp","upper");$pd=array("avg","count","count distinct","max","min","sum");$lc=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$dc["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$bg=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($wc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$F){$this->_link=@oci_new_connect($V,$F,$N,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
true;}function
query($G,$xi=false){$H=oci_parse($this->_link,$G);$this->error="";if(!$H){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$H=$this->query($G);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'OCI-Lob'))$J[$y]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$e=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$e);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$e);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($N,$V,$F){$this->dsn("oci:dbname=//$N;charset=AL32UTF8",$V,$F);return
true;}function
select_db($j){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$z,$D=0,$M=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($z+$D).") WHERE rnum > $D":($z!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($z+$D):" $G$Z"));}function
limit1($R,$G,$Z,$M="\n"){return" $G$Z";}function
db_collation($l,$ob){global$g;return$g->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($C=""){$I=array();$Wg=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $Wg":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $Wg":"")."
ORDER BY 1")as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$I=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$J){$U=$J["DATA_TYPE"];$qe="$J[DATA_PRECISION],$J[DATA_SCALE]";if($qe==",")$qe=$J["DATA_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$U.($qe?"($qe)":""),"type"=>strtolower($U),"length"=>$qe,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($R,$h=null){$I=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$h)as$J){$Fd=$J["INDEX_NAME"];$I[$Fd]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$Fd]["columns"][]=$J["COLUMN_NAME"];$I[$Fd]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$Fd]["descs"][]=($J["DESCEND"]?'1':null);}return$I;}function
view($C){$K=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($K);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
explain($g,$G){$g->query("EXPLAIN PLAN FOR $G");return$g->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$C,$p,$bd,$tb,$tc,$d,$La,$Of){$c=$ec=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($R!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$ec[]=idf_escape($o[0]);}if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$ec||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$ec).")"))&&($R==$C||queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)));}function
foreign_keys($R){$I=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($G)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Ti){return
apply_queries("DROP VIEW",$Ti);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$g;return$g->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Vg){global$g;return$g->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Vg));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Oc);}$x="oracle";$wi=array();$Ah=array();foreach(array('Numbers'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Date and time'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Strings'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binary'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$wi+=$X;$Ah[$y]=array_keys($X);}$Ci=array();$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$jd=array("length","lower","round","upper");$pd=array("avg","count","count distinct","max","min","sum");$lc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$dc["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$bg=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($N,$V,$F){$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$N),array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8"));if($this->_link){$Md=sqlsrv_server_info($this->_link);$this->server_info=$Md['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$xi=false){$H=sqlsrv_query($this->_link,$G);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'DateTime'))$J[$y]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$o["Name"];$I->orgname=$o["Name"];$I->type=($o["Type"]==1?254:0);return$I;}function
seek($D){for($s=0;$s<$D;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($N,$V,$F){$this->_link=@mssql_connect($N,$V,$F);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($H){$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($G,$xi=false){$H=@mssql_query($G,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($D){mssql_data_seek($this->_result,$D);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($N,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$N)),$V,$F);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$eg){foreach($K
as$O){$Di=array();$Z=array();foreach($O
as$y=>$X){$Di[]="$y = $X";if(isset($eg[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Di)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2]))return$g;return$g->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$z,$D=0,$M=" "){return($z!==null?" TOP (".($z+$D).")":"")." $G$Z";}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$ob){global$g;return$g->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$g;return$g->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$g;$I=array();foreach($k
as$l){$g->select_db($l);$I[$l]=$g->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($C=""){$I=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$J){$U=$J["type"];$qe=(preg_match("~char|binary~",$U)?$J["max_length"]:($U=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$U.($qe?"($qe)":""),"type"=>$U,"length"=>$qe,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],);}return$I;}function
indexes($R,$h=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$h)as$J){$C=$J["name"];$I[$C]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$C]["lengths"]=array();$I[$C]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$C]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$g->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$d)$I[preg_replace('~_.*~','',$d)][]=$d;return$I;}function
information_schema($l){return
false;}function
error(){global$g;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$g->error)));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$d)?" COLLATE $d":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($C,$d){if(preg_match('~^[a-z0-9_]+$~i',$d))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $d");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$C,$p,$bd,$tb,$tc,$d,$La,$Of){$c=array();foreach($p
as$o){$e=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $e";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($bd[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($e!=$X[0])queries("EXEC sp_rename ".q(table($R).".$e").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$C)queries("EXEC sp_rename ".q(table($R)).", ".q($C));if($bd)$c[""]=$bd;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $y".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$v=array();$ec=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$ec[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$ec||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$ec)));}function
last_id(){global$g;return$g->result("SELECT SCOPE_IDENTITY()");}function
explain($g,$G){$g->query("SET SHOWPLAN_ALL ON");$I=$g->query($G);$g->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($S,$Z){}function
foreign_keys($R){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$J){$q=&$I[$J["FK_NAME"]];$q["table"]=$J["PKTABLE_NAME"];$q["source"][]=$J["FKCOLUMN_NAME"];$q["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Ti){return
queries("DROP VIEW ".implode(", ",array_map('table',$Ti)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Ti,$Qh){return
apply_queries("ALTER SCHEMA ".idf_escape($Qh)." TRANSFER",array_merge($T,$Ti));}function
trigger($C){if($C=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$I["text"]);return$I;}function
triggers($R){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$g;if($_GET["ns"]!="")return$_GET["ns"];return$g->result("SELECT SCHEMA_NAME()");}function
set_schema($Ug){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Oc);}$x="mssql";$wi=array();$Ah=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Date and time'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Strings'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binary'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$wi+=$X;$Ah[$y]=array_keys($X);}$Ci=array();$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$jd=array("len","lower","round","upper");$pd=array("avg","count","count distinct","max","min","sum");$lc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$dc['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$bg=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$F){$this->_link=ibase_connect($N,$V,$F);if($this->_link){$Gi=explode(':',$N);$this->service_link=ibase_service_attach($Gi[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return($j=="domain");}function
query($G,$xi=false){$H=ibase_query($G,$this->_link);if(!$H){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($H===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2]))return$g;return$g->error;}function
get_databases($Zc){return
array("domain");}function
limit($G,$Z,$z,$D=0,$M=" "){$I='';$I.=($z!==null?$M."FIRST $z".($D?" SKIP $D":""):"");$I.=" $G$Z";return$I;}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$ob){}function
engines(){return
array();}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
tables_list(){global$g;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$H=ibase_query($g->_link,$G);$I=array();while($J=ibase_fetch_assoc($H))$I[$J['RDB$RELATION_NAME']]='table';ksort($I);return$I;}function
count_tables($k){return
array();}function
table_status($C="",$Nc=false){global$g;$I=array();$Kb=tables_list();foreach($Kb
as$v=>$X){$v=trim($v);$I[$v]=array('Name'=>$v,'Engine'=>'standard',);if($C==$v)return$I[$v];}return$I;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$g;$I=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$H=ibase_query($g->_link,$G);while($J=ibase_fetch_assoc($H))$I[trim($J['FIELD_NAME'])]=array("field"=>trim($J["FIELD_NAME"]),"full_type"=>trim($J["FIELD_TYPE"]),"type"=>trim($J["FIELD_SUB_TYPE"]),"default"=>trim($J['FIELD_DEFAULT_VALUE']),"null"=>(trim($J["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($J["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($J["FIELD_DESCRIPTION"]),);return$I;}function
indexes($R,$h=null){$I=array();return$I;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$g;return
h($g->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ug){return
true;}function
support($Oc){return
preg_match("~^(columns|sql|status|table)$~",$Oc);}$x="firebird";$pf=array("=");$jd=array();$pd=array();$lc=array();}$dc["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$bg=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($G,$xi=false){$If=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$If['NextToken']=$this->next;$H=sdb_request_all('Select','Item',$If,$this->timeout);$this->timeout=0;if($H===false)return$H;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$Eh=0;foreach($H
as$Yd)$Eh+=$Yd->Attribute->Value;$H=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Eh,))));}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($H){foreach($H
as$Yd){$J=array();if($Yd->Name!='')$J['itemName()']=(string)$Yd->Name;foreach($Yd->Attribute
as$Ia){$C=$this->_processValue($Ia->Name);$Y=$this->_processValue($Ia->Value);if(isset($J[$C])){$J[$C]=(array)$J[$C];$J[$C][]=$Y;}else$J[$C]=$Y;}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($oc){return(is_object($oc)&&$oc['encoding']=='base64'?base64_decode($oc):(string)$oc);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$ee=array_keys($this->_rows[0]);return(object)array('name'=>$ee[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$eg="itemName()";function
_chunkRequest($Cd,$va,$If,$Dc=array()){global$g;foreach(array_chunk($Cd,25)as$hb){$Jf=$If;foreach($hb
as$s=>$t){$Jf["Item.$s.ItemName"]=$t;foreach($Dc
as$y=>$X)$Jf["Item.$s.$y"]=$X;}if(!sdb_request($va,$Jf))return
false;}$g->affected_rows=count($Cd);return
true;}function
_extractIds($R,$qg,$z){$I=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$qg,$_e))$I=array_map('idf_unescape',$_e[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$qg.($z?" LIMIT 1":"")))as$Yd)$I[]=$Yd->Name;}return$I;}function
select($R,$L,$Z,$md,$uf=array(),$z=1,$E=0,$gg=false){global$g;$g->next=$_GET["next"];$I=parent::select($R,$L,$Z,$md,$uf,$z,$E,$gg);$g->next=0;return$I;}function
delete($R,$qg,$z=0){return$this->_chunkRequest($this->_extractIds($R,$qg,$z),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$O,$qg,$z=0,$M="\n"){$Tb=array();$Qd=array();$s=0;$Cd=$this->_extractIds($R,$qg,$z);$t=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$Cd))$Tb["Attribute.".count($Tb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$ae=>$W){$Qd["Attribute.$s.Name"]=$y;$Qd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$ae)$Qd["Attribute.$s.Replace"]="true";$s++;}}}$If=array('DomainName'=>$R);return(!$Qd||$this->_chunkRequest(($t!=""?array($t):$Cd),'BatchPutAttributes',$If,$Qd))&&(!$Tb||$this->_chunkRequest($Cd,'BatchDeleteAttributes',$If,$Tb));}function
insert($R,$O){$If=array("DomainName"=>$R);$s=0;foreach($O
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$If["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$If["Attribute.$s.Name"]=$C;$If["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$If);}function
insertUpdate($R,$K,$eg){foreach($K
as$O){if(!$this->update($R,$O,"WHERE `itemName()` = ".q($O["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($G,$Yh){$this->_conn->timeout=$Yh;return$G;}}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
support($Oc){return
preg_match('~sql~',$Oc);}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$ob){}function
tables_list(){global$g;$I=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$I[(string)$R]='table';if($g->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$I;}function
table_status($C="",$Nc=false){$I=array();foreach(($C!=""?array($C=>true):tables_list())as$R=>$U){$J=array("Name"=>$R,"Auto_increment"=>"");if(!$Nc){$Me=sdb_request('DomainMetadata',array('DomainName'=>$R));if($Me){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$J[$y]=(string)$Me->$X;}}if($C!="")return$J;$I[$R]=$J;}return$I;}function
explain($g,$G){}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z":"");}function
unconvert_field($o,$I){return$I;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$p,$bd,$tb,$tc,$d,$La,$Of){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($Ba,$Kb,$y,$ug=false){$Ua=64;if(strlen($y)>$Ua)$y=pack("H*",$Ba($y));$y=str_pad($y,$Ua,"\0");$be=$y^str_repeat("\x36",$Ua);$ce=$y^str_repeat("\x5C",$Ua);$I=$Ba($ce.pack("H*",$Ba($be.$Kb)));if($ug)$I=pack("H*",$I);return$I;}function
sdb_request($va,$If=array()){global$b,$g;list($_d,$If['AWSAccessKeyId'],$Xg)=$b->credentials();$If['Action']=$va;$If['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$If['Version']='2009-04-15';$If['SignatureVersion']=2;$If['SignatureMethod']='HmacSHA1';ksort($If);$G='';foreach($If
as$y=>$X)$G.='&'.rawurlencode($y).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$_d)."\n/\n$G",$Xg,true)));@ini_set('track_errors',1);$Sc=@file_get_contents((preg_match('~^https?://~',$_d)?$_d:"http://$_d"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$Sc){$g->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$gj=simplexml_load_string($Sc);if(!$gj){$n=libxml_get_last_error();$g->error=$n->message;return
false;}if($gj->Errors){$n=$gj->Errors->Error;$g->error="$n->Message ($n->Code)";return
false;}$g->error='';$Ph=$va."Result";return($gj->$Ph?$gj->$Ph:true);}function
sdb_request_all($va,$Ph,$If=array(),$Yh=0){$I=array();$xh=($Yh?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$If['SelectExpression'],$B)?$B[1]:0);do{$gj=sdb_request($va,$If);if(!$gj)break;foreach($gj->$Ph
as$oc)$I[]=$oc;if($z&&count($I)>=$z){$_GET["next"]=$gj->NextToken;break;}if($Yh&&microtime(true)-$xh>$Yh)return
false;$If['NextToken']=$gj->NextToken;if($z)$If['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($I),$If['SelectExpression']);}while($gj->NextToken);return$I;}$x="simpledb";$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$jd=array();$pd=array("count");$lc=array(array("json"));}$dc["mongo"]="MongoDB";if(isset($_GET["mongo"])){$bg=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Ei,$sf){return@new
MongoClient($Ei,$sf);}function
query($G){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$_c){$this->error=$_c->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Yd){$J=array();foreach($Yd
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$ee=array_keys($this->_rows[0]);$C=$ee[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$eg="_id";function
select($R,$L,$Z,$md,$uf=array(),$z=1,$E=0,$gg=false){$L=($L==array("*")?array():array_fill_keys($L,true));$oh=array();foreach($uf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Cb);$oh[$X]=($Cb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$L)->sort($oh)->limit($z!=""?+$z:0)->skip($E*$z));}function
insert($R,$O){try{$I=$this->_conn->_db->selectCollection($R)->insert($O);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$O['_id'];return!$I['err'];}catch(Exception$_c){$this->_conn->error=$_c->getMessage();return
false;}}}function
get_databases($Zc){global$g;$I=array();$Pb=$g->_link->listDBs();foreach($Pb['databases']as$l)$I[]=$l['name'];return$I;}function
count_tables($k){global$g;$I=array();foreach($k
as$l)$I[$l]=count($g->_link->selectDB($l)->getCollectionNames(true));return$I;}function
tables_list(){global$g;return
array_fill_keys($g->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$g;foreach($k
as$l){$Gg=$g->_link->selectDB($l)->drop();if(!$Gg['ok'])return
false;}return
true;}function
indexes($R,$h=null){global$g;$I=array();foreach($g->_db->selectCollection($R)->getIndexInfo()as$v){$Wb=array();foreach($v["key"]as$e=>$U)$Wb[]=($U==-1?'1':null);$I[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Wb,);}return$I;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$g;return$g->_db->selectCollection($_GET["select"])->count($Z);}$pf=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Ei,$sf){$jb='MongoDB\Driver\Manager';return
new$jb($Ei,$sf);}function
query($G){return
false;}function
select_db($j){$this->_db_name=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Yd){$J=array();foreach($Yd
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=$H->count;}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$ee=array_keys($this->_rows[0]);$C=$ee[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$eg="_id";function
select($R,$L,$Z,$md,$uf=array(),$z=1,$E=0,$gg=false){global$g;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$oh=array();foreach($uf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Cb);$oh[$X]=($Cb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$lh=$E*$z;$jb='MongoDB\Driver\Query';$G=new$jb($Z,array('projection'=>$L,'limit'=>$z,'skip'=>$lh,'sort'=>$oh));$Jg=$g->_link->executeQuery("$g->_db_name.$R",$G);return
new
Min_Result($Jg);}function
update($R,$O,$qg,$z=0,$M="\n"){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($qg);$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());if(isset($O['_id']))unset($O['_id']);$Dg=array();foreach($O
as$y=>$Y){if($Y=='NULL'){$Dg[$y]=1;unset($O[$y]);}}$Di=array('$set'=>$O);if(count($Dg))$Di['$unset']=$Dg;$Ya->update($Z,$Di,array('upsert'=>false));$Jg=$g->_link->executeBulkWrite("$l.$R",$Ya);$g->affected_rows=$Jg->getModifiedCount();return
true;}function
delete($R,$qg,$z=0){global$g;$l=$g->_db_name;$Z=sql_query_where_parser($qg);$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());$Ya->delete($Z,array('limit'=>$z));$Jg=$g->_link->executeBulkWrite("$l.$R",$Ya);$g->affected_rows=$Jg->getDeletedCount();return
true;}function
insert($R,$O){global$g;$l=$g->_db_name;$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());if(isset($O['_id'])&&empty($O['_id']))unset($O['_id']);$Ya->insert($O);$Jg=$g->_link->executeBulkWrite("$l.$R",$Ya);$g->affected_rows=$Jg->getInsertedCount();return
true;}}function
get_databases($Zc){global$g;$I=array();$jb='MongoDB\Driver\Command';$rb=new$jb(array('listDatabases'=>1));$Jg=$g->_link->executeCommand('admin',$rb);foreach($Jg
as$Pb){foreach($Pb->databases
as$l)$I[]=$l->name;}return$I;}function
count_tables($k){$I=array();return$I;}function
tables_list(){global$g;$jb='MongoDB\Driver\Command';$rb=new$jb(array('listCollections'=>1));$Jg=$g->_link->executeCommand($g->_db_name,$rb);$pb=array();foreach($Jg
as$H)$pb[$H->name]='table';return$pb;}function
drop_databases($k){return
false;}function
indexes($R,$h=null){global$g;$I=array();$jb='MongoDB\Driver\Command';$rb=new$jb(array('listIndexes'=>$R));$Jg=$g->_link->executeCommand($g->_db_name,$rb);foreach($Jg
as$v){$Wb=array();$f=array();foreach(get_object_vars($v->key)as$e=>$U){$Wb[]=($U==-1?'1':null);$f[]=$e;}$I[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$f,"lengths"=>array(),"descs"=>$Wb,);}return$I;}function
fields($R){$p=fields_from_edit();if(!count($p)){global$m;$H=$m->select($R,array("*"),null,null,array(),10);while($J=$H->fetch_assoc()){foreach($J
as$y=>$X){$J[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($S,$Z){global$g;$Z=where_to_query($Z);$jb='MongoDB\Driver\Command';$rb=new$jb(array('count'=>$S['Name'],'query'=>$Z));$Jg=$g->_link->executeCommand($g->_db_name,$rb);$gi=$Jg->toArray();return$gi[0]->n;}function
sql_query_where_parser($qg){$qg=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$qg));$qg=preg_replace('/\)\)\)$/',')',$qg);$dj=explode(' AND ',$qg);$ej=explode(') OR (',$qg);$Z=array();foreach($dj
as$bj)$Z[]=trim($bj);if(count($ej)==1)$ej=array();elseif(count($ej)>1)$Z=array();return
where_to_query($Z,$ej);}function
where_to_query($Zi=array(),$aj=array()){global$b;$Kb=array();foreach(array('and'=>$Zi,'or'=>$aj)as$U=>$Z){if(is_array($Z)){foreach($Z
as$Gc){list($mb,$nf,$X)=explode(" ",$Gc,3);if($mb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$jb='MongoDB\BSON\ObjectID';$X=new$jb($X);}if(!in_array($nf,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$nf,$B)){$X=(float)$X;$nf=$B[1];}elseif(preg_match('~^\(date\)(.+)~',$nf,$B)){$Mb=new
DateTime($X);$jb='MongoDB\BSON\UTCDatetime';$X=new$jb($Mb->getTimestamp()*1000);$nf=$B[1];}switch($nf){case'=':$nf='$eq';break;case'!=':$nf='$ne';break;case'>':$nf='$gt';break;case'<':$nf='$lt';break;case'>=':$nf='$gte';break;case'<=':$nf='$lte';break;case'regex':$nf='$regex';break;default:continue;}if($U=='and')$Kb['$and'][]=array($mb=>array($nf=>$X));elseif($U=='or')$Kb['$or'][]=array($mb=>array($nf=>$X));}}}return$Kb;}$pf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($C="",$Nc=false){$I=array();foreach(tables_list()as$R=>$U){$I[$R]=array("Name"=>$R);if($C==$R)return$I[$R];}return$I;}function
create_database($l,$d){return
true;}function
last_id(){global$g;return$g->last_id;}function
error(){global$g;return
h($g->error);}function
collations(){return
array();}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
connect(){global$b;$g=new
Min_DB;list($N,$V,$F)=$b->credentials();$sf=array();if($V.$F!=""){$sf["username"]=$V;$sf["password"]=$F;}$l=$b->database();if($l!="")$sf["db"]=$l;try{$g->_link=$g->connect("mongodb://$N",$sf);if($F!=""){$sf["password"]="";try{$g->connect("mongodb://$N",$sf);return'Database does not support password.';}catch(Exception$_c){}}return$g;}catch(Exception$_c){return$_c->getMessage();}}function
alter_indexes($R,$c){global$g;foreach($c
as$X){list($U,$C,$O)=$X;if($O=="DROP")$I=$g->_db->command(array("deleteIndexes"=>$R,"index"=>$C));else{$f=array();foreach($O
as$e){$e=preg_replace('~ DESC$~','',$e,1,$Cb);$f[$e]=($Cb?-1:1);}$I=$g->_db->selectCollection($R)->ensureIndex($f,array("unique"=>($U=="UNIQUE"),"name"=>$C,));}if($I['errmsg']){$g->error=$I['errmsg'];return
false;}}return
true;}function
support($Oc){return
preg_match("~database|indexes~",$Oc);}function
db_collation($l,$ob){}function
information_schema(){}function
is_view($S){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$p,$bd,$tb,$tc,$d,$La,$Of){global$g;if($R==""){$g->_db->createCollection($C);return
true;}}function
drop_tables($T){global$g;foreach($T
as$R){$Gg=$g->_db->selectCollection($R)->drop();if(!$Gg['ok'])return
false;}return
true;}function
truncate_tables($T){global$g;foreach($T
as$R){$Gg=$g->_db->selectCollection($R)->remove();if(!$Gg['ok'])return
false;}return
true;}$x="mongo";$jd=array();$pd=array();$lc=array(array("json"));}$dc["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$bg=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Sf,$yb=array(),$Ne='GET'){@ini_set('track_errors',1);$Sc=@file_get_contents("$this->_url/".ltrim($Sf,'/'),false,stream_context_create(array('http'=>array('method'=>$Ne,'content'=>$yb===null?$yb:json_encode($yb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Sc){$this->error=$php_errormsg;return$Sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Sc;return
false;}$I=json_decode($Sc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$xb=get_defined_constants(true);foreach($xb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$I;}function
query($Sf,$yb=array(),$Ne='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Sf,'/'),$yb,$Ne);}function
connect($N,$V,$F){preg_match('~^(https?://)?(.*)~',$N,$B);$this->_url=($B[1]?$B[1]:"http://")."$V:$F@$B[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($j){$this->_db=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($this->_rows);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$L,$Z,$md,$uf=array(),$z=1,$E=0,$gg=false){global$b;$Kb=array();$G="$R/_search";if($L!=array("*"))$Kb["fields"]=$L;if($uf){$oh=array();foreach($uf
as$mb){$mb=preg_replace('~ DESC$~','',$mb,1,$Cb);$oh[]=($Cb?array($mb=>"desc"):$mb);}$Kb["sort"]=$oh;}if($z){$Kb["size"]=+$z;if($E)$Kb["from"]=($E*$z);}foreach($Z
as$X){list($mb,$nf,$X)=explode(" ",$X,3);if($mb=="_id")$Kb["query"]["ids"]["values"][]=$X;elseif($mb.$X!=""){$Th=array("term"=>array(($mb!=""?$mb:"_all")=>$X));if($nf=="=")$Kb["query"]["filtered"]["filter"]["and"][]=$Th;else$Kb["query"]["filtered"]["query"]["bool"]["must"][]=$Th;}}if($Kb["query"]&&!$Kb["query"]["filtered"]["query"]&&!$Kb["query"]["ids"])$Kb["query"]["filtered"]["query"]=array("match_all"=>array());$xh=microtime(true);$Wg=$this->_conn->query($G,$Kb);if($gg)echo$b->selectQuery("$G: ".print_r($Kb,true),$xh,!$Wg);if(!$Wg)return
false;$I=array();foreach($Wg['hits']['hits']as$zd){$J=array();if($L==array("*"))$J["_id"]=$zd["_id"];$p=$zd['_source'];if($L!=array("*")){$p=array();foreach($L
as$y)$p[$y]=$zd['fields'][$y];}foreach($p
as$y=>$X){if($Kb["fields"])$X=$X[0];$J[$y]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($U,$vg,$qg,$z=0,$M="\n"){$Qf=preg_split('~ *= *~',$qg);if(count($Qf)==2){$t=trim($Qf[1]);$G="$U/$t";return$this->_conn->query($G,$vg,'POST');}return
false;}function
insert($U,$vg){$t="";$G="$U/$t";$Gg=$this->_conn->query($G,$vg,'POST');$this->_conn->last_id=$Gg['_id'];return$Gg['created'];}function
delete($U,$qg,$z=0){$Cd=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Cd[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$cb){$Qf=preg_split('~ *= *~',$cb);if(count($Qf)==2)$Cd[]=trim($Qf[1]);}}$this->_conn->affected_rows=0;foreach($Cd
as$t){$G="{$U}/{$t}";$Gg=$this->_conn->query($G,'{}','DELETE');if(is_array($Gg)&&$Gg['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$g=new
Min_DB;list($N,$V,$F)=$b->credentials();if($F!=""&&$g->connect($N,$V,""))return'Database does not support password.';if($g->connect($N,$V,$F))return$g;return$g->error;}function
support($Oc){return
preg_match("~database|table|columns~",$Oc);}function
logged_user(){global$b;$Fb=$b->credentials();return$Fb[1];}function
get_databases(){global$g;$I=$g->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($l,$ob){}function
engines(){return
array();}function
count_tables($k){global$g;$I=array();$H=$g->query('_stats');if($H&&$H['indices']){$Jd=$H['indices'];foreach($Jd
as$Id=>$yh){$Hd=$yh['total']['indexing'];$I[$Id]=$Hd['index_total'];}}return$I;}function
tables_list(){global$g;$I=$g->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$g->_db]["mappings"]),'table');return$I;}function
table_status($C="",$Nc=false){global$g;$Wg=$g->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($Wg){$T=$Wg["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$I[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($C!=""&&$C==$R["key"])return$I[$C];}}return$I;}function
error(){global$g;return
h($g->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$h=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$g;$H=$g->query("$R/_mapping");$I=array();if($H){$we=$H[$R]['properties'];if(!$we)$we=$H[$g->_db]['mappings'][$R]['properties'];if($we){foreach($we
as$C=>$o){$I[$C]=array("field"=>$C,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($I[$C]["privileges"]["insert"]);unset($I[$C]["privileges"]["update"]);}}}}return$I;}function
foreign_keys($R){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($l){global$g;return$g->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$g;return$g->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($R,$C,$p,$bd,$tb,$tc,$d,$La,$Of){global$g;$mg=array();foreach($p
as$Lc){$Qc=trim($Lc[1][0]);$Rc=trim($Lc[1][1]?$Lc[1][1]:"text");$mg[$Qc]=array('type'=>$Rc);}if(!empty($mg))$mg=array('properties'=>$mg);return$g->query("_mapping/{$C}",$mg,'PUT');}function
drop_tables($T){global$g;$I=true;foreach($T
as$R)$I=$I&&$g->query(urlencode($R),array(),'DELETE');return$I;}function
last_id(){global$g;return$g->last_id;}$x="elastic";$pf=array("=","query");$jd=array();$pd=array();$lc=array(array("json"));$wi=array();$Ah=array();foreach(array('Numbers'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Date and time'=>array("date"=>10),'Strings'=>array("string"=>65535,"text"=>65535),'Binary'=>array("binary"=>255),)as$y=>$X){$wi+=$X;$Ah[$y]=array_keys($X);}}$dc=array("server"=>"MySQL")+$dc;if(!defined("DRIVER")){$bg=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($N="",$V="",$F="",$j=null,$Xf=null,$nh=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($_d,$Xf)=explode(":",$N,2);$wh=$b->connectSsl();if($wh)$this->ssl_set($wh['key'],$wh['cert'],$wh['ca'],'','');$I=@$this->real_connect(($N!=""?$_d:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$j,(is_numeric($Xf)?$Xf:ini_get("mysqli.default_port")),(!is_numeric($Xf)?$Xf:$nh),($wh?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$I;}function
set_charset($bb){if(parent::set_charset($bb))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $bb");}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch_array();return$J[$o];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($bb){if(function_exists('mysql_set_charset')){if(mysql_set_charset($bb,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $bb");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($G,$xi=false){$H=@($xi?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$F){global$b;$sf=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$wh=$b->connectSsl();if($wh)$sf+=array(PDO::MYSQL_ATTR_SSL_KEY=>$wh['key'],PDO::MYSQL_ATTR_SSL_CERT=>$wh['cert'],PDO::MYSQL_ATTR_SSL_CA=>$wh['ca'],);$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$N)),$V,$F,$sf);return
true;}function
set_charset($bb){$this->query("SET NAMES $bb");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$xi=false){$this->setAttribute(1000,!$xi);return
parent::query($G,$xi);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$O){return($O?parent::insert($R,$O):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$K,$eg){$f=array_keys(reset($K));$cg="INSERT INTO ".table($R)." (".implode(", ",$f).") VALUES\n";$Oi=array();foreach($f
as$y)$Oi[$y]="$y = VALUES($y)";$Dh="\nON DUPLICATE KEY UPDATE ".implode(", ",$Oi);$Oi=array();$qe=0;foreach($K
as$O){$Y="(".implode(", ",$O).")";if($Oi&&(strlen($cg)+$qe+strlen($Y)+strlen($Dh)>1e6)){if(!queries($cg.implode(",\n",$Oi).$Dh))return
false;$Oi=array();$qe=0;}$Oi[]=$Y;$qe+=strlen($Y)+2;}return
queries($cg.implode(",\n",$Oi).$Dh);}function
slowQuery($G,$Yh){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$Yh FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$B))return"$B[1] /*+ MAX_EXECUTION_TIME(".($Yh*1000).") */ $B[2]";}}function
convertSearch($u,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($C){$xe=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($xe?"information-schema-$C-table/":str_replace("_","-",$C)."-table.html"));if(DB=="mysql")return($xe?"mysql$C-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$wi,$Ah;$g=new
Min_DB;$Fb=$b->credentials();if($g->connect($Fb[0],$Fb[1],$Fb[2])){$g->set_charset(charset($g));$g->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$g)){$Ah['Strings'][]="json";$wi["json"]=4294967295;}return$g;}$I=$g->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($Sg=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$Sg;return$I;}function
get_databases($Zc){$I=get_session("dbs");if($I===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$I=($Zc?slow_query($G):get_vals($G));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$ob){global$g;$I=null;$i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$i,$B))$I=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$i,$B))$I=$ob[$B[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$g;return$g->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$I=array();foreach($k
as$l)$I[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$I;}function
table_status($C="",$Nc=false){$I=array();foreach(get_rows($Nc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$J){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$J["Type"],$B);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$B[1])?$J["Default"]:null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$B)?$B[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),);}return$I;}function
indexes($R,$h=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$h)as$J){$C=$J["Key_name"];$I[$C]["type"]=($C=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$C]["columns"][]=$J["Column_name"];$I[$C]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$C]["descs"][]=null;}return$I;}function
foreign_keys($R){global$g,$kf;static$Uf='`(?:[^`]|``)+`';$I=array();$Db=$g->result("SHOW CREATE TABLE ".table($R),1);if($Db){preg_match_all("~CONSTRAINT ($Uf) FOREIGN KEY ?\\(((?:$Uf,? ?)+)\\) REFERENCES ($Uf)(?:\\.($Uf))? \\(((?:$Uf,? ?)+)\\)(?: ON DELETE ($kf))?(?: ON UPDATE ($kf))?~",$Db,$_e,PREG_SET_ORDER);foreach($_e
as$B){preg_match_all("~$Uf~",$B[2],$ph);preg_match_all("~$Uf~",$B[5],$Qh);$I[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$ph[0]),"target"=>array_map('idf_unescape',$Qh[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$I;}function
view($C){global$g;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$g->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$y=>$X)asort($I[$y]);return$I;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$g;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$g->error));}function
create_database($l,$d){return
queries("CREATE DATABASE ".idf_escape($l).($d?" COLLATE ".q($d):""));}function
drop_databases($k){$I=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($C,$d){$I=false;if(create_database($C,$d)){$Eg=array();foreach(tables_list()as$R=>$U)$Eg[]=table($R)." TO ".idf_escape($C).".".table($R);$I=(!$Eg||queries("RENAME TABLE ".implode(", ",$Eg)));if($I)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$I;}function
auto_increment(){$Ma=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Ma="";break;}if($v["type"]=="PRIMARY")$Ma=" UNIQUE";}}return" AUTO_INCREMENT$Ma";}function
alter_table($R,$C,$p,$bd,$tb,$tc,$d,$La,$Of){$c=array();foreach($p
as$o)$c[]=($o[1]?($R!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($R!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$bd);$P=($tb!==null?" COMMENT=".q($tb):"").($tc?" ENGINE=".q($tc):"").($d?" COLLATE ".q($d):"").($La!=""?" AUTO_INCREMENT=$La":"");if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$P$Of");if($R!=$C)$c[]="RENAME TO ".table($C);if($P)$c[]=ltrim($P);return($c||$Of?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Of):true);}function
alter_indexes($R,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Ti){return
queries("DROP VIEW ".implode(", ",array_map('table',$Ti)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Ti,$Qh){$Eg=array();foreach(array_merge($T,$Ti)as$R)$Eg[]=table($R)." TO ".idf_escape($Qh).".".table($R);return
queries("RENAME TABLE ".implode(", ",$Eg));}function
copy_tables($T,$Ti,$Qh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$C=($Qh==DB?table("copy_$R"):idf_escape($Qh).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($R))||!queries("INSERT INTO $C SELECT * FROM ".table($R)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$J){$qi=$J["Trigger"];if(!queries("CREATE TRIGGER ".($Qh==DB?idf_escape("copy_$qi"):idf_escape($Qh).".".idf_escape($qi))." $J[Timing] $J[Event] ON $C FOR EACH ROW\n$J[Statement];"))return
false;}}foreach($Ti
as$R){$C=($Qh==DB?table("copy_$R"):idf_escape($Qh).".".table($R));$Si=view($R);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Si[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){global$g,$vc,$Od,$wi;$Ca=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$qh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$vi="((".implode("|",array_merge(array_keys($wi),$Ca)).")\\b(?:\\s*\\(((?:[^'\")]|$vc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Uf="$qh*(".($U=="FUNCTION"?"":$Od).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$vi";$i=$g->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$Uf\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$vi\\s+":"")."(.*)~is",$i,$B);$p=array();preg_match_all("~$Uf\\s*,?~is",$B[1],$_e,PREG_SET_ORDER);foreach($_e
as$Hf){$C=str_replace("``","`",$Hf[2]).$Hf[3];$p[]=array("field"=>$C,"type"=>strtolower($Hf[5]),"length"=>preg_replace_callback("~$vc~s",'normalize_enum',$Hf[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$Hf[8] $Hf[7]"))),"null"=>1,"full_type"=>$Hf[4],"inout"=>strtoupper($Hf[1]),"collation"=>strtolower($Hf[9]),);}if($U!="FUNCTION")return
array("fields"=>$p,"definition"=>$B[11]);return
array("fields"=>$p,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($C,$J){return
idf_escape($C);}function
last_id(){global$g;return$g->result("SELECT LAST_INSERT_ID()");}function
explain($g,$G){return$g->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$G);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Ug){return
true;}function
create_sql($R,$La,$Bh){global$g;$I=$g->result("SHOW CREATE TABLE ".table($R),1);if(!$La)$I=preg_replace('~ AUTO_INCREMENT=\d+~','',$I);return$I;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($R){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$I){if(preg_match("~binary~",$o["type"]))$I="UNHEX($I)";if($o["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$I=(min_version(8)?"ST_":"")."GeomFromText($I)";return$I;}function
support($Oc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view"))."~",$Oc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$g;return$g->result("SELECT @@max_connections");}$x="sql";$wi=array();$Ah=array();foreach(array('Numbers'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Date and time'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Strings'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Lists'=>array("enum"=>65535,"set"=>64),'Binary'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometry'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$wi+=$X;$Ah[$y]=array_keys($X);}$Ci=array("unsigned","zerofill","unsigned zerofill");$pf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$jd=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$pd=array("avg","count","count distinct","group_concat","max","min","sum");$lc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.6.3";class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($i=false){return
password_file($i);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($N){return
h($N);}function
database(){return
DB;}function
databases($Zc=true){return
get_databases($Zc);}function
schemas(){return
schemas();}function
queryTimeout(){return
2;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$Tc="adminer.css";if(file_exists($Tc))$I[]=$Tc;return$I;}function
loginForm(){global$dc;echo"<table cellspacing='0'>\n",$this->loginFormField('driver','<tr><th>'.'System'.'<td>',html_select("auth[driver]",$dc,DRIVER)."\n"),$this->loginFormField('server','<tr><th>'.'Server'.'<td>','<input name="auth[server]" value="'.h(SERVER).'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">'."\n"),$this->loginFormField('username','<tr><th>'.'Username'.'<td>','<input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.'Password'.'<td>','<input type="password" name="auth[password]">'."\n"),$this->loginFormField('db','<tr><th>'.'Database'.'<td>','<input name="auth[db]" value="'.h($_GET["db"]).'" autocapitalize="off">'."\n"),"</table>\n","<p><input type='submit' value='".'Login'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'Permanent login')."\n";}function
loginFormField($C,$wd,$Y){return$wd.$Y;}function
login($ue,$F){if($F=="")return
sprintf('Adminer does not support accessing a database without a password, <a href="https://www.adminer.org/en/password/"%s>more information</a>.',target_blank());return
true;}function
tableName($Hh){return
h($Hh["Name"]);}function
fieldName($o,$uf=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Hh,$O=""){global$x,$m;echo'<p class="links">';$te=array("select"=>'Select data');if(support("table")||support("indexes"))$te["table"]='Show structure';if(support("table")){if(is_view($Hh))$te["view"]='Alter view';else$te["create"]='Alter table';}if($O!==null)$te["edit"]='New item';$C=$Hh["Name"];foreach($te
as$y=>$X)echo" <a href='".h(ME)."$y=".urlencode($C).($y=="edit"?$O:"")."'".bold(isset($_GET[$y])).">$X</a>";echo
doc_link(array($x=>$m->tableHelp($C)),"?"),"\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Gh){return
array();}function
backwardKeysPrint($Oa,$J){}function
selectQuery($G,$xh,$Mc=false){global$x,$m;$I="</p>\n";if(!$Mc&&($Wi=$m->warnings())){$t="warnings";$I=", <a href='#$t'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."$I<div id='$t' class='hidden'>\n$Wi</div>\n";}return"<p><code class='jush-$x'>".h(str_replace("\n"," ",$G))."</code> <span class='time'>(".format_time($xh).")</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($G)."'>".'Edit'."</a>":"").$I;}function
sqlCommandQuery($G){return
shorten_utf8(trim($G),1000);}function
rowDescription($R){return"";}function
rowDescriptions($K,$cd){return$K;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$Bf){$I=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$I="<i>".lang(array('%d byte','%d bytes'),strlen($Bf))."</i>";if(preg_match('~json~',$o["type"]))$I="<code class='jush-js'>$I</code>";return($_?"<a href='".h($_)."'".(is_url($_)?target_blank():"").">$I</a>":$I);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".'Column'."<td>".'Type'.(support("comment")?"<td>".'Comment':"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".'Auto Increment'."</i>":""),(isset($o["default"])?" <span title='".'Default value'."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".h($o["comment"]):""),"\n";}echo"</table>\n";}function
tableIndexesPrint($w){echo"<table cellspacing='0'>\n";foreach($w
as$C=>$v){ksort($v["columns"]);$gg=array();foreach($v["columns"]as$y=>$X)$gg[]="<i>".h($X)."</i>".($v["lengths"][$y]?"(".$v["lengths"][$y].")":"").($v["descs"][$y]?" DESC":"");echo"<tr title='".h($C)."'><th>$v[type]<td>".implode(", ",$gg)."\n";}echo"</table>\n";}function
selectColumnsPrint($L,$f){global$jd,$pd;print_fieldset("select",'Select',$L);$s=0;$L[""]=array();foreach($L
as$y=>$X){$X=$_GET["columns"][$y];$e=select_input(" name='columns[$s][col]'",$f,$X["col"],($y!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($jd||$pd?"<select name='columns[$s][fun]'>".optionlist(array(-1=>"")+array_filter(array('Functions'=>$jd,'Aggregation'=>$pd)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($y!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($e)":$e)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$f,$w){print_fieldset("search",'Search',$Z);foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$v["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"</div>\n";}}$ab="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$s=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]'",$f,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".'anywhere'.")"),html_select("where[$s][op]",$this->operators,$X["op"],$ab),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $ab }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($uf,$f,$w){print_fieldset("sort",'Sort',$uf);$s=0;foreach((array)$_GET["order"]as$y=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]'",$f,$X,"selectFieldChange"),checkbox("desc[$s]",1,isset($_GET["desc"][$y]),'descending')."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]'",$f,"","selectAddRow"),checkbox("desc[$s]",1,false,'descending')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'Limit'."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($Wh){if($Wh!==null){echo"<fieldset><legend>".'Text length'."</legend><div>","<input type='number' name='text_length' class='size' value='".h($Wh)."'>","</div></fieldset>\n";}}function
selectActionPrint($w){echo"<fieldset><legend>".'Action'."</legend><div>","<input type='submit' value='".'Select'."'>"," <span id='noindex' title='".'Full table scan'."'></span>","<script".nonce().">\n","var indexColumns = ";$f=array();foreach($w
as$v){$Jb=reset($v["columns"]);if($v["type"]!="FULLTEXT"&&$Jb)$f[$Jb]=1;}$f[""]=1;foreach($f
as$y=>$X)json_row($y);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($qc,$f){}function
selectColumnsProcess($f,$w){global$jd,$pd;$L=array();$md=array();foreach((array)$_GET["columns"]as$y=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$jd)||in_array($X["fun"],$pd)))){$L[$y]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$pd))$md[]=$L[$y];}}return
array($L,$md);}function
selectSearchProcess($p,$w){global$g,$m;$I=array();foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"&&$_GET["fulltext"][$s]!="")$I[]="MATCH (".implode(", ",array_map('idf_escape',$v["columns"])).") AGAINST (".q($_GET["fulltext"][$s]).(isset($_GET["boolean"][$s])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$y=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$cg="";$vb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Ed=process_length($X["val"]);$vb.=" ".($Ed!=""?$Ed:"(NULL)");}elseif($X["op"]=="SQL")$vb=" $X[val]";elseif($X["op"]=="LIKE %%")$vb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$vb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$cg="$X[op](".q($X["val"]).", ";$vb=")";}elseif(!preg_match('~NULL$~',$X["op"]))$vb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$I[]=$cg.$m->convertSearch(idf_escape($X["col"]),$X,$p[$X["col"]]).$vb;else{$qb=array();foreach($p
as$C=>$o){if((preg_match('~^[-\d.'.(preg_match('~IN$~',$X["op"])?',':'').']+$~',$X["val"])||!preg_match('~'.number_type().'|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$o["type"])))$qb[]=$cg.$m->convertSearch(idf_escape($C),$X,$o).$vb;}$I[]=($qb?"(".implode(" OR ",$qb).")":"1 = 0");}}}return$I;}function
selectOrderProcess($p,$w){$I=array();foreach((array)$_GET["order"]as$y=>$X){if($X!="")$I[]=(preg_match('~^((COUNT\(DISTINCT |[A-Z0-9_]+\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\)|COUNT\(\*\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$y])?" DESC":"");}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$cd){return
false;}function
selectQueryBuild($L,$Z,$md,$uf,$z,$E){return"";}function
messageQuery($G,$Xh,$Mc=false){global$x,$m;restart_session();$xd=&get_session("queries");if(!$xd[$_GET["db"]])$xd[$_GET["db"]]=array();if(strlen($G)>1e6)$G=preg_replace('~[\x80-\xFF]+$~','',substr($G,0,1e6))."\n...";$xd[$_GET["db"]][]=array($G,time(),$Xh);$uh="sql-".count($xd[$_GET["db"]]);$I="<a href='#$uh' class='toggle'>".'SQL command'."</a>\n";if(!$Mc&&($Wi=$m->warnings())){$t="warnings-".count($xd[$_GET["db"]]);$I="<a href='#$t' class='toggle'>".'Warnings'."</a>, $I<div id='$t' class='hidden'>\n$Wi</div>\n";}return" <span class='time'>".@date("H:i:s")."</span>"." $I<div id='$uh' class='hidden'><pre><code class='jush-$x'>".shorten_utf8($G,1000)."</code></pre>".($Xh?" <span class='time'>($Xh)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($xd[$_GET["db"]])-1)).'">'.'Edit'.'</a>':'').'</div>';}function
editFunctions($o){global$lc;$I=($o["null"]?"NULL/":"");foreach($lc
as$y=>$jd){if(!$y||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($jd
as$Uf=>$X){if(!$Uf||preg_match("~$Uf~",$o["type"]))$I.="/$X";}if($y&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$I.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$I='Auto Increment';return
explode("/",$I);}function
editInput($R,$o,$Ja,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ja value='-1' checked><i>".'original'."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ja value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ja,$o,$Y,0);return"";}function
editHint($R,$o,$Y){return"";}function
processInput($o,$Y,$r=""){if($r=="SQL")return$Y;$C=$o["field"];$I=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$I="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$I=$r;elseif(preg_match('~^([+-]|\|\|)$~',$r))$I=idf_escape($C)." $r $I";elseif(preg_match('~^[+-] interval$~',$r))$I=idf_escape($C)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$I);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$I="$r(".idf_escape($C).", $I)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$I="$r($I)";return
unconvert_field($o,$I);}function
dumpOutput(){$I=array('text'=>'open','file'=>'save');if(function_exists('gzencode'))$I['gz']='gzip';return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($R,$Bh,$Xd=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($Bh)dump_csv(array_keys(fields($R)));}else{if($Xd==2){$p=array();foreach(fields($R)as$C=>$o)$p[]=idf_escape($C)." $o[full_type]";$i="CREATE TABLE ".table($R)." (".implode(", ",$p).")";}else$i=create_sql($R,$_POST["auto_increment"],$Bh);set_utf8mb4($i);if($Bh&&$i){if($Bh=="DROP+CREATE"||$Xd==1)echo"DROP ".($Xd==2?"VIEW":"TABLE")." IF EXISTS ".table($R).";\n";if($Xd==1)$i=remove_definer($i);echo"$i;\n\n";}}}function
dumpData($R,$Bh,$G){global$g,$x;$Be=($x=="sqlite"?0:1048576);if($Bh){if($_POST["format"]=="sql"){if($Bh=="TRUNCATE+INSERT")echo
truncate_sql($R).";\n";$p=fields($R);}$H=$g->query($G,1);if($H){$Qd="";$Xa="";$ee=array();$Dh="";$Pc=($R!=''?'fetch_assoc':'fetch_row');while($J=$H->$Pc()){if(!$ee){$Oi=array();foreach($J
as$X){$o=$H->fetch_field();$ee[]=$o->name;$y=idf_escape($o->name);$Oi[]="$y = VALUES($y)";}$Dh=($Bh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Oi):"").";\n";}if($_POST["format"]!="sql"){if($Bh=="table"){dump_csv($ee);$Bh="INSERT";}dump_csv($J);}else{if(!$Qd)$Qd="INSERT INTO ".table($R)." (".implode(", ",array_map('idf_escape',$ee)).") VALUES";foreach($J
as$y=>$X){$o=$p[$y];$J[$y]=($X!==null?unconvert_field($o,preg_match(number_type(),$o["type"])&&$X!=''?$X:q(($X===false?0:$X))):"NULL");}$Sg=($Be?"\n":" ")."(".implode(",\t",$J).")";if(!$Xa)$Xa=$Qd.$Sg;elseif(strlen($Xa)+4+strlen($Sg)+strlen($Dh)<$Be)$Xa.=",$Sg";else{echo$Xa.$Dh;$Xa=$Qd.$Sg;}}}if($Xa)echo$Xa.$Dh;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$g->error)."\n";}}function
dumpFilename($Bd){return
friendly_url($Bd!=""?$Bd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($Bd,$Qe=false){$Ef=$_POST["output"];$Hc=(preg_match('~sql~',$_POST["format"])?"sql":($Qe?"tar":"csv"));header("Content-Type: ".($Ef=="gz"?"application/x-gzip":($Hc=="tar"?"application/x-tar":($Hc=="sql"||$Ef!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Ef=="gz")ob_start('ob_gzencode',1e6);return$Hc;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.'Alter database'."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'Alter schema':'Create schema')."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.'Database schema'."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".'Privileges'."</a>\n":"");return
true;}function
navigation($Pe){global$ia,$x,$dc,$g;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Pe=="auth"){$Vc=true;foreach((array)$_SESSION["pwds"]as$Qi=>$gh){foreach($gh
as$N=>$Li){foreach($Li
as$V=>$F){if($F!==null){if($Vc){echo"<p id='logins'>".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$Vc=false;}$Pb=$_SESSION["db"][$Qi][$N][$V];foreach(($Pb?array_keys($Pb):array(""))as$l)echo"<a href='".h(auth_url($Qi,$N,$V,$l))."'>($dc[$Qi]) ".h($V.($N!=""?"@".$this->serverName($N):"").($l!=""?" - $l":""))."</a><br>\n";}}}}}else{if($_GET["ns"]!==""&&!$Pe&&DB!=""){$g->select_db(DB);$T=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.6.3");if(support("sql")){echo'<script',nonce(),'>
';if($T){$te=array();foreach($T
as$R=>$U)$te[]=preg_quote($R,'/');echo"var jushLinks = { $x: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$te).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$x;\n";}$fh=$g->server_info;echo'bodyLoad(\'',(is_object($g)?preg_replace('~^(\d\.?\d).*~s','\1',$fh):""),'\'',(preg_match('~MariaDB~',$fh)?", true":""),');
</script>
';}$this->databasesPrint($Pe);if(DB==""||!$Pe){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".'SQL command'."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".'Import'."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'Export'."</a>\n";}if($_GET["ns"]!==""&&!$Pe&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'Create table'."</a>\n";if(!$T)echo"<p class='message'>".'No tables.'."\n";else$this->tablesPrint($T);}}}function
databasesPrint($Pe){global$b,$g;$k=$this->databases();if($k&&!in_array(DB,$k))array_unshift($k,DB);echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Nb=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<span title='".'database'."'>".'DB'."</span>: ".($k?"<select name='db'>".optionlist(array(""=>"")+$k,DB)."</select>$Nb":"<input name='db' value='".h(DB)."' autocapitalize='off'>\n"),"<input type='submit' value='".'Use'."'".($k?" class='hidden'":"").">\n";if($Pe!="db"&&DB!=""&&$g->select_db(DB)){if(support("scheme")){echo"<br>".'Schema'.": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Nb";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}foreach(array("import","sql","schema","dump","privileges")as$X){if(isset($_GET[$X])){echo"<input type='hidden' name='$X' value=''>";break;}}echo"</p></form>\n";}function
tablesPrint($T){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$R=>$P){$C=$this->tableName($P);if($C!=""){echo'<li><a href="'.h(ME).'select='.urlencode($R).'"'.bold($_GET["select"]==$R||$_GET["edit"]==$R,"select").">".'select'."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($R).'"'.bold(in_array($R,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($P)?"view":"structure"))." title='".'Show structure'."'>$C</a>":"<span>$C</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$pf;function
page_header($ai,$n="",$Wa=array(),$bi=""){global$ca,$ia,$b,$dc,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$ci=$ai.($bi!=""?": $bi":"");$di=strip_tags($ci.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$di,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.6.3"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.6.3");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.3"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.3"),'">
';foreach($b->css()as$Hb){echo'<link rel="stylesheet" type="text/css" href="',h($Hb),'">
';}}echo'
<body class="ltr nojs">
';$Tc=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($Tc)&&filemtime($Tc)+86400>time()){$Ri=unserialize(file_get_contents($Tc));$ng="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Ri["version"],base64_decode($Ri["signature"]),$ng)==1)$_COOKIE["adminer_version"]=$Ri["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Wa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$dc[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$N=$b->serverName(SERVER);$N=($N!=""?$N:'Server');if($Wa===false)echo"$N\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Wa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Wa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Wa
as$y=>$X){$Vb=(is_array($X)?$X[1]:h($X));if($Vb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Vb</a> &raquo; ";}}echo"$ai\n";}}echo"<h2>$ci</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Gb){$vd=array();foreach($Gb
as$y=>$X)$vd[]="$y $X";header("Content-Security-Policy: ".implode("; ",$vd));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$Ze;if(!$Ze)$Ze=base64_encode(rand_string());return$Ze;}function
page_messages($n){$Ei=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Le=$_SESSION["messages"][$Ei];if($Le){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Le)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ei]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Pe=""){global$b,$hi;echo'</div>

';if($Pe!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="',$hi,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Pe);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Se){while($Se>=2147483648)$Se-=4294967296;while($Se<=-2147483649)$Se+=4294967296;return(int)$Se;}function
long2str($W,$Vi){$Sg='';foreach($W
as$X)$Sg.=pack('V',$X);if($Vi)return
substr($Sg,0,end($W));return$Sg;}function
str2long($Sg,$Vi){$W=array_values(unpack('V*',str_pad($Sg,4*ceil(strlen($Sg)/4),"\0")));if($Vi)$W[]=strlen($Sg);return$W;}function
xxtea_mx($ij,$hj,$Eh,$ae){return
int32((($ij>>5&0x7FFFFFF)^$hj<<2)+(($hj>>3&0x1FFFFFFF)^$ij<<4))^int32(($Eh^$hj)+($ae^$ij));}function
encrypt_string($_h,$y){if($_h=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($_h,true);$Se=count($W)-1;$ij=$W[$Se];$hj=$W[0];$og=floor(6+52/($Se+1));$Eh=0;while($og-->0){$Eh=int32($Eh+0x9E3779B9);$kc=$Eh>>2&3;for($Ff=0;$Ff<$Se;$Ff++){$hj=$W[$Ff+1];$Re=xxtea_mx($ij,$hj,$Eh,$y[$Ff&3^$kc]);$ij=int32($W[$Ff]+$Re);$W[$Ff]=$ij;}$hj=$W[0];$Re=xxtea_mx($ij,$hj,$Eh,$y[$Ff&3^$kc]);$ij=int32($W[$Se]+$Re);$W[$Se]=$ij;}return
long2str($W,false);}function
decrypt_string($_h,$y){if($_h=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($_h,false);$Se=count($W)-1;$ij=$W[$Se];$hj=$W[0];$og=floor(6+52/($Se+1));$Eh=int32($og*0x9E3779B9);while($Eh){$kc=$Eh>>2&3;for($Ff=$Se;$Ff>0;$Ff--){$ij=$W[$Ff-1];$Re=xxtea_mx($ij,$hj,$Eh,$y[$Ff&3^$kc]);$hj=int32($W[$Ff]-$Re);$W[$Ff]=$hj;}$ij=$W[$Se];$Re=xxtea_mx($ij,$hj,$Eh,$y[$Ff&3^$kc]);$hj=int32($W[0]-$Re);$W[0]=$hj;$Eh=int32($Eh-0x9E3779B9);}return
long2str($W,true);}$g='';$ud=$_SESSION["token"];if(!$ud)$_SESSION["token"]=rand(1,1e6);$hi=get_token();$Vf=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Vf[$y]=$X;}}function
add_invalid_login(){global$b;$hd=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$hd)return;$Td=unserialize(stream_get_contents($hd));$Xh=time();if($Td){foreach($Td
as$Ud=>$X){if($X[0]<$Xh)unset($Td[$Ud]);}}$Sd=&$Td[$b->bruteForceKey()];if(!$Sd)$Sd=array($Xh+30*60,0);$Sd[1]++;file_write_unlock($hd,serialize($Td));}function
check_invalid_login(){global$b;$Td=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Sd=$Td[$b->bruteForceKey()];$Ye=($Sd[1]>29?$Sd[0]-time():0);if($Ye>0)auth_error(lang(array('Too many unsuccessful logins, try again in %d minute.','Too many unsuccessful logins, try again in %d minutes.'),ceil($Ye/60)));}$Ka=$_POST["auth"];if($Ka){session_regenerate_id();$Qi=$Ka["driver"];$N=$Ka["server"];$V=$Ka["username"];$F=(string)$Ka["password"];$l=$Ka["db"];set_password($Qi,$N,$V,$F);$_SESSION["db"][$Qi][$N][$V][$l]=true;if($Ka["permanent"]){$y=base64_encode($Qi)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($l);$hg=$b->permanentLogin(true);$Vf[$y]="$y:".base64_encode($hg?encrypt_string($F,$hg):"");cookie("adminer_permanent",implode(" ",$Vf));}if(count($_POST)==1||DRIVER!=$Qi||SERVER!=$N||$_GET["username"]!==$V||DB!=$l)redirect(auth_url($Qi,$N,$V,$l));}elseif($_POST["logout"]){if($ud&&!verify_token()){page_header('Logout','Invalid CSRF token. Send the form again.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Logout successful.'.' '.sprintf('Thanks for using Adminer, consider <a href="%s">donating</a>.','https://sourceforge.net/donate/index.php?group_id=264133'));}}elseif($Vf&&!$_SESSION["pwds"]){session_regenerate_id();$hg=$b->permanentLogin();foreach($Vf
as$y=>$X){list(,$ib)=explode(":",$X);list($Qi,$N,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($Qi,$N,$V,decrypt_string(base64_decode($ib),$hg));$_SESSION["db"][$Qi][$N][$V][$l]=true;}}function
unset_permanent(){global$Vf;foreach($Vf
as$y=>$X){list($Qi,$N,$V,$l)=array_map('base64_decode',explode("-",$y));if($Qi==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Vf[$y]);}cookie("adminer_permanent",implode(" ",$Vf));}function
auth_error($n){global$b,$ud;$hh=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$hh]||$_GET[$hh])&&!$ud)$n='Session expired, please login again.';else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.='<br>'.sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$hh]&&$_GET[$hh]&&ini_bool("session.use_only_cookies"))$n='Session support must be enabled.';$If=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$If["lifetime"]);page_header('Login',$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('No extension',sprintf('None of the supported PHP extensions (%s) are available.',implode(", ",$bg)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])){list($_d,$Xf)=explode(":",SERVER,2);if(is_numeric($Xf)&&$Xf<1024)auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$g=connect();$m=new
Min_Driver($g);}$ue=null;if(!is_object($g)||($ue=$b->login($_GET["username"],get_password()))!==true)auth_error((is_string($g)?h($g):(is_string($ue)?$ue:'Invalid credentials.')));if($Ka&&$_POST["token"])$_POST["token"]=$hi;$n='';if($_POST){if(!verify_token()){$Nd="max_input_vars";$Fe=ini_get($Nd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Fe||$X<$Fe)){$Nd=$y;$Fe=$X;}}}$n=(!$_POST["token"]&&$Fe?sprintf('Maximum number of allowed fields exceeded. Please increase %s.',"'$Nd'"):'Invalid CSRF token. Send the form again.'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=sprintf('Too big POST data. Reduce the data or increase the %s configuration directive.',"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.'You can upload a big SQL file via FTP and import it from server.';}function
select($H,$h=null,$xf=array(),$z=0){global$x;$te=array();$w=array();$f=array();$Ta=array();$wi=array();$I=array();odd('');for($s=0;(!$z||$s<$z)&&($J=$H->fetch_row());$s++){if(!$s){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($Zd=0;$Zd<count($J);$Zd++){$o=$H->fetch_field();$C=$o->name;$wf=$o->orgtable;$vf=$o->orgname;$I[$o->table]=$wf;if($xf&&$x=="sql")$te[$Zd]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));elseif($wf!=""){if(!isset($w[$wf])){$w[$wf]=array();foreach(indexes($wf,$h)as$v){if($v["type"]=="PRIMARY"){$w[$wf]=array_flip($v["columns"]);break;}}$f[$wf]=$w[$wf];}if(isset($f[$wf][$vf])){unset($f[$wf][$vf]);$w[$wf][$vf]=$Zd;$te[$Zd]=$wf;}}if($o->charsetnr==63)$Ta[$Zd]=true;$wi[$Zd]=$o->type;echo"<th".($wf!=""||$o->name!=$vf?" title='".h(($wf!=""?"$wf.":"").$vf)."'":"").">".h($C).($xf?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($C),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$y=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ta[$y]&&!is_utf8($X))$X="<i>".lang(array('%d byte','%d bytes'),strlen($X))."</i>";else{$X=h($X);if($wi[$y]==254)$X="<code>$X</code>";}if(isset($te[$y])&&!$f[$te[$y]]){if($xf&&$x=="sql"){$R=$J[array_search("table=",$te)];$_=$te[$y].urlencode($xf[$R]!=""?$xf[$R]:$R);}else{$_="edit=".urlencode($te[$y]);foreach($w[$te[$y]]as$mb=>$Zd)$_.="&where".urlencode("[".bracket_escape($mb)."]")."=".urlencode($J[$Zd]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($s?"</table>":"<p class='message'>".'No rows.')."\n";return$I;}function
referencable_primary($bh){$I=array();foreach(table_status('',true)as$Ih=>$R){if($Ih!=$bh&&fk_support($R)){foreach(fields($Ih)as$o){if($o["primary"]){if($I[$Ih]){unset($I[$Ih]);break;}$I[$Ih]=$o;}}}}return$I;}function
textarea($C,$Y,$K=10,$qb=80){global$x;echo"<textarea name='$C' rows='$K' cols='$qb' class='sqlarea jush-$x' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($y,$o,$ob,$dd=array(),$Kc=array()){global$Ah,$wi,$Ci,$kf;$U=$o["type"];echo'<td><select name="',h($y),'[type]" class="type" aria-labelledby="label-type">';if($U&&!isset($wi[$U])&&!isset($dd[$U])&&!in_array($U,$Kc))$Kc[]=$U;if($dd)$Ah['Foreign keys']=$dd;echo
optionlist(array_merge($Kc,$Ah),$U),'</select>
',on_help("getTarget(event).value",1),script("mixin(qsl('select'), {onfocus: function () { lastType = selectValue(this); }, onchange: editingTypeChange});",""),'<td><input name="',h($y),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$U)?" class='required'":"");echo' aria-labelledby="label-length">',script("mixin(qsl('input'), {onfocus: editingLengthFocus, oninput: editingLengthChange});",""),'<td class="options">',"<select name='".h($y)."[collation]'".(preg_match('~(char|text|enum|set)$~',$U)?"":" class='hidden'").'><option value="">('.'collation'.')'.optionlist($ob,$o["collation"]).'</select>',($Ci?"<select name='".h($y)."[unsigned]'".(!$U||preg_match(number_type(),$U)?"":" class='hidden'").'><option>'.optionlist($Ci,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($y)."[on_update]'".(preg_match('~timestamp|datetime~',$U)?"":" class='hidden'").'>'.optionlist(array(""=>"(".'ON UPDATE'.")","CURRENT_TIMESTAMP"),$o["on_update"]).'</select>':''),($dd?"<select name='".h($y)."[on_delete]'".(preg_match("~`~",$U)?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist(explode("|",$kf),$o["on_delete"])."</select> ":" ");}function
process_length($qe){global$vc;return(preg_match("~^\\s*\\(?\\s*$vc(?:\\s*,\\s*$vc)*+\\s*\\)?\\s*\$~",$qe)&&preg_match_all("~$vc~",$qe,$_e)?"(".implode(",",$_e[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$qe)));}function
process_type($o,$nb="COLLATE"){global$Ci;return" $o[type]".process_length($o["length"]).(preg_match(number_type(),$o["type"])&&in_array($o["unsigned"],$Ci)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $nb ".q($o["collation"]):"");}function
process_field($o,$ui){return
array(idf_escape(trim($o["field"])),process_type($ui),($o["null"]?" NULL":" NOT NULL"),default_value($o),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
default_value($o){$Rb=$o["default"];return($Rb===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$o["type"])||preg_match('~^(?![a-z])~i',$Rb)?q($Rb):$Rb));}function
type_class($U){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$y=>$X){if(preg_match("~$y|$X~",$U))return" class='$y'";}}function
edit_fields($p,$ob,$U="TABLE",$dd=array(),$ub=false){global$Od;$p=array_values($p);echo'<thead><tr>
';if($U=="PROCEDURE"){echo'<td>';}echo'<th id="label-name">',($U=="TABLE"?'Column name':'Parameter name'),'<td id="label-type">Type<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">Length
<td>','Options';if($U=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="Auto Increment">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default">Default value
',(support("comment")?"<td id='label-comment'".($ub?"":" class='hidden'").">".'Comment':"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.3")."' alt='+' title='".'Add next'."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($p
as$s=>$o){$s++;$yf=$o[($_POST?"orig":"field")];$Zb=(isset($_POST["add"][$s-1])||(isset($o["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$yf=="");echo'<tr',($Zb?"":" style='display: none;'"),'>
',($U=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$Od),$o["inout"]):""),'<th>';if($Zb){echo'<input name="fields[',$s,'][field]" value="',h($o["field"]),'" maxlength="64" autocapitalize="off" aria-labelledby="label-name">',script("qsl('input').oninput = function () { editingNameChange.call(this);".($o["field"]!=""||count($p)>1?"":" editingAddRow.call(this);")." };","");}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($yf),'">
';edit_type("fields[$s]",$o,$ob,$dd);if($U=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td>',checkbox("fields[$s][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$s,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td".($ub?"":" class='hidden'")."><input name='fields[$s][comment]' value='".h($o["comment"])."' maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.3")."' alt='+' title='".'Add next'."'> "."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.6.3")."' alt='â†‘' title='".'Move up'."'> "."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.6.3")."' alt='â†“' title='".'Move down'."'> ":""),($yf==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.6.3")."' alt='x' title='".'Remove'."'>":"");}}function
process_fields(&$p){$D=0;if($_POST["up"]){$ke=0;foreach($p
as$y=>$o){if(key($_POST["up"])==$y){unset($p[$y]);array_splice($p,$ke,0,array($o));break;}if(isset($o["field"]))$ke=$D;$D++;}}elseif($_POST["down"]){$fd=false;foreach($p
as$y=>$o){if(isset($o["field"])&&$fd){unset($p[key($_POST["down"])]);array_splice($p,$D,0,array($fd));break;}if(key($_POST["down"])==$y)$fd=$o;$D++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($B){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($B[0][0].$B[0][0],$B[0][0],substr($B[0],1,-1))),'\\'))."'";}function
grant($kd,$jg,$f,$jf){if(!$jg)return
true;if($jg==array("ALL PRIVILEGES","GRANT OPTION"))return($kd=="GRANT"?queries("$kd ALL PRIVILEGES$jf WITH GRANT OPTION"):queries("$kd ALL PRIVILEGES$jf")&&queries("$kd GRANT OPTION$jf"));return
queries("$kd ".preg_replace('~(GRANT OPTION)\([^)]*\)~','\1',implode("$f, ",$jg).$f).$jf);}function
drop_create($ec,$i,$fc,$Uh,$hc,$A,$Ke,$Ie,$Je,$gf,$Ve){if($_POST["drop"])query_redirect($ec,$A,$Ke);elseif($gf=="")query_redirect($i,$A,$Je);elseif($gf!=$Ve){$Eb=queries($i);queries_redirect($A,$Ie,$Eb&&queries($ec));if($Eb)queries($fc);}else
queries_redirect($A,$Ie,queries($Uh)&&queries($hc)&&queries($ec)&&queries($i));}function
create_trigger($jf,$J){global$x;$Zh=" $J[Timing] $J[Event]".($J["Event"]=="UPDATE OF"?" ".idf_escape($J["Of"]):"");return"CREATE TRIGGER ".idf_escape($J["Trigger"]).($x=="mssql"?$jf.$Zh:$Zh.$jf).rtrim(" $J[Type]\n$J[Statement]",";").";";}function
create_routine($Og,$J){global$Od,$x;$O=array();$p=(array)$J["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$O[]=(preg_match("~^($Od)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}$Sb=rtrim("\n$J[definition]",";");return"CREATE $Og ".idf_escape(trim($J["name"]))." (".implode(", ",$O).")".(isset($_GET["function"])?" RETURNS".process_type($J["returns"],"CHARACTER SET"):"").($J["language"]?" LANGUAGE $J[language]":"").($x=="pgsql"?" AS ".q($Sb):"$Sb;");}function
remove_definer($G){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\1)',logged_user()).'`~','\1',$G);}function
format_foreign_key($q){global$kf;return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($kf)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($kf)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($Tc,$ei){$I=pack("a100a8a8a8a12a12",$Tc,644,0,0,decoct($ei->size),decoct(time()));$gb=8*32;for($s=0;$s<strlen($I);$s++)$gb+=ord($I[$s]);$I.=sprintf("%06o",$gb)."\0 ";echo$I,str_repeat("\0",512-strlen($I));$ei->send();echo
str_repeat("\0",511-($ei->size+511)%512);}function
ini_bytes($Nd){$X=ini_get($Nd);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($Tf,$Vh="<sup>?</sup>"){global$x,$g;$fh=$g->server_info;$Ri=preg_replace('~^(\d\.?\d).*~s','\1',$fh);$Hi=array('sql'=>"https://dev.mysql.com/doc/refman/$Ri/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$Ri/static/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://download.oracle.com/docs/cd/B19306_01/server.102/b14200/",);if(preg_match('~MariaDB~',$fh)){$Hi['sql']="https://mariadb.com/kb/en/library/";$Tf['sql']=(isset($Tf['mariadb'])?$Tf['mariadb']:str_replace(".html","/",$Tf['sql']));}return($Tf[$x]?"<a href='$Hi[$x]$Tf[$x]'".target_blank().">$Vh</a>":"");}function
ob_gzencode($Q){return
gzencode($Q);}function
db_size($l){global$g;if(!$g->select_db($l))return"?";$I=0;foreach(table_status()as$S)$I+=$S["Data_length"]+$S["Index_length"];return
format_number($I);}function
set_utf8mb4($i){global$g;static$O=false;if(!$O&&preg_match('~\butf8mb4~i',$i)){$O=true;echo"SET NAMES ".charset($g).";\n\n";}}function
connect_error(){global$b,$g,$hi,$n,$dc;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header('Database'.": ".h(DB),'Invalid database.',true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),'Databases have been dropped.',drop_databases($_POST["db"]));page_header('Select database',$n,false);echo"<p class='links'>\n";foreach(array('database'=>'Create database','privileges'=>'Privileges','processlist'=>'Process list','variables'=>'Variables','status'=>'Status',)as$y=>$X){if(support($y))echo"<a href='".h(ME)."$y='>$X</a>\n";}echo"<p>".sprintf('%s version: %s through PHP extension %s',$dc[DRIVER],"<b>".h($g->server_info)."</b>","<b>$g->extension</b>")."\n","<p>".sprintf('Logged as: %s',"<b>".h(logged_user())."</b>")."\n";$k=$b->databases();if($k){$Vg=support("scheme");$ob=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>":"")."<th>".'Database'." - <a href='".h(ME)."refresh=1'>".'Refresh'."</a>"."<td>".'Collation'."<td>".'Tables'."<td>".'Size'." - <a href='".h(ME)."dbsize=1'>".'Compute'."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$k=($_GET["dbsize"]?count_tables($k):array_flip($k));foreach($k
as$l=>$T){$Ng=h(ME)."db=".urlencode($l);$t=h("Db-".$l);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$l,in_array($l,(array)$_POST["db"]),"","","",$t):""),"<th><a href='$Ng' id='$t'>".h($l)."</a>";$d=h(db_collation($l,$ob));echo"<td>".(support("database")?"<a href='$Ng".($Vg?"&amp;ns=":"")."&amp;database=' title='".'Alter database'."'>$d</a>":$d),"<td align='right'><a href='$Ng&amp;schema=' id='tables-".h($l)."' title='".'Database schema'."'>".($_GET["dbsize"]?$T:"?")."</a>","<td align='right' id='size-".h($l)."'>".($_GET["dbsize"]?db_size($l):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".'Drop'."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$hi'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$g->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header('Schema'.": ".h($_GET["ns"]),'Invalid schema.',true);page_footer("ns");exit;}}$kf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($zb){$this->size+=strlen($zb);fwrite($this->handler,$zb);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$vc="'(?:''|[^'\\\\]|\\\\.)*'";$Od="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$m->select($a,$L,array(where($_GET,$p)),$L);$J=($H?$H->fetch_row():array());echo$m->value($J[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$S=table_status1($a,true);$C=$b->tableName($S);page_header(($p&&is_view($S)?$S['Engine']=='materialized view'?'Materialized view':'View':'Table').": ".($C!=""?$C:h($a)),$n);$b->selectLinks($S);$tb=$S["Comment"];if($tb!="")echo"<p class='nowrap'>".'Comment'.": ".h($tb)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($S)){if(support("indexes")){echo"<h3 id='indexes'>".'Indexes'."</h3>\n";$w=indexes($a);if($w)$b->tableIndexesPrint($w);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.'Alter indexes'."</a>\n";}if(fk_support($S)){echo"<h3 id='foreign-keys'>".'Foreign keys'."</h3>\n";$dd=foreign_keys($a);if($dd){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Source'."<td>".'Target'."<td>".'ON DELETE'."<td>".'ON UPDATE'."<td></thead>\n";foreach($dd
as$C=>$q){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".h($q["on_delete"])."\n","<td>".h($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.'Alter'.'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.'Add foreign key'."</a>\n";}}if(support(is_view($S)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".'Triggers'."</h3>\n";$ti=triggers($a);if($ti){echo"<table cellspacing='0'>\n";foreach($ti
as$y=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($y)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($y))."'>".'Alter'."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.'Add trigger'."</a>\n";}}elseif(isset($_GET["schema"])){page_header('Database schema',"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Kh=array();$Lh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$_e,PREG_SET_ORDER);foreach($_e
as$s=>$B){$Kh[$B[1]]=array($B[2],$B[3]);$Lh[]="\n\t'".js_escape($B[1])."': [ $B[2], $B[3] ]";}$ii=0;$Qa=-1;$Ug=array();$_g=array();$oe=array();foreach(table_status('',true)as$R=>$S){if(is_view($S))continue;$Yf=0;$Ug[$R]["fields"]=array();foreach(fields($R)as$C=>$o){$Yf+=1.25;$o["pos"]=$Yf;$Ug[$R]["fields"][$C]=$o;}$Ug[$R]["pos"]=($Kh[$R]?$Kh[$R]:array($ii,0));foreach($b->foreignKeys($R)as$X){if(!$X["db"]){$me=$Qa;if($Kh[$R][1]||$Kh[$X["table"]][1])$me=min(floatval($Kh[$R][1]),floatval($Kh[$X["table"]][1]))-1;else$Qa-=.1;while($oe[(string)$me])$me-=.0001;$Ug[$R]["references"][$X["table"]][(string)$me]=array($X["source"],$X["target"]);$_g[$X["table"]][$R][(string)$me]=$X["target"];$oe[(string)$me]=true;}}$ii=max($ii,$Ug[$R]["pos"][0]+2.5+$Yf);}echo'<div id="schema" style="height: ',$ii,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Lh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$ii,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($Ug
as$C=>$R){echo"<div class='table' style='top: ".$R["pos"][0]."em; left: ".$R["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($R["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$R["references"]as$Rh=>$Ag){foreach($Ag
as$me=>$xg){$ne=$me-$Kh[$C][1];$s=0;foreach($xg[0]as$ph)echo"\n<div class='references' title='".h($Rh)."' id='refs$me-".($s++)."' style='left: $ne"."em; top: ".$R["fields"][$ph]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$ne)."em;'></div></div>";}}foreach((array)$_g[$C]as$Rh=>$Ag){foreach($Ag
as$me=>$f){$ne=$me-$Kh[$C][1];$s=0;foreach($f
as$Qh)echo"\n<div class='references' title='".h($Rh)."' id='refd$me-".($s++)."' style='left: $ne"."em; top: ".$R["fields"][$Qh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.6.3")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$ne)."em;'></div></div>";}}echo"\n</div>\n";}foreach($Ug
as$C=>$R){foreach((array)$R["references"]as$Rh=>$Ag){foreach($Ag
as$me=>$xg){$Oe=$ii;$De=-10;foreach($xg[0]as$y=>$ph){$Zf=$R["pos"][0]+$R["fields"][$ph]["pos"];$ag=$Ug[$Rh]["pos"][0]+$Ug[$Rh]["fields"][$xg[1][$y]]["pos"];$Oe=min($Oe,$Zf,$ag);$De=max($De,$Zf,$ag);}echo"<div class='references' id='refl$me' style='left: $me"."em; top: $Oe"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($De-$Oe)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">Permanent link</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Bb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$y)$Bb.="&$y=".urlencode($_POST[$y]);cookie("adminer_export",substr($Bb,1));$T=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Hc=dump_headers((count($T)==1?key($T):DB),(DB==""||count($T)>1));$Wd=preg_match('~sql~',$_POST["format"]);if($Wd){echo"-- Adminer $ia ".$dc[DRIVER]." dump\n\n";if($x=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
".($_POST["data_style"]?"SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$g->query("SET time_zone = '+00:00';");}}$Bh=$_POST["db_style"];$k=array(DB);if(DB==""){$k=$_POST["databases"];if(is_string($k))$k=explode("\n",rtrim(str_replace("\r","",$k),"\n"));}foreach((array)$k
as$l){$b->dumpDatabase($l);if($g->select_db($l)){if($Wd&&preg_match('~CREATE~',$Bh)&&($i=$g->result("SHOW CREATE DATABASE ".idf_escape($l),1))){set_utf8mb4($i);if($Bh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($l).";\n";echo"$i;\n";}if($Wd){if($Bh)echo
use_sql($l).";\n\n";$Df="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Og){foreach(get_rows("SHOW $Og STATUS WHERE Db = ".q($l),null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE $Og ".idf_escape($J["Name"]),2));set_utf8mb4($i);$Df.=($Bh!='DROP+CREATE'?"DROP $Og IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$i=remove_definer($g->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3));set_utf8mb4($i);$Df.=($Bh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$i;;\n\n";}}if($Df)echo"DELIMITER ;;\n\n$Df"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Ti=array();foreach(table_status('',true)as$C=>$S){$R=(DB==""||in_array($C,(array)$_POST["tables"]));$Kb=(DB==""||in_array($C,(array)$_POST["data"]));if($R||$Kb){if($Hc=="tar"){$ei=new
TmpFile;ob_start(array($ei,'write'),1e5);}$b->dumpTable($C,($R?$_POST["table_style"]:""),(is_view($S)?2:0));if(is_view($S))$Ti[]=$C;elseif($Kb){$p=fields($C);$b->dumpData($C,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($C));}if($Wd&&$_POST["triggers"]&&$R&&($ti=trigger_sql($C)))echo"\nDELIMITER ;;\n$ti\nDELIMITER ;\n";if($Hc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$l/")."$C.csv",$ei);}elseif($Wd)echo"\n";}}foreach($Ti
as$Si)$b->dumpTable($Si,$_POST["table_style"],1);if($Hc=="tar")echo
pack("x512");}}}if($Wd)echo"-- ".$g->result("SELECT NOW()")."\n";exit;}page_header('Export',$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0">
';$Ob=array('','USE','DROP+CREATE','CREATE');$Mh=array('','DROP+CREATE','CREATE');$Lb=array('','TRUNCATE+INSERT','INSERT');if($x=="sql")$Lb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$J);if(!$J)$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".'Output'."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".'Format'."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($x=="sqlite"?"":"<tr><th>".'Database'."<td>".html_select('db_style',$Ob,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],'Routines'):"").(support("event")?checkbox("events",1,$J["events"],'Events'):"")),"<tr><th>".'Tables'."<td>".html_select('table_style',$Mh,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],'Auto Increment').(support("trigger")?checkbox("triggers",1,$J["triggers"],'Triggers'):""),"<tr><th>".'Data'."<td>".html_select('data_style',$Lb,$J["data_style"]),'</table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="',$hi,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$dg=array();if(DB!=""){$eb=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$eb>".'Tables'."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".'Data'."<input type='checkbox' id='check-data'$eb></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$Ti="";$Nh=tables_list();foreach($Nh
as$C=>$U){$cg=preg_replace('~_.*~','',$C);$eb=($a==""||$a==(substr($a,-1)=="%"?"$cg%":$C));$gg="<tr><td>".checkbox("tables[]",$C,$eb,$C,"","block");if($U!==null&&!preg_match('~table~i',$U))$Ti.="$gg\n";else
echo"$gg<td align='right'><label class='block'><span id='Rows-".h($C)."'></span>".checkbox("data[]",$C,$eb)."</label>\n";$dg[$cg]++;}echo$Ti;if($Nh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".'Database'."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$k=$b->databases();if($k){foreach($k
as$l){if(!information_schema($l)){$cg=preg_replace('~_.*~','',$l);echo"<tr><td>".checkbox("databases[]",$l,$a==""||$a=="$cg%",$l,"","block")."\n";$dg[$cg]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Vc=true;foreach($dg
as$y=>$X){if($y!=""&&$X>1){echo($Vc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$y%")."'>".h($y)."</a>";$Vc=false;}}}elseif(isset($_GET["privileges"])){page_header('Privileges');echo'<p class="links"><a href="'.h(ME).'user=">'.'Create user'."</a>";$H=$g->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$kd=$H;if(!$H)$H=$g->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($kd?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'Username'."<th>".'Server'."<th></thead>\n";while($J=$H->fetch_assoc())echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.'Edit'."</a>\n";if(!$kd||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".'Edit'."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$yd=&get_session("queries");$xd=&$yd[DB];if(!$n&&$_POST["clear"]){$xd=array();redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?'Import':'SQL command'),$n);if(!$n&&$_POST){$hd=false;if(!isset($_GET["import"]))$G=$_POST["query"];elseif($_POST["webfile"]){$th=$b->importServerPath();$hd=@fopen((file_exists($th)?$th:"compress.zlib://$th.gz"),"rb");$G=($hd?fread($hd,1e6):false);}else$G=get_file("sql_file",true);if(is_string($G)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));if($G!=""&&strlen($G)<1e6){$og=$G.(preg_match("~;[ \t\r\n]*\$~",$G)?"":";");if(!$xd||reset(end($xd))!=$og){restart_session();$xd[]=array($og,time());set_session("queries",$yd);stop_session();}}$qh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Ub=";";$D=0;$sc=true;$h=connect();if(is_object($h)&&DB!="")$h->select_db(DB);$sb=0;$xc=array();$Kf='[\'"'.($x=="sql"?'`#':($x=="sqlite"?'`[':($x=="mssql"?'[':''))).']|/\*|-- |$'.($x=="pgsql"?'|\$[^$]*\$':'');$ji=microtime(true);parse_str($_COOKIE["adminer_export"],$xa);$jc=$b->dumpFormat();unset($jc["sql"]);while($G!=""){if(!$D&&preg_match("~^$qh*+DELIMITER\\s+(\\S+)~i",$G,$B)){$Ub=$B[1];$G=substr($G,strlen($B[0]));}else{preg_match('('.preg_quote($Ub)."\\s*|$Kf)",$G,$B,PREG_OFFSET_CAPTURE,$D);list($fd,$Yf)=$B[0];if(!$fd&&$hd&&!feof($hd))$G.=fread($hd,1e5);else{if(!$fd&&rtrim($G)=="")break;$D=$Yf+strlen($fd);if($fd&&rtrim($fd)!=$Ub){while(preg_match('('.($fd=='/*'?'\*/':($fd=='['?']':(preg_match('~^-- |^#~',$fd)?"\n":preg_quote($fd)."|\\\\."))).'|$)s',$G,$B,PREG_OFFSET_CAPTURE,$D)){$Sg=$B[0][0];if(!$Sg&&$hd&&!feof($hd))$G.=fread($hd,1e5);else{$D=$B[0][1]+strlen($Sg);if($Sg[0]!="\\")break;}}}else{$sc=false;$og=substr($G,0,$Yf);$sb++;$gg="<pre id='sql-$sb'><code class='jush-$x'>".$b->sqlCommandQuery($og)."</code></pre>\n";if($x=="sqlite"&&preg_match("~^$qh*+ATTACH\\b~i",$og,$B)){echo$gg,"<p class='error'>".'ATTACH queries are not supported.'."\n";$xc[]=" <a href='#sql-$sb'>$sb</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$gg;ob_flush();flush();}$xh=microtime(true);if($g->multi_query($og)&&is_object($h)&&preg_match("~^$qh*+USE\\b~i",$og))$h->query($og);do{$H=$g->store_result();if($g->error){echo($_POST["only_errors"]?$gg:""),"<p class='error'>".'Error in query'.($g->errno?" ($g->errno)":"").": ".error()."\n";$xc[]=" <a href='#sql-$sb'>$sb</a>";if($_POST["error_stops"])break
2;}else{$Xh=" <span class='time'>(".format_time($xh).")</span>".(strlen($og)<1000?" <a href='".h(ME)."sql=".urlencode(trim($og))."'>".'Edit'."</a>":"");$za=$g->affected_rows;$Wi=($_POST["only_errors"]?"":$m->warnings());$Xi="warnings-$sb";if($Wi)$Xh.=", <a href='#$Xi'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$Xi');","");$Ec=null;$Fc="explain-$sb";if(is_object($H)){$z=$_POST["limit"];$xf=select($H,$h,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$af=$H->num_rows;echo"<p>".($af?($z&&$af>$z?sprintf('%d / ',$z):"").lang(array('%d row','%d rows'),$af):""),$Xh;if($h&&preg_match("~^($qh|\\()*+SELECT\\b~i",$og)&&($Ec=explain($h,$og)))echo", <a href='#$Fc'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Fc');","");$t="export-$sb";echo", <a href='#$t'>".'Export'."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."<span id='$t' class='hidden'>: ".html_select("output",$b->dumpOutput(),$xa["output"])." ".html_select("format",$jc,$xa["format"])."<input type='hidden' name='query' value='".h($og)."'>"." <input type='submit' name='export' value='".'Export'."'><input type='hidden' name='token' value='$hi'></span>\n"."</form>\n";}}else{if(preg_match("~^$qh*+(CREATE|DROP|ALTER)$qh++(DATABASE|SCHEMA)\\b~i",$og)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($g->info)."'>".lang(array('Query executed OK, %d row affected.','Query executed OK, %d rows affected.'),$za)."$Xh\n";}echo($Wi?"<div id='$Xi' class='hidden'>\n$Wi</div>\n":"");if($Ec){echo"<div id='$Fc' class='hidden'>\n";select($Ec,$h,$xf);echo"</div>\n";}}$xh=microtime(true);}while($g->next_result());}$G=substr($G,$D);$D=0;}}}}if($sc)echo"<p class='message'>".'No commands to execute.'."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".lang(array('%d query executed OK.','%d queries executed OK.'),$sb-count($xc))," <span class='time'>(".format_time($ji).")</span>\n";}elseif($xc&&$sb>1)echo"<p class='error'>".'Error in query'.": ".implode("",$xc)."\n";}else
echo"<p class='error'>".upload_error($G)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Bc="<input type='submit' value='".'Execute'."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$og=$_GET["sql"];if($_POST)$og=$_POST["query"];elseif($_GET["history"]=="all")$og=$xd;elseif($_GET["history"]!="")$og=$xd[$_GET["history"]][0];echo"<p>";textarea("query",$og,20);echo($_POST?"":script("qs('textarea').focus();")),"<p>$Bc\n",'Limit rows'.": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".'File upload'."</legend><div>";$qd=(extension_loaded("zlib")?"[.gz]":"");echo(ini_bool("file_uploads")?"SQL$qd (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Bc":'File uploads are disabled.'),"</div></fieldset>\n","<fieldset><legend>".'From server'."</legend><div>",sprintf('Webserver file %s',"<code>".h($b->importServerPath())."$qd</code>"),' <input type="submit" name="webfile" value="'.'Run file'.'">',"</div></fieldset>\n","<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),'Stop on error')."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),'Show only errors')."\n","<input type='hidden' name='token' value='$hi'>\n";if(!isset($_GET["import"])&&$xd){print_fieldset("history",'History',$_GET["history"]!="");for($X=end($xd);$X;$X=prev($xd)){$y=key($xd);list($og,$Xh,$nc)=$X;echo'<a href="'.h(ME."sql=&history=$y").'">'.'Edit'."</a>"." <span class='time' title='".@date('Y-m-d',$Xh)."'>".@date("H:i:s",$Xh)."</span>"." <code class='jush-$x'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$og)))),80,"</code>").($nc?" <span class='time'>($nc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".'Clear'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'Edit all'."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$Di=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$C=>$o){if(!isset($o["privileges"][$Di?"update":"insert"])||$b->fieldName($o)=="")unset($p[$C]);}if($_POST&&!$n&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($Di?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$w=indexes($a);$zi=unique_array($_GET["where"],$w);$rg="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,'Item has been deleted.',$m->delete($a,$rg,!$zi));else{$O=array();foreach($p
as$C=>$o){$X=process_input($o);if($X!==false&&$X!==null)$O[idf_escape($C)]=$X;}if($Di){if(!$O)redirect($A);queries_redirect($A,'Item has been updated.',$m->update($a,$O,$rg,!$zi));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$H=$m->insert($a,$O);$le=($H?last_id():0);queries_redirect($A,sprintf('Item%s has been inserted.',($le?" $le":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($p
as$C=>$o){if(isset($o["privileges"]["select"])){$Ga=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ga="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$Ga="1*".idf_escape($C);$L[]=($Ga?"$Ga AS ":"").idf_escape($C);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$m->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$n=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$p){if(!$Z){$H=$m->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($m->primary=>"");}if($J){foreach($J
as$y=>$X){if(!$Z)$J[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary));}}}edit_form($a,$p,$J,$Di);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Mf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$y)$Mf[$y]=$y;$zg=referencable_primary($a);$dd=array();foreach($zg
as$Ih=>$o)$dd[str_replace("`","``",$Ih)."`".str_replace("`","``",$o["field"])]=$Ih;$_f=array();$S=array();if($a!=""){$_f=fields($a);$S=table_status($a);if(!$S)$n='No tables.';}$J=$_POST;$J["fields"]=(array)$J["fields"];if($J["auto_increment_col"])$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;if($_POST&&!process_fields($J["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),'Table has been dropped.',drop_tables(array($a)));else{$p=array();$Da=array();$Ii=false;$bd=array();$zf=reset($_f);$Aa=" FIRST";foreach($J["fields"]as$y=>$o){$q=$dd[$o["type"]];$ui=($q!==null?$zg[$q]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($y==$J["auto_increment_col"])$o["auto_increment"]=true;$lg=process_field($o,$ui);$Da[]=array($o["orig"],$lg,$Aa);if($lg!=process_field($zf,$zf)){$p[]=array($o["orig"],$lg,$Aa);if($o["orig"]!=""||$Aa)$Ii=true;}if($q!==null)$bd[idf_escape($o["field"])]=($a!=""&&$x!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$dd[$o["type"]],'source'=>array($o["field"]),'target'=>array($ui["field"]),'on_delete'=>$o["on_delete"],));$Aa=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Ii=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$zf=next($_f);if(!$zf)$Aa="";}}$Of="";if($Mf[$J["partition_by"]]){$Pf=array();if($J["partition_by"]=='RANGE'||$J["partition_by"]=='LIST'){foreach(array_filter($J["partition_names"])as$y=>$X){$Y=$J["partition_values"][$y];$Pf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($J["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Of.="\nPARTITION BY $J[partition_by]($J[partition])".($Pf?" (".implode(",",$Pf)."\n)":($J["partitions"]?" PARTITIONS ".(+$J["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$S["Create_options"]))$Of.="\nREMOVE PARTITIONING";$He='Table has been altered.';if($a==""){cookie("adminer_engine",$J["Engine"]);$He='Table has been created.';}$C=trim($J["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($C),$He,alter_table($a,$C,($x=="sqlite"&&($Ii||$bd)?$Da:$p),$bd,($J["Comment"]!=$S["Comment"]?$J["Comment"]:null),($J["Engine"]&&$J["Engine"]!=$S["Engine"]?$J["Engine"]:""),($J["Collation"]&&$J["Collation"]!=$S["Collation"]?$J["Collation"]:""),($J["Auto_increment"]!=""?number($J["Auto_increment"]):""),$Of));}}page_header(($a!=""?'Alter table':'Create table'),$n,array("table"=>$a),h($a));if(!$_POST){$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($wi["int"])?"int":(isset($wi["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$J=$S;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"])$J["Auto_increment"]="";foreach($_f
as$o){$o["has_default"]=isset($o["default"]);$J["fields"][]=$o;}if(support("partitioning")){$id="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$g->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $id ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$Pf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $id AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Pf[""]="";$J["partition_names"]=array_keys($Pf);$J["partition_values"]=array_values($Pf);}}}$ob=collations();$uc=engines();foreach($uc
as$tc){if(!strcasecmp($tc,$J["Engine"])){$J["Engine"]=$tc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo'Table name: <input name="name" maxlength="64" value="',h($J["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($uc?"<select name='Engine'>".optionlist(array(""=>"(".'engine'.")")+$uc,$J["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($ob&&!preg_match("~sqlite|mssql~",$x)?html_select("Collation",array(""=>"(".'collation'.")")+$ob,$J["Collation"]):""),' <input type="submit" value="Save">
';}echo'
';if(support("columns")){echo'<table cellspacing="0" id="edit-fields" class="nowrap">
';$ub=($_POST?$_POST["comments"]:$J["Comment"]!="");if(!$_POST&&!$ub){foreach($J["fields"]as$o){if($o["comment"]!=""){$ub=true;break;}}}edit_fields($J["fields"],$ob,"TABLE",$dd,$ub);echo'</table>
<p>
Auto Increment: <input type="number" name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
',checkbox("defaults",1,!$_POST||$_POST["defaults"],'Default values',"columnShow(this.checked, 5)","jsonly"),($_POST?"":script("editingHideDefaults();")),(support("comment")?"<label><input type='checkbox' name='comments' value='1' class='jsonly'".($ub?" checked":"").">".'Comment'."</label>".script("qsl('input').onclick = partial(editingCommentsClick, true);").' <input name="Comment" value="'.h($J["Comment"]).'" maxlength="'.(min_version(5.5)?2048:60).'"'.($ub?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="Save">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$a));}if(support("partitioning")){$Nf=preg_match('~RANGE|LIST~',$J["partition_by"]);print_fieldset("partition",'Partition by',$J["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Mf,$J["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($J["partition"]),'">)
Partitions: <input type="number" name="partitions" class="size',($Nf||!$J["partition_by"]?" hidden":""),'" value="',h($J["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Nf?"":" class='hidden'"),'>
<thead><tr><th>Partition name<th>Values</thead>
';foreach($J["partition_names"]as$y=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($y==count($J["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($J["partition_values"][$y]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
',script("qs('#form')['defaults'].onclick();".(support("comment")?" editingCommentsClick.call(qs('#form')['comments']);":""));}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Gd=array("PRIMARY","UNIQUE","INDEX");$S=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$S["Engine"]))$Gd[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$S["Engine"]))$Gd[]="SPATIAL";$w=indexes($a);$eg=array();if($x=="mongo"){$eg=$w["_id_"];unset($Gd[0]);unset($w["_id_"]);}$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($J["indexes"]as$v){$C=$v["name"];if(in_array($v["type"],$Gd)){$f=array();$re=array();$Wb=array();$O=array();ksort($v["columns"]);foreach($v["columns"]as$y=>$e){if($e!=""){$qe=$v["lengths"][$y];$Vb=$v["descs"][$y];$O[]=idf_escape($e).($qe?"(".(+$qe).")":"").($Vb?" DESC":"");$f[]=$e;$re[]=($qe?$qe:null);$Wb[]=$Vb;}}if($f){$Cc=$w[$C];if($Cc){ksort($Cc["columns"]);ksort($Cc["lengths"]);ksort($Cc["descs"]);if($v["type"]==$Cc["type"]&&array_values($Cc["columns"])===$f&&(!$Cc["lengths"]||array_values($Cc["lengths"])===$re)&&array_values($Cc["descs"])===$Wb){unset($w[$C]);continue;}}$c[]=array($v["type"],$C,$O);}}}foreach($w
as$C=>$Cc)$c[]=array($Cc["type"],$C,"DROP");if(!$c)redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),'Indexes have been altered.',alter_indexes($a,$c));}page_header('Indexes',$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($J["indexes"]as$y=>$v){if($v["columns"][count($v["columns"])]!="")$J["indexes"][$y]["columns"][]="";}$v=end($J["indexes"]);if($v["type"]||array_filter($v["columns"],'strlen'))$J["indexes"][]=array("columns"=>array(1=>""));}if(!$J){foreach($w
as$y=>$v){$w[$y]["name"]=$y;$w[$y]["columns"][]="";}$w[]=array("columns"=>array(1=>""));$J["indexes"]=$w;}echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">Index Type
<th><input type="submit" class="wayoff">Column (length)
<th id="label-name">Name
<th><noscript>',"<input type='image' class='icon' name='add[0]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.3")."' alt='+' title='".'Add next'."'>",'</noscript>
</thead>
';if($eg){echo"<tr><td>PRIMARY<td>";foreach($eg["columns"]as$y=>$e){echo
select_input(" disabled",$p,$e),"<label><input disabled type='checkbox'>".'descending'."</label> ";}echo"<td><td>\n";}$Zd=1;foreach($J["indexes"]as$v){if(!$_POST["drop_col"]||$Zd!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$Zd][type]",array(-1=>"")+$Gd,$v["type"],($Zd==count($J["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($v["columns"]);$s=1;foreach($v["columns"]as$y=>$e){echo"<span>".select_input(" name='indexes[$Zd][columns][$s]' title='".'Column'."'",($p?array_combine($p,$p):$p),$e,"partial(".($s==count($v["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($x=="sql"?"":$_GET["indexes"]."_")."')"),($x=="sql"||$x=="mssql"?"<input type='number' name='indexes[$Zd][lengths][$s]' class='size' value='".h($v["lengths"][$y])."' title='".'Length'."'>":""),($x!="sql"?checkbox("indexes[$Zd][descs][$s]",1,$v["descs"][$y],'descending'):"")," </span>";$s++;}echo"<td><input name='indexes[$Zd][name]' value='".h($v["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$Zd]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.6.3")."' alt='x' title='".'Remove'."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$Zd++;}echo'</table>
<p>
<input type="submit" value="Save">
<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["database"])){$J=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$C=trim($J["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'Database has been dropped.',drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($C),'Database has been renamed.',rename_database($C,$J["collation"]));}else{$k=explode("\n",str_replace("\r","",$C));$Ch=true;$ke="";foreach($k
as$l){if(count($k)==1||$l!=""){if(!create_database($l,$J["collation"]))$Ch=false;$ke=$l;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($ke),'Database has been created.',$Ch);}}else{if(!$J["collation"])redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($C).(preg_match('~^[a-z0-9_]+$~i',$J["collation"])?" COLLATE $J[collation]":""),substr(ME,0,-1),'Database has been altered.');}}page_header(DB!=""?'Alter database':'Create database',$n,array(),h(DB));$ob=collations();$C=DB;if($_POST)$C=$J["name"];elseif(DB!="")$J["collation"]=db_collation(DB,$ob);elseif($x=="sql"){foreach(get_vals("SHOW GRANTS")as$kd){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\.\*)?~',$kd,$B)&&$B[1]){$C=stripcslashes(idf_unescape("`$B[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input name="name" id="name" value="'.h($C).'" maxlength="64" autocapitalize="off">')."\n".($ob?html_select("collation",array(""=>"(".'collation'.")")+$ob,$J["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="Save">
';if(DB!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.3")."' alt='+' title='".'Add next'."'>\n";echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["scheme"])){$J=$_POST;if($_POST&&!$n){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,'Schema has been dropped.');else{$C=trim($J["name"]);$_.=urlencode($C);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($C),$_,'Schema has been created.');elseif($_GET["ns"]!=$C)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($C),$_,'Schema has been altered.');else
redirect($_);}}page_header($_GET["ns"]!=""?'Alter schema':'Create schema',$n);if(!$J)$J["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($J["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="Save">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header('Call'.": ".h($da),$n);$Og=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Ed=array();$Df=array();foreach($Og["fields"]as$s=>$o){if(substr($o["inout"],-3)=="OUT")$Df[$s]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Ed[]=$s;}if(!$n&&$_POST){$Za=array();foreach($Og["fields"]as$y=>$o){if(in_array($y,$Ed)){$X=process_input($o);if($X===false)$X="''";if(isset($Df[$y]))$g->query("SET @".idf_escape($o["field"])." = $X");}$Za[]=(isset($Df[$y])?"@".idf_escape($o["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$Za).")";$xh=microtime(true);$H=$g->multi_query($G);$za=$g->affected_rows;echo$b->selectQuery($G,$xh,!$H);if(!$H)echo"<p class='error'>".error()."\n";else{$h=connect();if(is_object($h))$h->select_db(DB);do{$H=$g->store_result();if(is_object($H))select($H,$h);else
echo"<p class='message'>".lang(array('Routine has been called, %d row affected.','Routine has been called, %d rows affected.'),$za)."\n";}while($g->next_result());if($Df)select($g->query("SELECT ".implode(", ",$Df)));}}echo'
<form action="" method="post">
';if($Ed){echo"<table cellspacing='0'>\n";foreach($Ed
as$y){$o=$Og["fields"][$y];$C=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$C];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="Call">
<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$C=$_GET["name"];$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$He=($_POST["drop"]?'Foreign key has been dropped.':($C!=""?'Foreign key has been altered.':'Foreign key has been created.'));$A=ME."table=".urlencode($a);if(!$_POST["drop"]){$J["source"]=array_filter($J["source"],'strlen');ksort($J["source"]);$Qh=array();foreach($J["source"]as$y=>$X)$Qh[$y]=$J["target"][$y];$J["target"]=$Qh;}if($x=="sqlite")queries_redirect($A,$He,recreate_table($a,$a,array(),array(),array(" $C"=>($_POST["drop"]?"":" ".format_foreign_key($J)))));else{$c="ALTER TABLE ".table($a);$ec="\nDROP ".($x=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($C);if($_POST["drop"])query_redirect($c.$ec,$A,$He);else{query_redirect($c.($C!=""?"$ec,":"")."\nADD".format_foreign_key($J),$A,$He);$n='Source and target columns must have the same data type, there must be an index on the target columns and referenced data must exist.'."<br>$n";}}}page_header('Foreign key',$n,array("table"=>$a),h($a));if($_POST){ksort($J["source"]);if($_POST["add"])$J["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$J["target"]=array();}elseif($C!=""){$dd=foreign_keys($a);$J=$dd[$C];$J["source"][]="";}else{$J["table"]=$a;$J["source"]=array("");}$ph=array_keys(fields($a));$Qh=($a===$J["table"]?$ph:array_keys(fields($J["table"])));$yg=array_keys(array_filter(table_status('',true),'fk_support'));echo'
<form action="" method="post">
<p>
';if($J["db"]==""&&$J["ns"]==""){echo'Target table:
',html_select("table",$yg,$J["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="Change"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">Source<th id="label-target">Target</thead>
';$Zd=0;foreach($J["source"]as$y=>$X){echo"<tr>","<td>".html_select("source[".(+$y)."]",array(-1=>"")+$ph,$X,($Zd==count($J["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$y)."]",$Qh,$J["target"][$y],1,"label-target");$Zd++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+explode("|",$kf),$J["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+explode("|",$kf),$J["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="Save">
<noscript><p><input type="submit" name="add" value="Add column"></noscript>
';}if($C!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$C));}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$J=$_POST;$Af="VIEW";if($x=="pgsql"&&$a!=""){$P=table_status($a);$Af=strtoupper($P["Engine"]);}if($_POST&&!$n){$C=trim($J["name"]);$Ga=" AS\n$J[select]";$A=ME."table=".urlencode($C);$He='View has been altered.';$U=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$C&&$x!="sqlite"&&$U=="VIEW"&&$Af=="VIEW")query_redirect(($x=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($C).$Ga,$A,$He);else{$Sh=$C."_adminer_".uniqid();drop_create("DROP $Af ".table($a),"CREATE $U ".table($C).$Ga,"DROP $U ".table($C),"CREATE $U ".table($Sh).$Ga,"DROP $U ".table($Sh),($_POST["drop"]?substr(ME,0,-1):$A),'View has been dropped.',$He,'View has been created.',$a,$C);}}if(!$_POST&&$a!=""){$J=view($a);$J["name"]=$a;$J["materialized"]=($Af!="VIEW");if(!$n)$n=error();}page_header(($a!=""?'Alter view':'Create view'),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>Name: <input name="name" value="',h($J["name"]),'" maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$J["materialized"],'Materialized view'):""),'<p>';textarea("select",$J["select"]);echo'<p>
<input type="submit" value="Save">
';if($a!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$a));}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Rd=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$zh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$J=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'Event has been dropped.');elseif(in_array($J["INTERVAL_FIELD"],$Rd)&&isset($zh[$J["STATUS"]])){$Tg="\nON SCHEDULE ".($J["INTERVAL_VALUE"]?"EVERY ".q($J["INTERVAL_VALUE"])." $J[INTERVAL_FIELD]".($J["STARTS"]?" STARTS ".q($J["STARTS"]):"").($J["ENDS"]?" ENDS ".q($J["ENDS"]):""):"AT ".q($J["STARTS"]))." ON COMPLETION".($J["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'Event has been altered.':'Event has been created.'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$Tg.($aa!=$J["EVENT_NAME"]?"\nRENAME TO ".idf_escape($J["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($J["EVENT_NAME"]).$Tg)."\n".$zh[$J["STATUS"]]." COMMENT ".q($J["EVENT_COMMENT"]).rtrim(" DO\n$J[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'Alter event'.": ".h($aa):'Create event'),$n);if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>Name<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" maxlength="64" autocapitalize="off">
<tr><th title="datetime">Start<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th title="datetime">End<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>Every<td><input type="number" name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Rd,$J["INTERVAL_FIELD"]),'<tr><th>Status<td>',html_select("STATUS",$zh,$J["STATUS"]),'<tr><th>Comment<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" maxlength="64">
<tr><th><td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",'On completion preserve'),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="Save">
';if($aa!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$aa));}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Og=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$J=$_POST;$J["fields"]=(array)$J["fields"];if($_POST&&!process_fields($J["fields"])&&!$n){$yf=routine($_GET["procedure"],$Og);$Sh="$J[name]_adminer_".uniqid();drop_create("DROP $Og ".routine_id($da,$yf),create_routine($Og,$J),"DROP $Og ".routine_id($J["name"],$J),create_routine($Og,array("name"=>$Sh)+$J),"DROP $Og ".routine_id($Sh,$J),substr(ME,0,-1),'Routine has been dropped.','Routine has been altered.','Routine has been created.',$da,$J["name"]);}page_header(($da!=""?(isset($_GET["function"])?'Alter function':'Alter procedure').": ".h($da):(isset($_GET["function"])?'Create function':'Create procedure')),$n);if(!$_POST&&$da!=""){$J=routine($_GET["procedure"],$Og);$J["name"]=$da;}$ob=get_vals("SHOW CHARACTER SET");sort($ob);$Pg=routine_languages();echo'
<form action="" method="post" id="form">
<p>Name: <input name="name" value="',h($J["name"]),'" maxlength="64" autocapitalize="off">
',($Pg?'Language'.": ".html_select("language",$Pg,$J["language"])."\n":""),'<input type="submit" value="Save">
<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$ob,$Og);if(isset($_GET["function"])){echo"<tr><td>".'Return type';edit_type("returns",$J["returns"],$ob,array(),($x=="pgsql"?array("void","trigger"):array()));}echo'</table>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="Save">
';if($da!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$da));}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$J=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);$C=trim($J["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,'Sequence has been dropped.');elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($C),$_,'Sequence has been created.');elseif($fa!=$C)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($C),$_,'Sequence has been altered.');else
redirect($_);}page_header($fa!=""?'Alter sequence'.": ".h($fa):'Create sequence',$n);if(!$J)$J["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($J["name"]),'" autocapitalize="off">
<input type="submit" value="Save">
';if($fa!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$fa))."\n";echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$J=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,'Type has been dropped.');else
query_redirect("CREATE TYPE ".idf_escape(trim($J["name"]))." $J[as]",$_,'Type has been created.');}page_header($ga!=""?'Alter type'.": ".h($ga):'Create type',$n);if(!$J)$J["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".'Drop'."'>".confirm(sprintf('Drop %s?',$ga))."\n";else{echo"<input name='name' value='".h($J['name'])."' autocapitalize='off'>\n";textarea("as",$J["as"]);echo"<p><input type='submit' value='".'Save'."'>\n";}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$C=$_GET["name"];$si=trigger_options();$J=(array)trigger($C)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$si["Timing"])&&in_array($_POST["Event"],$si["Event"])&&in_array($_POST["Type"],$si["Type"])){$jf=" ON ".table($a);$ec="DROP TRIGGER ".idf_escape($C).($x=="pgsql"?$jf:"");$A=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($ec,$A,'Trigger has been dropped.');else{if($C!="")queries($ec);queries_redirect($A,($C!=""?'Trigger has been altered.':'Trigger has been created.'),queries(create_trigger($jf,$_POST)));if($C!="")queries(create_trigger($jf,$J+array("Type"=>reset($si["Type"]))));}}$J=$_POST;}page_header(($C!=""?'Alter trigger'.": ".h($C):'Create trigger'),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>Time<td>',html_select("Timing",$si["Timing"],$J["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>Event<td>',html_select("Event",$si["Event"],$J["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$si["Event"])?" <input name='Of' value='".h($J["Of"])."' class='hidden'>":""),'<tr><th>Type<td>',html_select("Type",$si["Type"],$J["Type"]),'</table>
<p>Name: <input name="Trigger" value="',h($J["Trigger"]),'" maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="Save">
';if($C!=""){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',$C));}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$jg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$_b)$jg[$_b][$J["Privilege"]]=$J["Comment"];}$jg["Server Admin"]+=$jg["File access on server"];$jg["Databases"]["Create routine"]=$jg["Procedures"]["Create routine"];unset($jg["Procedures"]["Create routine"]);$jg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$jg["Columns"][$X]=$jg["Tables"][$X];unset($jg["Server Admin"]["Usage"]);foreach($jg["Tables"]as$y=>$X)unset($jg["Databases"][$y]);$Ue=array();if($_POST){foreach($_POST["objects"]as$y=>$X)$Ue[$X]=(array)$Ue[$X]+(array)$_POST["grants"][$y];}$ld=array();$hf="";if(isset($_GET["host"])&&($H=$g->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$B)&&preg_match_all('~ *([^(,]*[^ ,(])( *\([^)]+\))?~',$B[1],$_e,PREG_SET_ORDER)){foreach($_e
as$X){if($X[1]!="USAGE")$ld["$B[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$J[0]))$ld["$B[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$B))$hf=$B[1];}}if($_POST&&!$n){$if=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $if",ME."privileges=",'User has been dropped.');else{$We=q($_POST["user"])."@".q($_POST["host"]);$Rf=$_POST["pass"];if($Rf!=''&&!$_POST["hashed"]){$Rf=$g->result("SELECT PASSWORD(".q($Rf).")");$n=!$Rf;}$Eb=false;if(!$n){if($if!=$We){$Eb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $We IDENTIFIED BY PASSWORD ".q($Rf));$n=!$Eb;}elseif($Rf!=$hf)queries("SET PASSWORD FOR $We = ".q($Rf));}if(!$n){$Lg=array();foreach($Ue
as$cf=>$kd){if(isset($_GET["grant"]))$kd=array_filter($kd);$kd=array_keys($kd);if(isset($_GET["grant"]))$Lg=array_diff(array_keys(array_filter($Ue[$cf],'strlen')),$kd);elseif($if==$We){$ff=array_keys((array)$ld[$cf]);$Lg=array_diff($ff,$kd);$kd=array_diff($kd,$ff);unset($ld[$cf]);}if(preg_match('~^(.+)\s*(\(.*\))?$~U',$cf,$B)&&(!grant("REVOKE",$Lg,$B[2]," ON $B[1] FROM $We")||!grant("GRANT",$kd,$B[2]," ON $B[1] TO $We"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($if!=$We)queries("DROP USER $if");elseif(!isset($_GET["grant"])){foreach($ld
as$cf=>$Lg){if(preg_match('~^(.+)(\(.*\))?$~U',$cf,$B))grant("REVOKE",array_keys($Lg),$B[2]," ON $B[1] FROM $We");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'User has been altered.':'User has been created.'),!$n);if($Eb)$g->query("DROP USER $We");}}page_header((isset($_GET["host"])?'Username'.": ".h("$ha@$_GET[host]"):'Create user'),$n,array("privileges"=>array('','Privileges')));if($_POST){$J=$_POST;$ld=$Ue;}else{$J=$_GET+array("host"=>$g->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$hf;if($hf!="")$J["hashed"]=true;$ld[(DB==""||$ld?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>Server<td><input name="host" maxlength="60" value="',h($J["host"]),'" autocapitalize="off">
<tr><th>Username<td><input name="user" maxlength="16" value="',h($J["user"]),'" autocapitalize="off">
<tr><th>Password<td><input name="pass" id="pass" value="',h($J["pass"]),'" autocomplete="new-password">
';if(!$J["hashed"])echo
script("typePassword(qs('#pass'));");echo
checkbox("hashed",1,$J["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".'Privileges'.doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($ld
as$cf=>$kd){echo'<th>'.($cf!="*.*"?"<input name='objects[$s]' value='".h($cf)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'Server',"Databases"=>'Database',"Tables"=>'Table',"Columns"=>'Column',"Procedures"=>'Routine',)as$_b=>$Vb){foreach((array)$jg[$_b]as$ig=>$tb){echo"<tr".odd()."><td".($Vb?">$Vb<td":" colspan='2'").' lang="en" title="'.h($tb).'">'.h($ig);$s=0;foreach($ld
as$cf=>$kd){$C="'grants[$s][".h(strtoupper($ig))."]'";$Y=$kd[strtoupper($ig)];if($_b=="Server Admin"&&$cf!=(isset($ld["*.*"])?"*.*":".*"))echo"<td>";elseif(isset($_GET["grant"]))echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".'Grant'."<option value='0'".($Y=="0"?" selected":"").">".'Revoke'."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$C value='1'".($Y?" checked":"").($ig=="All privileges"?" id='grants-$s-all'>":">".($ig=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$s-all'); };"))),"</label>";}$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="Save">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="Drop">',confirm(sprintf('Drop %s?',"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$ge=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$ge++;}queries_redirect(ME."processlist=",lang(array('%d process has been killed.','%d processes have been killed.'),$ge),$ge||!$_POST["kill"]);}page_header('Process list',$n);echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$s=-1;foreach(process_list()as$s=>$J){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>":"");foreach($J
as$y=>$X)echo"<th>$y".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($y),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"../b14237/dynviews_2088.htm",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J[$x=="sql"?"Id":"pid"],0):"");foreach($J
as$y=>$X)echo"<td>".(($x=="sql"&&$y=="Info"&&preg_match("~Query|Killed~",$J["Command"])&&$X!="")||($x=="pgsql"&&$y=="current_query"&&$X!="<IDLE>")||($x=="oracle"&&$y=="sql_text"&&$X!="")?"<code class='jush-$x'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.'Clone'.'</a>':h($X));echo"\n";}echo'</table>
<p>
';if(support("kill")){echo($s+1)."/".sprintf('%d in total',max_connections()),"<p><input type='submit' value='".'Kill'."'>\n";}echo'<input type="hidden" name="token" value="',$hi,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$w=indexes($a);$p=fields($a);$dd=column_foreign_keys($a);$ef=$S["Oid"];parse_str($_COOKIE["adminer_import"],$ya);$Mg=array();$f=array();$Wh=null;foreach($p
as$y=>$o){$C=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$C!=""){$f[$y]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($o))$Wh=$b->selectLengthProcess();}$Mg+=$o["privileges"];}list($L,$md)=$b->selectColumnsProcess($f,$w);$Vd=count($md)<count($L);$Z=$b->selectSearchProcess($p,$w);$uf=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$_i=>$J){$Ga=convert_field($p[key($J)]);$L=array($Ga?$Ga:idf_escape(key($J)));$Z[]=where_check($_i,$p);$I=$m->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$eg=$Bi=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$eg=array_flip($v["columns"]);$Bi=($L?$eg:array());foreach($Bi
as$y=>$X){if(in_array(idf_escape($y),$L))unset($Bi[$y]);}break;}}if($ef&&!$eg){$eg=$Bi=array($ef=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($ef));}if($_POST&&!$n){$cj=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$fb=array();foreach($_POST["check"]as$cb)$fb[]=where_check($cb,$p);$cj[]="((".implode(") OR (",$fb)."))";}$cj=($cj?"\nWHERE ".implode(" AND ",$cj):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$id=($L?implode(", ",$L):"*").convert_fields($f,$p,$L)."\nFROM ".table($a);$od=($md&&$Vd?"\nGROUP BY ".implode(", ",$md):"").($uf?"\nORDER BY ".implode(", ",$uf):"");if(!is_array($_POST["check"])||$eg)$G="SELECT $id$cj$od";else{$yi=array();foreach($_POST["check"]as$X)$yi[]="(SELECT".limit($id,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$od,1).")";$G=implode(" UNION ALL ",$yi);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$dd)){if($_POST["save"]||$_POST["delete"]){$H=true;$za=0;$O=array();if(!$_POST["delete"]){foreach($f
as$C=>$X){$X=process_input($p[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$O){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($eg&&is_array($_POST["check"]))||$Vd){$H=($_POST["delete"]?$m->delete($a,$cj):($_POST["clone"]?queries("INSERT $G$cj"):$m->update($a,$O,$cj)));$za=$g->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Yi="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$H=($_POST["delete"]?$m->delete($a,$Yi,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$Yi)):$m->update($a,$O,$Yi,1)));if(!$H)break;$za+=$g->affected_rows;}}}$He=lang(array('%d item has been affected.','%d items have been affected.'),$za);if($_POST["clone"]&&$H&&$za==1){$le=last_id();if($le)$He=sprintf('Item%s has been inserted.'," $le");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$He,$H);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n='Ctrl+click on a value to modify it.';else{$H=true;$za=0;foreach($_POST["val"]as$_i=>$J){$O=array();foreach($J
as$y=>$X){$y=bracket_escape($y,1);$O[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$H=$m->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($_i,$p),!$Vd&&!$eg," ");if(!$H)break;$za+=$g->affected_rows;}queries_redirect(remove_from_uri(),lang(array('%d item has been affected.','%d items have been affected.'),$za),$H);}}elseif(!is_string($Sc=get_file("csv_file",true)))$n=upload_error($Sc);elseif(!preg_match('~~u',$Sc))$n='File must be in UTF-8 encoding.';else{cookie("adminer_import","output=".urlencode($ya["output"])."&format=".urlencode($_POST["separator"]));$H=true;$qb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$Sc,$_e);$za=count($_e[0]);$m->begin();$M=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($_e[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$M]*)$M~",$X.$M,$Ae);if(!$y&&!array_diff($Ae[1],$qb)){$qb=$Ae[1];$za--;}else{$O=array();foreach($Ae[1]as$s=>$mb)$O[idf_escape($qb[$s])]=($mb==""&&$p[$qb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$mb))));$K[]=$O;}}$H=(!$K||$m->insertUpdate($a,$K,$eg));if($H)$H=$m->commit();queries_redirect(remove_from_uri("page"),lang(array('%d row has been imported.','%d rows have been imported.'),$za),$H);$m->rollback();}}}$Ih=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header('Select'.": $Ih",$n);$O=null;if(isset($Mg["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if($dd[$X["col"]]&&count($dd[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$O);if(!$f&&support("table"))echo"<p class='error'>".'Unable to select the table'.($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$f);$b->selectSearchPrint($Z,$f,$w);$b->selectOrderPrint($uf,$f,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($Wh);$b->selectActionPrint($w);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$gd=$g->result(count_rows($a,$Z,$Vd,$md));$E=floor(max(0,$gd-1)/$z);}$Yg=$L;$nd=$md;if(!$Yg){$Yg[]="*";$Ab=convert_fields($f,$p,$L);if($Ab)$Yg[]=substr($Ab,2);}foreach($L
as$y=>$X){$o=$p[idf_unescape($X)];if($o&&($Ga=convert_field($o)))$Yg[$y]="$Ga AS $X";}if(!$Vd&&$Bi){foreach($Bi
as$y=>$X){$Yg[]=idf_escape($y);if($nd)$nd[]=idf_escape($y);}}$H=$m->select($a,$Yg,$Z,$nd,$uf,$z,$E,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$E)$H->seek($z*$E);$rc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($E&&$x=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$z!=""&&$md&&$Vd&&$x=="sql")$gd=$g->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".'No rows.'."\n";else{$Pa=$b->backwardKeys($a,$Ih);echo"<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$md&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Te=array();$jd=array();reset($L);$tg=1;foreach($K[0]as$y=>$X){if(!isset($Bi[$y])){$X=$_GET["columns"][key($L)];$o=$p[$L?($X?$X["col"]:current($L)):$y];$C=($o?$b->fieldName($o,$tg):($X["fun"]?"*":$y));if($C!=""){$tg++;$Te[$y]=$C;$e=idf_escape($y);$Ad=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Vb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Ad.($uf[0]==$e||$uf[0]==$y||(!$uf&&$Vd&&$md[0]==$e)?$Vb:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($Ad.$Vb)."' title='".'descending'."' class='text'> â†“</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Search'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$jd[$y]=$X["fun"];next($L);}}$re=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$y=>$X)$re[$y]=max($re[$y],min(40,strlen(utf8_decode($X))));}}echo($Pa?"<th>".'Relations':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$dd)as$Se=>$J){$zi=unique_array($K[$Se],$w);if(!$zi){$zi=array();foreach($K[$Se]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$zi[$y]=$X;}}$_i="";foreach($zi
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($g).")").")";$X=md5($X);}$_i.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$md&&$L?"":"<td>".checkbox("check[]",substr($_i,1),in_array(substr($_i,1),(array)$_POST["check"])).($Vd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$_i)."' class='edit'>".'edit'."</a>"));foreach($J
as$y=>$X){if(isset($Te[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($rc[$y])||$rc[$y]!=""))$rc[$y]=(is_mail($X)?$Te[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$_i;if(!$_&&$X!==null){foreach((array)$dd[$y]as$q){if(count($dd[$y])==1||end($q["source"])==$y){$_="";foreach($q["source"]as$s=>$ph)$_.=where_link($s,$q["target"][$s],$K[$Se][$ph]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if($q["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($q["ns"]),$_);if(count($q["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$zi))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($zi
as$ae=>$W)$_.=where_link($s++,$ae,$W);}$X=select_value($X,$_,$o,$Wh);$t=h("val[$_i][".bracket_escape($y)."]");$Y=$_POST["val"][$_i][bracket_escape($y)];$mc=!is_array($J[$y])&&is_utf8($X)&&$K[$Se][$y]==$J[$y]&&!$jd[$y];$Vh=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$mc)||$Y!==null){$rd=h($Y!==null?$Y:$J[$y]);echo"<td>".($Vh?"<textarea name='$t' cols='30' rows='".(substr_count($J[$y],"\n")+1)."'>$rd</textarea>":"<input name='$t' value='$rd' size='$re[$y]'>");}else{$ve=strpos($X,"<i>...</i>");echo"<td id='$t' data-text='".($ve?2:($Vh?1:0))."'".($mc?"":" data-warning='".h('Use edit link to modify this value.')."'").">$X</td>";}}}if($Pa)echo"<td>";$b->backwardKeysPrint($Pa,$K[$Se]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(!is_ajax()){if($K||$E){$Ac=true;if($_GET["page"]!="last"){if($z==""||(count($K)<$z&&($K||!$E)))$gd=($E?$E*$z:0)+count($K);elseif($x!="sql"||!$Vd){$gd=($Vd?false:found_rows($S,$Z));if($gd<max(1e4,2*($E+1)*$z))$gd=reset(slow_query(count_rows($a,$Z,$Vd,$md)));else$Ac=false;}}$Gf=($z!=""&&($gd===false||$gd>$z||$E));if($Gf){echo(($gd===false?count($K)+1:$gd-$E*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".'Loading'."...');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$E){if($Gf){$Ce=($gd===false?$E+(count($K)>=$z?2:1):floor(($gd-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Page'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Page'."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" ...":"");for($s=max(1,$E-4);$s<min($Ce,$E+5);$s++)echo
pagination($s,$E);if($Ce>0){echo($E+5<$Ce?" ...":""),($Ac&&$gd!==false?pagination($Ce,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Ce'>".'last'."</a>");}}else{echo"<legend>".'Page'."</legend>",pagination(0,$E).($E>1?" ...":""),($E?pagination($E,$E):""),($Ce>$E?pagination($E+1,$E).($Ce>$E+1?" ...":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Whole result'."</legend>";$ac=($Ac?"":"~ ").$gd;echo
checkbox("all",1,0,($gd!==false?($Ac?"":"~ ").lang(array('%d row','%d rows'),$gd):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$ac' : checked); selectCount('selected2', this.checked || !checked ? '$ac' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="Save"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edit">
<input type="submit" name="clone" value="Clone">
<input type="submit" name="delete" value="Delete">',confirm(),'</div></fieldset>
';}$ed=$b->dumpFormat();foreach((array)$_GET["columns"]as$e){if($e["fun"]){unset($ed['sql']);break;}}if($ed){print_fieldset("export",'Export'." <span id='selected2'></span>");$Ef=$b->dumpOutput();echo($Ef?html_select("output",$Ef,$ya["output"])." ":""),html_select("format",$ed,$ya["format"])," <input type='submit' name='export' value='".'Export'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($rc,'strlen'),$f);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ya["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$hi'>\n","</form>\n",(!$md&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$P=isset($_GET["status"]);page_header($P?'Status':'Variables');$Pi=($P?show_status():show_variables());if(!$Pi)echo"<p class='message'>".'No rows.'."\n";else{echo"<table cellspacing='0'>\n";foreach($Pi
as$y=>$X){echo"<tr>","<th><code class='jush-".$x.($P?"status":"set")."'>".h($y)."</code>","<td>".h($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Fh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$C=>$S){json_row("Comment-$C",h($S["Comment"]));if(!is_view($S)){foreach(array("Engine","Collation")as$y)json_row("$y-$C",h($S[$y]));foreach($Fh+array("Auto_increment"=>0,"Rows"=>0)as$y=>$X){if($S[$y]!=""){$X=format_number($S[$y]);json_row("$y-$C",($y=="Rows"&&$X&&$S["Engine"]==($sh=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Fh[$y]))$Fh[$y]+=($S["Engine"]!="InnoDB"||$y!="Data_free"?$S[$y]:0);}elseif(array_key_exists($y,$S))json_row("$y-$C");}}}foreach($Fh
as$y=>$X)json_row("sum-$y",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$g->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$l=>$X){json_row("tables-$l",$X);json_row("size-$l",db_size($l));}json_row("");}exit;}else{$Oh=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Oh&&!$n&&!$_POST["search"]){$H=true;$He="";if($x=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$H=truncate_tables($_POST["tables"]);$He='Tables have been truncated.';}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$He='Tables have been moved.';}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$He='Tables have been copied.';}elseif($_POST["drop"]){if($_POST["views"])$H=drop_views($_POST["views"]);if($H&&$_POST["tables"])$H=drop_tables($_POST["tables"]);$He='Tables have been dropped.';}elseif($x!="sql"){$H=($x=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$He='Tables have been optimized.';}elseif(!$_POST["tables"])$He='No tables.';elseif($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($J=$H->fetch_assoc())$He.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$He,$H);}page_header(($_GET["ns"]==""?'Database'.": ".h(DB):'Schema'.": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".'Tables and views'."</h3>\n";$Nh=tables_list();if(!$Nh)echo"<p class='message'>".'No tables.'."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".'Search data in tables'." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".'Search'."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE %%";search_tables();}}$bc=doc_link(array('sql'=>'show-table-status.html'));echo"<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.'Table','<td>'.'Engine'.doc_link(array('sql'=>'storage-engines.html')),'<td>'.'Collation'.doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.'Data Length'.$bc,'<td>'.'Index Length'.$bc,'<td>'.'Data Free'.$bc,'<td>'.'Auto Increment'.doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.'Rows'.$bc,(support("comment")?'<td>'.'Comment'.$bc:''),"</thead>\n";$T=0;foreach($Nh
as$C=>$U){$Si=($U!==null&&!preg_match('~table~i',$U));$t=h("Table-".$C);echo'<tr'.odd().'><td>'.checkbox(($Si?"views[]":"tables[]"),$C,in_array($C,$Oh,true),"","","",$t),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($C)."' title='".'Show structure'."' id='$t'>".h($C).'</a>':h($C));if($Si){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.'Alter view'.'">'.(preg_match('~materialized~i',$U)?'Materialized view':'View').'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.'Select data'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'Alter table'),"Index_length"=>array("indexes",'Alter indexes'),"Data_free"=>array("edit",'New item'),"Auto_increment"=>array("auto_increment=1&create",'Alter table'),"Rows"=>array("select",'Select data'),)as$y=>$_){$t=" id='$y-".h($C)."'";echo($_?"<td align='right'>".(support("table")||$y=="Rows"||(support("indexes")&&$y!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($C)."'$t title='$_[1]'>?</a>":"<span$t>?</span>"):"<td id='$y-".h($C)."'>");}$T++;}echo(support("comment")?"<td id='Comment-".h($C)."'>":"");}echo"<tr><td><th>".sprintf('%d in total',count($Nh)),"<td>".h($x=="sql"?$g->result("SELECT @@storage_engine"):""),"<td>".h(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$y)echo"<td align='right' id='sum-$y'>";echo"</table>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Mi="<input type='submit' value='".'Vacuum'."'> ".on_help("'VACUUM'");$qf="<input type='submit' name='optimize' value='".'Optimize'."'> ".on_help($x=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>".($x=="sqlite"?$Mi:($x=="pgsql"?$Mi.$qf:($x=="sql"?"<input type='submit' value='".'Analyze'."'> ".on_help("'ANALYZE TABLE'").$qf."<input type='submit' name='check' value='".'Check'."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".'Repair'."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".'Truncate'."'> ".on_help($x=="sqlite"?"'DELETE'":"'TRUNCATE".($x=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".'Drop'."'>".on_help("'DROP TABLE'").confirm()."\n";$k=(support("scheme")?$b->schemas():$b->databases());if(count($k)!=1&&$x!="sqlite"){$l=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'Move to other database'.": ",($k?html_select("target",$k,$l):'<input name="target" value="'.h($l).'" autocapitalize="off">')," <input type='submit' name='move' value='".'Move'."'>",(support("copy")?" <input type='submit' name='copy' value='".'Copy'."'>":""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $T);":"")." }"),"<input type='hidden' name='token' value='$hi'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.'Create table'."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.'Create view'."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".'Routines'."</h3>\n";$Qg=routines();if($Qg){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'Name'.'<td>'.'Type'.'<td>'.'Return type'."<td></thead>\n";odd('');foreach($Qg
as$J){$C=($J["SPECIFIC_NAME"]==$J["ROUTINE_NAME"]?"":"&name=".urlencode($J["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["SPECIFIC_NAME"]).$C).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["SPECIFIC_NAME"]).$C).'">'.'Alter'."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.'Create procedure'.'</a>':'').'<a href="'.h(ME).'function=">'.'Create function'."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".'Sequences'."</h3>\n";$eh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($eh){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($eh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".'Create sequence'."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".'User types'."</h3>\n";$Ki=types();if($Ki){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."</thead>\n";odd('');foreach($Ki
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".'Create type'."</a>\n";}if(support("event")){echo"<h3 id='events'>".'Events'."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".'Name'."<td>".'Schedule'."<td>".'Start'."<td>".'End'."<td></thead>\n";foreach($K
as$J){echo"<tr>","<th>".h($J["Name"]),"<td>".($J["Execute at"]?'At given time'."<td>".$J["Execute at"]:'Every'." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]",'<td><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.'Alter'.'</a>';}echo"</table>\n";$zc=$g->result("SELECT @@event_scheduler");if($zc&&$zc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($zc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.'Create event'."</a>\n";}if($Nh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();
