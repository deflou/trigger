<?php
namespace deflou\components\triggers;

use deflou\components\triggers\options\TriggerEventOptionBase;
use deflou\interfaces\services\activities\IServiceEvent;
use deflou\interfaces\triggers\ITrigger;

/**
 * Class TriggerAbstract
 *
 * @package deflou\components\triggers
 * @author deflou.dev@gmail.com
 */
class TriggerAbstract implements ITrigger
{
    /**
     * @var mixed
     */
    protected $model = null;

    /**
     * TriggerAbstract constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->getAttribute(static::NAME);
    }

    /**
     * @param string $name
     *
     * @return TriggerAbstract
     */
    public function setName($name)
    {
        return $this->setAttribute(static::NAME, $name);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getAttribute(static::TITLE);
    }

    /**
     * @param string $title
     *
     * @return TriggerAbstract
     */
    public function setTitle($title)
    {
        return $this->setAttribute(static::TITLE, $title);
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getAttribute(static::DESCRIPTION);
    }

    /**
     * @param string $description
     *
     * @return TriggerAbstract
     */
    public function setDescription($description)
    {
        return $this->setAttribute(static::DESCRIPTION, $description);
    }

    /**
     * @return string
     */
    public function getSourceService(): string
    {
        return $this->getAttribute(static::FIELD__SOURCE_SERVICE);
    }

    /**
     * @param string $serviceName
     *
     * @return TriggerAbstract
     */
    public function setSourceService($serviceName)
    {
        return $this->setAttribute(static::FIELD__SOURCE_SERVICE, $serviceName);
    }

    /**
     * @return string
     */
    public function getDestinationService(): string
    {
        return $this->getAttribute(static::FIELD__DESTINATION_SERVICE);
    }

    /**
     * @param string $serviceName
     *
     * @return TriggerAbstract
     */
    public function setDestinationService($serviceName)
    {
        return $this->setAttribute(static::FIELD__DESTINATION_SERVICE, $serviceName);
    }

    /**
     * @return string
     */
    public function getSourceEvent(): string
    {
        return $this->getAttribute(static::FIELD__SOURCE_EVENT);
    }

    /**
     * @param string $name
     *
     * @return TriggerAbstract
     */
    public function setSourceEvent($name)
    {
        return $this->setAttribute(static::FIELD__SOURCE_EVENT, $name);
    }

    /**
     * @return string
     */
    public function getDestinationAction(): string
    {
        return $this->getAttribute(static::FIELD__DESTINATION_ACTION);
    }

    /**
     * @param string $name
     *
     * @return TriggerAbstract
     */
    public function setDestinationAction($name)
    {
        return $this->setAttribute(static::FIELD__DESTINATION_ACTION, $name);
    }

    /**
     * @return array
     */
    public function getEventOptions(): array
    {
        return $this->getAttribute(static::FIELD__EVENT_OPTIONS);
    }

    /**
     * @param array $options
     *
     * @return TriggerAbstract
     */
    public function setEventOptions($options)
    {
        return $this->setAttribute(static::FIELD__EVENT_OPTIONS, $options);
    }

    /**
     * @return array
     */
    public function getActionOptions(): array
    {
        return $this->getAttribute(static::FIELD__ACTION_OPTIONS);
    }

    /**
     * @param array $options
     *
     * @return TriggerAbstract
     */
    public function setActionOptions($options)
    {
        return $this->setAttribute(static::FIELD__ACTION_OPTIONS, $options);
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->getAttribute(static::FIELD__USERS);
    }

    /**
     * @param array $users
     *
     * @return TriggerAbstract
     */
    public function setUsers($users)
    {
        return $this->setAttribute(static::FIELD__USERS, $users);
    }

    /**
     * @param string $format
     *
     * @return \DateTime|false|string
     */
    public function getCreated($format = '')
    {
        $created = $this->getAttribute(static::FIELD__CREATED);

        return $format ? date($format, $created) : new \DateTime($created);
    }

    /**
     * @param int $timestamp
     *
     * @return TriggerAbstract
     */
    public function setCreated($timestamp)
    {
        return $this->setAttribute(static::FIELD__CREATED, $timestamp);
    }

    /**
     * @param string $format
     *
     * @return \DateTime|false|string
     */
    public function getLastExecutionTime($format = '')
    {
        $time = $this->getAttribute(static::FIELD__LAST_EXECUTION_TIME);

        return $format ? date($format, $time) : new \DateTime($time);
    }

    /**
     * @param int $timestamp
     *
     * @return TriggerAbstract
     */
    public function setLastExecutionTime($timestamp)
    {
        return $this->setAttribute(static::FIELD__LAST_EXECUTION_TIME, $timestamp);
    }

    /**
     * @return int
     */
    public function getExecutionsCount(): int
    {
        return $this->getAttribute(static::FIELD__EXECUTIONS_COUNT);
    }

    /**
     * @param int $count
     *
     * @return TriggerAbstract
     */
    public function setExecutionsCount($count)
    {
        return $this->setAttribute(static::FIELD__EXECUTIONS_COUNT, $count);
    }

    /**
     * @param int $incStep
     *
     * @return TriggerAbstract
     */
    public function incExecutionCount($incStep = 1)
    {
        return $this->setExecutionsCount($this->getExecutionsCount() + $incStep);
    }

    /**
     * @return string
     */
    public function describe()
    {
        return $this->getDescription();
    }

    /**
     * @param IServiceEvent $serviceEvent
     *
     * @return bool
     * @throws \Exception
     */
    public function isEventApplicable(IServiceEvent $serviceEvent): bool
    {
        $triggerEventOptions = $this->getEventOptions();
        $applicable = true;

        foreach ($triggerEventOptions as $name => $option) {
            /**
             * Apply two formats:
             * 1. [name, eq, value]
             * 2. name => [eq, value]
             */
            if (count($option) == 2) {
                array_unshift($option, $name);
            }
            $triggerEventOption = new TriggerEventOptionBase($option);

            if ($serviceEvent->hasParameter($triggerEventOption->getName())) {
                $parameter = $serviceEvent->getParameter($triggerEventOption->getName());

                if (!$parameter->hasCompare($triggerEventOption->getCompare())) {
                    throw new \Exception('Unknown compare "' . $triggerEventOption->getCompare() . '"');
                }

                $compare = $parameter->getCompare($triggerEventOption->getCompare());
                $compareAgent = $compare->getInstance();
                $apply = $compareAgent->compare(
                    $parameter->getValue(),
                    $triggerEventOption->getValue(),
                    $compare->getName()
                );

                if (!$apply) {
                    $applicable = false;
                    break;
                }
            }
        }

        return $applicable;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    abstract protected function getAttribute($name);

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    abstract protected function setAttribute($name, $value);
}
