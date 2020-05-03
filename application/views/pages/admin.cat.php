


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Kelola Kategori</p>
		</div>
		<div class="c6 tright">
			<span><?= $jumlah ?> Ditemukan!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/admin/cat_del" method="POST">
		<table class="list">
			<thead>
				<tr>
					<th style="width:50px;">#</th>
					<th style="width:400px; text-align:center;">Nama Kategori</th>
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
					<td><input type="checkbox" name="del[]" value="<?= $g['cid'] ?>"></td>
					<td style="text-align:center;"><?= $g['cname'] ?></td>
					<td>
						<a href="<?= SITE ?>/admin/edit_cat/<?= $g['cid'] ?>">Edit</a>
						<a href="<?= SITE ?>/admin/cat?do=del&i=<?= $g['cid'] ?>">Delete</a>
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
				<a href="<?= SITE ?>/admin/add_cat"><button type="button" class="btn btn-blue">Add New</button></a>
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
