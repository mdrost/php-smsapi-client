<?php declare(strict_types=1);

namespace Smsapi\Client\Resource\Sms;

use ApiClients\Foundation\Hydrator\Annotations\EmptyResource;
use ApiClients\Foundation\Resource\AbstractResource;

/**
 * @EmptyResource("Sms\EmptyStatus")
 */
abstract class Status extends AbstractResource implements StatusInterface
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var float
     */
    protected $points;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string|null
     */
    protected $idx;

    /**
     * @return string
     */
    public function id() : string
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function points() : float
    {
        return $this->points;
    }

    /**
     * @return string
     */
    public function number() : string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function status() : string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function idx()
    {
        return $this->idx;
    }
}
