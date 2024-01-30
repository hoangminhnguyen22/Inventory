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
                <li class="active">Asset</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" name="key" placeholder="Search ..." class="nav-search-input" name="search" autocomplete="off" />
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
                    Classes
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="clearfix form-actions">
                <div class="col-md-offset-4 col-md-9">
                    <a class="btn btn-info" type="button" href="{{route('asset.create')}}">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Create
                    </a>
                    <a class="btn btn-info" type="button" href="{{route('asset.import')}}">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Import
                    </a>
                </div>
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
                    <th>Code</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Category</th>
                    <th>Condition</th>
                    <th>Purchase</th>
                    <th>Price</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($assets as $asset)
                <tr>
                    <td class="center">
                        <label class="pos-rel">
                            <input type="checkbox" class="ace">
                            <span class="lbl"></span>
                        </label>
                    </td>
                    <td>{{$asset->id}}</td>
                    <td>{{$asset->code}}</td>
                    <td>{{$asset->name}}</td>
                    <td>
                        <div>{{$asset->location->name}}</div>
                        <div>{{$asset->location->department->name}}</div>
                    </td>
                    <td>{{$asset->category->name}}</td>
                    <td>
                        @switch($asset->condition)
                            @case(0)
                                NON-EXISTENT
                                @break
                            @case(1)
                                VERY GOOD
                                @break
                            @case(2)
                                GOOD
                                @break
                            @case(3)
                                FAIR
                                @break
                            @case(4)
                                REQUIRES RENEWAL
                                @break
                            @case(5)
                                UNSERVICEABLE
                                @break
                            @default
                                
                        @endswitch
                    </td>                    
                    <td>
                        <div>Date: {{$asset->purchase->date ?? 'none'}}</div>
                        <div>Serial: {{$asset->purchase->serial ?? 'none'}}</div>
                        <div>Warranty: {{$asset->purchase->warranty ?? 'none'}}</div>
                        <div>Supplier: {{$asset->purchase->supplier->name ?? 'none'}}</div>
                        <div>Model: {{$asset->purchase->modelAsset->name ?? 'none'}}</div>
                        <div>Manuactorer: {{$asset->purchase->manufactorer->name ?? 'none'}}</div>
                    </td>
                    <td>{{$asset->price}}.000VND</td>
                    <td>{{$asset->note}}</td>
                    <td>
                        <div class="hidden-sm hidden-xs btn-group">
                            <a href="{{ route('asset.show', $asset->id)}}" 
                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                data-toggle="tooltip" data-placement="top" title="view">
                                <i class="fa fa-eye">
                            
                                </i>
                            </a>

                            <a href="{{ route('asset.edit', $asset->id)}}" 
                                class="btn btn-warning btn-sm rounded-0 text-white" type="button"
                                data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-edit">

                                </i>
                            </a>
                                
                            <a href="{{ route('asset.destroy', $asset->id)}}" 
                                class="btn btn-danger btn-sm rounded-0 text-white btndelete" type="button">
                                <i class="fa fa-trash">
                                </i>
                            </a>                        
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

            {{$assets->appends(request()->all())->links()}}
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