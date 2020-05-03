


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Kelola Barang</p>
		</div>
		<div class="c6 tright">
			<span><?= $jumlah ?> Ditemukan!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/admin/item_del" method="POST">
		<table class="list">
			<thead>
				<tr>
					<th style="width:20px;">#</th>
					<th style="width:100px;">Gambar</th>
					<th style="width:100px;">Nama</th>
					<th style="width:50px;">Jumlah</th>
					<th style="width:50px;">Terjual</th>
					<th style="width:50px;">Sisa</th>
					<th style="width:120px;">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$k = 0;
				foreach ($get as $g) {
				$k++;
			?>
				<tr class="<?= $k%2==1 ? 'odd' : 'even' ?>">
					<td><input type="checkbox" name="del[]" value="<?= $g['iid'] ?>"></td>
					<td><img src="<?= SITE ?>/assets/<?= $g['image'] ?>" style="width:80px; border-radius:3px; border:2px solid #999;"></td>
					<td><?= $g['name'] ?></td>
					<td style="text-align:center"><?= $g['qty'] ?></td>
					<td style="text-align:center"><?= $g['sold'] ?></td>
					<td style="text-align:center"><?= $g['stock'] ?></td>
					<td>
						<a href="<?= SITE ?>/admin/detail_item/<?= $g['iid'] ?>">Detail</a>
						<a href="<?= SITE ?>/admin/edit_item/<?= $g['iid'] ?>">Edit</a>
						<a href="<?= SITE ?>/admin/item?do=del&i=<?= $g['iid'] ?>">Delete</a>
					</td>
				</tr>
			<?php
				}
			?>
			</tbody>
		</table>
		<div class="c12" style="margin-top:20px; padding-bottom:20px;">
			<div class="c6 tleft">
				<button class="btn" type="submit">Delete</button>
				<a href="<?= SITE ?>/admin/add_item"><button type="button" class="btn btn-blue">Add New</button></a>
			</div>
			<div class="c4 tright">
				<?= $page ?>
			</div>
		</div>
		</form>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
