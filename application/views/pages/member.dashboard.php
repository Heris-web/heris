


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Member Dashboard</p>
		</div>
		<div class="c6 tright">
			<span>Hi <?= $sess->get("mname"); ?>!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<div class="c12">
			<div class="c4">
				<img src="<?= SITE ?>/assets/<?= $sess->get("mimg"); ?>" style="width:200px; border-radius:50%; border:2px solid #999;">
			</div>
			<div class="c8 dash">
				<p>Nama : <?= $sess->get("mname"); ?></p>
				<p>Email : <?= $sess->get("memail"); ?></p>
				<p>Alamat : <?= $sess->get("maddr"); ?></p>
				<p>Domisili : <?= $sess->get("pname"); ?></p>
				<p>Telp / Hp : <?= $sess->get("mtel"); ?></p>
				<p>Terdaftar Sejak : <?= date("d, M Y", strtotime($sess->get("mname"))); ?></p>
				<a href="<?= SITE ?>/member/edit"><button class="btn btn-blue">Edit Profile</button></a>
			</div>
		</div>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
