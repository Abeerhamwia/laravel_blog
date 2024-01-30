@extends('layouts.app')

@section('content')

<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="category-heading">
                    <h4 class="mb-0">{{ $post->name }}</h4>
                </div>
                <div class="mt-3">
                    <h6>{{ $post->category->name .' / '. $post->name }}</h6>
                </div>
                    
                
                <div class="card card-shadow mt-4">
                    <div class="card-body post-description">
                        {!! $post->description !!}
                    </div>
                </div>
                <div class="comment-area mt-4">
                    <div class="card card-body">
                        <h6 class="card-title">Leave a comment</h6>
                        <form action="" method="POST">
                            <textarea name="comment_body" class="form-control" rows="3"></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                        <div class="card card-body shadow-sm mt-3">
                            <div class="detail-area">
                                <h6 class="user-name mb-1">
                                    User One
                                    <small class="ms-3 text-primary">Commented on : 3-8-2023</small>
                                </h6>
                                <p class="user-comment mb-1">
                                    data into database
                                </p>
                            </div>
                            <div>
                                <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                                <a href="" class="btn btn-danger btn-sm me-2">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border p-2 my-2">
                    <h4>Advertising Area</h4>
                </div>
                <div class="border p-2 my-2">
                    <h4>Advertising Area</h4>
                </div>
                <div class="border p-2 my-2">
                    <h4>Advertising Area</h4>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>Latest Post</h4>
                    </div>
                    <div class="card-body">
                        @foreach($latest_posts as $latest_post_item)
                        <a href="{{ url('tutorial/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug) }}" class="text-decoration-none">
                            <h6>{{ $latest_post_item->name}}</h6>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
     