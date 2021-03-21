@extends('dashboard.layouts.app')
@section('title')
    Client Project
@endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        @if (\Session::has('message'))
        <div class="alert alert-success">
            <p>{{ \Session::get('message') }}</p>
        </div>
    @endif
        <div class="container">
            <div class="row layout-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Project List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="style-3" class="table style-3  table-hover">
                                    <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> Record Id </th>
                                        <th class="text-center">Image</th>
                                        <th>Title</th>
                                        <th>category</th>
                                        <th>Technologies</th>
                                        <th>description</th>
                                        <th class="text-center">Featured</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects as $project)
                                    <tr>
                                        <td class="checkbox-column text-center">{{$loop->index + 1}}</td>
                                        <td class="text-center">
                                            <span><img src="{{asset('storage/'.$project->image)}}" class="profile-img" alt="avatar"></span>
                                        </td>
                                        <td>{{$project->title}}</td>
                                        <td>{{$project->category}}</td>
                                        @php
                                        $text = \Illuminate\Support\Str::of($project->tags)->explode(',');
                                        @endphp
                                        <td>
                                         @for($i=0; $i<count($text); $i++)
                                            @if($text[$i])
                                            {{$text[$i]}},
                                            @endif
                                        @endfor</td>
                                        <td>{{$project->description}}</td>
                                        <td class="text-center"><span class="shadow-none badge badge-primary">{{$project->featured}}</span></td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li><a href="{{route('dashboard.portfolio.edit' ,$project->id)}}" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                              <li>
                                                <form action="{{route('dashboard.portfolio.destroy',  $project->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="javascript:void(0);" type="submit" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                                                </form>
                                              </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!--  END CONTENT AREA  -->
@endsection
