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
                    Classes
                </small>
            </h1>
        </div><!-- /.page-header -->

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
            
            <tbody>
                @foreach($assets as $asset)
                <tr>
                    
                    <td>
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div>
                                        <strong>{{$asset->name ?? 'none'}}</strong>
                                    </div>
                                    <div>
                                        Asset code: {{$asset->code ?? 'none'}}
                                    </div>
                                    <div>
                                        Date purchase: {{$asset->purchase->date ?? 'none'}}
                                    </div>
                                    <div>
                                        Warranty: {{$asset->purchase->warranty ?? 'none '}}m
                                    </div>
                                    <div>
                                        Vendor: {{$asset->purchase->supplier->name ?? 'none'}}
                                    </div>
                                    <div>
                                        Serial: {{$asset->purchase->serial ?? 'none'}} - Model: {{$asset->purchase->modelAsset->name ?? 'none'}}
                                    </div>
                                    <div>
                                        Location: {{$asset->location->name ?? 'none'}} - {{$asset->location->department->name ?? 'none'}}
                                    </div>
                                </div>
                                    
                                <div class="col-xs-4">
                                    {!! QrCode::generate($asset->code); !!}
                                </div>
                            </div>
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