		<?php if(!is_front_page()){ ?>
			<div id="footer-content" class="container">
				<div id="footer">
					<div id="footer-links" class="row-fluid">
						<div class="span3">
							<a href="http://www.uniandes.edu.co">Universidad de los Andes</a>
						</div>
						<div class="span3">
							<a href="http://sistemas.uniandes.edu.co">Departamento ISIS</a>
						</div>
						<div class="span3">
							<a href="http://acm.uniandes.edu.co/foros">Foros</a>
						</div>
						<div class="span3">
							<a  href="http://www.acm.org">ACM</a>
						</div>
					</div>
					<div id="footer-icons" class="row-fluid">
						<div id="copyright" class="span4">
							<span>&copy; <?php bloginfo('name'); ?> </span>
						</div>
						<div id="footer-icons-inner" class="span2 offset5">
							<a href="https://facebook.com/ACMUniandes"><img src="<?php bloginfo('template_url')?>/images/facebook2.png"></a> &nbsp;&nbsp;&nbsp; <a href="https://twitter.com/ACMUniandes"><img src="<?php bloginfo('template_url')?>/images/twitter2.png"></a> &nbsp;&nbsp;&nbsp; <a href="https://plus.google.com/u/0/106882729180584555937/"><img src="<?php bloginfo('template_url')?>/images/google-plus.png"></a>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="http://code.jquery.com/jquery-1.8.1.js"></script>
		<script src="<?php bloginfo('template_url')?>/js/bootstrap.min.js"></script>

	</body>
</html>
