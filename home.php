<? include ("top.php"); ?>
	<body id="main">
		<section id="container">
			<? include ("header.php"); ?>
			<? include ("nav.php"); ?>

			<section id="content">
				<aside id="localNav">
					<ul>
						<li>Test Text</li>
						<li>Test Text</li>
						<li>Test Text</li>
						<li>Test Text</li>
						<li>Test Text</li>
						<li>Test Text</li>
						<li>Test Text</li>
					</ul>
				</aside>

				<section class="carousel">
					<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
					<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
					<script type="text/javascript" src="slick/slick/slick.min.js"></script>

					<script type="text/javascript">$(document).ready(function(){
													$('.carousel').slick({
													  setting-name: setting-value
													});
												});
					</script>

					<img src="images/carousel/ElectronicArtsLogoCarousel.jpg" alt="Electronic Arts Carousel Logo">

					<section class="hotDeals">
						<table>
					        <thead>
					            <tr>
					                <th class="center" colspan="3">Hot Deals</th>
					                <th></th>
					                <th></th>
					            </tr>
					        </thead>

					        <tbody>
					            <tr>
					                <td><a href="">Agel, Nicholas S.</a></td>
					                <td>UG</td>
					                <td>ASCI</td>
					            </tr>
					        <tbody>
					    </table>
					</section>
				</section>
			</section>
			<? include ("footer.php"); ?>
		</section>
	</body>
</html>
