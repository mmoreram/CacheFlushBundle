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

namespace Mmoreram\CacheFlushBundle\EventDispatcher;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;

use Mmoreram\CacheFlushBundle\CacheFlushEvents;
use Mmoreram\CacheFlushBundle\Event\CacheFlushEvent;

/**
 * Class CacheFlusherEventDispatcher
 */
class CacheFlusherEventDispatcher
{
    /**
     * @var EventDispatcherInterface
     *
     * Event dispatcher
     */
    protected $eventDispatcher;

    /**
     * Constructor
     *
     * @param EventDispatcherInterface $eventDispatcher Event Dispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Dispatch event before cache flushing
     *
     * @return $this Self object
     */
    public function dispatchCachePreFlush()
    {
        $event = new CacheFlushEvent();
        $this
            ->eventDispatcher
            ->dispatch(
                CacheFlushEvents::PRE_CACHE_FLUSH_EVENT,
                $event
            );

        return $this;
    }

    /**
     * Dispatch event after cache flushing
     *
     * @return $this Self object
     */
    public function dispatchCacheOnFlush()
    {
        $event = new CacheFlushEvent();
        $this
            ->eventDispatcher
            ->dispatch(
                CacheFlushEvents::ON_CACHE_FLUSH_EVENT,
                $event
            );

        return $this;
    }
}
