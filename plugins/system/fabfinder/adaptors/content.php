<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);
$query->select('id, title, \'\' AS text, CONCAT(\'index.php?option=com_menus&task=item.edit&id=\', id) AS href ')
->from('#__menu')
->where('menutype != '.$db->Quote('main'))
->where('menutype != '.$db->Quote('menu'))
->where('title LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

