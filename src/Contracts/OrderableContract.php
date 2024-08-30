<?php

declare(strict_types=1);

namespace Thiiagoms\ISP\Contracts;

/**
 * Interface Orderable
 *
 * @package Thiiagoms\ISP\Contracts
 */
interface OrderableContract
{
    /**
     * @return self
     */
    public function calculate(): self;

    /**
     * @param integer $shipping
     * @return self
     */
    public function shipping(int $shipping): self;

    /**
     * @param float $discount
     * @return self
     */
    public function discount(float $discount): self;

    /**
     * @param string $company
     * @return self
     */
    public function delivery(string $company): self;

    /**
     * @return object
     */
    public function process(): object;
}
