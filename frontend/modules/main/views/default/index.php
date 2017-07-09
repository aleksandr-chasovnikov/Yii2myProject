<?php
use yii\helpers\Html;
use frontend\components\Common;
?>
<!--//-->	
<div class=" header-right">
	<div class=" banner">
		<div class="slider">

			<div class="callbacks_container">
				<ul class="rslides" id="slider">

					<?php foreach($result_general as $row): ?>

						<li>
							<div class="banner<?= $row['idadvert']?>" style="background-image: url('<?= Common::getImageAdvert($row)[0] ?>')">
								<img class="img-responsive zoom-img" src="<?= Common::getImageAdvert($row)[0] ?>" alt="" >
								<div class="caption">
									<h3><a href="<?= Common::getUrlAdvert($row) ?>"><?= Common::getTitleAdvert($row) ?></a></h3>
									<p><?= Common::substr($row['description']) ?></p>
								</div>
							</div>
						</li>

					<?php endforeach; ?>

				</ul>
			</div>
		</div>
	</div>
</div>
<!--header-bottom-->
<div class="banner-bottom-top">
	<div class="container">
		<div class="bottom-header">
			<div class="header-bottom">
				<div class=" bottom-head">
					<a href="buy.html">
						<div class="buy-media">
							<i class="buy"> </i>
							<h6>Buy</h6>
						</div>
					</a>
				</div>
				<div class=" bottom-head">
					<a href="buy.html">
						<div class="buy-media">
							<i class="rent"> </i>
							<h6>Rent</h6>
						</div>
					</a>
				</div>
				<div class=" bottom-head">
					<a href="buy.html">
						<div class="buy-media">
							<i class="pg"> </i>
							<h6>Hostels</h6>
						</div>
					</a>
				</div>
				<div class=" bottom-head">
					<a href="buy.html">
						<div class="buy-media">
							<i class="sell"> </i>
							<h6>Resale</h6>
						</div>
					</a>
				</div>
				<div class=" bottom-head">
					<a href="loan.html">
						<div class="buy-media">
							<i class="loan"> </i>
							<h6>Home Loans</h6>
						</div>
					</a>
				</div>
				<div class=" bottom-head">
					<a href="buy.html">
						<div class="buy-media">
							<i class="apart"> </i>
							<h6>Projects</h6>
						</div>
					</a>
				</div>
				<div class=" bottom-head">
					<a href="dealers.html">
						<div class="buy-media">
							<i class="deal"> </i>
							<h6>Dealers</h6>
						</div>
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--//-->


