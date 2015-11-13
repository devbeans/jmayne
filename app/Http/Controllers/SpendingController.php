<?php

namespace App\Http\Controllers;

use App\Spending;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SpendingController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getAll()
    {
        return Spending::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Spending::create($this->request->only('spending','sold'));
    }

    public function delete()
    {
        Spending::where('id',$this->request->get('id'))->delete();
    }

    public function getCalculatedRate()
    {
        $result = \DB::select("SELECT  SUM(sold) / SUM(spending) as 'rate' FROM spendings");

        $rate = 0;
        if (isset($result[0]->rate)){
            $rate = $result[0]->rate;
        }

        return compact('rate');
    }
}
