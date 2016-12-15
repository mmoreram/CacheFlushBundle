# Cache Flush Bundle

[![Build Status](https://travis-ci.org/mmoreram/CacheFlushBundle.png?branch=master)](https://travis-ci.org/mmoreram/CacheFlushBundle)

-----

Flush all your kernel content with a simple Symfony service.

``` php
$this
    ->container
    ->get('cache_flusher')
    ->flushCache()
```

by default the service will flush the cache of the kernel loaded in the
framework, but you can explicitly flush one kernel's cache by passing the kernel
as the first and unique method's parameter.

``` php
$myOtherKernel = //
$this
    ->container
    ->get('cache_flusher')
    ->flushCache($myOtherKernel)
```

You can inject the service as well.

``` yaml
my_service:
    class: MyService\Namespace
    arguments:
        '@cache_flusher'
```

The service dispatches as well two events, one just before flush the kernel's
cache, and another one just after. In both cases, an instance of 
`CacheFlushEvent` is dispatched, with the used kernel inside.

```
my_event_listener:
    class: MyEventListener\Namespace
    tags:
        - { name: kernel.event_listener, event: cache.pre_flush }
        - { name: kernel.event_listener, event: cache.on_flush }
```