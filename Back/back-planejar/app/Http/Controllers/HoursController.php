<?php

namespace App\Http\Controllers;

use App\Models\Hours;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHoursRequest;
use App\Http\Requests\UpdateHoursRequest;
use Illuminate\Http\Request;
use App\Rules\TimestampComparisonRule;

class HoursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {           
        $d1 = $request->input('d1');
        $d2 = $request->input('d2');

        if ($d2 < $d1) {
            return 'A data de entrada não pode ser antes da de saída.';
        } elseif($d2 == $d1) {
            return 'A hora de entrada é a mesma da saída.';
        //} elseif($d2 - $d1 ) {
        } else {
        
            echo "val";
        }
    
        return response()->json(['d1' => $d1, 'd2' => $d2]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHoursRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Hours $hours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hours $hours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHoursRequest $request, Hours $hours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hours $hours)
    {
        //
    }
}
