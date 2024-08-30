<?php

declare(strict_types=1);

namespace Thiiagoms\ISP\Services;

class SoftCopiesOrderManagerService extends BaseOrderManagerService
{
    /**
     * @return object
     */
    public function process(): object
    {
        return (object) [
            'delivery' => 'Here is your download link',
            'paid' => round($this->total, 2)
        ];
    }
}
