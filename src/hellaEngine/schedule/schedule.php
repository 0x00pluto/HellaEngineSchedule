<?php
/**
 * Created by PhpStorm.
 * User: zhipeng
 * Date: 16/8/10
 * Time: 下午5:59
 */

namespace hellaEngine\schedule;

use Cron\CronExpression;

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
     * @throws \Exception
     */
    static function run($expression, \Closure $callback)
    {
        $cron = CronExpression::factory($expression);
        if ($cron->isDue()) {
            try {
                $callback();
            } catch (\Exception $e) {
                throw $e;
            }

            return true;
        }
        return false;
    }
}