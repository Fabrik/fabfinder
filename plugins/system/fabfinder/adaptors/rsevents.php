<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);

$query->select('CONCAT(EventName, \' (<em>edit rsevent</em>)\' ) AS title, \'\' AS text, CONCAT(\'index.php?option=com_rsevents&task=editevent&cid=\', IdEvent) AS href ')
->from('#__extensions')
->where('EventName LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

