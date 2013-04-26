<?php

// put full path to Smarty.class.php
require('/usr/local/lib/php/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('./smarty/templates');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->error_reporting = E_ALL & ~E_NOTICE;

//parameters
if (isset($_GET['region'])) $region = $_GET['region'];
else $region = '';
if (isset($_GET['width'])) $width = $_GET['width'];
else $width = 900;
if (isset($_GET['size'])) $size = $_GET['size'];
else $size = 45;
if (isset($_GET['election'])) $election = $_GET['election'];
else $election = 'president_2013';
if (isset($_GET['data'])) $data = $_GET['data'];
else $data = $region.'_'.$election.'.json';
if (isset($_GET['legend'])) $legend = $_GET['legend'];
else $legend = false;
if (isset($_GET['tooltip'])) $tooltipp = $_GET['tooltip'];
else $tooltipp = false;
if (isset($_GET['template'])) $template = $_GET['template'];
else $template = false;


switch ($region) {
  case 'praha':
    $coords = array(
      'lngMin' => 14.29,
      'lngMax' => 14.68,
      'latMin' => 49.96,
      'latMax' => 50.17
    );
	$header = 'Praha';
	$title = 'Praha';
	$description = '';
	$chart_id = 'chart_praha';  
  
    break;
  case 'ostrava':
    $coords = array(
      'lngMin' => 18.11,
      'lngMax' => 18.37,
      'latMin' => 49.75,
      'latMax' => 49.88
    );
	$header = 'Ostrava';
	$title = 'Ostrava';
	$description = '';
	$chart_id = 'chart_ostrava'; 
  
    break;
  case 'brno':
    $coords = array(
      'lngMin' => 16.48,
      'lngMax' => 16.70,
      'latMin' => 49.13,
      'latMax' => 49.29
    );
	$header = 'Brno';
	$title = 'Brno';
	$description = '';
	$chart_id = 'chart_brno'; 
  
    break;
  case 'plzen':
    $coords = array(
      'lngMin' => 13.3,
      'lngMax' => 13.435,
      'latMin' => 49.69,
      'latMax' => 49.78
    );
	$header = 'Plzeň';
	$title = 'Plzeň';
	$description = '';
	$chart_id = 'chart_plzen';
	
    break;
  case 'cz':
  default:
    $coords = array(
      'lngMin' => 12.156,
      'lngMax' => 18.84,
      'latMin' => 48.6,
      'latMax' => 51.023
    );
	$tooltip = "d.name + ': ' + d.winner";
	$header = 'ČR';
	$title = 'ČR';
	$description = '';
	$chart_id = 'chart_cz';
	
    break;
}

switch ($tooltipp) {
  case 'diff':
    $tooltip = "d.name + ': ' + d.winner + ' vyhrál o ' + d.population + ' hlasů'";
    break;
  case 'ring';
    $tooltip = "d.name + ': ' + d.winner + ' vyhrál ' + Math.max(d.population.p6,d.population.p9) + ':' + Math.min(d.population.p6,d.population.p9)";
    break;
  default:
    $tooltip = "d.name + ': ' + d.winner + ' (' + d.population + ')'";
}

if ($template) $tpl = 'map_' . $template . '.tpl';
else $tpl='map.tpl';


$rate = ($coords['lngMax']-$coords['lngMin'])/($coords['latMax']-$coords['latMin'])*0.65; //50.rovnobezka -> 0.65
$height = round($width/$rate);
$specs = "{i: 0, name: 'chart_{$region}', width: {$width}, height: {$height}, lngMin: {$coords['lngMin']}, lngMax: {$coords['lngMax']}, latMin: {$coords['latMin']}, latMax: {$coords['latMax']}, file: '{$data}', max_population: 1120000, max_size: {$size}}";
$css = "css/{$election}.css";  

if ($legend != 'off') {
  $description = $legend;
}
if (($election == 'president_2013') and ($legend == 'diff')) {
  $description = 'Rozdíly mezi počty hlasů pro <span class="zeman">M. Zemana</span> a <span class="schwarzenberg">K. Schwarzenberga</span>';
}
if (($election == 'president_2013') and ($legend == 'diff12')) {
  $description = 'Rozdíly mezi počty hlasů pro <span class="zeman">M. Zemana</span> a <span class="schwarzenberg">K. Schwarzenberga</span> mezi lidmi, kteří <b>v 1. kole hlasovali pro někoho jiného</b>.';
}
if (($election == 'president_2013') and ($legend == 'ring')) {
  $description = 'Hlasy <span class="zeman">M. Zemana</span> a <span class="schwarzenberg">K. Schwarzenberga</span>. Plocha barevného kruhu odpovídá rozdílu počtu hlasů. (Velikost vnitřního (prázdného) kruhu je dle počtu hlasů kandidáta na 2. místě, celý kruh je dle počtu hlasů kandidáta na 1. místě)';
}


if (($election == 'president_2013') and (!$legend)) {
  $description = '
  Legenda:<br/>
  <span class="zeman">Miloš Zeman</span><br/>
  <span class="schwarzenberg">Karel Schwarzenberg</span><br/>
  <span class="fischer">Jan Fischer</span><br/>
  <span class="dienstbier">Jiří Dienstbier</span><br/>
  <span class="roithova">Zuzana Roithová</span><br/>
  <span class="franz">Vladimír Franz</span><br/>
  <span class="bobosikova">Jana Bobošíková</span><br/>
  <span class="sobotka">Přemysl Sobotka</span><br/>
  <span class="fischerova">Taťána Fischerová</span>';
}



$smarty->assign('region',$region);
$smarty->assign('header',$header);
$smarty->assign('title',$title);
$smarty->assign('description',$description);
$smarty->assign('specs',$specs);
$smarty->assign('tooltip',$tooltip);
$smarty->assign('chart_id',$chart_id);
$smarty->assign('css',$css);
$html = $smarty->fetch($tpl);
echo $html;

?>
