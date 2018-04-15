@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
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

                <hr>


                @foreach($replies as $reply)

                    @include('threads.reply')

                @endforeach

                {{ $replies->links() }}

                <hr>
                @if (auth()->check())

                    <form method="POST" action="{{ $thread->path().'/replies' }}">
                        <div class="form-group">
                            {{ csrf_field() }}
                            <textarea name="body" id="body" placeholder="have something to write"
                                      class="form-control"></textarea>

                        </div>

                        <input type="submit" value="POST">
                    </form>


                @else
                    <p class="text-center"> Please <a href="{{ route('login') }}">sign in</a> to participate..</p>
                @endif
            </div>

            <div class="col-md-4">
                <div class="card">
                   <div class="card-body">
                       <p>
                           This Thread was published
                           {{ $thread->created_at->diffForHumans() }} by
                           <a href="#">{{ $thread->creator->name }}</a>, and currently
                           has {{ $thread->replies_count }}
                           {{   str_plural('comment', $thread->replies_count) }}.
                       </p>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
