<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $us = Country::where('country_code', 'US')->withCount('employees')->first();
        $uk = Country::where('country_code', 'UK')->withCount('employees')->first();
        $ind = Country::where('country_code', 'Ind')->withCount('employees')->first();
        $ban = Country::where('country_code', 'Ban')->withCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($us->name. ' Employees', $us->employees_count),
            Card::make($uk->name. ' Employees', $uk->employees_count),
            Card::make($ind->name. ' Employees', $ind->employees_count),
            Card::make($ban->name. ' Employees', $ban->employees_count),
        ];
    }
}
