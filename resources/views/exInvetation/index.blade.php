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
                            <div class = " border border-gray-600 rounder p-5">
                                <div class = "flex justify-between">
                                <h1 class="text-2xl">All External Invetation</h1>
                                    <a href="/exInvetation/create" class = "mx-5 py-1 px-1 cursor-pointer rounded text-white">
                                        <i class="fas fa-add px-2 text-blue-400"> </i> 
                                    </a>
                                </div>
                                    
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    prefix
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Full Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Email
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Mobile
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    company
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Job function
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Invetation status
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($exInvites as $exInvit)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$exInvit->prefix->name}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{$exInvit->fullName}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$exInvit->email}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$exInvit->mobile}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$exInvit->company}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$exInvit->jobfunction}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{$exInvit->status->name}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{'/exInvetation/'.$exInvit->id.'/edit'}}" class = "mx-5 p-1  cursor-pointer rounded text-white">
                                                        <i class="fas fa-edit px-2 text-orange-400"></i>
                                                    </a>
                                                    <i class="fas fa-trash px-2 text-red-400" onclick = "event.preventDefault(); document.getElementById('form-delete-{{$exInvit->id}}').submit();"> </i> 
                                                    <form id="{{'form-delete-'.$exInvit->id}}" style="display:none" class="" method="post" action="{{route('exinvite.delete' , $exInvit->id)}}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach  
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
