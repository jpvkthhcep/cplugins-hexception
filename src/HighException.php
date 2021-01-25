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
 * 三级异常
 * “高度重视”，表示有时间就要马上解决，否则系统偏离需求较大或预定功能不能正常实现
 * 推送消息超过一定次数未成功
 * 程序报错超过一次次数
 */
class HighException extends ServerException
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
