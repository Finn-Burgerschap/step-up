<?php

namespace App\Livewire;

use App\Models\DayLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class Home extends Component
{
    public bool $add_steps_modal = false;

    public bool $update_goal_modal = false;

    public int $goal;

    public int $total_steps;

    public float $percentage;

    public ?int $update_goal;

    public ?int $step_count;

    public function mount(): void
    {
        $this->updateData();
    }

    private function updateData(): void
    {
        $day_log = DayLog::firstOrCreate([
            'user_id' => Auth::id(),
            'date' => today(),
        ], [
            'steps' => 0,
        ]);

        $this->goal = Auth::user()->step_goal;
        $this->total_steps = $day_log->steps;

        $this->percentage = ($this->total_steps / $this->goal) * 100;
        $this->percentage = min($this->percentage, 100);

        $this->percentage = number_format($this->percentage, 2);
    }

    public function updateGoal(): RedirectResponse|Redirector
    {
        $this->validate([
            'update_goal' => 'required|integer|min:1|max:1000000000',
        ]);

        Auth::user()->update([
            'step_goal' => $this->update_goal,
        ]);

        return redirect()->route('home');
    }

    public function addSteps(): RedirectResponse|Redirector
    {
        $this->validate([
            'step_count' => 'required|integer|min:1|max:1000000000',
        ]);

        $dayLog = Auth::user()->currentDayLog()->first();

        $dayLog->increment('steps', $this->step_count);

        return redirect()->route('home');
    }

    public function overview(): RedirectResponse|Redirector
    {
        return redirect()->route('overview');
    }

    public function render(): View
    {
        return view('livewire.home');
    }
}
