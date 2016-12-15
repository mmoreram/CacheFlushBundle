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

namespace Mmoreram\CacheFlushBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * Class CacheFlushEvent.
 */
final class CacheFlushEvent extends Event
{
    /**
     * @var KernelInterface
     *
     * Kernel
     */
    private $kernel;

    /**
     * CacheFlushEvent constructor.
     *
     * @param KernelInterface $kernel
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * Get Kernel.
     *
     * @return KernelInterface
     */
    public function getKernel() : KernelInterface
    {
        return $this->kernel;
    }
}
