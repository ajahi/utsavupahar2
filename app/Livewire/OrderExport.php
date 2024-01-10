<?php

namespace App\Livewire;

use App\Exports\OrdersExport;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class OrderExport extends Component
{
    public function export($format)
    {
        if ($format === 'csv')
            return Excel::download(new OrdersExport, 'orders.csv', \Maatwebsite\Excel\Excel::CSV);
        else if ($format === 'pdf') {
            $pdf = Pdf::loadView('exports.order.index', ['orders' => Order::all()]);
            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->stream();
            }, 'orders.pdf');
        }
    }
    public function render()
    {
        return view('livewire.order-export');
    }
}
