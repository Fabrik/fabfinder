<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);
$query->select('CONCAT(name, \' (<em>component</em>)\') as title, element, \'\' AS text, CONCAT(\'index.php?option=\', element) AS href ')
->from('#__extensions')
->where('type = '.$db->Quote('component'))
->where('name LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

