<?php

namespace App\Http\Controllers;

use App\Prediction;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PredictionController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function getAll()
    {
        return Prediction::all();
    }

    public function create()
    {
        return Prediction::create([
            'ad_spend'        => $this->request->get('ad_spend'),
            'prediction_date' => date('Y-m-d', strtotime($this->request->get('date'))),
            'prediction'      => $this->request->get('prediction')
        ]);
    }

    public function delete()
    {
        Prediction::where('id',$this->request->get('id'))->delete();
    }

    public function getPredictionsByRange($startDate, $endDate)
    {
        $startDate = date('Y-m-d',strtotime($startDate));
        $endDate = date('Y-m-d',strtotime($endDate));
        $sql = "SELECT  AVG(prediction) as 'prediction' FROM predictions WHERE prediction_date BETWEEN '{$startDate}' AND '{$endDate}'";

        $result = \DB::select($sql);

        $prediction = 0;
        if (isset($result[0]->prediction)){
            $prediction = $result[0]->prediction;
        }
        return compact('prediction');
    }
}

