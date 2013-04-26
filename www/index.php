<?php

include "settings.php";

// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('./smarty/templates');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->error_reporting = E_ALL & ~E_NOTICE;

$allowed_maps = array(
	'map1:1' => 'region=cz&election=president_2013&width=650&size=35',
	'map1:2' => 'region=cz&election=president_2013&width=650&data=cz_president_2013diff.json&size=180&legend=diff&size=120',
	'map2:1' => 'region=cz&election=president_2013&width=650&data=cz_president_2013diff_2.json&size=180&tooltip=diff&size=120',
	'map2:2' => 'region=cz&election=president_2013&width=650&data=cz_president_2013diff_1_2.json&size=180&tooltip=diff&legend=diff12',
	'map2:3' => 'region=cz&election=president_2013&width=650&data=cz_president_2013_both_2_ring.json&size=75&legend=ring&tooltip=ring&template=3',
	'map2:4' => 'region=praha&election=president_2013&width=450&data=cz_president_2013_both_2_ring_praha.json&size=100&legend=ring&tooltip=ring&template=3',
	'map2:5' => 'region=brno&election=president_2013&width=180&data=cz_president_2013_both_2_ring_brno.json&size=100&legend=ring&tooltip=ring&template=3',
	'map2:6' => 'region=ostrava&election=president_2013&width=150&data=cz_president_2013_both_2_ring_ostrava.json&size=100&legend=ring&tooltip=ring&template=3',
	'map2:7' => 'region=plzen&election=president_2013&width=100&data=cz_president_2013_both_2_ring_plzen.json&size=100&legend=ring&tooltip=ring&template=3',
);

//get map_id
if (isset($_REQUEST['map']) and array_key_exists($_REQUEST['map'],$allowed_maps)) {
  $map_id = $_REQUEST['map'];
} else {
  $map_id = 'map2:3';
}
$html = file_get_contents($www_path . 'map.php?'.$allowed_maps[$map_id] . '&map_id=' . str_replace(':','_',$map_id));

/*$smarty->assign('region',$region);

$html = $smarty->fetch($tpl);*/
echo $html;

?>
