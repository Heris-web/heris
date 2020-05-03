


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Peta Halaman</p>
		</div>
		<div class="c6 tright">
			<span>Silahkan mengisi semua form!</span>
		</div>
	</div>
	<div class="mmain tleft descpage">
		<div class="c12" style="width:90%;">
			<b>Beranda : </b>
			<p style="padding-left:10px;"><a href="<?= SITE ?>">Beranda</a></p>
			<p style="padding-left:10px;"><a href="<?= SITE ?>/item">Daftar Barang</a></p>
			<p style="padding-left:10px;"><a href="<?= SITE ?>/about">Tentang Kami</a></p>
			<p style="padding-left:10px;"><a href="<?= SITE ?>/contact">Kontak Kami</a></p>
			<p style="padding-left:10px;"><a href="<?= SITE ?>/sitemap">Peta Halaman</a></p>
			<br>
			<b>Kategori Barang : </b>
			<?php
				foreach ($cat as $c) {
					echo "<p style='padding-left:10px;'><a href='".SITE."/item/search?k=&c={$c['cid']}&h=all'>{$c['cname']}</a></p>";
				}
			?>
			
		</div>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
