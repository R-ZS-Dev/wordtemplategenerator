<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Template;

class OrderController extends Controller
{
    public function create()
    {
        $templates = Template::all(); // Fetch all available templates
        return view('orders.create', compact('templates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email',
            'order_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'template_id' => 'required|exists:templates,id'
        ]);

        $order = Order::create($request->only(['customer_name', 'email', 'order_date', 'total_amount']));

        return redirect()->route('generate.word', ['orderId' => $order->id, 'templateId' => $request->template_id]);
    }
}
