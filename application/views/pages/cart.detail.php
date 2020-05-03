


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

						<a href="?do=minus&i=<?= $get['iid'] ?>"><button class="btn">-</button></a>
						<input type="text" class="fqty" readonly value="<?= $get['qtys'] ?>">
						<a href="?do=plus&i=<?= $get['iid'] ?>"><button class="btn">+</button></a>
						<br>
						<form action="<?= SITE ?>/cart/checkout" style="font-size:13px;" method="POST">
							<p style="width:400px; margin-top:10px;">Silahkan pilih bank yang akan anda gunakan untuk melakukan pembayaran : </p>
							<input type="radio" name="bank" value="BRI" required> BRI <br>
							<input type="radio" name="bank" value="BNI" required> BNI <br>
							<input type="radio" name="bank" value="BCA" required> BCA <br>
							<input type="radio" name="bank" value="BJB" required> BJB <br>
							<br>
							<button class="btn btn-blue" type="submit">Checkout &raquo;</button>
						</form>
				</div>
			</div>
		</div>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
