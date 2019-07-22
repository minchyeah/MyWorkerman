<?php

namespace Timer\Common;

use Timer\Base;
use Library\Huobi;

/**
 * 业务通用定时器
 * @author Minch<yeah@minch.me>
 * @since 2019-05-27
 */
class Symbols extends Base
{
	/**
	 * 执行定时任务
	 */
	public function trigger()
	{
	    if(!$this->getlock()){
	        return false;
	    }
	    try{
	    	$symbols = $this->huobi->symbols();
	    	$this->globaldata->add('symbols', $symbols);
	    } catch (Exception $e) {
            return false;
        }
		$this->unlock();
		$this->wait();
	}
}