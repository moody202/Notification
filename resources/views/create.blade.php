<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-md-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">

                                    @if(session()->has('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ session()->get('error') }}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <br>
                                            <form action="{{route('comment.store')}}" method="post">
                                             @csrf
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="title">post_id</label>
                                                    <input type="number" name="post_id" class="form-control">
                                                    @error('post_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="title">user_id</label>
                                                    <input type="number" name="user_id" class="form-control">
                                                    @error('user_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col">
                                                    <label for="title">comment</label>
                                                    <input type="text" name="comment" class="form-control">
                                                    @error('comment')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            </div>
                                            <br>
                                            <x-button>Next</x-button>

                                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
