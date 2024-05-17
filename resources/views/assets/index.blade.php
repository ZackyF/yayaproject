@extends('layouts.app')

@section('title', 'HISTORIT')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Assets</h1>
    <div class="flex justify-end items-center mb-4">
        <form action="{{ route('admin/assets/search') }}" method="GET" class="flex items-center mr-2">
            <input type="text" name="query" class="border rounded-lg py-2 px-4" placeholder="Search assets..." />
            <button type="submit" class="ml-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Search</button>
        </form>
        <a href="{{ route('admin/assets/create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</a>
    </div>
    <hr />
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Asset Name</th>
                <th scope="col" class="px-6 py-3">Device Image</th>
                <th scope="col" class="px-6 py-3">Asset Tag</th>
                <th scope="col" class="px-6 py-3">Serial</th>
                <th scope="col" class="px-6 py-3">Model</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Status</th>
                <th scope="col" class="px-6 py-3">Checked Out to</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($asset->count() > 0)
            @foreach($asset as $rs)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td>
                    {{ $rs->name }}
                </td>
                <td>
                    {{ $rs->image }}
                </td>
                <td>
                    {{ $rs->tag }}
                </td>
                <td>
                    {{ $rs->serial }}
                </td>
                <td>
                    {{ $rs->model }}
                </td>
                <td>
                    {{ $rs->category }}
                </td>
                <td>
                    {{ $rs->status }}
                </td>
                <td>
                    {{ $rs->checked }}
                </td>
                <td class="w-36">
                    <div class="h-14 pt-5">
                        <a href="{{ route('admin/assets/show', $rs->id) }}" class="text-blue-800">Detail</a> |
                        <a href="{{ route('admin/assets/edit', $rs->id)}}" class="text-green-800 pl-2">Edit</a> |
                        <form action="{{ route('admin/assets/destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="float-right text-red-800">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="10">Product not found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
