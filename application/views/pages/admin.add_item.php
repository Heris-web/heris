


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Form Barang</p>
		</div>
		<div class="c6 tright">
			<span>Silahkan mengisi semua form!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/admin/do_add_item" method="POST" enctype="multipart/form-data">
			<table class="fform">
				<tr>
					<td style="min-width:200px;">Nama Barang <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="name" class="ftext" required /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Kategori <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td>
						<select name="c" class="fsel" required>
							<?php
								foreach ($cat as $c) {
									echo "<option value='{$c['cid']}'>{$c['cname']}</option>";
								}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td style="min-width:200px;">Merk <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="merk" class="ftext" required /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Detail <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><textarea name="detail" class="fbox" required></textarea></td>
				</tr>
				<tr>
					<td style="min-width:200px;">Warna <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="color" class="ftext" required /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Harga <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="number" name="price" class="ftext" required /></td>
				</tr>
				<tr>
					<td style="min-width:200px;">Potongan Harga (%) <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="number" name="disc" class="ftext" required /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Jumlah Barang <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="number" name="qty" id="qty" onkeyup="restock();" class="ftext" required /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Stock Tersedia <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" id="stock" disabled name="stock" class="ftext" required /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Gambar <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="file" name="image" required /></td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td style="padding-top:20px;">
						<button type="reset" class="btn">Reset</button>
						<button type="submit" class="btn btn-blue">Post</button>
					</td>
				</tr>

			</table>
		</form>
	</div>
</div>

<script type="text/javascript">
	function restock(){
		var q = document.getElementById('qty').value;
		var s = document.getElementById('stock');
		s.value = document.getElementById('qty').value;

	}
</script>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
