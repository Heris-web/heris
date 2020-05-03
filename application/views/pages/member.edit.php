


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>edit Profile</p>
		</div>
		<div class="c6 tright">
			<span>Silahkan mengisi semua form!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/member/do_edit" method="POST" enctype="multipart/form-data">
			<table class="fform">
				<tr>
					<td style="min-width:150px;">Nama Lengkap</td>
					<td style="min-width:10px;">:</td>
					<td><input value="<?= $sess->get("mname"); ?>" type="text" name="name" class="ftext" required /></td>
				</tr>
				<tr>
					<td style="min-width:150px;">Email</td>
					<td style="min-width:10px;">:</td>
					<td><input value="<?= $sess->get("memail"); ?>" disabled type="email" name="user" class="ftext" required /></td>
				</tr>
				<tr>
					<td>Password <br><span style="color:#999; font-size:10px;">(Jika kamu ingin merubah password)</span></td>
					<td>:</td>
					<td><input type="password" name="pass" class="ftext" /></td>
				</tr>
				<tr>
					<td style="min-width:150px;">alamat</td>
					<td style="min-width:10px;">:</td>
					<td><textarea name="addr" class="fbox" required /><?= $sess->get("maddr"); ?></textarea></td>
				</tr>
				<tr>
					<td style="min-width:150px;">Domisili</td>
					<td style="min-width:10px;">:</td>
					<td>
						<select class="fsel" name="p" required>
							<?php
								$db = new Database();
								$prov = $db->fetch("SELECT * FROM `prov`");
								foreach ($prov as $p) {
									$sel = "";
									if($p['pid'] == $sess->get("mpid")) $sel = "selected";
									echo "<option value='{$p['pid']}' {$sel}>{$p['pname']}</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td style="min-width:150px;">Telp / HP</td>
					<td style="min-width:10px;">:</td>
					<td><input value="<?= $sess->get("mtel"); ?>" type="text" name="telp" class="ftext" required /></td>
				</tr>
				<tr>
					<td style="min-width:150px;">Gambar</td>
					<td style="min-width:10px;">:</td>
					<td>
						<img src="<?= SITE ?>/assets/<?= $sess->get('mimg') ?>" style="width:100px; display:block; margin-bottom:5px; border-radius:3px; border:2px solid #999;">
						<input type="file" name="image" />
					</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>
						<button type="reset" class="btn">Reset</button>
						<button type="submit" class="btn btn-blue">Edit</button>
					</td>
				</tr>
				
			</table>
		</form>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
