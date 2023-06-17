<?php

namespace Tests\Unit;

use App\Repositories\OrderRepositoryInterface;
use App\Services\OrderService;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class OrderServiceTest extends TestCase
{
    /** @var OrderRepositoryInterface|MockObject */
    private $orderRepositoryMock;

    /** @var OrderService */
    private $orderService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->orderRepositoryMock = $this->createMock(OrderRepositoryInterface::class);
        $this->orderService = new OrderService($this->orderRepositoryMock);
    }

    public function testGetPendingOrderCount()
    {
        $this->orderRepositoryMock
            ->expects($this->once())
            ->method('getCountByStatus')
            ->with('pending')
            ->willReturn(10);

        $result = $this->orderService->getPendingOrderCount();

        $this->assertIsInt($result);
        $this->assertEquals(10, $result);
    }

    public function testGetInProgressOrderCount()
    {
        $this->orderRepositoryMock
            ->expects($this->once())
            ->method('getCountByStatus')
            ->with('progress')
            ->willReturn(5);

        $result = $this->orderService->getInProgressOrderCount();

        $this->assertIsInt($result);
        $this->assertEquals(5, $result);
    }

    public function testGetCompletedOrderCount()
    {
        $this->orderRepositoryMock
            ->expects($this->once())
            ->method('getCountByStatus')
            ->with('completed')
            ->willReturn(3);

        $result = $this->orderService->getCompletedOrderCount();

        $this->assertIsInt($result);
        $this->assertEquals(3, $result);
    }
}
