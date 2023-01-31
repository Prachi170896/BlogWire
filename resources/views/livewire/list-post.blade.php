<div>
    <h4>My Posts <a href="{{ url('posts/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new</a></h4>
    <ul class="list-group list-group-flush">
        @forelse ($posts as $post)
            <li class="list-group-item">
                <div class="float-right">
                    <a href='{{ url("posts/{$post->id}/edit") }}' class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                </div>
                <div>
                    <h5><a href='{{ url("post/{$post->slug}") }}'>{{ $post->title }}</a></h5>
                    <p>{!! substr(strip_tags($post->body), 0, 200)."..." !!}</p>
                    <small class="text-muted">Published on {{ date("d/m/Y H:i A", strtotime($post->created_at)) }}</small>
                </div>
            </li>    
        @empty
            <li>You have not written any posts yet, write one now</li>
        @endforelse
        <span style="margin-top:5px;">{{ $posts->links() }}</span>
    </ul>
</div>