


<div class="c12 mbox">
	<div class="mtitle">
		<div class="c6 tleft">
			<p>Login Member</p>
		</div>
		<div class="c6 tright">
			<span>Silahkan mengisi semua form!</span>
		</div>
	</div>
	<div class="mmain tleft">
		<form action="<?= SITE ?>/login/do_login" method="POST">
			<table class="fform">
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
					<td></td>
					<td></td>
					<td>
						<button type="reset" class="btn">Reset</button>
						<button type="submit" class="btn btn-blue">Login</button>
					</td>
				</tr>
				
			</table>
		</form>
	</div>
</div>


			</div><!-- END MAIN -->

			<div class="sidebar"><!-- START SIDEBAR -->
