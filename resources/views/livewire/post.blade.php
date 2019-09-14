<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="jumbotron">
                <div class="col-md-8 ml-auto mr-auto" style="margin-top: -3rem">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Post Title ..." value={{ $title }}>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea wire:model="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Description ...">{{ $description }}</textarea>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" wire:model="publish" type="checkbox" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Publish
                            </label>
                        </div>
                    </div>
                    <div class="text-center">
                        @if ($editPost)
                            <button type="button" wire:click="updatePost({{ $id }})" class="btn btn-outline-primary col-md-3">Update Post</button>
                        @else
                            <button type="button" wire:click="addPost" class="btn btn-outline-success col-md-3">Add Post</button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-columns">
                @foreach ($posts as $post)
                    <div class="card">
                        <img src="{{ $post->urlToImage }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Updated {{ $post->updated_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>