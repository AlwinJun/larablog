@props(['comment'])

<article class="panel-border flex gap-4 bg-gray-100">
    <div class="shrink-0">
        <img src="https://i.pravatar.cc/70?u={{ $comment->author->id }}" alt="profile picture" class="rounded-xl">
    </div>
    <div>
        <h3 class="font-bold">{{ $comment->author->username }}</h3>
        <p class="text-xs">Posted <time>{{ $comment->created_at->diffForHumans() }}</time></p>
        <p class="mt-2 leading-5">
            {{ $comment->body }}
        </p>
    </div>
</article>
