<?php
/**
 * Slim Framework (https://slimframework.com)
 *
 * @link      https://github.com/slimphp/Slim
 * @copyright Copyright (c) 2011-2018 Josh Lockhart
 * @license   https://github.com/slimphp/Slim/blob/4.x/LICENSE.md (MIT License)
 */

declare(strict_types=1);

namespace Slim\Exception;

use Psr\Http\Message\ServerRequestInterface;
use Throwable;

/**
 * Class HttpSpecializedException
 * @package Slim\Exception
 */
abstract class HttpSpecializedException extends HttpException
{
    /**
     * HttpSpecializedException constructor.
     * @param ServerRequestInterface $request
     * @param string $message
     * @param Throwable|null $previous
     */
    public function __construct(ServerRequestInterface $request, string $message = '', Throwable $previous = null)
    {
        parent::__construct($request, $message, $this->code, $previous);
    }
}
