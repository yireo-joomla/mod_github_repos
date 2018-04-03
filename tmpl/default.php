<?php 
/**
 * Joomla! component SimpleLists
 *
 * @author Yireo
 * @copyright Copyright 2015
 * @license GNU Public License
 * @link http://www.yireo.com/
 */

defined('_JEXEC') or die('Restricted access'); 

$count = $params->get('count', 10);
?>

<?php if(!empty($items)) : ?>
<ul>
<?php $i = 0; ?>
<?php foreach( $items as $item ) : ?>
    <?php if($i > $count) break; ?>
    <li>
        <a href="<?php echo $item['html_url']; ?>"><?php echo $item['full_name']; ?></a>
    </li>
    <?php $i++; ?>
<?php endforeach; ?>
</ul>
<?php endif; ?>
