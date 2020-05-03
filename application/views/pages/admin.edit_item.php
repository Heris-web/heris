


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Form Edit Barang</p>
		</div>
		<div class="c6 tright">
			<span>Silahkan mengisi semua form!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/admin/do_edit_item" method="POST" enctype="multipart/form-data">
			<table class="fform">
				<tr>
					<td style="min-width:200px;">Nama Barang <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="name" class="ftext" required value="<?= $get['name']; ?>" />
						<input type="hidden" name="id" class="ftext" required value="<?= $get['iid']; ?>" />
					 </td>
				</tr>

				<tr>
					<td style="min-width:200px;">Kategori <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td>
						<select name="c" class="fsel" required>
							<?php
								foreach ($cat as $c) {
									$sel = "";
									if($c["cid"] == $get['cid']) $sel = "selected='selected'";
									echo "<option value='{$c['cid']}' {$sel}>{$c['cname']}</option>";
								}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td style="min-width:200px;">Merk <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="merk" class="ftext" required value="<?= $get['merk']; ?>" /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Detail <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><textarea name="detail" class="fbox" required><?= $get['detail'] ?></textarea></td>
				</tr>
				<tr>
					<td style="min-width:200px;">Warna <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" name="color" class="ftext" required value="<?= $get['color']; ?>" /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Harga <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="number" name="price" class="ftext" required value="<?= $get['price']; ?>" /></td>
				</tr>				
				<tr>
					<td style="min-width:200px;">Potongan Harga (%) <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="number" name="disc" class="ftext" required value="<?= $get['disc']; ?>" /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Jumlah Barang <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="number" name="qty" id="qty" onkeyup="restock();" class="ftext" required value="<?= $get['qty']; ?>" /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Stock Tersedia <span style="color:#cf000f; font-size:10px;">*</span></td>
					<td style="min-width:10px;">:</td>
					<td><input type="text" id="stock" disabled name="stock" class="ftext" required value="<?= $get['stock']; ?>" /></td>
				</tr>

				<tr>
					<td style="min-width:200px;">Gambar</td>
					<td style="min-width:10px;">:</td>
					<td>
						<img src="<?= SITE ?>/assets/<?= $get['image'] ?>" style="width:100px; display:block; margin-bottom:5px; border-radius:3px; border:2px solid #999;">
						<input type="file" name="image" />
					</td>
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

<script type="text/javascript">
	function restock(){
		var q = document.getElementById('qty').value;
		var s = document.getElementById('stock');
		var st = parseInt(document.getElementById('qty').value) - parseInt("<?= $get['sold'] ?>");
		if(q == "") st = "0";
		s.value = st;

	}
</script>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
