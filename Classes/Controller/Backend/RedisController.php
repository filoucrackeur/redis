<?php
/*
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Filoucrackeur\Redis\Controller\Backend;

use Filoucrackeur\Redis\Service\RedisConfigurationService;
use TYPO3\CMS\Core\Cache\Backend\RedisBackend;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class RedisController extends ActionController
{
    /**
     * @var \Filoucrackeur\Redis\Service\RedisConfigurationService
     */
    protected $redisConfigurationService;

    public function indexAction(): void
    {
        //$redis = new \Predis\Client();

        $redisService = GeneralUtility::makeInstance(RedisConfigurationService::class);


        $this->view->assignMultiple([
            'redisBackends' => $redisService->getRedisBackends()
        ]);
    }

    /**
     * @param \Filoucrackeur\Redis\Service\RedisConfigurationService $redisConfigurationService
     */
    public function injectRedisConfigurationService(RedisConfigurationService $redisConfigurationService): void
    {

        $this->redisConfigurationService = $redisConfigurationService;
    }
}