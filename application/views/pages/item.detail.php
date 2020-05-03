


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Detail Barang</p>
		</div>
		<div class="c6 tright">
			<span><?= $get["name"] ?></span>
		</div>
	</div>
	<div class="mmain tleft">
		<div class="c12" style="padding:10px 0px;">
			<div class="c4">
				<img src="<?= SITE ?>/assets/<?= $get['image'] ?>" class="dimg">
			</div>
			<div class="c8">
				<div class="c12 top">
					<h4><?= $get['name'] ?></h4>
					<i><?= $get['cname'] ?> - <?= $get['merk'] ?> - <?= $get['color'] ?></i>
				</div>
				<div class="c12 mdl">
					<p><?= $get['detail'] ?></p>
				</div>
				<div class="c12 bt">
					<h4>Rp. <?= number_format($get['price'] - ($get['price'] * $get['disc'] / 100)) ?></h4>
					<i>Was Rp. <?= number_format($get['price']); ?> - Save <?= $get['disc'] ?>%</i>
				</div>
				<div class="c12 lk">
				<?php
					if($sess->get("type") == "1"){
				?>
					<form action="<?= SITE ?>/item/add_to_cart" method="POST">
						<input type="hidden" name="iid" value="<?= $get['iid'] ?>">
						<input type="number" class="fqty" name="qty" placeholder="<?= $get['stock'] ?>">
						<button type="submit" class="btn btn-blue">Add to cart</button>
					</form>

				<?php
				}else{
				?>
					<p>Silahakan masuk sebagai member terlebih dahulu!</p>
					<a href="<?= SITE ?>/login"><button class="btn btn-blue">login</button></a>

				<?php
				}
				?>
				</div>
			</div>
		</div>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
