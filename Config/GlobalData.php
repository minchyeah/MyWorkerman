<?php

namespace Config;

/**
 * GlobalData变量共享组件配置
 * @author minch
 */
class GlobalData
{
    
    /**
     * 监听的ip地址，分布式部署时使用内网ip
     * @var string
     */
    public static $address = '127.0.0.1';
    
    /**
     * 网关监听端口
     * @var number
     */
    public static $port = 12207;
}
