<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        $validateData = $request->validate([
            'id'          => 'required',
            'set_status'  => 'required|in:finished,accepted'
        ]);

        $orderDetail->delivered_status  = $request->set_status;
        if($orderDetail->save()){
            return back();
        }
        
        return back()->withErrors(['error' => 'خطایی رخ داده است!']);
    }
    
}
