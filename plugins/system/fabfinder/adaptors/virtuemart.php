<?php
defined('_JEXEC') or die('Restricted access');

$db = JFactory::getDbo();
$search = $db->getEscaped(JRequest::getVar('fabfinder'));
$query = $db->getQuery(true);

$query->select('CONCAT(product_name, \' (VM product)\' ) AS title, \'\' AS text, CONCAT(\'index.php?option=com_virtuemart&page=product.product_form&product_id=\', product_id) AS href ')
->from('#__vm_product')
->where('product_name LIKE '.$db->Quote('%'.$search.'%'))
->limit($max);
$db->setQuery($query);
$tmp = $db->loadObjectList();

