<?php
/**
 * Slim Framework (https://slimframework.com)
 *
 * @link      https://github.com/slimphp/Slim
 * @copyright Copyright (c) 2011-2018 Josh Lockhart
 * @license   https://github.com/slimphp/Slim/blob/4.x/LICENSE.md (MIT License)
 */

declare(strict_types=1);

namespace Slim;

use Slim\Interfaces\CallableResolverInterface;

/**
 * A routable, middleware-aware object
 *
 * @package Slim
 * @since   3.0.0
 */
abstract class Routable
{
    /**
     * Route callable
     *
     * @var callable|string
     */
    protected $callable;

    /**
     * @var \Slim\Interfaces\CallableResolverInterface
     */
    protected $callableResolver;

    /**
     * Route middleware
     *
     * @var callable[]
     */
    protected $middleware = [];

    /**
     * Route pattern
     *
     * @var string
     */
    protected $pattern;

    /**
     * Get the middleware registered for the group
     *
     * @return callable[]
     */
    public function getMiddleware(): array
    {
        return $this->middleware;
    }

    /**
     * Get the route pattern
     *
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }

    /**
     * Set callable resolver
     *
     * @param CallableResolverInterface $resolver
     */
    public function setCallableResolver(CallableResolverInterface $resolver)
    {
        $this->callableResolver = $resolver;
    }

    /**
     * Get callable resolver
     *
     * @return CallableResolverInterface|null
     */
    public function getCallableResolver()
    {
        return $this->callableResolver;
    }

    /**
     * Prepend middleware to the middleware collection
     *
     * @param callable|string $callable The callback routine
     *
     * @return static
     */
    public function add($callable)
    {
        $this->middleware[] = new DeferredCallable($callable, $this->callableResolver);
        return $this;
    }

    /**
     * Set the route pattern
     *
     * @param string $newPattern
     */
    public function setPattern(string $newPattern)
    {
        $this->pattern = $newPattern;
    }
}
