<?php

declare(strict_types=1);

namespace Thiiagoms\ISP\Services;

use Thiiagoms\ISP\Contracts\ShippableContract;

class HardCopiesOrderManagerService extends BaseOrderManagerService implements ShippableContract
{
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
     * @param string $company
     * @return self
     */
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
