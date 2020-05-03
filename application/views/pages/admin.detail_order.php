


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
					<b>Detail Pembeli :</b>
					<p>Nama	 : <?= $get['mname'] ?></p>
					<p>Domisili	 : <?= $get['pname'] ?></p>
					<p>Alamat	 : <?= $get['maddr'] ?></p>
					<p>Telp	 : <?= $get['mtel'] ?></p>
					<p>Terdaftar sejak	 : <?= date("d, M Y", strtotime($get['mtimejoin'])); ?></p>
					<p style="width:400px; margin-top:5px; font-size:12px;">Pemesan akan melakukan transfer melalu bank <?= $get['bank'] ?>.</p>
				</div>
				<div class="c12 lk">
					<?php
						if($get['status'] == 0) echo "<i style='width:400px;'>Pemesan Belum Melakukan checkout.</i>";
						if($get['status'] == 1) echo "<i style='width:400px;'>Pemesan Belum Melakukan Konfirmasi.</i>";
						if($get['status'] == 2) echo "<i style='width:400px;'>Menunggu konfirmasi anda.</i>";
						if($get['status'] == 3) echo "<i style='width:400px;'>Proses pemesanan selesai. No Resi : ".$get['noresi']."</i>";
						if($get['status'] == 4) echo "<i style='width:400px;'>Dibatalkan oleh admin.</i>";
						if($get['status'] == 5) echo "<i style='width:400px;'>Dibatalkan oleh pemesan.</i>";
						if($get['status'] == 6) echo "<i style='width:400px;'>Dibatalkan oleh System, dikarenakan pemesan tidak melakukan pembayaran dalam kurun waktu 5 menit di hitung dari dia checkout.</i>";
					?>

					<!-- <a href="<?= SITE ?>/member/confirm_order/<?= URI3 ?>"><button class="btn btn-blue" type="submit">Konfirmasi Pembayaran</button></a>					 -->
				</div>
			</div>
		</div>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
