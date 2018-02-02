<?php
namespace deflou\components\triggers\events;

use deflou\interfaces\triggers\events\ITriggerEvent;

/**
 * Class TriggerEventAbstract
 *
 * @package deflou\components\triggers\events
 * @author deflou.dev@gmail.com
 */
class TriggerEventAbstract implements ITriggerEvent
{
    /**
     * @var array
     */
    protected $event = [];

    /**
     * TriggerEventAbstract constructor.
     * @param array $event
     */
    public function __construct(array $event)
    {
        $this->event = $event;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->event[static::FIELD__SERVICE_NAME] ?? '';
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->event[static::FIELD__EVENT_NAME] ?? '';
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->event[static::FIELD__DATA] ?? $this->event;
    }
}
