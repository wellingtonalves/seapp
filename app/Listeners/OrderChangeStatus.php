<?php

namespace App\Listeners;

use App\Events\OrderCreateEvent;
use Domain\Features\Order\OrderComplete;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class OrderChangeStatus implements ShouldQueue
{
    use InteractsWithQueue;

    private OrderComplete $orderComplete;

    public function __construct(OrderComplete $orderComplete)
    {
        $this->orderComplete = $orderComplete;
    }

    /**
     * Handle the event.
     *
     * @param OrderCreateEvent $event
     * @return void
     * @throws Exception
     */
    public function handle(OrderCreateEvent $event)
    {
        try {
            Redis::funnel($event->order->id)->limit(1)->then(function () use ($event) {
                $this->orderComplete->handle($event->order);
            }, function () {
                $this->release(10);
            });
        } catch (Exception $exception) {
            Log::error('Erro ao finalizar o pedido', [$exception->getMessage()]);
            //Send notification to Client (emal, sms, etc)
        }
    }
}
