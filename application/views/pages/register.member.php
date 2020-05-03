


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Register Member</p>
		</div>
		<div class="c6 tright">
			<span>Silahkan mengisi semua form!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/register/do_register" method="POST" enctype="multipart/form-data">
			<table class="fform">
				<tr>
					<td style="min-width:150px;">Nama Lengkap</td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="name" class="ftext" required /></td>
				</tr>
				<tr>
					<td style="min-width:150px;">Email</td>
					<td style="min-width:10px;">:</td>
					<td><input type="email" name="user" class="ftext" required /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td><input type="password" name="pass" class="ftext" required /></td>
				</tr>
				<tr>
					<td style="min-width:150px;">alamat</td>
					<td style="min-width:10px;">:</td>
					<td><textarea name="addr" class="fbox" required /></textarea></td>
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
									echo "<option value='{$p['pid']}'>{$p['pname']}</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td style="min-width:150px;">Telp / HP</td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="telp" class="ftext" required /></td>
				</tr>
				<tr>
					<td style="min-width:150px;">Foto</td>
					<td style="min-width:10px;">:</td>
					<td><input type="file" name="image" required /></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>
						<button type="reset" class="btn">Reset</button>
						<button type="submit" class="btn btn-blue">Daftar</button>
					</td>
				</tr>

			</table>
		</form>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
