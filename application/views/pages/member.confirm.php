


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Konfirmasi Pemesanan</p>
		</div>
		<div class="c6 tright">
			<span>No Invoice : <?= URI3 ?></span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/member/do_confirm" method="POST" enctype="multipart/form-data">
			<table class="fform">
				<tr>
					<td style="min-width:150px;">Invoice</td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" disabled name="user" class="ftext" value="<?= URI3 ?>" required />
					<input type="hidden" name="invoice" class="ftext" value="<?= URI3 ?>" required /></td>
				</tr>
				<tr>
					<td>Scan Bukti</td>
					<td>:</td>
					<td><input type="file" name="image" required /></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td>
						<button type="reset" class="btn">Reset</button>
						<button type="submit" class="btn btn-blue">Konfirmasi</button>
					</td>
				</tr>
				
			</table>
		</form>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
