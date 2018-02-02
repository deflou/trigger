<?php
namespace deflou\interfaces\triggers\events;

/**
 * Interface ITriggerEvent
 *
 * @package deflou\components\triggers\events
 * @author deflou.dev@gmail.com
 */
interface ITriggerEvent
{
    const FIELD__SERVICE_NAME = 'service';
    const FIELD__EVENT_NAME = 'event';
    const FIELD__DATA = 'data';

    /**
     * @return string
     */
    public function getServiceName(): string;

    /**
     * @return string
     */
    public function getEventName(): string;

    /**
     * @return mixed
     */
    public function getData();
}
