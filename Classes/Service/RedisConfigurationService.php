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

namespace Filoucrackeur\Redis\Service;

use Filoucrackeur\Redis\Data\RedisConfiguration;
use TYPO3\CMS\Core\Cache\Backend\RedisBackend;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

class RedisConfigurationService implements SingletonInterface
{

    /**
     * @var RedisConfiguration[]
     */
    protected $backends = [];

    /**
     * @return array
     * @throws \TYPO3\CMS\Core\Cache\Exception
     */
    public function getRedisBackends(): array
    {
        $cacheConfigurations = $GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations'];

        foreach ($cacheConfigurations as $identifier => $cacheConfiguration) {
            if ($cacheConfiguration['backend'] !== RedisBackend::class) {
                continue;
            }
            //DebuggerUtility::var_dump('pass');

            $identifier = $cacheConfiguration['options']['hostname']
                . (isset($cacheConfiguration['options']['port']) ? $cacheConfiguration['options']['port'] : 6379);

            if (!isset($backends[$identifier])) {
                $backends[$identifier] = new RedisConfiguration('', $cacheConfiguration['options']);
            }
        }
        return $backends;
    }
}