<?php

namespace Thiiagoms\ISP\Tests\Services;

use PHPUnit\Framework\TestCase;
use Thiiagoms\ISP\Services\SoftCopiesOrderManagerService;

class SoftCopiesOrderManagerServiceTest extends TestCase
{
    public function testSoftCopiesOrderManagerCanWorkoutAnOrder(): void
    {
        $items = [
            ['title' => 'test-book-1', 'price' => 2],
            ['title' => 'test-book-2', 'price' => 4],
            ['title' => 'test-book-3', 'price' => 6],
        ];

        $deliveryMessage = 'Here is your download link';

        $orderManager = new SoftCopiesOrderManagerService($items);

        $processedOrder = $orderManager
            ->calculate()
            ->discount()
            ->process();

        $this->assertSame(11.76, $processedOrder->paid);
        $this->assertSame($deliveryMessage, $processedOrder->delivery);
    }
}
