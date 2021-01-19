
	<!-- Footer -->
	
	<footer class="site-footer" id="site_footer">
			<div class="footer-top">
					 <div class="container">
							<div class="row">
									<div class="col-md-6 col-sm-6 col-lg-5 footer-col-5">
											<div class="widget widget_getintuch">
													<h4 class="footer-title"> بيانات الإتصال </h4>
													<ul class="info-contact">
															<li>
																<span>
																	<?php echo $fetch_contact['address']; ?> <i class="fa fa-map-marker"></i>
																</span>
															</li>

															<li>
																<span>
																<?php echo $fetch_contact['number']; ?>	<i class="fa fa-phone"></i>
																</span>
															</li>
															<li>
																<span>
																<?php echo $fetch_contact['email']; ?> <i class="fa fa-envelope-o"></i>
																</span>
															</li>
													</ul>
											</div>
									</div>
									<div class="col-md-6 col-sm-6 col-lg-7 footer-col-7">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3457.846672668321!2d30.904535085559807!3d29.92631603109971!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458560bf8f3dd17%3A0xb3a77089fd857b8!2z2YXYr9mK2YbYqSDYp9mE2KvZgtin2YHZhyDZiNin2YTYudmE2YjZhQ!5e0!3m2!1sar!2seg!4v1592772062768!5m2!1sar!2seg" 
                                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
									</div>
							</div>
							<div class="clearfix">
								<ul class="full-social-icon row">
									<li class="fb col-lg-3 col-md-6 col-sm-6 m-b30">
										<a href="<?php echo $fetch_social['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i> Facebook </a>
									</li>
									<li class="tw col-lg-3 col-md-6 col-sm-6 m-b30">
										<a href="<?php echo $fetch_social['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i> Tweet </a>
									</li>
									<li class="gplus col-lg-3 col-md-6 col-sm-6 m-b30">
										<a href="<?php echo $fetch_social['youtube']; ?>" target="_blank"><i class="fa fa-youtube-square"></i> Youtube </a>
									</li>
									<li class="linkd col-lg-3 col-md-6 col-sm-6 m-b30">
										<a href="<?php echo $fetch_social['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i> Instagram </a>
									</li>
								</ul>
							</div>
					</div>
			</div>
			<!-- footer bottom part -->
			<div class="footer-bottom">
					<div class="container">
							<div class="row">
									<div class="col-md-6 col-sm-6 text-right"> جميع الحقوق محفوظة <spam> © 2020 </spam> المعهد العالي للهندسة بمدينة الثقافة والعلوم </div>
									
									<div class="col-md-6 col-sm-6  text-left">
										<ul class="fb-list">
											<li><a href="<?php echo $index ?>">الصفحة الرئيسية</a></li>
											<li><a href="<?php echo $about_institues; ?>">عن المعهد</a></li>
											<li><a href="<?php echo $teach;?>">هيئة التدريس</a></li>
										</ul>
									</div>
									<div class="col-md-6 col-sm-6 text-right">Devoloped By <a href='https://www.facebook.com/profile.php?id=100011445331879'>
									Mahmoud Nasr</a></div>
							</div>
					</div>
			</div>
	</footer>
    <!-- Footer END-->
    <button class="scroltop fa fa-chevron-up" ></button>
    <script src='<?php echo $js; ?>jquery.min.js'></script>
	<script src='<?php echo $js; ?>bootstrap.min.js'></script>
    <script src='<?php echo $js; ?>lightgallery-all.min.js'></script>
    <script src='<?php echo $js; ?>owl.carousel.js'></script>
    <script src='<?php echo $js; ?>custom.js'></script>
    
</body>
