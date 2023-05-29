<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prefix') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="my-5">
                        <div class="text-center flex justify-center pt-10">
                            <div class = "w-1/2 border border-gray-600 rounder p-5">
                                @if($errors->any())
                                <div>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form method = "post" action = "{{route('prefix.update' , $prefix->id ) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="space-y-8">
                                        <div class="border-b border-gray-900/10 pb-12">
                                            <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Prefix</h2>

                                            
                                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                                <div class="sm:col-span-3">
                                                    <label for="Name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="name" value = "{{$prefix->name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>

                                                <div class="sm:col-span-3">
                                                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Language</label>
                                                    <div class="mt-2">
                                                        <input type="text" name = "languge" value = "{{$prefix->languge}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex items-center justify-end gap-x-6">
                                        <a type="button"  href="/prefixes" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                        <input type="submit"  value = "update" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"></a>
                                    </div>
                                </form>
                                
                                
                            </div>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
