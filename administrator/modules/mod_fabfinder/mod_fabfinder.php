<?php
/**
 * @version		$Id: mod_quickicon.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Joomla.Administrator
 * @subpackage	mod_quickicon
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;


require JModuleHelper::getLayoutPath('mod_fabfinder', $params->get('layout', 'default'));

$doc = JFactory::getDocument();
$doc->addScript(JURI::root().'administrator/modules/mod_fabfinder/autocomplete.js');

$opts = new stdClass();
$opts->max = 50;
$opts->searchName = 'fabfinder';
$opts->url = 'index.php';
$opts->updateField = false;
$opts->width = 300;
$opts = json_encode($opts);
?>

<script type="text/javascript">
window.addEvent('domready', function(){
	$('fabfinder_loader').hide();
	var autocomplete = new FbAutocomplete('fabfinder', <?php echo $opts?>);
});
window.addEvent('autocomplete.search.done', function (a) {
	$('fabfinder_loader').hide();
});

window.addEvent('autocomplete.search.start', function (a) {
	console.log('start', a);
	$('fabfinder_loader').show();
});
</script>