<div class="bg-white">
    @if ($isOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-blue rounded shadow p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">{{ $church->name }}</h2>
                <p>{{ $church->address }}</p>

                <dl class="max-w-md py-6 text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                    @foreach($church->masses as $mass)

                    <div class="flex flex-col pb-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">{{$mass->day}} {{$mass->formattedTime}}</dt>
                        <dd class="text-lg font-semibold">{{$mass->language}}</dd>
                    </div>

                    @endforeach
                </dl>

                <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded" wire:click="closeModal">
                    Close
                </button>
            </div>
        </div>
    @endif
</div>
