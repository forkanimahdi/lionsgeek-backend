<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participant Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center gap-2 justify-between">
                        {{-- User Info --}}
                        <div class="w-full p-3 shadow-md h-[65vh] rounded">
                            <div class="flex items-center justify-between">
                                <h1 class="text-2xl font-bold mb-2">User Profile</h1>
                                <button class="bg-black text-white rounded px-2 py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>

                                </button>
                            </div>

                            <div class="flex items- gap-7 ">
                                @if ($participant->image)
                                    <h1>ana image khasni nkun hna</h1>
                                @else
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="125" height="125"
                                        viewBox="0 0 280 280" preserveAspectRatio="xMidYMid meet" class="">

                                        <g transform="translate(0.000000,315.000000) scale(0.100000,-0.100000)"
                                            fill="#000" stroke="none">
                                            <path
                                                d="M705 3008 c-41 -120 -475 -1467 -475 -1474 1 -9 1238 -910 1257 -916 6 -2 294 203 640 454 l631 458 -84 257 c-46 142 -154 477 -241 745 l-158 488 -783 0 c-617 0 -784 -3 -787 -12z m1265 -412 c0 -3 65 -205 145 -451 80 -245 145 -448 145 -450 0 -2 -173 -130 -384 -283 l-384 -280 -384 279 c-283 207 -382 284 -380 297 5 22 283 875 289 885 4 7 953 10 953 3z" />
                                            <path
                                                d="M1176 1661 c21 -15 101 -74 178 -130 l139 -101 31 23 c17 13 92 68 166 122 74 54 139 102 144 106 6 5 -145 9 -344 9 l-354 0 40 -29z" />
                                        </g>
                                    </svg>
                                @endif

                                <div class="flex flex-col justify-between  h-full items-start">
                                    <p class="text-lg font-semibold ">{{ $participant->first_name }}
                                        {{ $participant->last_name }}</p>

                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                                        </svg>

                                        <p>{{ $participant->birthday }}</p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                                        </svg>


                                        <p>{{ $participant->email }}</p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                        <p>{{ $participant->phone }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Additional Information --}}
                            <br>
                            <div>

                                <div>
                                    <p class="text-lg mb-2 font-semibold">Current Step:</p>
                                    <p class="capitalize rounded border border-gray-200 p-2"">
                                        {{ str_replace('_', ' ', $participant->current_step) }}</p>
                                </div>
                                <div>
                                    <p class="text-lg my-3 font-semibold">Address:</p>
                                    <p class="rounded border border-gray-200 p-2">{{ $participant->address }}</p>
                                </div>
                                <div>
                                    <p class="text-lg my-2 font-semibold">Session:</p>
                                    <p class="rounded border border-gray-200 p-2">
                                        {{ $participant->infoSession->formation }} {{ $participant->infoSession->name }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Frequent Questions --}}
                        <div
                            class="w-full flex items-center justify-center p-3 shadow-md h-[65vh] rounded overflow-y-auto">
                            <div class="w-full">
                                <h1 class="text-2xl font-bold">Frequent Questions: </h1>
                                <div class="w-full my-2">
                                    <p class="mb-1">Question 1:</p>
                                    <div class="flex items-center gap-2">
                                        <input class="w-full rounded" type="text" name="" id=""
                                            placeholder="Answer 1">
                                        <button class=" border rounded p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                                <div class="w-full my-2">
                                    <p class="mb-1">Question 2:</p>
                                    <div class="flex items-center gap-2">
                                        <input class="w-full rounded" type="text" name="" id=""
                                            placeholder="Answer 2">
                                        <button class=" border rounded p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                                <div class="w-full my-2">
                                    <p class="mb-1">Question 3:</p>
                                    <div class="flex items-center gap-2">
                                        <input class="w-full rounded" type="text" name="" id=""
                                            placeholder="Answer 3">
                                        <button class=" border rounded p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                                <div class="w-full my-2">
                                    <p class="mb-1">Question 4:</p>
                                    <div class="flex items-center gap-2">
                                        <input class="w-full rounded" type="text" name="" id=""
                                            placeholder="Answer 4">
                                        <button class=" border rounded p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                                <div class="w-full my-2">
                                    <p class="mb-1">Question 5:</p>
                                    <div class="flex items-center gap-2">
                                        <input class="w-full rounded" type="text" name="" id=""
                                            placeholder="Answer 5">
                                        <button class=" border rounded p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                    {{-- Satisfaction --}}
                    <div x-data="{
                        totalTasks: 10,
                        checkedTasks: 0,
                        get percentage() {
                            return (this.checkedTasks / this.totalTasks) * 100;
                        },

                        get barColor() {
                            const percentage = this.percentage;
                            if (percentage < 90) {
                                return '#000000'; // LionsGeek Black
                            } else {
                                return '#fcc801'; // LionsGeek Yellow
                            }
                        },
                        toggleTask(checked) {
                            this.checkedTasks += checked ? 1 : -1;
                        }
                    }" class="p-3 rounded shadow-md ">

                        <div class="flex items-center justify-between">
                            <h1 class="text-2xl font-bold ">Satisfaction Percentage:</h1>
                            <button class="bg-black text-white rounded px-3 py-1">Save</button>
                        </div>

                        <div class="relative h-[2vh] mt-4">

                            <div class="w-full h-[2vh] bg-gray-200 rounded-full absolute top-0 left-0">
                            </div>

                            <!-- Progress Bar (Filled part) -->
                            <div :style="'width: ' + percentage + '%; background-color: ' + barColor"
                                class="h-[2vh] w-full rounded-full absolute top-0 left-0 transition-all duration-150 ease-in-out">
                            </div>
                        </div>

                        <!-- Task List -->
                        <div class="flex flex-wrap mt-4">
                            @foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $item)
                                <div class="w-[20%] my-2">
                                    <!-- Checkbox -->
                                    <input type="checkbox" :id="'item' + {{ $item }}" st
                                        @change="toggleTask($event.target.checked)" />
                                    <label :for="'item' + {{ $item }}">Condition {{ $item }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <br>
                    {{-- Admin Notes --}}
                    <div class="p-3 rounded shadow-md">
                        <h1 class="text-2xl font-bold">Admin Notes:</h1>
                        <br>
                        <div>
                            <p class="mb-2 text-lg">Add a Note:</p>
                            <textarea name="note" id="notes" class="w-full rounded border-gray-400" rows="5"
                                placeholder="Enter your remarks about the user"></textarea>
                            <button class="w-full bg-black text-white rounded py-2 mt-2">
                                Add Note
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>