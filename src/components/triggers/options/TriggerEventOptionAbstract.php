<?php
namespace deflou\components\triggers\options;

use deflou\interfaces\triggers\options\ITriggerEventOption;

/**
 * Class TriggerEventOptionAbstract
 *
 * @package deflou\components\triggers\options
 * @author aivanov@fix.ru
 */
class TriggerEventOptionAbstract implements ITriggerEventOption
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $compare = '';

    /**
     * @var mixed
     */
    protected $value = null;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCompare(): string
    {
        return $this->compare;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}
