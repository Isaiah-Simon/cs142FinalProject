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
					                <th class="center" colspan="3"><img src="images/hotDeals/flameIcon.png">Hot Deals<img src="images/hotDeals/flameIcon.png"></th>
					                <th></th>
					                <th></th>
					            </tr>
					        </thead>

					        <tbody>
					            <tr>
					                <td>
					                	<p class="oldPrice">$249.99</p>
					                	<p class="newPrice"><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/SAMSUNG840ProSeries256GBSSD.php">$189.99</p></a>
					                	<p class="savedPercent">Saved 24%</p>
					                	<img src="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/images/hotDeals/hardDriveDeal.jpg" alt="Hard drive deal">
					                	<p class="description">SAMSUNG 840 Pro Series MZ-7PD256BW 2.5" 256GB SATA III MLC Internal Solid State Drive (SSD)</p>
					                </td>
					                <td>
					                	<p class="oldPrice">$164.99</p>
					                	<p class="newPrice"><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/GIGABYTEGA-Z87X-UD3H.php">$139.99</p></a>
					                	<p class="savedPercent">Saved 15%</p>
					                	<img src="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/images/hotDeals/motherboardDeal.jpg" alt="Motherboard deal">
					                	<p class="description">GIGABYTE GA-Z87X-UD3H LGA 1150 Intel Z87 HDMI SATA 6Gb/s USB 3.0 ATX Intel Motherboard with UEFI BIOS</p>
					                <td>
					                	<p class="oldPrice">$219.99</p>
					                	<p class="newPrice"><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/HP24WDBlack.php">$149.99</p></a>
					                	<p class="savedPercent">Saved 32%</p>
					                	<img src="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/images/hotDeals/monitorDeal.jpg" alt="Monitor deal">
					                	<p class="description">GHP 24WD Black 23.6" 5ms Widescreen LED Backlight LCD Monitor 250 cd/m2 3,000,000:1</p>
					                </td>
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
