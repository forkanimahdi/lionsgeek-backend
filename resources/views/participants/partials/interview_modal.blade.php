<div class="flex items-center justify-center">
    <div x-data="{ interviewModal: false }">
        <!-- Button to open the modal -->
        <button @click="interviewModal = true" class="w-full bg-black px-2 py-1 rounded font-medium text-white ">
            Interview </button>
        <!-- Background overlay -->
        <div x-show="interviewModal" class="fixed inset-0 transition-opacity" aria-hidden="true" @click="interviewModal = false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal -->
        <div x-show="interviewModal" x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="fixed z-10 inset-0 overflow-y-auto w-full" x-cloak>
            <div class="flex w-full items-end justify-center  pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Modal panel -->
                <div class="w-full inline-block align-bottom bg-white max-h-[90vh] overflow-y-auto rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-white w-full px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Modal content -->
                        <div class="">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <div class="mt-2">
                                    <div class="sm:flex sm:items-start">
                                        <div class="sm:mt-0 sm:text-left">
                                            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-headline">
                                                Send Invitation to Participants </h3>
                                        </div>
                                    </div>
                                    <form x-data="{ times: [] }" action="{{ route('participant.interview') }}"
                                        method="POST" class="flex flex-col gap-3">
                                        @csrf
                                        <div class="flex flex-col gap-3 py-3">
                                            <label for="">Choose Interview Date </label>
                                            <input min="{{Carbon\Carbon::now()->format('Y-m-d')}}" type="date" name="date">
                                        </div>
                                        <div>
                                            <label for="">Choose Interview Time</label>
                                            <p class="text-sm text-slate-500 mb-4">Based on the chosen times, the groups will
                                                be divided.</p>
                                            <button type="button" @click="times.push({ id: Date.now() });"
                                                class="px-3 py-2 bg-black rounded-md text-white">Add time</button>
                                        </div>
                                        <input type="hidden" name="infosession_id" value="{{ $infoSession->id }}">
                                        <div>
                                            <template x-for="(time, index) in times" :key="time.id"
                                                class="flex flex-col">
                                                <div class="my-1 py-2 px-2 flex justify-between bg-slate-50">
                                                    <input type="time" class="rounded" name="times[]">
                                                    <button type="button" @click="times.splice(index, 1)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="size-5 cursor-pointer">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18 18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </template>
                                        </div>
                                        <div class="px-4 py-3 sm:px-6 gap-3 sm:flex sm:flex-row-reverse">
                                            <button type="submit"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-black text-base font-medium text-white hover:bg-alpha focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-alpha sm:ml-3 sm:w-auto sm:text-sm">
                                                Send </button>
                                            <button @click="interviewModal = false" type="button"
                                                class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                Cancel </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>