


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Form Edit Halaman</p>
		</div>
		<div class="c6 tright">
			<span>Silahkan mengisi semua form!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/admin/do_edit_page" method="POST" enctype="multipart/form-data">
			<table class="fform">
				<tr>
					<td style="min-width:200px;">Nama Halaman <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="name" class="ftext" required value="<?= $get['title']; ?>" />
						<input type="hidden" name="id" class="ftext" required value="<?= $get['id']; ?>" />
					 </td>
				</tr>
				<tr>
					<td style="min-width:200px;">Link <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="link" class="ftext" value="<?= $get['link']; ?>" required /></td>
				</tr>
				<tr>
					<td style="min-width:200px;">Deskripsi <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><textarea name="content" class="fbox" required ><?= $get['content'] ?></textarea></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td style="padding-top:20px;">
						<button type="reset" class="btn">Reset</button>
						<button type="submit" class="btn btn-blue">Update</button>
					</td>
				</tr>
				
			</table>
		</form>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
