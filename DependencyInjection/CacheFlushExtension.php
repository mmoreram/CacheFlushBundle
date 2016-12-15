<?php

/**
 * Cache Flusher Bundle for Symfony2
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 */

declare(strict_types=1);

namespace Mmoreram\CacheFlushBundle\DependencyInjection;

use Mmoreram\BaseBundle\DependencyInjection\BaseExtension;

/**
 * Class CacheFlushExtension.
 */
final class CacheFlushExtension extends BaseExtension
{
    /**
     * Returns the extension alias, same value as extension name.
     *
     * @return string The alias
     */
    public function getAlias()
    {
        return 'cache_flush';
    }

    /**
     * Get the Config file location.
     *
     * @return string
     */
    public function getConfigFilesLocation() : string
    {
        return __DIR__ . '/../Resources/config';
    }

    /**
     * Config files to load.
     *
     * return array(
     *      'file1.yml',
     *      'file2.yml',
     *      ...
     * );
     *
     * @param array $config Config
     *
     * @return array
     */
    public function getConfigFiles(array $config) : array
    {
        return [
            'services',
            'eventDispatchers',
        ];
    }
}
