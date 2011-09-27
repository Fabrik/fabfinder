<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);

$query->select('CONCAT(username, \' (<em> edit user</em>)\' ) AS title, \'\' AS text, CONCAT(\'index.php?option=com_users&task=user.edit&id=\', id) AS href ')
->from('#__users')
->where('username LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

