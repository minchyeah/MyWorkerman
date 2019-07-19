<?php

namespace Timer;

use Timer\Base;

/**
 * 业务通用定时器
 * @author Minch<yeah@minch.me>
 * @since 2019-05-27
 */
class Tasktimer extends Base
{
	/**
	 * 执行定时任务
	 */
	public function trigger()
	{
	    if(!$this->getlock()){
	        return false;
	    }
		$minid = $j = 0;
		do{
			$now = time();
			$j += 1;
		}while ($j < 100);
		$this->unlock();
		$this->wait();
	}
}