<?php
namespace deflou\components\triggers\options;

/**
 * Class TriggerEventOptionBase
 *
 * @package deflou\components\triggers\options
 * @author deflou.dev@gmail.com
 */
class TriggerEventOptionBase extends TriggerEventOptionAbstract
{
    /**
     * TriggerEventOptionBase constructor.
     * @param $option
     */
    public function __construct($option)
    {
        list($this->name, $this->compare, $this->value) = $option;
    }
}
