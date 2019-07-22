<?php

namespace Timer\Common;

use Timer\Base;
use Library\Huobi;

/**
 * 定时任更新所有交易对
 * @author Minch<yeah@minch.me>
 * @since 2019-05-27
 */
class Symbols extends Base
{
	/**
	 * 定时任更新所有交易对
	 */
	public function trigger()
	{
	    if(!$this->getlock()){
	        return false;
	    }
	    $interval = 0;
	    try{
	    	$symbols = $this->huobi->symbols();
	    	if(is_array($symbols) && !empty($symbols)){
	    		$data = array();
	    		foreach ($symbols as $key => $val) {
	    			$data[$val['symbol']] = $val;
	    		}
	    		unset($symbols, $key, $val);
		    	$this->globaldata->symbols = $data;
		    	$interval = 600;
	    	}
	    } catch (Exception $e) {
            return false;
        }
		$this->unlock();
		$this->wait($interval);
	}
}