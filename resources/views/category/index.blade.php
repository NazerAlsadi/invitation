<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="my-5">
                    <div class="text-center flex justify-center pt-10">
                        <div class = "w-1/2 border border-gray-600 rounder p-5">
                            <div class = "flex justify-between">
                            <h1 class="text-2xl">All Categories</h1>
                                <a href="/categories/create" class = "mx-5 py-1 px-1 cursor-pointer rounded text-white">
                                    <i class="fas fa-add px-2 text-blue-400"> </i> 
                                </a>
                            </div>
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Color
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $category)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $category->name}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $category->color}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{'/categories/'.$category->id.'/edit'}}" class = "mx-5 p-1  cursor-pointer rounded text-white">
                                                        <i class="fas fa-edit px-2 text-orange-400"></i>
                                                    </a>
                                                    
                                                    <i class="fas fa-trash px-2 text-red-400" onclick = "event.preventDefault(); document.getElementById('form-delete-{{$category->id}}').submit();"> </i> 
                                                    <form id="{{'form-delete-'.$category->id}}" style="display:none" class="" method="post" action="{{route('category.delete' , $category->id)}}">
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
<script>
    function myFunction() {
        if(confirm("Are You Sure to delete this")){
        //    
        }
    }
 </script>