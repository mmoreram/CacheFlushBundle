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

namespace Mmoreram\CacheFlushBundle\Services;

use Mmoreram\CacheFlushBundle\EventDispatcher\CacheFlusherEventDispatcher;

/**
 * Class CacheFlusher
 */
class CacheFlusher
{
    /**
     * @var CacheFlusherEventDispatcher
     *
     * Event dispatcher
     */
    protected $eventDispatcher;

    /**
     * @var string
     *
     * Cache path
     */
    protected $cachePath;

    /**
     * Constructor
     *
     * @param CacheFlusherEventDispatcher $eventDispatcher Event dispatcher
     * @param string                      $cachePath       Cache path
     */
    public function __construct(
        CacheFlusherEventDispatcher $eventDispatcher,
        $cachePath
    )
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->cachePath = $cachePath;
    }

    /**
     * Flush all the cache
     *
     * @return $this Self object
     */
    public function flushCache()
    {
        $this
            ->eventDispatcher
            ->dispatchCachePreFlush();

        $this->deleteCache($this->cachePath);

        $this
            ->eventDispatcher
            ->dispatchCacheOnFlush();
    }

    /**
     * Delete folder
     *
     * @param string $path Path
     *
     * @return $this Self object
     */
    protected function deleteCache($path)
    {
        $files = glob($path . '/*');

        foreach ($files as $file) {

            is_dir($file)
                ? $this->deleteCache($file)
                : unlink($file);
        }
        rmdir($path);

        return;
    }
}
