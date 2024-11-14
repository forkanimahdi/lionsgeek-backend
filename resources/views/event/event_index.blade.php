<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <a href="{{ route('events.create') }}">
            <button
                class="bg-black {{ $events->count() == 0 ? "hidden" : "" }} text-white rounded-lg px-4 py-2 hover:bg-alpha hover:text-black  transition duration-150">
                <span class="text-lg font-bold">+</span> Create a New Event
            </button>
        </a>
    </x-slot>

    <div class="py-12 px-10">
        <div class=" {{ $events->count() == 0 ? 'h-[70vh]' : 'min-h-[70vh]' }} bg-white rounded-lg p-6  w-[100%] px-8 ">
            @if ($events->count() == 0)
                <div class="h-[100%] bg-white flex rounded-lg items-center justify-center w-full">
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold text-gray-700 mb-3">No event Available</h1>
                        <p class="text-gray-500 mb-6">It looks like there aren’t any events created yet.</p>
                        <a href="{{ route('events.create') }}">
                            <button
                                class="px-6 py-2 bg-black text-white text-base font-medium rounded-md shadow hover:bg-alpha hover:text-black transition">
                                Create a new Event
                            </button>
                        </a>
                    </div>
                </div>
            @endif
            <div class="flex flex-wrap gap-x-[calc(5%/3)] gap-y-4  ">
                @foreach ($events as $event)
                    <div
                        class="w-[calc(95%/4)] flex flex-col overflow-hidden text-nowrap gap-3 h-fit px-[1rem] py-[1rem] rounded-[16px]  bg-[#f9f9f9]">
                        <img class="w-[100%] h-[8rem] rounded-[16px] "
                            src="{{ asset('storage/images/' . $event->cover) }}" alt="">
                        <div class="">
                            <p class="text-[18px] font-bold ">{{ Str::limit($event->name->en, 15, '...') }}</p>
                            <p class="text-[13px] font-semibold text-gray-400">
                                {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</p>
                        </div>
                        <a href="{{ route('events.show', $event->id) }}">
                            <button class="py-[.5rem] px-[1.5rem] rounded-lg bg-black text-white " type="button">
                                See Event
                            </button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
