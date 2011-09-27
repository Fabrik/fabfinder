<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);
$query->select('CONCAT(f.label, \': \', e.label, \' (<em>edit fabrik element</em>)\') AS title, \'\' AS text, CONCAT(\'index.php?option=com_fabrik&task=element.edit&id=\', e.id) AS href ')
->from('#__fabrik_elements AS e')
->join('INNER', '#__fabrik_formgroup AS fg ON fg.group_id = e.group_id')
->join('INNER', '#__fabrik_forms AS f ON f.id = fg.form_id')
->where('e.name LIKE '.$db->Quote('%'.$search.'%').' OR e.label LIKE'.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

