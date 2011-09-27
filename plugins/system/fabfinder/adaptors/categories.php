<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);
//SELECT id as value, title as text, extension FROM #__categories WHERE title LIKE 
$query->select('CONCAT(title, \' (<em>\', extension, \'</em>)\' ) AS title, \'\' AS text, CONCAT(\'index.php?option=com_categories&task=category.edit&id=\', id) AS href ')
->from('#__categories')
->where('title LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

