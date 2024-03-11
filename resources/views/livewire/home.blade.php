<div class="flex flex-col h-screen justify-center items-center">
    <h1 class="text-4xl font-extrabold">{{ __(':total_steps / :steps_goal Steps', ['total_steps' => $total_steps, 'steps_goal' => $goal]) }}</h1>
    <div class="relative aspect-square h-[14rem] my-[2rem]" x-data="pie('step-pie', {{ $percentage }})">
        <canvas id="step-pie"></canvas>
        <p class="absolute left-1/2 top-1/2 -translate-x-[50%] -translate-y-[50%] font-semibold text-2xl">{{ __(':percentage%', ['percentage' => $percentage]) }}</p>
    </div>

    <div class="flex flex-col gap-[1rem]">
        <button class="py-[1rem] px-[2rem] rounded-[.5rem] bg-green text-gray font-bold text-lg hover:brightness-90" wire:click="$set('add_steps_modal', true)">{{ __('Add steps') }}</button>
        <button class="py-[1rem] px-[2rem] rounded-[.5rem] bg-blue text-gray font-bold text-lg mt-[1rem] hover:brightness-90" wire:click="$set('update_goal_modal', true)">{{ __('Update goal') }}</button>
        <button class="py-[1rem] px-[2rem] rounded-[.5rem] bg-orange-500 text-gray font-bold text-lg mt-[1rem] hover:brightness-90" wire:click="overview">{{ __('View monthly overview') }}</button>
    </div>

    @if ($update_goal_modal)
        <x-modal>
            <div class="flex flex-col gap-[1rem]">
                <label for="update_goal" class="text-xl font-bold">{{ __('Update step goal') }}</label>
                <input class="border-gray2 py-[1rem] rounded-[.5rem]" type="number" name="update_goal" id="update_goal" wire:model="update_goal" wire:keyup.enter="updateGoal" placeholder="{{ __('New goal...') }}">
                <div class="grid grid-cols-2 gap-[1rem]">
                    <button class="bg-gray2 rounded-[.5rem] py-[1rem] text-black hover:brightness-90" wire:click="$set('update_goal_modal', false)">{{ __('Cancel') }}</button>
                    <button class="bg-blue rounded-[.5rem] py-[1rem] text-gray hover:brightness-90" wire:click="updateGoal">{{ __('Update goal') }}</button>
                </div>
            </div>
        </x-modal>
    @elseif($add_steps_modal)
        <x-modal>
            <div class="flex flex-col gap-[1rem]">
                <label for="step_count" class="text-xl font-bold">{{ __('Add steps') }}</label>
                <input class="border-gray2 py-[1rem] rounded-[.5rem]" type="number" name="step_count" id="step_count" wire:model="step_count" wire:keyup.enter="addSteps" placeholder="{{ __('Step count...') }}">
                <div class="grid grid-cols-2 gap-[1rem]">
                    <button class="bg-gray2 rounded-[.5rem] py-[1rem] text-black hover:brightness-90" wire:click="$set('add_steps_modal', false)">{{ __('Cancel') }}</button>
                    <button class="bg-blue rounded-[.5rem] py-[1rem] text-gray hover:brightness-90" wire:click="addSteps">{{ __('Add steps') }}</button>
                </div>
            </div>
        </x-modal>
    @endif
</div>
