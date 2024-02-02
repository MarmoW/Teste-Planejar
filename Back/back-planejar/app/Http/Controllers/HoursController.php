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
        $entryTime = Carbon::parse($d1);
        $leaveTime = Carbon::parse($d2);

        if ($d2 < $d1) {
            return 'A data de entrada não pode ser antes da de saída.';
        } elseif($d2 == $d1) {
            return 'A hora de entrada é a mesma da saída.';
        } elseif($entryTime->diffInMinutes($leaveTime) > 1440) {
            return 'O expediente não pode passar de 24h';
        } else {

        $startRange = Carbon::parse('5:00');
        $endRange = Carbon::parse('22:00');
        
        $startTime = Carbon::parse($d1);

        $minutesDifferenceTotal = $entryTime->diffInMinutes($leaveTime);
        $totalDailyMinutes = 0  ;
        $i = 0;
        $day = 0;
    
         while ($i < $minutesDifferenceTotal)  {
            if ($startTime->greaterThan($startRange) && $startTime->lessThan($endRange))  {
                $totalDailyMinutes++;
            }
            elseif($startTime->greaterThan($startRange) && $startTime->lessThanOrEqualTo($leaveTime) && $day > 0 ){
                $totalDailyMinutes++;
            }else{}
            
            if ($startTime->hour == 4 && $startTime->minute == 59) {
                $day++;
                $startTime->setTime(5, 0);  
            }

            $startTime->addMinute(); 
            $i++;
            
        } 

        $nightMinutes = $minutesDifferenceTotal - $totalDailyMinutes;

         if($nightMinutes >= 420){
            $totalDailyMinutes = $minutesDifferenceTotal - 420;
            $nightMinutes = 420;
        }   
       

        $nightHours = intdiv($nightMinutes, 60);
        $nightMinutesLeft = $nightMinutes % 60;

        $dayHours = intdiv($totalDailyMinutes, 60);
        $dayMinutesLeft = $totalDailyMinutes % 60;
       
        $dayMinutesLeftTwoDigits = sprintf("%02d", $dayMinutesLeft);
        $nightMinutesLeftTwoDigits = sprintf("%02d", $nightMinutesLeft);

        echo "Foram: Horas diurnas {$dayHours}:{$dayMinutesLeftTwoDigits} e {$nightHours}:{$nightMinutesLeftTwoDigits} horas noturnas.";
        
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
