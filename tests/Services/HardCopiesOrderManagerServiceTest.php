<?php

declare(strict_types=1);

namespace Thiiagoms\ISP\Tests\Services;

use PHPUnit\Framework\TestCase;
use Thiiagoms\ISP\Services\HardCopiesOrderManagerService;

class HardCopiesOrderManagerServiceTest extends TestCase
{
    public function testHardCopiesOrderManagerCanWorkoutAnOrder(): void
    {
        $items = [
            ['title' => 'test-book-1', 'price' => 2],
            ['title' => 'test-book-2', 'price' => 4],
            ['title' => 'test-book-3', 'price' => 6],
        ];

        $deliveryCompany = 'Fedex';

        /** @var HardCopiesOrderManagerService $orderManager */
        $orderManager = new HardCopiesOrderManagerService($items);

        $deliveryMessage = "Your order will be delivered to {$deliveryCompany}";

        $processOrder = $orderManager
            ->calculate()
            ->discount()
            ->shipping(5)
            ->delivery($deliveryCompany)
            ->process();

        $this->assertSame(16.76, $processOrder->paid);
        $this->assertSame($deliveryMessage, $processOrder->delivery);
    }
}
