<?php
namespace deflou\interfaces\triggers\repositories;

use deflou\interfaces\services\activities\IServiceEvent;
use deflou\interfaces\triggers\ITrigger;
use deflou\interfaces\users\identities\IUserIdentity;

interface ITriggersRepository
{
    /**
     * @param mixed $where
     *
     * @return $this
     */
    public function find($where);

    /**
     * @return ITrigger|null
     */
    public function one();

    /**
     * @return ITrigger[]
     */
    public function all();

    /**
     * @param ITrigger $trigger
     *
     * @return bool
     */
    public function create($trigger): bool;

    /**
     * @param ITrigger $trigger
     *
     * @return bool
     */
    public function update($trigger);

    /**
     * @param ITrigger $trigger
     *
     * @return bool
     */
    public function delete($trigger): bool;

    /**
     * @param IServiceEvent $serviceEvent
     * @param IUserIdentity $userIdentity
     *
     * @return ITrigger[]
     */
    public function identifyTriggersByServiceEvent(IServiceEvent $serviceEvent, IUserIdentity $userIdentity);
}
