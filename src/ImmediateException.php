<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace Cplugins\Hexception;

use App\Constants\ErrorCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;


/**
 * 一级异常 
 * “马上解决”，表示问题必须马上解决，否则系统根本无法达到预定的需求。
 * 系统空间不足
 * 连接超时
 * 内存泄漏
 * cookie, token 过期
 */
class ImmediateException extends ServerException
{
    public function __construct(int $code = 0, string $message = null, Throwable $previous = null)
    {
        if (is_null($message)) {
            $message = (new ErrorCode)->getMessage($code);
        }

        parent::__construct($message, $code, $previous);

        // 报警
        ExceptionAlert::alert($this);
    }
}
