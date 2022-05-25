<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package enterprise-insight
 */

?>

	<footer>
		<div class="container">
			<div class="footer">
				<?php 
				$footer_logo = get_field('footer_logo', 'option');
				if(!empty('$footer_logo')) : ?>
					<div>
						<a href="#">
							<img width="130" class="logo" src="<?php echo esc_url($footer_logo['url']); ?>" alt="<?php echo esc_attr($footer_logo['alt']); ?>" />
						</a>
					</div>
				<?php endif; ?>
					<?php
					// Check rows exists.
					if( have_rows('footer_widgets', 'option') ):

						// Loop through rows.
						while( have_rows('footer_widgets', 'option') ) : the_row();

							// Load sub field value.
							$title = get_sub_field('widget_title', 'option');
							// Do something...
							?>
							<div>
								<h3 class="title"><?php echo $title; ?></h3>
								<ul>
									<?php 
									 if( have_rows('widget_links', 'option') ):
										while( have_rows('widget_links', 'option') ) : the_row();

											// Get sub value.
											$widget_link =  get_sub_field('link_item', 'option');
											if( $widget_link ): 
											$widget_link_url = $widget_link['url'];
											$widget_link_title = $widget_link['title'];
											$widget_link_target = $widget_link['target'] ? $widget_link['target'] : '_self';
											?>
												<li class="item">
													<a href="<?php echo esc_url( $widget_link_url ); ?>" target="<?php echo esc_attr( $widget_link_target ); ?>"><?php echo esc_html( $widget_link_title ); ?></a>
												</li>
											<?php endif; ?>
									<?php endwhile; endif;?>
								</ul>
							</div>
					<?php
						// End loop.
						endwhile;
						endif; 
					?>
<!-- 			
					<div>
						<h3 class="title">Solutions</h3>
						<ul>
							<li class="item">
									<a href="#">
										Enterprise Architecture
									</a>
							</li>
							<li class="item">
									<a href="#">
										Application portfolio Management
									</a>
							</li>
							<li class="item">
									<a href="#">
										Technology Portfolio Management
									</a>
							</li>
							<li class="item">
									<a href="#">
										Business Process Management
									</a>
							</li>
						</ul>
					</div>
			
					<div>
						<h3 class="title">Resources</h3>
						<ul>
							<li class="item">
									<a href="#">
										Blog
									</a>
							</li>
							<li class="item">
									<a href="#">
										White Papers
									</a>
							</li>
							<li class="item">
									<a href="#">
										Resources
									</a>
							</li>
						</ul>
					</div>

					<div>
						<h3 class="title">Company</h3>
						<ul>
							<li class="item">
									<a href="#">
										About us
									</a>
							</li>
							<li class="item">
									<a href="#">
										Contact
									</a>
							</li>
						</ul>
					</div> -->
			</div>
		</div>
	</footer>

	<div id="free-demo-dialog">
		<div class="dialog ">
			<h1>Free Demo</h1>
			<a href="javascript:void(0)" class="close" id="free-demo-cancel">
					<img width="20" height="20" src="<?php echo get_template_directory_uri().'/assets/images/times.png' ?>" alt="times" />
			</a>
			<form action="" id="free-demo-form">
					<div class="required">
						<input type="text" class="input" name="name" placeholder="Name"  required />
					</div>
					<div  class="required">
						<input type="email" class="input" name="email" placeholder="Email" required />
					</div>
					<div  class="required">
						<input type="text" class="input" name="organization" placeholder="Organization" required />
					</div>
					<div  class="required">
						<input type="text" class="input" name="job_title" placeholder="Job Title" required />
					</div>
					<div>
						<input type="text" class="input" name="phone" placeholder="Phone" />
					</div>
					<label>
						<label class="wrap-checkbox">
							<input type="checkbox" name="agree" />
							<span class="checkmark"></span>
						</label>
						I agree to recieve communications from Enterprise Insight
					</label>
					<button class="btn btn-red">Submit</button>
			</form>
		</div>
	</div>

<?php wp_footer(); ?>

</body>
</html>
