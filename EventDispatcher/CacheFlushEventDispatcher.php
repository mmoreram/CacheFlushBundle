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

namespace Mmoreram\CacheFlushBundle\EventDispatcher;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpKernel\KernelInterface;

use Mmoreram\CacheFlushBundle\CacheFlushEvents;
use Mmoreram\CacheFlushBundle\Event\CacheFlushEvent;

/**
 * Class CacheFlushEventDispatcher.
 */
final class CacheFlushEventDispatcher
{
    /**
     * @var EventDispatcherInterface
     *
     * Event dispatcher
     */
    private $eventDispatcher;

    /**
     * Constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher Event Dispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Dispatch event before cache flushing.
     *
     * @var KernelInterface $kernel
     */
    public function dispatchCachePreFlush(KernelInterface $kernel)
    {
        $event = new CacheFlushEvent($kernel);
        $this
            ->eventDispatcher
            ->dispatch(
                CacheFlushEvents::PRE_CACHE_FLUSH_EVENT,
                $event
            );
    }

    /**
     * Dispatch event after cache flushing.
     *
     * @var KernelInterface $kernel
     */
    public function dispatchCacheOnFlush(KernelInterface $kernel)
    {
        $event = new CacheFlushEvent($kernel);
        $this
            ->eventDispatcher
            ->dispatch(
                CacheFlushEvents::ON_CACHE_FLUSH_EVENT,
                $event
            );
    }
}
