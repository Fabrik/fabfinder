<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);

$query->select('CONCAT(title, \' (<em>menu</em>)\' ) AS title, \'\' AS text, CONCAT(\'index.php?option=com_menus&task=view&menutype\', menutype) AS href ')
->from('#__menu_types')
->where('menutype LIKE '.$db->Quote('%'.$search.'%').'OR title LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

