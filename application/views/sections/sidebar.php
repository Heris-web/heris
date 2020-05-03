

				<div class="sidebox">
					<div class="stitle">
						Kategori
					</div>
					<div class="smain">
						<ul class="slink">
							<?php
								foreach ($cat as $c) {
									echo "<li><a href='".SITE."/item/search?k=&c={$c['cid']}&h=all'>{$c['cname']}</a></li>";
								}
							?>
							
						</ul>
					</div>
				</div>
