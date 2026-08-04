<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $statusFilter = '';
    public bool $isDetailsOpen = false;
    public ?Order $selectedOrder = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'statusFilter' => ['except' => ''],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatusFilter(): void
    {
        $this->resetPage();
    }

    public function viewDetails(int $orderId): void
    {
        $this->selectedOrder = Order::with('items')->findOrFail($orderId);
        $this->isDetailsOpen = true;
    }

    public function closeDetails(): void
    {
        $this->isDetailsOpen = false;
        $this->selectedOrder = null;
    }

    public function updateStatus(int $orderId, string $status): void
    {
        $order = Order::findOrFail($orderId);
        $order->status = $status;
        $order->save();
        
        session()->flash('success', "Order {$order->order_number} status updated to " . ucfirst($status) . "!");
        
        if ($this->selectedOrder && $this->selectedOrder->id === $orderId) {
            $this->selectedOrder = Order::with('items')->findOrFail($orderId);
        }
    }

    public function render()
    {
        $orders = Order::query()
            ->when(!empty($this->search), function($q) {
                $q->where('order_number', 'like', '%' . $this->search . '%')
                  ->orWhere('customer_name', 'like', '%' . $this->search . '%')
                  ->orWhere('customer_phone', 'like', '%' . $this->search . '%');
            })
            ->when(!empty($this->statusFilter), function($q) {
                $q->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.order-list', [
            'orders' => $orders,
        ])->layout('components.layouts.admin', ['header' => 'Order Management']);
    }
}
