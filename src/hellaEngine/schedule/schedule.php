<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/10
 * Time: 下午5:59
 */

namespace hellaEngine\schedule;

use Cron\CronExpression;
use hellaEngine\schedule\Exception\scheduleRunTimeException;

/**
 *
 * Class schedule
 * @package hellaEngine\schedule
 */
class schedule
{
    /**
     * @param $expression
     * @param \Closure $callback
     * @return bool
     */
    static function run($expression, \Closure $callback)
    {
        $cron = CronExpression::factory($expression);
        if ($cron->isDue()) {
            try {
                $callback();
            } catch (\Exception $e) {
                throw new scheduleRunTimeException();
            }

            return true;
        }
        return false;
    }
}