
@extends('admin.master-admin')

@section('content')

@include('admin.left-sidemenu')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">All Posts</h4>

              <table class="table table-striped mb-5">
                <thead>
                  <tr>
                    <th> Post ID </th>
                    <th> Thumbnail </th>
                    <th> Post Title </th>
                    <th> Post Categories </th>
                    <th> Post Author </th>
                    <th> Total View </th>
                    <th> Published on </th>
                    <th> Updated on </th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($posts->all() as $post)
                  <tr>
                    <td> {{$post->id}} </td>
                    <td class="py-1">
                      <img class="thumb-image" src="{{$post->thumbnail}}" alt="image" />
                    </td>
                    <td> {{$post->title}} </td>
                    <td> {{$post->title}} </td>
                    <td> {{$post->slug}} </td>
                    <td> {{$post->views}} </td>
                    <td> {{$post->created_at}} </td>
                    <td> {{$post->updated_at}} </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
              {{$posts->links('vendor.pagination.bootstrap-custom')}}
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection('content')
