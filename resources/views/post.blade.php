<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   @if (Session::has('success'))
                   <div class="col-12 alert alert-success justify-content-center d-flex">

                    <p class="text-center">{{ Session::get('success') }}</p>
                   </div>

                   @endif
                   @if (isset($posts) && $posts->count() >0 )
                   @foreach ($posts as $post)
                   <div class="card-body">
                    @if (Session('status'))
                    <div class="col-12 alert alert-success">
                        {{ Session('status') }}

                    </div>
                    @endif
                    <h1>
                        {{ $post->title }} - @if (Auth::id() == $post->user->id)  {{ Auth::user()->name }}

                        @endif
                    </h1>
                    <p>
                        {{ $post->body }}
                    </p>
                    <br>
                    <br>
                    <h4>Comments</h4>
                    @if ($post->comments()->count() > 0)
                    @foreach ($post->comments as $comment)
                    <p>
                      {{ $comment->id }}-{{ Auth::user()->name }}
                      <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                      {{ $comment->comment }}


                            </div>
                        </div>
                    </p>

                    @endforeach

                    @endif

                    <br><br>
                    <form action="{{ route('comment.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="post_id" value="{{$post->id}}">

                    <div class="form-group">
                        <input type="text" name="post_body" class="form-control">
                        @error('post_body')
                            <small class="error-message">{{ $message }}</small>
                        @enderror
                    </div>
                    @if (Auth::id() != $post->user->id)
                    <x-button>Comment</x-button>
                    @endif

                    </form>


                   </div>

                   @endforeach

                   @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
