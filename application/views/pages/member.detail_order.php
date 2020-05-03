


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Detail Order</p>
		</div>
		<div class="c6 tright">
			<span>No Invoice : <?= URI3 ?></span>
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
					<h4>Rp. <?= number_format($get['price'] - ($get['price'] * $get['disc'] / 100), 2) ?> / Item</h4>
					<i>Was Rp. <?= number_format($get['price']); ?> - Save <?= $get['disc'] ?>%</i>
				</div>
				<div class="c12 bt">
					<p>Nama Penjual : <?= $get['user'] ?></p>
					<p>No Rekening : <?= $get['norek'] ?></p>
					<p style="width:400px; margin-top:5px; font-size:12px;">Silahkan Melakukan Pembayaran Kepada Nomor Rekening Diatas.</p>
				</div>
				<div class="c12 lk">
					<?php
						if($get['status'] == 0) {
							?>
							<p style="width:400px;">Anda belum melakukan checkout. Silahkan checkout terlebih dahulu.</p>
							<a href="<?= SITE ?>/cart"><button class="btn btn-blue" type="submit">Go to cart &raquo;</button></a>
						<?php
						}
						if($get['status'] == 1) {
						?>
							<p style="width:400px;">Anda telah berhasil melakukan pemesanan. Silahkan Konfimasi pembayaran anda, apabila dalam kurun waktu <i>5 Menit</i>, pesanan anda akan <i>DI BATALKAN</i>.</p>
							<a href="<?= SITE ?>/member/confirm_order/<?= URI3 ?>"><button class="btn btn-blue" type="submit">Konfirmasi Pembayaran</button></a>
						<?php
						}
						if($get['status'] == 2) {
						?>
							<p style="width:400px;">Anda telah berhasil melakukan konfirmasi. Silahkan menunggu konfirmasi pengiriman dari admin.</p>
							<a href="<?= SITE ?>/assets/<?= $get["scan"]; ?>"><button class="btn btn-blue" type="submit">Lihat Bukti Pembayaran</button></a>
						<?php
						}
						if($get['status'] == 3) {
						?>
							<p style="width:400px;">Pesanan telah selesai. Admin telah mengirim barang anda dengan no resi : <?= $get['noresi'] ?></p>
							<a href="<?= SITE ?>/assets/<?= $get["scan"]; ?>"><button class="btn btn-blue" type="submit">Lihat Bukti Pembayaran</button></a>
						<?php
						}
						if($get['status'] == 4) {
						?>
							<p style="width:400px;">Pesanan Dibatalkan oleh Anda.</p>
						<?php
						}
						if($get['status'] == 5) {
						?>
							<p style="width:400px;">Pesanan Dibatalkan oleh admin.</p>
						<?php
						}
						if($get['status'] == 6) {
						?>
							<p style="width:400px;">Pesanan Dibatalkan oleh System karena dalam kurun waktu 5 menit dari proses checkout anda tidak melakukan konfirmasi pembayaran.</p>
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
