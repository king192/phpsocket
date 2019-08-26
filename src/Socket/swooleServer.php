<?php


namespace Socket;


class swooleServer implements serverInterface
{

    protected $connector;
    
    protected $connections = [
        'host' => '127.0.0.1',
        'port' => '9502',
    ];

    public function __construct(array $connections = [])
    {
        $connections = array_merge($this->connections, $connections);
        $this->connector = new \swoole_websocket_server($connections['host'], $connections['port']);
    }

    public function onConnect(callable $callback)
    {
        // TODO: Implement onConnect() method.
        $this->connector->on('open', $callback);
    }

    public function onMessage(callable $callback)
    {
        // TODO: Implement onMessage() method.
        $this->connector->on('message', $callback);
    }

    public function onClose(callable $callback)
    {
        // TODO: Implement onClose() method.
        $this->connector->on('close', $callback);
    }

    public function start()
    {
        // TODO: Implement start() method.
        $this->connector->start();
    }

}