<?php

declare(strict_types=1);

namespace Thiiagoms\ISP\Services;

use Thiiagoms\ISP\Contracts\OrderableContract;

abstract class BaseOrderManagerService implements OrderableContract
{
    /**
     * @var float
     */
    protected float $total;

    /**
     * @var string
     */
    protected string $deliveryMessage;

    /**
     * Init constructor
     *
     * @param array $items
     */
    public function __construct(protected array $items = [])
    {
    }

    /**
     * @return self
     */
    public function calculate(): self
    {
        $this->total = collect($this->items)->sum('price');
        return $this;
    }

    /**
     * @param float $discount
     * @return self
     */
    public function discount(float $discount = 0.02): self
    {
        $this->total -= $this->total * $discount;
        return $this;
    }

    /**
     * @return object
     */
    abstract public function process(): object;
}
