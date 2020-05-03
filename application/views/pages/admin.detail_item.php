


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Kelola Barang</p>
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
					<p></p>
					<a href="<?= SITE ?>/admin/edit_item/<?= $get['iid'] ?>"><button class="btn btn-blue">Edit</button></a>
					<a href="<?= SITE ?>/admin/item?do=del&i=<?= $get['iid'] ?>"><button class="btn btn-blue">Delete</button></a>
				</div>
			</div>
		</div>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
