<div>
    <p class="h2">{{ $post->title }}</p>
    <p class="text-muted">{{ $post->created_at->toFormattedDateString() }}</p>
    <article>
        {!! $post->body !!}
    </article>
    <br>
    @auth
        <a style="cursor:pointer;" wire:click="toggleLike()">
            @if ($liked)
                <i class="fa fa-heart text-danger h4"></i>
            @else
                <i class="fa fa-heart text-secondary h4"></i>
            @endif
        </a>
    @endauth
    <!-- <a style="cursor:pointer;margin-left:5px;">
        @if ($commented)
            <i class="fa fa-comment-dots text-primary h4"></i>
        @else
            <i class="fa fa-comment-dots text-secondary h4"></i>
        @endif
    </a> -->
    <br>
    <div>
    <!-- <div class="card">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @forelse ($other_comments as $other_comment)
                    <li class=list-group-item>
                        <a href='{{ url("post/$post->slug") }}' class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{!! $other_comment->comments !!}</h5>
                                <small>{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1">{!! substr($post->body, 0, 200)."..." !!}</p>
                            <small>By {{ $post->author->name }}</small>
                        </a>
                    </li>
                @empty
                    <li class="list-group-item">
                        No comments yet.
                    </li>
                @endforelse
            </ul>
        </div>
    </div> -->
    </div>
    <div style="display:none;">
        <form wire:submit.prevent="addComments">
            <div class="form-group">
                <label for="comment">Your Comments:</label>
                <textarea name="comments" id="comments" placeholder="Your comments..." wire:model="comments" class="form-control"></textarea>
                @error('comments') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Publish</button>
            </div>
        </form>
    </div>
</div>
