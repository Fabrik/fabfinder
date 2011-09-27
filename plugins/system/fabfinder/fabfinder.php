<?php
/**
 * @version 1.0.0
 * @package RSFinder! 1.0.0
 * @copyright (C) 2009-2010 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-2.0.html
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$user = & JFactory::getUser();
if(isset($_GET['rsquick']) && !$user->id)
{
	echo '<li><a href="index.php" id="result_0" class="rsInactive">Session Expired. Please log in.</a></li>'."\n";
	exit;
}

jimport('joomla.plugin.plugin');

/**
 * plgSystemFabFinder system plugin
 */

class plgSystemFabFinder extends JPlugin
{

	function plgSystemFabFinder(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}

	function onAfterRender()
	{
		
		$lang = JFactory::getLanguage();
		$folder = 'system';
		$client	= JApplicationHelper::getClientInfo(0);
		$lang->load('plg_system_fabfinder', $client->path.'/plugins/system/fabfinder', null, false, false)
		||	$lang->load('plg_system_fabfinder', $client->path.'/plugins/system/fabfinder', $lang->getDefault(), false, false);
		
		$app = JFactory::getApplication();
		$search = JRequest::getVar('fabfinder', '');
		if ($app->isAdmin() && $search !== '') {
			$params = $this->params;
			$adaptors = (array)$params->get('adaptors', array());
			$output = array();
			$max = $params->get('max', 50);
			$counter = 0;
			foreach ($adaptors as $adaptor) {
				$tmp = null;
				require_once(JPATH_SITE.'/plugins/system/fabfinder/adaptors/'.$adaptor.'.php');
				if (is_array($tmp)) {
					foreach ($tmp as $o) {
						if ($counter > $max) {
							continue 2;
						}
						
						$output[] = '<a href="'.$o->href.'">'.$o->title.'</a>'.strip_tags($o->text);
						$counter ++;
					}
				}
			}
			if (empty($output)) {
				$output[] = JText::_('PLG_FABFINDER_NO_RESULTS');
			}
			echo json_encode($output);exit;
		}
	}
}