<?php

declare(strict_types=1);

namespace Thiiagoms\ISP\Services;

use Thiiagoms\ISP\Contracts\OrderableContract;

class OrderManagerService implements OrderableContract
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
     * @param integer $shipping
     * @return self
     */
    public function shipping(int $shipping): self
    {
        $this->total += $shipping;
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

    public function delivery(string $company): self
    {
        $this->deliveryMessage = "Your order will be delivered to {$company}";
        return $this;
    }

    /**
     * @return object
     */
    public function process(): object
    {
        return (object) [
            'delivery' => $this->deliveryMessage,
            'paid' => round($this->total, 2)
        ];
    }
}
