<div class="relative z-20" role="dialog" aria-labelledby="modal-title" aria-modal="true">
    <div class="fixed inset-0 z-40 bg-black bg-opacity-60"></div>

    <div class="fixed inset-0 z-50 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-[1.5rem]">
            <div class="max-w-[38rem] p-[1.5rem] relative w-full rounded-[1rem] bg-white">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
