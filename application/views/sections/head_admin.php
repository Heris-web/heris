<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?= SITE ?>/assets/style.css">
	<title>Welcome to Heris Store</title>
</head>
<body>
<center>

	<div class="c12 chead">
		<div class="container">
			<div class="c12">
				<div class="c6 tleft">
				<?php
					$s = new Session();
					if($s->get("type") == "ADMIN"){
				?>
					<p>Selamat datang, <?= $s->get("user") ?>!</p>
				<?php
					}elseif($s->get("type") == 1){
				?>
					<p>Selamat datang, <?= $s->get("mname") ?>!</p>
				<?php
					}else{
				?>
					<p>Selamat datang, Admin!</p>
				<?php
					}
				?>
				</div>
				<div class="c6 tright">
				<?php
					if($s->get("type") == "ADMIN"){
				?>
					<a href="<?= SITE ?>/admin">dashboard</a>
					<a href="<?= SITE ?>/home/logout">logout</a>
				<?php
					}elseif($s->get("type") == 1){
				?>
					<a href="<?= SITE ?>/member">dashboard</a>
					<a href="<?= SITE ?>/home/logout">logout</a>
				<?php
					}else{
				?>
					<a href="<?= SITE ?>/register">Register</a>
					<a href="<?= SITE ?>/login">Login</a>
				<?php
					}
				?>
				</div>
			</div>
		</div>
	</div>

	<div class="container" style="margin-top:20px;">

		<div class="c12">
			<div class="c4 tleft">
				<a href="<?= SITE ?>"><img src="<?= SITE ?>/assets/logo.png" class="headlogo"></a>
			</div>

					</form>

		</div>

		<div class="c12" style="margin-top:20px;">

			<div class="main"><!-- START MAIN -->
				<div class="menu tleft">
					<ul class="topmenu">
						<?php
							$l1 = "";
							$l2 = "";
							$l3 = "";
							$l4 = "";
							if(defined("URI1")){
								if(URI1 == "home" || URI1 == "") $l1 = "active";
								if(URI1 == "item") $l2 = "active";
								if(URI1 == "contact") $l3 = "active";
								if(URI1 == "about") $l4 = "active";
							}else {
								$l1 = "active";
							}
						?>
						<li class="<?= $l1 ?>"><a href="<?= SITE ?>/home">Beranda</a></li>
						<li class="<?= $l2 ?>"><a href="<?= SITE ?>/item">Daftar Barang</a></li>
						<li class="<?= $l3 ?>"><a href="<?= SITE ?>/contact">Kontak Kami</a></li>
						<li class="<?= $l4 ?>"><a href="<?= SITE ?>/about">Tentang Kami</a></li>
						<li class="<?= $l4 ?>"><a href="<?= SITE ?>/alamat">Alamat Kami</a></li>
						<?php
						$db = new Database();
						$gep = $db->fetch("SELECT * FROM `page` WHERE `link` != :ab AND `link` != :ct ", array(":ab" => "about", ":ct" => "contact" ));
						foreach ($gep as $gp) {
							echo '<li><a href="'.SITE.'/other/page/'.$gp['link'].'">'.$gp['title'].'</a></li>';
						}
						?>
					</ul>
					<div class="rlink">
						<a href="<?= SITE ?>/cart">
							<p class="tcart">
							<?php
								if(!$s->get("invoice")) echo "<span>0</span> Items";
								else echo "<span>1</span> Items";
							?>

							</p>
							<img src="<?= SITE ?>/assets/icon.PNG" class="icart">
						</a>
					</div>
				</div>
