<?php

namespace App\Livewire;

use App\Models\DayLog;
use Carbon\CarbonPeriod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class Overview extends Component
{
    public array $dayLogData;

    public function mount(): void
    {
        $this->loadStepsData();
    }

    public function loadStepsData(): void
    {
        $monthPeriod = CarbonPeriod::create(Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth());

        $stepPeriod = DayLog::whereBetween('date', $monthPeriod)
            ->orderBy('date')
            ->pluck('steps', 'date');

        $this->dayLogData = collect($monthPeriod->toArray())
            ->map(fn (Carbon $date) => [$date->format('Y-m-d') => $stepPeriod->get($date->format('Y-m-d')) ?? 0])
            ->collapse()
            ->toArray();
    }

    public function back(): RedirectResponse|Redirector
    {
        return redirect()->route('home');
    }

    public function render(): View
    {
        return view('livewire.overview');
    }
}
