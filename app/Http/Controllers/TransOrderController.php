<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Type_of_service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Transaksi';
        $orders = Order::with('customer')->get(); //query untuk mengambil data relasi dengan table customer
        return view('order.index', compact('title', 'orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah Transaksi";
        $order = Order::get()->last();
        $id_order = $order->id ?? '';
        $id_order++;
        $order_code = "L" . "-" . date('dmY') . "/" . sprintf("%03s", $id_order);
        $customers = Customers::get();
        $services = Type_of_service::get();
        return view('order.create', compact('title', 'order_code', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        // return $order;
        foreach ($request->id_service as $key => $val) {
            OrderDetail::create([
                'id_order' => $order->id,
                'id_service' => $request->id_service[$key],
                'price_service' => $request->id_service[$key],
                'qty' => $request->qty[$key],
                'subtotal' => $request->subtotal[$key]
            ]); //mengirim data ke table order detail
        }
        Alert::success('Yeayyy', 'Data Berhasil Ditambahkan');
        return redirect()->to('trans_order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Customer';
        $DataCustomer = Customers::findorFail($id);
        return view('customer.edit', compact('title', 'DataCustomer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customers::findorFail($id);
        $customer->customer_name = $request->customer_name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        Alert::success('Yeayyy', 'Data Berhasil Diubah');
        return redirect()->to('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customers::findorFail($id)->delete();
        Alert::success('Yeayyy', 'Data Berhasil Dihapus');
        return redirect()->to('customer');
    }

    public function getPaket($id_paket)
    {
        $pakets = Type_of_service::find($id_paket);
        return response()->json($pakets);
    }
}
