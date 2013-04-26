<?php /* Smarty version Smarty-3.0.7, created on 2013-01-13 04:09:07
         compiled from "./smarty/templates/map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:49194171250f0c93cbe20d6-12267229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2faed2587ea7d759b3bfafb4d16dc55b573d8cf' => 
    array (
      0 => './smarty/templates/map.tpl',
      1 => 1358046446,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49194171250f0c93cbe20d6-12267229',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $_smarty_tpl->getVariable('title')->value;?>
</title>
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('css')->value;?>
" />
</head>
<body>
  <h1><?php echo $_smarty_tpl->getVariable('header')->value;?>
</h1>
  <!-- chart -->
  <p id="<?php echo $_smarty_tpl->getVariable('chart_id')->value;?>
"></p>
  <p><?php echo $_smarty_tpl->getVariable('description')->value;?>
</p>
  <script src="http://d3js.org/d3.v3.min.js"></script>
  <script type="text/javascript">
  
  //subcharts' specifications
	//load specs from 
	var specs = <?php echo $_smarty_tpl->getVariable('specs')->value;?>
; 
	//var shorts = {$shorts};
	
	// Chart dimensions.
	var margin = {top: 0, right: 0, bottom: 0, left: 0},
		width = specs.width - margin.right,
		height = specs.height - margin.top - margin.bottom;
	
	//Various scales. These domains make assumptions of data, naturally.
	var   xScale = d3.scale.linear().domain([specs.lngMin, specs.lngMax]).range([0, width]),
		yScale = d3.scale.linear().domain([specs.latMin, specs.latMax]).range([height, 0]),
		radiusScale = d3.scale.sqrt().domain([0, specs.max_population]).range([0, specs.max_size]);
	
a=1;
	// Create the SVG container and set the origin.
a=1;
// Create the SVG container and set the origin.
var svg = d3.select("#"+specs.name).append("svg")
	.attr("width", width + margin.left + margin.right)
	.attr("height", height + margin.top + margin.bottom)
  .append("g")
	.attr("transform", "translate(" + margin.left + "," + margin.top + ")");
		
	// Load the data.
	d3.json(specs.file, function(data) {
	  nodes = data.features
		.map(function(d) {
		  return {
			x: xScale(d.coordinates[0]),
			y: yScale(d.coordinates[1]),
			r: radiusScale(d.population),
			title: <?php echo $_smarty_tpl->getVariable('tooltip')->value;?>
,
			name: d.name,
			id: d.id,
			/*winner: d.properties.winner,*/
			population: d.population,
			classname: d.classname
		  };
		});

	  var circle = svg.selectAll("circle")
		.data(data);
	
	  var node = svg.selectAll("circle")
	  		.data(nodes)
		.enter().append("circle")
			.attr("r",function(d) {
			  return d.r;
			})
			.attr("cx", function(d) {return d.x;})
			.attr("cy", function(d) {return d.y;})
			.attr("title", function(d) {return d.title;}) 
			.attr("class", function(d) {return d.classname});	  
	});	
	
	function in_array (needle, haystack, argStrict) {
	  // http://kevin.vanzonneveld.net
	  // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	  // +   improved by: vlado houba
	  // +   input by: Billy
	  // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
	  // *     example 1: in_array('van', ['Kevin', 'van', 'Zonneveld']);
	  // *     returns 1: true
	  // *     example 2: in_array('vlado', {0: 'Kevin', vlado: 'van', 1: 'Zonneveld'});
	  // *     returns 2: false
	  // *     example 3: in_array(1, ['1', '2', '3']);
	  // *     returns 3: true
	  // *     example 3: in_array(1, ['1', '2', '3'], false);
	  // *     returns 3: true
	  // *     example 4: in_array(1, ['1', '2', '3'], true);
	  // *     returns 4: false
	  var key = '',
		strict = !! argStrict;

	  if (strict) {
		for (key in haystack) {
		  if (haystack[key] === needle) {
		    return true;
		  }
		}
	  } else {
		for (key in haystack) {
		  if (haystack[key] == needle) {
		    return true;
		  }
		}
	  }

	  return false;
	}	
  	
  </script>
</body>
</html>


