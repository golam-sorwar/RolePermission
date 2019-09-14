<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-columns">
                @foreach ($posts as $post)
                    <div class="card">
                        <img src="{{ $post->urlToImage }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>