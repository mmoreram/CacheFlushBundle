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

namespace Mmoreram\CacheFlushBundle\Tests;

use Symfony\Component\HttpKernel\KernelInterface;

use Mmoreram\BaseBundle\Tests\BaseFunctionalTest;
use Mmoreram\BaseBundle\Tests\BaseKernel;
use Mmoreram\CacheFlushBundle\CacheFlushBundle;

/**
 * Class ClearTest.
 *
 * @runTestsInSeparateProcesses
 */
class CacheTest extends BaseFunctionalTest
{
    /**
     * Get kernel.
     *
     * @return KernelInterface
     */
    protected static function getKernel() : KernelInterface
    {
        return new BaseKernel([
            CacheFlushBundle::class,
        ]);
    }

    /**
     * test cache clear.
     */
    public function testCacheClearWithoutKernel()
    {
        $cacheFlusher = $this->get('cache_flusher');
        $this->assertTrue(
            is_dir(self::$kernel->getCacheDir())
        );

        $cacheFlusher->flushCache();

        $this->assertFalse(
            is_dir(self::$kernel->getCacheDir())
        );
    }

    /**
     * test cache clear.
     */
    public function testCacheClearWithKernel()
    {
        $cacheFlusher = $this->get('cache_flusher');
        $this->assertTrue(
            is_dir(self::$kernel->getCacheDir())
        );

        $cacheFlusher->flushCache(self::$kernel);

        $this->assertFalse(
            is_dir(self::$kernel->getCacheDir())
        );
    }
}
