<div>    {{-- The best athlete wants his opponent at his best. --}}

    @include('components.home.nav')


    <div class="mx-auto max-w-7xl px-2 pt-6 sm:px-6 lg:px-8">

        <div>

            <div class="grid md:grid-cols-3 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model.lazy="latitude" type="number" min="-90" max="90" name="floating_latitude" id="floating_latitude" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                    <label for="floating_latitude" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Latitude</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model.lazy="longitude" type="number" min="-180" max="180" name="floating_longitude" id="floating_longitude" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                    <label for="floating_longitude" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Longitude</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input wire:model.lazy="radius" type="number" min="5" max="500" name="floating_radius" id="floating_radius" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required />
                    <label for="floating_radius" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Radius</label>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($churches as $church)

                <div
                    class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg" src="/storage/church.png" alt=""/>
                    <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$church->name}}</h5>

                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$church->address}}</p>

                        <flux:button variant="primary" x-data="" x-on:click.prevent="$dispatch('openModal', [{{$church->id}}])">
                            {{ __('View') }}
                        </flux:button>
                    </div>
                </div>

            @endforeach
        </div>

    </div>

    <livewire:church-detail-modal />


</div>
