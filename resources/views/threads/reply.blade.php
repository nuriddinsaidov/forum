<div class="card">
    <div class="card-header">
        <div class="level">
            <h5  class="flex">
            <a href="{{route('profiles', $reply->owner)}}">
                {{ $reply->owner->name }}
            </a>
            said
            {{ $reply->created_at->diffForHumans() }}...
            </h5>
            <div>
                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    {{ csrf_field() }}


                    <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' :''}}>
                        {{  $reply->favorites_count  }}
                        {{ str_plural('Favoritable', $reply->favorites_count ) }}
                    </button>
                </form>
            </div>
        </div>


    </div>


    <div class="card-body">
        <article>
            <div class="body">{{  $reply->body  }}</div>
        </article>
    </div>

</div>
<br>