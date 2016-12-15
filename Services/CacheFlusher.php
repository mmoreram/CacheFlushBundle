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

namespace Mmoreram\CacheFlushBundle\Services;

use Symfony\Component\HttpKernel\KernelInterface;

use Mmoreram\CacheFlushBundle\EventDispatcher\CacheFlushEventDispatcher;

/**
 * Class CacheFlusher.
 */
final class CacheFlusher
{
    /**
     * @var CacheFlushEventDispatcher
     *
     * Event dispatcher
     */
    private $eventDispatcher;

    /**
     * @var KernelInterface
     *
     * Kernel
     */
    private $kernel;

    /**
     * Constructor.
     *
     * @param CacheFlushEventDispatcher $eventDispatcher
     * @param KernelInterface           $kernel
     */
    public function __construct(
        CacheFlushEventDispatcher $eventDispatcher,
        KernelInterface $kernel
    ) {
        $this->eventDispatcher = $eventDispatcher;
        $this->kernel = $kernel;
    }

    /**
     * Flush all the cache.
     *
     * @param KernelInterface $kernel
     */
    public function flushCache(KernelInterface $kernel = null)
    {
        $kernel = $kernel ?? $this->kernel;

        $this
            ->eventDispatcher
            ->dispatchCachePreFlush(
                $kernel
            );

        $this->deleteCache($kernel->getCacheDir());

        $this
            ->eventDispatcher
            ->dispatchCacheOnFlush(
                $kernel
            );
    }

    /**
     * Delete folder.
     *
     * @param string $path
     */
    private function deleteCache($path)
    {
        $files = glob($path . '/*');

        foreach ($files as $file) {
            is_dir($file)
                ? $this->deleteCache($file)
                : unlink($file);
        }
        rmdir($path);
    }
}
