<?php
/**
 * @package		Joomla.Administrator
 * @subpackage	mod_fabfinder
 * @copyright	Copyright (C) 2005 - 2011 Pollen 8 Design Ltd. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

?>
<span>
<img id="fabfinder_loader" src="<?php echo JUri::base()?>/modules/mod_fabfinder/tmpl/ajax-loader.gif" alt="loading" />
<input name="fabfinder" class="hasTip inputbox" title="Finder::start typing to search for admin content" type="search" placeholder="Search..." id="fabfinder" size="20" />
</span>


<style>

.auto-complete-container{
	overflow-y: hidden;
	border:1px solid #ddd;
	z-index:100;
}

.auto-complete-container ul{
list-style:none;
padding:0;
margin:0;
}

.auto-complete-container li.unselected{
	padding:2px 10px !important;
	background-color:#fff !important;
	margin:0 !important;
	border-top:1px solid #ddd;
	cursor:pointer;
}

.auto-complete-container li:hover,
.auto-complete-container li.selected{
	background-color:#DFFAFF !important;
	cursor:pointer;
}
</style>