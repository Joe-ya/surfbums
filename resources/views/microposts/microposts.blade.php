<ul class="list-unstyled">
    @foreach ($microposts as $micropost)
        <li class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <div class="">
                    <img class="mr-2 rounded" src="{{ Gravatar::src($micropost->user->email, 50) }}" alt="">
                    {!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                </div>
                <div>
                    @if (Auth::id() == $micropost->user_id)
                        {!! link_to_route('microposts.edit', 'Edit', ['id' => $micropost->id], ['class' => 'btn btn-primary btn-sm']) !!}
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div>
                    <img src="{{ Storage::disk('s3')->url($micropost->image) }}" alt="iamge"/>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                </div>
            </div>
            <div class="card-footer">
                @if (Auth::id() == $micropost->user_id)
                    {!! Form::open (['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                        {!! Form::submit ('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->links('pagination::bootstrap-4') }}