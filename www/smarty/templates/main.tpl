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
		  {block name=contentprimary}{/block}
		</div>
	<div data-role="footer" class="footer-docs" data-theme="c">
			<p>Michal Škop: Czech presidential elections 2013 in cartograms on municipality level. 2013. <a href="http://skop.eu/president-2013">http://skop.eu/president-2013</a></p>
	</div>

</div>
</body>
</html>
