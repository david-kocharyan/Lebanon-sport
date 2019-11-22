<?php $lang = $this->session->userdata("lang"); ?>

<br>
<br>
<br>
<footer>
	<div class="container">
		<div class="row">
			<div class="text-center  col-lg-4">
				<img src="<?= base_url('public/site/') ?>images/footer-logo.png" alt="footer-logo">
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
						<a href="<?= base_url("$lang/") ?>#contact"><?= lang('contact'); ?></a>
					</li>

				</ul>
			</div>
			<div class="col-lg-4">
				<ul>
					<li>
						<a href="<?= base_url("$lang/") ?>#news"><?= lang('news'); ?></a>
					</li>
					<li>
						<a href="<?= base_url("$lang/") ?>#games"><?= lang('upcoming'); ?></a>
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

<script>
    $(document).ready(function () {
        if (window.location.hash) {
            var target = window.location.hash;
            target = target.length ? target : $('[name=' + window.location.hash.slice(1) + ']');
            $('html, body').animate({
                scrollTop: $(target).offset().top + 'px'
            }, 1500);
        }

        $('.scroll')
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function (event) {
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                    &&
                    location.hostname == this.hostname
                ) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        // event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1500, function () {
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) {
                                return false;
                            } else {
                                $target.attr('tabindex', '-1');
                                $target.focus();
                            }
                            ;
                        });
                    }
                }
            });
    });
</script>
<?= $this->session->userdata("lang"); ?>
<script>
    $(document).ready(function () {
        $("#lang").change(function () {
            var lang = $("#lang :selected").val();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url("change"); ?>',
                dataType: "JSON",
                data: {lang},
                success: function (res) {
                    var url = window.location.href;
                    url = url.split("/");
                    url.forEach((name, index) => {
                        if (name == "en") {
                            url[index] = "ar";
                        } else if (name == "ar") {
                            url[index] = "en";
                        }
                    });
                    if (url[url.length-1] === ""){
                        url[url.length-1] = lang;
					}
                    url = url.join("/").split("#");
                    window.location.replace(url[0])
                }
            })
        })

        $('ul.nav li.dropdown').hover(function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
        }, function () {
            $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
        });

    })
</script>


</html>
