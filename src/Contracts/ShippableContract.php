<?php

declare(strict_types=1);

namespace Thiiagoms\ISP\Contracts;

interface ShippableContract
{
    /**
     * @param string $company
     * @return self
     */
    public function delivery(string $company): self;

    /**
     * @param integer $shipping
     * @return self
     */
    public function shipping(int $shipping): self;
}
