<?php
namespace deflou\components\triggers\results;

use deflou\interfaces\triggers\results\ITriggerResult;

/**
 * Class TriggerResultAbstract
 *
 * @package deflou\components\triggers\results
 * @author deflou.dev@gmail.com
 */
abstract class TriggerResultAbstract implements ITriggerResult
{
    /**
     * @var int
     */
    protected $status = 0;

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var mixed|null
     */
    protected $data = null;

    /**
     * TriggerResultAbstract constructor.
     * @param int $status
     * @param string $message
     * @param mixed $data
     */
    public function __construct($status, $message, $data)
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
}
