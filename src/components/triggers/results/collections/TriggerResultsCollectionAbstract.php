<?php
namespace deflou\components\triggers\results\collections;

use deflou\interfaces\triggers\results\collections\ITriggerResultsCollection;
use deflou\interfaces\triggers\results\ITriggerResult;

/**
 * Class TriggerResultsCollectionAbstract
 *
 * @package deflou\components\triggers\results\collections
 * @author deflou.dev@gmail.com
 */
abstract class TriggerResultsCollectionAbstract implements ITriggerResultsCollection
{
    /**
     * @var ITriggerResult[]
     */
    protected $results = [];

    /**
     * @param ITriggerResult $triggerResult
     *
     * @return $this
     */
    public function addResult($triggerResult)
    {
        $this->results[] = $triggerResult;

        return $this;
    }
}
