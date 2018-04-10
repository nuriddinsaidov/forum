@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="#"> {{ $thread->creator->name }} </a>
                        posted:
                        {{ $thread->title }}</div>

                    <div class="card-body">
                            <article>
                                <div class="body">{{  $thread->body  }}</div>
                            </article>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($thread->replies as $reply)

                 @include('threads.reply')

                @endforeach
            </div>
        </div>

        <hr>
        @if (auth()->check())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ $thread->path().'/replies' }}">
                    <div class="form-group">
                        {{ csrf_field() }}
                        <textarea name="body" id="body" placeholder="have something to write" class="form-control"></textarea>

                    </div>

                    <input type="submit" value="POST">
                </form>

            </div>
        </div>
        @else
            <p class="text-center"> Please <a href="{{ route('login') }}">sign in</a>  to participate..</p>
        @endif
    </div>
@endsection
