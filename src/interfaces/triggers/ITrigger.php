<?php
namespace deflou\interfaces\triggers;

use deflou\interfaces\ICanBeDescribed;
use deflou\interfaces\services\activities\IServiceEvent;

/**
 * Interface ITrigger
 *
 * @package deflou\interfaces\triggers
 * @author deflou.dev@gmail.com
 */
interface ITrigger extends ICanBeDescribed
{
    const FIELD__SOURCE_SERVICE = 'source_service';
    const FIELD__DESTINATION_SERVICE = 'destination_service';

    const FIELD__SOURCE_EVENT = 'source_event';
    const FIELD__DESTINATION_ACTION = 'destination_action';

    const FIELD__EVENT_OPTIONS = 'event_options';
    const FIELD__ACTION_OPTIONS = 'action_options';

    const FIELD__USERS = 'users';
    const FIELD__CREATED = 'created';
    const FIELD__LAST_EXECUTION_TIME = 'last_execution_time';
    const FIELD__EXECUTIONS_COUNT = 'executions_count';

    /**
     * @param IServiceEvent $serviceEvent
     *
     * @return bool
     */
    public function isEventApplicable(IServiceEvent $serviceEvent): bool;

    /**
     * @return string
     */
    public function getSourceService(): string;

    /**
     * @return string
     */
    public function getDestinationService(): string;

    /**
     * @return string
     */
    public function getSourceEvent(): string;

    /**
     * @return string
     */
    public function getDestinationAction(): string;

    /**
     * @return array
     */
    public function getEventOptions(): array;

    /**
     * @return array
     */
    public function getActionOptions(): array;

    /**
     * @return array
     */
    public function getUsers(): array;

    /**
     * @param string $format
     *
     * @return string|\DateTime
     */
    public function getCreated($format = '');

    /**
     * @param string $format
     *
     * @return string|\DateTime
     */
    public function getLastExecutionTime($format = '');

    /**
     * @return int
     */
    public function getExecutionsCount(): int;

    /**
     * @param $serviceName
     *
     * @return $this
     */
    public function setSourceService($serviceName);

    /**
     * @param $serviceName
     *
     * @return $this
     */
    public function setDestinationService($serviceName);

    /**
     * @param $name
     *
     * @return $this
     */
    public function setSourceEvent($name);

    /**
     * @param $name
     *
     * @return $this
     */
    public function setDestinationAction($name);

    /**
     * @param $options
     *
     * @return $this
     */
    public function setEventOptions($options);

    /**
     * @param $options
     *
     * @return $this
     */
    public function setActionOptions($options);

    /**
     * @param $users
     *
     * @return $this
     */
    public function setUsers($users);

    /**
     * @param $timestamp
     *
     * @return $this
     */
    public function setCreated($timestamp);

    /**
     * @param $timestamp
     *
     * @return $this
     */
    public function setLastExecutionTime($timestamp);

    /**
     * @param $count
     *
     * @return $this
     */
    public function setExecutionsCount($count);

    /**
     * @param int $incStep
     *
     * @return $this
     */
    public function incExecutionCount($incStep = 1);
}
