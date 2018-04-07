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

<?php if(!empty($repositories)) : ?>
<ul>
<?php $i = 0; ?>
<?php foreach( $repositories as $repository ) : ?>
    <?php if($i > $count) break; ?>
    <li>
        <a href="<?php echo $repository['html_url']; ?>"><?php echo
$repository['full_name']; ?></a>
    </li>
    <?php $i++; ?>
<?php endforeach; ?>
</ul>
<?php endif; ?>

