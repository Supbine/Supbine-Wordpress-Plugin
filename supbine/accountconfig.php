<?php

function account_config() {

	if ($_GET["action"] == "deactivate") {
		update_option('supbine_companyId', null);
		update_option('supbine_locale', "en_US");
	}

	if ($_GET["action"] == "update") {
		update_option('supbine_companyId', $_POST["supbine_companyId"]);
		update_option('supbine_locale', $_POST["supbine_locale"]);
	}

	$companyId = get_option('supbine_companyId', null);
	$locale = get_option('supbine_locale', "en_US");

	?>
	<div class="wrap">
		<h2>Supbine Widget</h2>
		<span>The following is the documentation for usage of Supbine's web widget or Widget for short.</span>
	<?php

	?>
		<div class="existingform">
			<div class="metabox-holder">
				<div class="postbox">
					<h3 class="hndle"><span>Link up with your Supbine company</span></h3>
					<div class="supbine-login-form">
						<?php
							if ($companyId != null){
								?>
								<div class="supbine-success">
									<p><strong>Success!</strong> You are currently using company id: <?=$companyId?> with language: <?=$locale?></p>
									To deactivate the widget, click <a href="admin.php?page=supbine&action=deactivate">here</a>.
								</div>
								<?php
							}else {
								?>
								<div class="supbine-help">
									<p><strong>Can't find your company id?</strong> Your company id can be found <a href="https://app.supbine.com/#/company-settings/" target="_blank">here</a>.</p>
								</div>
								<?php
							}
						?>

						<form method="post" action="admin.php?page=supbine&action=update">
							<table class="form-table">
								<tbody>
									<tr valign="top">
										<th scope="row">Company id</th>
										<td>
											<input type="number" name="supbine_companyId">
										</td>
									</tr>

									<tr valign="top">
										<th scope="row">Language</th>
										<td>
											<select name="supbine_locale">
												<option value="en_US">English</option>
												<option value="da_DK">Danish</option>
											</select>
										</td>
									</tr>

								</tbody>
							</table>

							<p class="submit">
								<button type="submit" class="button-primary">Update</button>
								Don't have a Supbine account? <a href="https://app.supbine.com/#/register" target="_blank">Sign up now</a>.
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
}