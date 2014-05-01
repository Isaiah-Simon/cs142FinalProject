<? include ("top.php"); ?>
	<body id="main">
		<section id="container">
			<? include ("header.php"); ?>
			<? include ("nav.php"); ?>

			<section id="content">
				<aside id="localNav">
					<ul>
						<li><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/motherboards.php">Motherboards</a></li>
						<li><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/graphicsCards.php">Graphics Cards</a></li>
						<li><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/hardDrives.php">Hard Drives</a></li>
						<li><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/gamingKeyboards.php">Gaming Keyboards</a></li>
						<li><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/gamingMice.php">Gaming Mice</a></li>
						<li><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/monitors.php">Monitors</a></li>
						<li><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/memory.php">Memory</a></li>
					</ul>
				</aside>

				<section class="mainContent">
					<!--
					<script type="text/javascript" src="jquery.js"></script>
					<script type="text/javascript" src="jquery.bxslider/jquery.bxslider.js"></script>
					<script>
						$(document).ready(function(){
						  $('.slider1').bxSlider({
						    slideWidth: 600,
						    minSlides: 1,
						    maxSlides: 1,
						    slideMargin: 10
						  });
						});
					</script>

					<div class="slider1">
					  <div class="slide"<a href="electronicarts.com"><img src="images/carousel/ElectronicArtsLogoCarousel.jpg" alt="Electronic Arts Carousel Logo"></a></div>
					  <div class="slide"><img src="images/carousel/gamingComputerCarousel.jpg" alt="Gaming Computer Carousel Logo"></div>
					</div>
				-->
					<section class="featuredItem">
						<h1>Weekly Featured Item:</h1>
						<h3>Logitech G600 Gaming Mouse 
							<span class="newPrice">
								<a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/LogitechG600Mouse.php">$14.99</a>
							</span>

							<span class="oldPrice">$69.99</span>

							<span class="savedPercent">Saved 79%</span>
						</h3>
						
						<a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/LogitechG600Mouse.php">
							<img src="images/carousel/gamingMouseCarousel.jpg" alt="G600 Gaming Mouse">
						</a>
					</section>

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
					                	<a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/SAMSUNG840ProSeries256GBSSD.php">
					                		<img src="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/images/hotDeals/hardDriveDeal.jpg" alt="Hard drive deal">
					                	</a>
					                	<p class="description">SAMSUNG 840 Pro Series MZ-7PD256BW 2.5" 256GB SATA III MLC Internal Solid State Drive (SSD)</p>
					                </td>
					                <td>
					                	<p class="oldPrice">$164.99</p>
					                	<p class="newPrice"><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/GIGABYTEGA-Z87X-UD3H.php">$139.99</p></a>
					                	<p class="savedPercent">Saved 15%</p>
					                	<a  href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/GIGABYTEGA-Z87X-UD3H.php">
					                		<img src="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/images/hotDeals/motherboardDeal.jpg" alt="Motherboard deal">
					                	</a>
					                	<p class="description">GIGABYTE GA-Z87X-UD3H LGA 1150 Intel Z87 HDMI SATA 6Gb/s USB 3.0 ATX Intel Motherboard with UEFI BIOS</p>
					                <td>
					                	<p class="oldPrice">$219.99</p>
					                	<p class="newPrice"><a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/HP24WDBlack.php">$149.99</p></a>
					                	<p class="savedPercent">Saved 32%</p>
					                	<a href="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/HP24WDBlack.php">
					                		<img src="http://www.uvm.edu/~isimon/cs142/cs142FinalProject/images/hotDeals/monitorDeal.jpg" alt="Monitor deal">
					                	</a>
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
