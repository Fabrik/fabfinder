<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);

$query->select('CONCAT(name, \' (plugin)\' ) AS title, \'\' AS text, CONCAT(\'index.php?option=com_plugins&task=plugin.edit&extension_id=\', extension_id) AS href ')
->from('#__extensions')
->where('type = '.$db->Quote('plugin').' AND name LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

