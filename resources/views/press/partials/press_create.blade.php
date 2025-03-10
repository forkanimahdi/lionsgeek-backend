<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Press create') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="flex flex-col items-center justify-center py-6 w-[100%] bg-white p-2 rounded gap-5  "
                        action="{{ route('press.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div x-data="{ tab: 'English' }" class="w-[100%] flex flex-col items-center">
                            {{-- Language buttons --}}
                            <div class="flex items-center justify-center gap-2 p-2 w-[100%] bg-slate-200 rounded">
                                @foreach (['English', 'Français', 'العربية'] as $language)
                                    <button @click="tab = '{{ $language }}'"
                                        :class="{ 'bg-white text-black': tab === '{{ $language }}', 'bg-slate-200 text-black': tab !== '{{ $language }}' }"
                                        type="button" class="w-1/3 rounded-md font-medium p-1">
                                        {{ $language }}
                                    </button>
                                @endforeach
                            </div>

                            <div class="Tabs flex flex-col gap-5 w-[100%] p-4">
                                {{-- Name --}}
                                <div class="flex flex-col">
                                    {{-- English --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'English' ">
                                        <div class="flex flex-col w-[100%]  gap-1">
                                            <label for="name_en">Name</label>
                                            <input placeholder="Enter name" required
                                                class="w-[100%] border-[2px] border-black rounded-[10px]" type="text"
                                                name="name[en]" id="name_en" value="{{ old('name.en') }}">
                                        </div>
                                    </div>

                                    {{-- Français --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'Français' ">
                                        <div class="flex flex-col w-[100%] gap-1">
                                            <label for="name_fr">Nom</label>
                                            <input required placeholder="Entrez le nom"
                                                class=" border-[2px] border-black rounded-[10px]" type="text"
                                                name="name[fr]" id="name_fr" value="{{ old('name.fr') }}">
                                        </div>
                                    </div>

                                    {{-- العربية --}}
                                    <div class="flex flex-col items-center w-[100%] gap-5" x-show="tab === 'العربية' ">
                                        <div class="flex flex-col  w-[100%] text-end gap-1">
                                            <label for="name_ar">الاسم</label>
                                            <input required placeholder="أدخل الاسم"
                                                class=" border-[2px] border-black rounded-[10px]" type="text"
                                                name="name[ar]" id="name_ar" value="{{ old('name.ar') }}">
                                        </div>

                                    </div>
                                </div>
                                {{-- Cover --}}
                                <div class="flex flex-col gap-1">
                                    <div>
                                        <p x-show="tab=== 'English' ">Cover</p>
                                        <p x-show="tab=== 'Français' ">Couverture</p>
                                        <p x-show="tab=== 'العربية' " class="text-end">الغطاء</p>
                                    </div>
                                    <label for="image"
                                        class="p-[0.75rem] cursor-pointer flex gap-2 items-center  border-[2px] border-black rounded-[10px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span id="imagesPlaceholder" class="text-base text-gray-500">
                                            Upload Cover
                                        </span>
                                    </label>
                                    <input
                                        onchange="imagesPlaceholder.textContent = [...this.files].map(f => f.name).join(', ')"
                                        class="hidden" required type="file" placeholder="image"
                                        accept="image/png, image/jpg, image/jpeg" name="cover" id="image">
                                </div>
                                {{-- Logo --}}
                                <div class="flex flex-col gap-1">
                                    <div>
                                        <p x-show="tab=== 'English' ">Logo</p>
                                        <p x-show="tab=== 'Français' ">Logo</p>
                                        <p x-show="tab=== 'العربية' " class="text-end">الشعار</p>
                                    </div>
                                    <label for="logo"
                                        class="p-[0.75rem] cursor-pointer flex gap-2 items-center  border-[2px] border-black rounded-[10px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6 flex-shrink-0">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                        </svg>
                                        <span class="text-base text-gray-500">
                                            Upload Logo
                                        </span>
                                    </label>
                                    <input class="hidden" required type="file" placeholder="logo"
                                        accept="image/png, image/jpg, image/jpeg" name="logo" id="logo">
                                </div>


                                {{-- link --}}
                                <div class="flex flex-col gap-1">
                                    <div>
                                        <p x-show="tab=== 'English' ">link</p>
                                        <p x-show="tab=== 'Français' ">lien</p>
                                        <p x-show="tab=== 'العربية' " class="text-end">رابط</p>
                                    </div>
                                    <input name="link" required type="url" placeholder="Enter link"
                                        class="border-[2px] border-black rounded-[10px]">
                                    {{-- <input x-show="tab=== 'Français' " name="link" required type="url" placeholder="Entrez le lien" class="border-[2px] border-black rounded-[10px]">
                                <input x-show="tab=== 'العربية' " name="link" required type="url" placeholder="أدخل الرابط" class="border-[2px] border-black rounded-[10px]">
                                <input x-show="tab=== 'English' " name="link" required type="url" placeholder="Enter link" class="border-[2px] border-black rounded-[10px]"> --}}
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="bg-black w-full text-white rounded py-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