<!--//header-->
<!--content-->
<div class="content">
	<div class="content-grid">
		<div class="container">
			<h3>Самые популярные</h3>

			<?php foreach($result_general as $row): ?>

				<div class="col-md-4 box_2">
					<a href="<?= Common::getUrlAdvert($row) ?>"><?= Common::getTitleAdvert($row) ?>
						<img class="img-responsive zoom-img" src="<?= Common::getImageAdvert($row)[0] ?>" alt="" >
						<span class="four"><?= $row['price'] ?></span>
					</a>
					<div class="most-1">
						<h5><a href="single.html">Contrary to popular</a></h5>
						<p>Lorem ipsum</p>
					</div>					
				</div>
			<?php endforeach ?>

			<div class="clearfix"> </div>
		</div>
	</div>
	<!--service-->
	<div class="services">
		<div class="container">
			<div class="service-top">
				<h3>Сервисы</h3>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
			</div>
			<div class="services-grid">
				<div class="col-md-6 service-top1">
					<div class=" ser-grid">	
						<a href="#" class="hi-icon hi-icon-archive glyphicon glyphicon-user"> </a>
					</div>
					<div  class="ser-top">
						<h4>Ut wisi enim ad</h4>
						<p>Contrary to popular belief, Lorem Ipsum is not simply random text. 
							It has roots in a piece of classical.Contrary to popular belief, Lorem Ipsum </p>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-6 service-top1">
						<div class=" ser-grid">	
							<a href="#" class="hi-icon hi-icon-archive glyphicon glyphicon-leaf"> </a>
						</div>
						<div  class="ser-top">
							<h4>Ut wisi enim ad</h4>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. 
								It has roots in a piece of classical.Contrary to popular belief, Lorem Ipsum </p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="services-grid">
						<div class="col-md-6 service-top1">
							<div class=" ser-grid">	
								<a href="#" class="hi-icon hi-icon-archive glyphicon glyphicon-cog"> </a>
							</div>
							<div  class="ser-top">
								<h4>Ut wisi enim ad</h4>
								<p>Contrary to popular belief, Lorem Ipsum is not simply random text. 
									It has roots in a piece of classical.Contrary to popular belief, Lorem Ipsum </p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="col-md-6 service-top1">
								<div class=" ser-grid">	
									<a href="#" class="hi-icon hi-icon-archive glyphicon glyphicon-file"> </a>
								</div>
								<div  class="ser-top">
									<h4>Ut wisi enim ad</h4>
									<p>Contrary to popular belief, Lorem Ipsum is not simply random text. 
										It has roots in a piece of classical .Contrary to popular belief, Lorem Ipsum</p>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<!--//services-->
					<!--features-->
					<div class="content-middle">
						<div class="container">
							<div class="mid-content">
								<h3>Лучшие функции</h3>
								<p>Вопреки общему мнению
									, Lorem Ipsum - это не просто случайный текст. Он имеет корни в классической латинской литературе с 45 г. до н.э., что делает его более 2000 лет.</p>
									<a class="hvr-sweep-to-right more-in" href="single.html">Read More</a>
								</div>
							</div>
						</div>
						<!--//features-->
						<!--phone-->
						<div class="phone">
							<div class="container">
								<div class="col-md-6">
									<img src="images/ph1.png" class="img-responsive" alt=""/>
								</div>
								<div class="col-md-6 phone-text">
									<h4>Поиск домов по всему миру</h4>
									<div class="text-1">
										<h5>Custom Location Tracker</h5>
										<p>There are many variations of passages of Lorem Ipsum available, but the majorit</p>
									</div>
									<div class="text-1">
										<h5>Map Search</h5>
										<p>There are many variations of passages of Lorem Ipsum available, but the majorit</p>
									</div>
									<div class="text-1">
										<h5>Quick Details</h5>
										<p>There are many variations of passages of Lorem Ipsum available, but the majorit</p>
									</div>
									<a href="mobile_app.html" class="hvr-sweep-to-right more">Download the App</a>
								</div>
							</div>
						</div>
						<!--//phone-->
						<div class="project">
							<div class="container">
								<h3>Галерея объявлений</h3>
								<div class="project-top">

									<?php foreach($result_general as $row): ?>

										<div class="col-md-3 project-grid">
											<div class="project-grid-top">
												<a href="<?= Common::getUrlAdvert($row) ?>" class="mask"><img src="<?= Common::getImageAdvert($row)[0] ?>" class="img-responsive zoom-img" alt=""/></a>
												<div class="col-md1">
													<div class="col-md2">
														<div class="col-md3">
															<span class="star"> 4.5</span>
														</div>
														<div class="col-md4">
															<strong><?= Common::getTitleAdvert($row) ?></strong>
															<small>50 Reviews</small>
														</div>
														<div class="clearfix"> </div>
													</div>
													<p>2, 3, 4 BHK Flats</p>
													<p class="cost"><?= $row['price'] ?></p>
													<a href="<?= Common::getUrlAdvert($row) ?>" class="hvr-sweep-to-right more">Подробнее</a>
												</div>
											</div>
										</div>

									<?php endforeach ?>


									<div class="clearfix"> </div>
								</div>				
							</div>
						</div>