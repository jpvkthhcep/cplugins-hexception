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
 * 二次异常
 * “急需解决”，表示问题的修复很紧要，很急迫，关系到系统的主要功能模块能否正常。
 * 功能提交失败
 */
class UrgentException extends ServerException
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
