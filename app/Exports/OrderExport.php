<?php

namespace App\Exports;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Facades\Excel;

class OrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
//     public function collection()
//     {
//         return Order::all();
//     }
//     public function exportOrder(){
//         return Excel::download(new OrderExport ,'sanpham.xlsx' );
//     }





public function collection()
{/////////join
    return DB::table('orders')
    ->join('customers', 'orders.customer_id', '=', 'customers.id')
    ->select('customers.name', 'orders.total','orders.created_at'
    )->get();
}
public function headings() :array
{
    ////////các cột của bảng excel
    return ["Tên Sản Phẩm", "Giá(VND)","Ngày mua"];
}
}
