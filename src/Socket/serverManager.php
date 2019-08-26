<?php


namespace Socket;

/**
 * 
 * Class serverManager
 * @package Socket
 * @method onConnect
 * @method onMessage
 * @method onClose
 * @method start
 */
class serverManager
{
    const DRIVER = [
        'workerman' => \Socket\workermanServer::class,
        'swoole' => \Socket\swooleServer::class,
    ];

    public function __construct()
    {
        return new (self::DRIVER['workerman']);
    }

}