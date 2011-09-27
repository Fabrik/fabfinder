<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);

$query->select('CONCAT(title, \' (module)\' ) AS title, \'\' AS text, CONCAT(\'index.php?option=com_modules&task=module.edit&id=\', id) AS href ')
->from('#__modules')
->where('title LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

