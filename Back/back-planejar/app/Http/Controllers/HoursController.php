<?php

namespace App\Http\Controllers;

use App\Models\Hours;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHoursRequest;
use App\Http\Requests\UpdateHoursRequest;
use Illuminate\Http\Request;
use App\Rules\TimestampComparisonRule;
use Carbon\Carbon;

class HoursController extends Controller
{
    
    public function index(Request $request)
    {           
        $d1 = $request->input('d1');
        $d2 = $request->input('d2');
        $dateTime1 = Carbon::parse($d1);
        $dateTime2 = Carbon::parse($d2);

        if ($d2 < $d1) {
            return 'A data de entrada não pode ser antes da de saída.';
        } elseif($d2 == $d1) {
            return 'A hora de entrada é a mesma da saída.';
        } elseif($dateTime1->diffInMinutes($dateTime2) > 1440) {
            return 'O expediente não pode passar de 24h';
        } else {
            $startRange = Carbon::parse('5:00');
        $endRange = Carbon::parse('21:59');

        $startTime = Carbon::parse($d1);
        $endTime = Carbon::parse($d2);

        $totalMinutes = 0;

        while ($startTime < $endTime) {
            if ($startTime->between($startRange, $endRange)) {
                // If the current time is between 5:00 and 17:00
                $totalMinutes++;
            }

            $startTime->addMinute(); // Move to the next minute
        }

        
        $minutesDifference = $dateTime1->diffInMinutes($dateTime2);
        $nightMinutes = $minutesDifference - $totalMinutes;

        $nightHours = intdiv($nightMinutes, 60);
        $nightMinutesLeft = $nightMinutes % 60;

        $dayHours = intdiv($totalMinutes, 60);
        $dayMinutesLeft = $totalMinutes % 60;
        //
        echo "Foram: Horas noturnas {$nightHours}:{$nightMinutesLeft} e {$dayHours}:{$dayMinutesLeft} horas diurnas.";
        
        }
    
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
