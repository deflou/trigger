<?php
namespace deflou\interfaces\triggers\options;

/**
 * Interface ITriggerEventOption
 *
 * @package deflou\interfaces\triggers\options
 * @author aivanov@fix.ru
 */
interface ITriggerEventOption
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getCompare(): string;

    /**
     * @return mixed
     */
    public function getValue();
}
