<?php
namespace Socket;

interface serverInterface
{
    public function onConnect(callable $callback);
    
    public function onMessage(callable $callback);
    
    public function onClose(callable $callback);
    
    public function start();
}