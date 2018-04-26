@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($threads as $thread)
        <div class="row row-card">

                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="flex">
                                <a href="{{$thread->path() }}">
                                    {{ $thread->title }}
                                </a>
                            </h4>

                            <span class="reply_count">
                                <a href="{{ $thread->path() }}">
                                    {{ $thread->replies_count }}

                                    {{  str_plural('reply',$thread->replies_count)   }}
                                </a>
                            </span>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif


                            <article>
                                <div class="body">{{  $thread->body  }}</div>
                            </article>
                        </div>
                    </div>

                </div>
                <br>

        </div>
        @endforeach
    </div>
@endsection
