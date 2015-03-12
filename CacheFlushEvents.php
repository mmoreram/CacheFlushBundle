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

namespace Mmoreram\CacheFlushBundle;

/**
 * Class CacheFlushEvents
 */
final class CacheFlushEvents
{
    /**
     * @var string
     *
     * Pre Cache flush event
     */
    const PRE_CACHE_FLUSH_EVENT = 'cache.pre_flush';

    /**
     * @var string
     *
     * On Cache flush event
     */
    const ON_CACHE_FLUSH_EVENT = 'cache.on_flush';
}
