@extends('admin.layout.masterLayout')

@section('link')
    <title>Table - Ace Admin</title>

    <meta name="description" content="Dynamic tables and grids using jqGrid plugin" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

@endsection

@section('maincontent')

<div class="main-content-inner">
    
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="#">Home</a>
                </li>

                <li>
                    <a href="#">Tables</a>
                </li>
                <li class="active">User</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" name="key" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                Tables
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    User
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="clearfix form-actions">
            <div class="col-md-offset-5 col-md-9">
                <a class="btn btn-info" type="button" href="{{route('user.create')}}">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Create
                </a>
            </div>
        </div>

        @if(Session::has('error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('error')}}
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{Session::get('success')}}
            </div>
        @endif
        
        <table id="simple-table" class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace">
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace">
                            <span class="lbl"></span>
                        </label>
                    </td>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->location->name}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            @if(count($user->roles) == 1)
                                {{$role->name}}
                            @else
                                <div>{{$role->name}}</div> 
                            @endif                              
                        @endforeach
                    </td>
                    <td>
                        @if($user->status == 0)
                            <span class="badge badge-warning">No Activate</span>
                        @elseif($user->status == 1)
                            <span class="badge badge-success">Activate</span>
                        @elseif($user->status == 2)
                            <span class="badge badge-warning">No changed</span>
                        @elseif($user->status == 3)
                            <span class="badge badge-danger">ban</span>
                        @endif
                    </td>
                    <td>
                        <div class="hidden-sm hidden-xs btn-group">
                    <a href="{{ route('user.edit', $user->id)}}" 
                        class="btn btn-success btn-sm rounded-0 text-white" type="button"
                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                        class="fa fa-edit"></i></a>
                        
                    <a href="{{ route('user.destroy', $user->id)}}" class="btn btn-danger btn-sm btndelete">Delete</a>
                    
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form method="POST" action="" id="form-delete">
            @csrf   
            @method('DELETE')    
        </form>
        
        <hr>
        <div class="pagination pagination-sm">
            <!-- 
                khi chuyển trang url không giữ được các tham số nên thêm append vào 
                chỉnh sửa phân trang bằng cách vào folder Providers -> AppServiceProvider
                mất key sẽ không còn tác dụng tìm kiếm nữa nên phải giữ appends(request()->all())
                custom lại cais phân trang này sao
            -->

            {{-- {{$users->appends(request()->all())->links()}} --}}
            {{$users->links()}}
        </div>
    </div>
</div>



@endsection

@section('js')
    <script>
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            if(confirm('xác nhân xóa')){
                $('form#form-delete').submit();
            }
        })
    </script>
@endsection