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

namespace Filoucrackeur\Redis\Data;

use TYPO3\CMS\Core\Cache\Backend\RedisBackend;

class RedisConfiguration extends RedisBackend
{
    /**
     * RedisConfiguration constructor.
     * @param $context
     * @param array $options
     * @throws \TYPO3\CMS\Core\Cache\Exception
     */
    public function __construct($context, array $options = [])
    {
        parent::__construct($context, $options);
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return int
     */
    public function getDatabase(): int
    {
        return $this->database;
    }

    /**
     * @return int
     */
    public function getDefaultLifetime(): int
    {
        return $this->defaultLifetime;
    }
}