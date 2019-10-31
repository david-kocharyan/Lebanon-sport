<?php $lang = $this->session->userdata("lang"); ?>

<br>
<br>
<br>
<footer>
	<div class="container">
		<div class="row">
			<div class="text-center  col-lg-4">
				<img src="<?= base_url('public/site/')?>images/footer-logo.png" alt="footer-logo">
				<div class="copyright">© 2019 <?= lang('copyright'); ?></div>
				<ul class="social">
					<li><?= lang('follow'); ?></li>
					<li class="social-icon ml40"><i class="fa fa-facebook"></i></li>
					<li class="social-icon"><i class="fa fa-instagram"></i></li>
				</ul>
			</div>
			<div class="col-lg-4">
				<ul>
					<li>
						<a href="<?= base_url("$lang/") ?>"><?= lang('home'); ?></a>
					</li>
					<li>
						<a href="<?= base_url("$lang/contact-us") ?>"><?= lang('contact'); ?></a>
					</li>

				</ul>
			</div>
			<div class="col-lg-4">
				<ul>
					<li>
						<a href="<?= base_url("$lang/news") ?>"><?= lang('news'); ?></a>
					</li>
					<li>
						<a href="<?= base_url("$lang/upcoming") ?>"><?= lang('upcoming'); ?></a>
					</li>
					<li>
						<a href="<?= base_url("$lang/referee") ?>"><?= lang('referee'); ?></a>
					</li>
					<li>
						<a href="<?= base_url("$lang/observers") ?>"><?= lang('observers'); ?></a>
					</li>

				</ul>
			</div>
		</div>
	</div>
</footer>
</div>
</body>
</html>
