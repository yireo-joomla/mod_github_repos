<?php
/**
 * @author Yireo
 * @copyright Copyright 2018 Yireo
 * @license GNU/GPL
 * @link http://www.yireo.com/
*/

declare(strict_types=1);

// No direct access
defined('_JEXEC') or die('Restricted access');

// Include the helper
require_once (dirname(__FILE__).'/helper.php');

$helper = new \Yireo\ModuleGithubRepos\Helper($params);

// Fetch the list of items
$repositories = $helper->getRepositories();

// Display the output
require(JModuleHelper::getLayoutPath('mod_github_repos'));

