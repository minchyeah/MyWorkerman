<?php

namespace Library;

use Library\Http;

/**
 * Huobi类库
 * @since 2019-07-19
 */
class Huobi 
{
	/**
	 * 接口地址
	 */
	protected $host = 'https://api.huobi.pro/';

    /*
     * 获取所有币种
     * @return array 获取的信息
     **/
	public function currencys()
	{
		$url = $this->host . 'v1/common/currencys';
		$data = Http::get($url);
		$array = json_decode($data, true);
		unset($data);
		return $array['data'];
	}
	
	/*
     * 获取所有交易对
     * @return  array 获取的信息
     **/
	public function symbols()
	{
		$url = $this->host . 'v1/common/symbols';
		$data = Http::get($url);
		$array = json_decode($data, true);
		unset($data);
		return $array['data'];
	}
} 