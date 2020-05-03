


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Kelola Member</p>
		</div>
		<div class="c6 tright">
			<span><?= $jumlah ?> Ditemukan!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/admin/member_del" method="POST">
		<table class="list">
			<thead>
				<tr>
					<th style="width:20px;">#</th>
					<th style="width:100px;">Gambar</th>
					<th style="width:100px;">Nama</th>
					<th style="width:50px;">Email</th>
					<th style="width:50px;">Domisili</th>
					<th style="width:50px;">Telp</th>
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
					<td><input type="checkbox" name="del[]" value="<?= $g['mid'] ?>"></td>
					<td><img src="<?= SITE ?>/assets/<?= $g['mimg'] ?>" style="width:80px; border-radius:3px; border:2px solid #999;"></td>
					<td><?= $g['mname'] ?></td>
					<td style="text-align:center"><?= $g['memail'] ?></td>
					<td style="text-align:center"><?= $g['pname'] ?></td>
					<td style="text-align:center"><?= $g['mtel'] ?></td>
					<td>
						<a href="<?= SITE ?>/admin/detail_member/<?= $g['mid'] ?>">Detail</a>
						<a href="<?= SITE ?>/admin/edit_member/<?= $g['mid'] ?>">Edit</a>
						<a href="<?= SITE ?>/admin/member?do=del&i=<?= $g['mid'] ?>">Delete</a>
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
			<a href="<?= SITE ?>/admin/add_member"><button type="button" class="btn btn-blue">Add New</button></a>
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
