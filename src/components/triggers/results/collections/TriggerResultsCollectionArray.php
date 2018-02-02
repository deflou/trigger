<?php
namespace deflou\components\triggers\results\collections;

/**
 * Class TriggerResultsCollectionArray
 *
 * @package deflou\components\triggers\results\collections
 * @author deflou.dev@gmail.com
 */
class TriggerResultsCollectionArray extends TriggerResultsCollectionAbstract
{
    /**
     * @return array
     */
    public function getResults()
    {
        $result = [];

        foreach ($this->results as $triggerResult) {
            $result[] = [
                $triggerResult->getStatus(),
                $triggerResult->getMessage(),
                $triggerResult->getData()
            ];
        }

        return $result;
    }
}
