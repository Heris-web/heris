


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Detail Member</p>
		</div>
		<div class="c6 tright">
			<span><?= $get["mname"]; ?></span>
		</div>
	</div>
	<div class="mmain tleft">
		<div class="c12">
			<div class="c4">
				<img src="<?= SITE ?>/assets/<?= $get["mimg"]; ?>" style="width:200px; border-radius:50%; border:2px solid #999;">
			</div>
			<div class="c8 dash">
				<p>Nama : <?= $get["mname"]; ?></p>
				<p>Email : <?= $get["memail"]; ?></p>
				<p>Alamat : <?= $get["maddr"]; ?></p>
				<p>Domisili : <?= $get["pname"]; ?></p>
				<p>Telp / Hp : <?= $get["mtel"]; ?></p>
				<p>Terdaftar Sejak : <?= date("d, M Y", strtotime($get["mname"])); ?></p>
				<a href="<?= SITE ?>/admin/edit_member/<?= $get['mid'] ?>"><button class="btn btn-blue">Delete</button></a>
				<a href="<?= SITE ?>/admin/edit_member/<?= $get['mid'] ?>"><button class="btn btn-blue">Edit</button></a>
			</div>
		</div>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
