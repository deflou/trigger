<?php
namespace deflou\interfaces\triggers\results\collections;

use deflou\interfaces\triggers\results\ITriggerResult;

/**
 * Interface ITriggerResultsCollection
 *
 * @package deflou\interfaces\triggers\results\collections
 * @author deflou.dev@gmail.com
 */
interface ITriggerResultsCollection
{
    /**
     * @param ITriggerResult $triggerResult
     *
     * @return $this
     */
    public function addResult($triggerResult);

    /**
     * @return mixed
     */
    public function getResults();
}
