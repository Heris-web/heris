
				<div class="c12 cmain"> <!-- START PRODUK -->
					<div class="c12 ctitle">
						<div class="c6 tleft">
							<p class="">Semua Barang</p>
						</div>
						<div class="c6 tright">
							<span class=""><?= $jumlah ?> Barang ditemukan</span>
						</div>
					</div>

					<div class="c12 lp">

						<?php
						if($jumlah <= 0) echo "Barang Tidak Ditemukan!";
						foreach ($get as $g) {

						?>

						<div class="box"> <!-- START BOX -->
							<div class="c12">
								<img src="<?= SITE ?>/assets/<?= $g['image'] ?>" class="pimg">
								<a class="title" href="<?= SITE ?>/item/detail/<?= $g['iid'] ?>"><?= $g['name'] ?></a>
								<b class="price">Rp. <?= number_format(($g['price'] - ($g['price'] * $g['disc'] / 100)), 2) ?></b>
							</div>
							
							<div class="c12">
								<div class="c6">
									<p class="cm"><?= $g['cname'] ?></p>
									<p class="cm"><?= $g['merk'] ?></p>
								</div>
								<div class="c6 tright">
									<a href="<?= SITE ?>/item/detail/<?= $g['iid'] ?>"><button class="btn btn-blue">Detail</button></a>
								</div>
							</div>
						</div> <!-- END BOX -->

						<?php
						}
						?>

						<div class="c12 tright">
						<!-- FOR PAGINATION -->
							<?= $page ?>
						</div>

					</div>

				</div> <!-- END PRODUCT -->

			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
