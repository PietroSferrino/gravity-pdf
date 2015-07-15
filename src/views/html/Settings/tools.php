<?php

/**
 * Tools Settings View
 *
 * @package     Gravity PDF
 * @copyright   Copyright (c) 2015, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       4.0
 */

/* Exit if accessed directly */
if (! defined('ABSPATH')) {
    exit;
}

/*
    This file is part of Gravity PDF.

    Gravity PDF Copyright (C) 2015 Blue Liquid Designs

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

?>

<?php $this->tabs(); ?>
        
        
<div id="pdfextended-settings">
	<h3>
	<span>
	  <i class="fa fa-cog"></i>
	  <?php _e('Tools', 'gravitypdf'); ?>
	</span>
	</h3>

	<form method="post">

		<table id="pdf-tools" class="widefat gfpdfe_table">
	    <thead>
	      <tr>
	        <th colspan="2"><?php _e( 'Tools', 'gravitypdf' ); ?></th>
	      </tr>
	    </thead>
	    
	    <tbody>
			  <?php do_settings_fields('gfpdf_settings_tools', 'gfpdf_settings_tools'); ?>
	    </tbody>
		</table>

		<?php submit_button(); ?>
	</form>


	<?php if($args['custom_template_setup_warning']): ?>
		<!-- only show custom template warning if user has already installed them once -->
		<div id="setup-templates-confirm" title="<?php _e('Setup Custom Templates', 'gravitypdf'); ?>" style="display: none;">
		  <?php printf(__('During the setup process any of the following templates stored in %s will be overridden. If you have modified any of the following template or template configuration files %smake a backup before continuing%s.', 'gravitypdf'), '<br><code>' . $args['template_directory'] . '</code>', '<strong>', '</strong>'); ?>

		  <?php if(sizeof($args['template_files']) > 0): ?>
		  <ul>
		  	<?php foreach($args['template_files'] as $file): ?>
		  		<li><?php echo basename($file); ?></li>
		  	<?php endforeach; ?>
		  </ul>
		  <?php endif; ?>
		</div>
	<?php endif; ?>

	<div id="manage-font-files" title="<?php _e('Manage Fonts', 'gravitypdf'); ?>" style="display: none;">
	  Font logic here...
	</div>

	<?php do_action('pdf-settings-tools'); ?>
</div>