<?php
namespace deflou\interfaces\triggers\results;

/**
 * Interface ITriggerResult
 *
 * @package deflou\interfaces\triggers\results
 * @author deflou.dev@gmail.com
 */
interface ITriggerResult
{
    /**
     * ITriggerResult constructor.
     * @param int $status
     * @param string $message
     * @param mixed $data
     */
    public function __construct($status, $message, $data);

    /**
     * @return int
     */
    public function getStatus(): int;

    /**
     * @return string
     */
    public function getMessage(): string;

    /**
     * @return mixed
     */
    public function getData();
}
