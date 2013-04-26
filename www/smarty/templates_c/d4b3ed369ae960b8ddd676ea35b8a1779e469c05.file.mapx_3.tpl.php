<?php /* Smarty version Smarty-3.0.7, created on 2013-04-26 18:37:37
         compiled from "./smarty/templates/mapx_3.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1881235323517aad51056f56-04586241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4b3ed369ae960b8ddd676ea35b8a1779e469c05' => 
    array (
      0 => './smarty/templates/mapx_3.tpl',
      1 => 1366994252,
      2 => 'file',
    ),
    'db18a95fe819067575b820f008937ba610b5a860' => 
    array (
      0 => './smarty/templates/main.tpl',
      1 => 1366991920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1881235323517aad51056f56-04586241',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Czech presidential elections 2013 in cartograms on municipality level</title>
	<!--<link rel="stylesheet"  href="css/jquery.mobile-1.2.0.css" />-->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<link rel="stylesheet" href="css/jqm-docs.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<!-- <script src="docs/_assets/js/jqm-docs.js"></script> -->
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	
</head>
<body>
<div data-role="page" class="type-home">
	<div data-role="content">

		<div class="content-secondary">

			<div id="jqm-homeheader">
				<h1 id="jqm-logo"><img src="image/logo.png" alt="Czech presidential elections 2013 in maps on municipality level" /></h1>
				<p>Czech presidential elections 2013 in cartograms on municipality level</p>
			</div>


			<p class="intro"><strong> The presidential elections 2013</strong> were the first direct presidential elections in the Czech Republic. <strong>Miloš Zeman</strong> won with 54.8% support in the second round over <strong>Karel Schwarzenberg</strong>. The results show interesting geographical differences on municipality level.</p>

			<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="f">
				<li data-role="list-divider">1st round</li>
				<li><a href="?map=map1:1" data-ajax="false">Winner - population</a></li>
				<li><a href="?map=map1:2" data-ajax="false">Zeman vs. Schwarzenberg - differences</a></li>
				<li data-role="list-divider">2nd round, Zeman vs. Schwarzenberg</li>
				<li><a href="?map=map2:1" data-ajax="false">Differences</a></li>
				<li><a href="?map=map2:2" data-ajax="false">Gain of unsuccessful candidates' voters</a></li>
				<li><a href="?map=map2:3" data-ajax="false">Differences and numbers of voters (CR)</a></li>
				<li><a href="?map=map2:4" data-ajax="false">Differences and numbers of voters (Praha)</a></li>
				<li><a href="?map=map2:5" data-ajax="false">Differences and numbers of voters (Brno)</a></li>
				<li><a href="?map=map2:6" data-ajax="false">Differences and numbers of voters (Ostrava)</a></li>
				<li><a href="?map=map2:7" data-ajax="false">Differences and numbers of voters (Plzeň)</a></li>
				<li data-role="list-divider">Data</li>
				<li><a href="http://www.volby.cz/pls/prez2013/pe">Official results (html)</a></li>
				<li><a href="cz_volby_cz_president_2013_1st_round.csv">1st round (csv)</a></li>
				<li><a href="cz_volby_cz_president_2013_2nd_round.csv">2nd round (csv)</a></li>
				<li><a href="https://scraperwiki.com/tags/Czech%20presidential%20elections%202013">ScraperWiki.com (SQLite, csv)</a></li>
				
				
			</ul>

		</div><!--/content-secondary-->

		<div class="content-primary">
		  
  <link rel="stylesheet" type="text/css" href="css/president_2013_ring.css" />
  <h2><?php echo $_smarty_tpl->getVariable('header')->value;?>
</h2>
  <!-- chart -->
  <p id="<?php echo $_smarty_tpl->getVariable('chart_id')->value;?>
"></p>
  <?php $_template = new Smarty_Internal_Template("description_".($_smarty_tpl->getVariable('map_id')->value).".tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
  <p><em><a href="image/<?php echo $_smarty_tpl->getVariable('map_id')->value;?>
.png" data-ajax="false">This cartogram in png</a></em></p>
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
	
	// Add tooltip div
    var div = d3.select("body").append("div")
    .attr("class", "tooltip")
    .style("opacity", 1e-6);
		
	// Load the data.
	d3.json(specs.file, function(data) {
	  nodes = data.features
		.map(function(d) {
		  return {
			x: xScale(d.coordinates[0]),
			y: yScale(d.coordinates[1]),
			r: (radiusScale(d.population.p6)+radiusScale(d.population.p9))/2,
			r2: Math.abs(radiusScale(d.population.p9)-radiusScale(d.population.p6)),
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
			.attr("stroke-width", function(d) {return d.r2;})
			.attr("cx", function(d) {return d.x;})
			.attr("cy", function(d) {return d.y;})
			//.attr("title", function(d) {return d.title;}) 
			.attr("class", function(d) {return d.classname})
			.on("mouseover", mouseover)
            .on("mousemove", function(d){mousemove(d);})
            .on("mouseout", mouseout)	  
	});	
	
    function mouseover() {
                div.transition()
                .duration(300)
                .style("opacity", 1);
            }

            function mousemove(d) {
                div
                .text(d.title)
                .style("left", (d3.event.pageX ) + "px")
                .style("top", (d3.event.pageY) + "px");
            }

            function mouseout() {
                div.transition()
                .duration(300)
                .style("opacity", 1e-6);
            }
	
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

		</div>
	<div data-role="footer" class="footer-docs" data-theme="c">
			<p>Michal Škop: Czech presidential elections 2013 in cartograms on municipality level. 2013. <a href="http://skop.eu/president-2013">http://skop.eu/president-2013</a></p>
	</div>

</div>
</body>
</html>
