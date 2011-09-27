<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);

$query->select('CONCAT(title, \' (k2 article)\' ) AS title, \'\' AS text, CONCAT(\'index.php?option=com_k2&view=item&cid=\', id) AS href ')
->from('#__k2_items')
->where('title LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

