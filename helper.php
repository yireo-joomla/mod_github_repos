<?php
/**
 * @author Yireo
 * @copyright Copyright 2018 Yireo
 * @license GNU/GPL
 * @link https://www.yireo.com/
 */
declare(strict_types=1);

namespace Yireo\ModuleGithubRepos;

// No direct access
use Github\Client as GithubClient;
use Joomla\Registry\Registry;

defined('_JEXEC') or die('Restricted access');

/*
 * Helper class
 */

class Helper
{
    /** @var Registry */
    private $params;

    /**
     * Helper constructor.
     * @param Registry $params
     */
    public function __construct(Registry $params)
    {
        $this->params = $params;
    }

    /*
     * Method to get the feed-data
     *
     * @return array
     */
    public function getRepositories(): array
    {
        // Fetch the remote lines
        $repositories = $this->getRemoteData();
        if (empty($repositories)) {
            return [];
        }

        // Parse the lines
        foreach ($repositories as $repositoryId => $repository) {
            if ($this->showRepository($repository)) {
                unset($repositories[$repositoryId]);
                continue;
            }

            $repositories[$repositoryId] = $repository;
        }

        return $repositories;
    }

    /**
     * @param array $repository
     * @return bool
     */
    private function showRepository(array $repository)
    {
        if ((int)$repository['fork'] === 1 &&
(bool)$this->params->get('skip_forks', 1)) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    private function getRemoteData(): array
    {
        // Construct the remote URL from the parameters
        $user = $this->params->get('user');
        $client = $this->getGithubClient();
        $repositories = $client->api('user')->repositories($user);
        return $repositories;
    }

    /**
     * @return GithubClient
     */
    private function getGithubClient(): GithubClient
    {
        require_once JPATH_ROOT . '/vendor/autoload.php';
        $client = new GithubClient();

        $accessToken = $this->params->get('access_token');
        $client->authenticate($accessToken,
GithubClient::AUTH_URL_TOKEN);
        return $client;
    }
}

