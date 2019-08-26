<?php


namespace Socket;
use Socket\serverInterface;
use Workerman\Worker;


class workermanServer implements serverInterface
{
    protected $connector;

    protected $connections = [
        'protocal' => 'websocket',
        'host' => '127.0.0.1',
        'port' => '9502',
    ];

    public function __construct(array $connections = [])
    {
        $connections = array_merge($this->connections, $connections);
//        $this->connector = new Worker("websocket://0.0.0.0:2346");
        $this->connector = new Worker($this->parseDsn());
    }
    
    protected function parseDsn() {
        return $this->connections['protocal'] . '//' . $this->connections['host'] . ':' . $this->connections['port'];
    }

    public function setWorker(int $processes) {
        $this->connector->count = $processes;
    }

    public function onConnect(callable $callback)
    {
        // TODO: Implement onConnect() method.
        $this->connector->onConnect = $callback;
    }

    public function onMessage(callable $callback)
    {
        // TODO: Implement onMessage() method.
        $this->connector->onMessage = $callback;
    }

    public function onClose(callable $callback)
    {
        // TODO: Implement onClose() method.
        $this->connector->onClose = $callback;
    }

    public function start()
    {
        // TODO: Implement start() method.
        Worker::runAll();
    }
}