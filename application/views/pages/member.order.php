


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Kelola Order</p>
		</div>
		<div class="c6 tright">
			<span><?= $jumlah ?> Ditemukan!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/member/item_del" method="POST">
		<table class="list">
			<thead>
				<tr>
					<th style="width:10px;">#</th>
					<th style="width:100px;">Invoice</th>
					<th style="width:100px;">Barang</th>
					<th style="width:10px;">Qty</th>
					<th style="width:50px;">Jumlah</th>
					<th style="width:120px;">Status</th>
					<th style="width:70px;">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$k = 0;
				foreach ($get as $g) {
				$k++;
			?>
				<tr class="<?= $k%2==1 ? 'odd' : 'even' ?>">
					<td><?= $k ?></td>
					<td><a href="<?= SITE ?>/member/detail_order/<?= $g['invoice'] ?>"><?= $g['invoice'] ?></a></td>
					<td><a href="<?= SITE ?>/item/detail/<?= $g['iid'] ?>"><?= $g['name'] ?></a></td>
					<td style="text-align:center"><?= $g['qtys'] ?></td>
					<td style="text-align:left">Rp. <?= number_format($g['qtys'] * ($g['price'] - ($g['price'] * $g['disc'] / 100)), 2) ?></td>
					<td style="text-align:center;">
						<!-- <?= $g['status'] ?> -->
						<?php
							if($g['status'] == 0){
								echo "<span class='orange'>Belum Selesai</span>";
							}elseif($g['status'] == 1){
								echo "<span class='orange'>Belum Konfirmasi</span>";
							}elseif($g['status'] == 2){
								echo "<span class='blue'>Menunggu Konfirmasi admin</span>";
							}elseif($g['status'] == 3){
								echo "<span class='green'>Selesai</span>";
							}elseif($g['status'] == 4){
								echo "<span class='red'>Dibatalkan anda</span>";
							}elseif($g['status'] == 5){
								echo "<span class='red'>Dibatalkan Admin</span>";
							}elseif($g['status'] == 6){
								echo "<span class='red'>Dibatalkan system</span>";
							}
						?>
					</td>
					<td>
					<?php
						if($g['status'] == 0) {
							?>
							<a href="<?= SITE ?>/cart">Cart</a>
						<?php
						}
						if($g['status'] == 1) {
						?>
							<a href="<?= SITE ?>/member/detail_order/<?= $g['invoice'] ?>">Detail</a>
							<a href="<?= SITE ?>/member/order?do=cancel&in=<?= $g['invoice'] ?>&i=<?= $g['iid'] ?>&q=<?= $g['qtys'] ?>">Cancel</a>
							<a href="<?= SITE ?>/member/confirm_order/<?= $g['invoice'] ?>">Konfirmasi</a>
						<?php
						}
						if($g['status'] == 2) {
						?>
							<a href="<?= SITE ?>/member/detail_order/<?= $g['invoice'] ?>">Detail</a>
							<a href="<?= SITE ?>/assets/<?= $g['scan'] ?>" target="_blank">Lihat Bukti</a>
						<?php
						}
						if($g['status'] == 3) {
						?>
							<a href="<?= SITE ?>/member/detail_order/<?= $g['invoice'] ?>">Detail</a>
							<a href="<?= SITE ?>/assets/<?= $g['scan'] ?>" target="_blank">Lihat Bukti</a>
						<?php
						}
						if($g['status'] == 4) {
						?>
							<a href="<?= SITE ?>/member/detail_order/<?= $g['invoice'] ?>">Detail</a>
						<?php
						}
						if($g['status'] == 5) {
						?>
							<a href="<?= SITE ?>/member/detail_order/<?= $g['invoice'] ?>">Detail</a>
						<?php
						}
						if($g['status'] == 6) {
						?>
							<a href="<?= SITE ?>/member/detail_order/<?= $g['invoice'] ?>">Detail</a>
						<?php
						}
						?>
						<!-- 	<a href="<?= SITE ?>/member/item?do=del&i=<?= $g['iid'] ?>">Delete</a> -->
						<!--<?php
							if($g['status'] == 1) echo "<a href='<?= SITE ?>/member/order/?do=cancel&i=".$g['invoice']."'>Batalkan</a>";
						?>-->
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="c12" style="margin-top:20px; width:90%; padding-bottom:200px;">
			<?= $page ?>
			</div>
		</form>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
