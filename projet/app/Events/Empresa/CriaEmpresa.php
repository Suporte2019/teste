<?php

namespace App\Events\Empresa;

use App\Models\wsim\Administracao\Empresa;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CriaEmpresa
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

      private $empresa;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;

        
    }

    public function empresa()
    {
        return $this->empresa;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
