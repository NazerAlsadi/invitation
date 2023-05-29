<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('External Invetation') }}
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
                                <form method = "post" action = "{{ route('exinvite.update' , $exInvit->id) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="space-y-8">
                                        <div class="border-b border-gray-900/10 pb-12">
                                            <h2 class="text-base font-semibold leading-7 text-gray-900">Create external invetation</h2>

                                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                                <div class="sm:col-span-3">
                                                    <label for="prefix_id" class="block text-sm font-medium leading-6 text-gray-900">Prefix</label>
                                                    <div class="mt-2">
                                                        <select  name="prefix_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                            <option>Select prefix</option>
                                                            @foreach($prefixes as $prefix)
                                                            <option value="{{$prefix->id}}" @if($prefix->id ==$exInvit->prefix_id ) selected @else '' @endif>{{$prefix->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                                <div class="sm:col-span-3">
                                                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Full Name</label>
                                                    <div class="mt-2">
                                                    <input type="text" name = "fullName" value="{{$exInvit->fullName}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>

                                                <div class="sm:col-span-3">
                                                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                                    <div class="mt-2">
                                                    <input type="email" name="email" value="{{$exInvit->email}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>

                                                <div class="sm:col-span-3">
                                                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Mobile</label>
                                                    <div class="mt-2">
                                                    <input type="text" name = "mobile" value="{{$exInvit->mobile}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>

                                                <div class="sm:col-span-3">
                                                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Company</label>
                                                    <div class="mt-2">
                                                    <input type="text" name="company" value="{{$exInvit->company}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>
                                            
                                                <div class="sm:col-span-3">
                                                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Job Function</label>
                                                    <div class="mt-2">
                                                    <input type="text" name="jobfunction" value="{{$exInvit->jobfunction}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>

                                                <div class="sm:col-span-3">
                                                    <label for="prefix_id" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                                    <div class="mt-2">
                                                        <select name="status_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                            <option>Select status</option>
                                                            @foreach($statuses as $status)
                                                            <option value="{{$status->id}}" @if($exInvit->status_id == $status->id ) selected @else '' @endif> {{$status->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="mt-6 flex items-center justify-end gap-x-6">
                                        <a href="/exInvetation" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                        <input type="submit" value = "update" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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


<select class="px-2 py-2 border rounded-lg" name="status_id" data-live-search="true">
    <option>Select status</option>
    @foreach($statuses as $status)
    <option value="{{$status->id}}" @if($exInvit->status_id == $status->id ) selected @else '' @endif> {{$status->name}}</option>
    @endforeach
</select>