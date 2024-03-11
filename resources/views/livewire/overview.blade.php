<div class="flex flex-col h-screen justify-center items-center">
    <h1 class="text-4xl font-extrabold">{{ __('Steps per day this month') }}</h1>
    <div class="relative aspect-square  w-[40rem] h-[20rem] my-[2rem]" x-data="line('step-month', @js($dayLogData))">
        <canvas id="step-month"></canvas>
    </div>

    <button class="py-[1rem] px-[2rem] rounded-[.5rem] bg-orange-500 text-gray font-bold text-lg mt-[1rem] hover:brightness-90" wire:click="back">{{ __('Back to home') }}</button>

</div>
