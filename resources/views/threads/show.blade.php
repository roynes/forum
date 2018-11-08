@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $thread->title }}</div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        @auth
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form
                        method="POST"
                        action="{{ $thread->path() . '/replies' }}"
                    >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea
                                name="body"
                                id="body"
                                rows="5"
                                class="form-control"
                                placeholder="Have something to say?"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="row justify-content-center">
                <p> Please <a href="{{ route('login') }}">login</a> to participate in the discussion</p>
            </div>
        @endguest
    </div>
@endsection
