<div class="wrap">
	<h2>TS Patch</h2>

	<form method="post" action="options.php">
	    <?php settings_fields( 'tspatch-settings-group' ); ?>
	    <?php do_settings_sections( 'tspatch-settings-group' ); ?>
	    <table class="form-table">
	    	<tr valign="top">
	        	<th scope="row">Google Maps API Enabled</th>
	        	<td><input type="checkbox" name="tspatch_google_maps_enabled" value="1" <?php echo $values['google_maps_enabled'] ? 'checked="checked"' : '' ?> /></td>
	        </tr>
	    	
	        <tr valign="top">
	        	<th scope="row">Google Maps API Key</th>
	        	<td><input style="width:50%" type="text" name="tspatch_google_maps_key" value="<?php echo $values['google_maps_api_key']; ?>" /></td>
	        </tr>
	        
	        <tr valign="top">
	        	<th scope="row">Remove Notifications</th>
	        	<td><input type="checkbox" name="tspatch_remove_notifications" value="1" <?php echo $values['remove_notifications'] ? 'checked="checked"' : '' ?> /></td>
	        </tr>
	         
	        
	    </table>
	    
	    <?php submit_button(); ?>
	
	</form>
</div>