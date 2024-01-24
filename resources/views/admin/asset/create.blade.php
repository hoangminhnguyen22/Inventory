@extends('admin.layout.masterLayout')

@section('link')
    <title>Create - Ace Admin</title>

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
                    <a href="#">Create</a>
                </li>
                <li class="active">Asset</li>
            </ul><!-- /.breadcrumb -->

            <div class="nav-search" id="nav-search">
                <form class="form-search">
                    <span class="input-icon">
                        <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                        <i class="ace-icon fa fa-search nav-search-icon"></i>
                    </span>
                </form>
            </div><!-- /.nav-search -->
        </div>
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Create
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Common form elements and layouts
                    </small>
                </h1>
            </div>
        </div><!-- /.page-header -->

        <div class="col-xs-12">
            <form action="{{route('asset.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-4"> <!-- /.first form -->
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Asset</h4>

                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>

                                    <a href="#" data-action="close">
                                        <i class="ace-icon fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">

                                    <div>
                                        <label for="form-field-9">Code</label>

                                        <input class="form-control limited" name="code" maxlength="50">
                                        @error('code')
                                            <div class="form-group has-error">
                                                <p class="help-block text-danger">{{$message}}</p>
                                            </div>
                                        @enderror 
                                    </div>

                                    <hr />

                                    <div>
                                        <label for="form-field-9">Name</label>

                                        <input class="form-control limited" name="name" maxlength="50">
                                        @error('name')
                                            <div class="form-group has-error">
                                                <p class="help-block text-danger">{{$message}}</p>
                                            </div>
                                        @enderror 
                                    </div>

                                    <hr />

                                    <div>
                                        <label for="form-field-9">Location</label>

                                        <select name="location_id" class="form-control">
                                            <option value="">--SELECT ONE--</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('location_id')
                                            <div class="form-group has-error">
                                                <p class="help-block text-danger">{{$message}}</p>
                                            </div>
                                        @enderror 
                                    </div>

                                    <hr />

                                    <div>
                                        <label for="form-field-9">Category</label>

                                        <select name="category_id" class="form-control">
                                            <option value="">--SELECT ONE--</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="form-group has-error">
                                                <p class="help-block text-danger">{{$message}}</p>
                                            </div>
                                        @enderror 
                                    </div>

                                    <hr />

                                    <div>
                                        <label for="form-field-9">Condition</label>

                                        <select name="condition" class="form-control">
                                            <option value="">--SELECT ONE--</option>
                                                <option value="0">NON-EXISTENT</option>
                                                <option value="1">VERY GOOD</option>
                                                <option value="2">GOOD</option>
                                                <option value="3">FAIR</option>
                                                <option value="4">REQUIRES RENEWAL</option>
                                                <option value="5">UNSERVICEABLE</option>
                                        </select>
                                        @error('condition')
                                            <div class="form-group has-error">
                                                <p class="help-block text-danger">{{$message}}</p>
                                            </div>
                                        @enderror 
                                    </div>

                                    <hr />

                                    <div>
                                        <label for="form-field-11">Price</label>

                                        <input name="price" class="autosize-transition form-control">
                                        @error('price')
                                            <div class="form-group has-error">
                                                <p class="help-block text-danger">{{$message}}</p>
                                            </div>
                                        @enderror 
                                    </div>

                                    <hr />

                                    <div>
                                        <label for="form-field-11">Note</label>

                                        <textarea name="note" class="autosize-transition form-control"></textarea>
                                        @error('note')
                                            <div class="form-group has-error">
                                                <p class="help-block text-danger">{{$message}}</p>
                                            </div>
                                        @enderror 
                                    </div>                            
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4"> <!-- /.second form -->
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Purchase</h4>

                                <span class="widget-toolbar">
                                    <a href="#" data-action="settings">
                                        <i class="ace-icon fa fa-cog"></i>
                                    </a>

                                    <a href="#" data-action="reload">
                                        <i class="ace-icon fa fa-refresh"></i>
                                    </a>

                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>

                                    <a href="#" data-action="close">
                                        <i class="ace-icon fa fa-times"></i>
                                    </a>
                                </span>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <div>
                                        <label for="form-field-mask-1">
                                            Date
                                        </label>

                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <input class="form-control input-mask-date" type="date" name="date">
                                            </span>
                                            @error('date')
                                                <div class="form-group has-error">
                                                    <p class="help-block text-danger">{{$message}}</p>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <hr />
                                    <div>
                                        <label for="form-field-mask-2">
                                            Serial
                                        </label>

                                        <div>
                                            <input class="form-control input-mask-phone" type="text" name="serial" />
                                            @error('serial')
                                                <div class="form-group has-error">
                                                    <p class="help-block text-danger">{{$message}}</p>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <hr />

                                    <div>
                                        <label for="form-field-mask-3">
                                            Warranty
                                        </label>

                                        <div  class="input-group">
                                            <input class="form-control input-mask-product" type="text" name="warranty" />
                                            <span class="input-group-addon">
                                                Month(s)
                                            </span>
                                            @error('warranty')
                                                <div class="form-group has-error">
                                                    <p class="help-block text-danger">{{$message}}</p>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <hr />
                                    
                                    <div>
                                        <label for="form-field-mask-3">
                                            Supplier
                                        </label>

                                        <div>
                                            <select name="supplier_id" class="form-control">
                                                <option value="">--SELECT ONE--</option>
                                                @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('supplier_id')
                                                <div class="form-group has-error">
                                                    <p class="help-block text-danger">{{$message}}</p>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <hr /><div>
                                        <label for="form-field-mask-3">
                                            Manufactorer
                                        </label>

                                        <div>
                                            <select name="manufactorer_id" class="form-control">
                                                <option value="">--SELECT ONE--</option>
                                                @foreach($manufactorers as $manufactorer)
                                                    <option value="{{$manufactorer->id}}">{{$manufactorer->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('manufactorer_id')
                                                <div class="form-group has-error">
                                                    <p class="help-block text-danger">{{$message}}</p>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <hr /><div>
                                        <label for="form-field-mask-3">
                                            Model
                                        </label>

                                        <div>
                                            <select name="model_id" class="form-control">
                                                <option value="">--SELECT ONE--</option>
                                                @foreach($modelAssets as $modelAsset)
                                                    <option value="{{$modelAsset->id}}">{{$modelAsset->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('model_id')
                                                <div class="form-group has-error">
                                                    <p class="help-block text-danger">{{$message}}</p>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <hr />

                                </div>
                            </div>
                        </div>
                    </div><!-- /.span -->

                    <div class="col-xs-12 col-sm-4"> <!-- /.third form -->
                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Upload image</h4>

                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>

                                    <a href="#" data-action="close">
                                        <i class="ace-icon fa fa-times"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input multiple="" type="file" name="image_upload" id="id-input-file-3" />
                                            @error('image_upload')
                                                <div class="form-group has-error">
                                                    <p class="help-block text-danger">{{$message}}</p>
                                                </div>
                                            @enderror 
                                        </div>
                                    </div>

                                    <label>
                                        <input type="checkbox" name="file-format" id="id-file-format" class="ace" />
                                        <span class="lbl"> Allow only images</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-4 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                Submit
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
jQuery(function($) {
    $('#id-input-file-1 , #id-input-file-2').ace_file_input({
        no_file:'No File ...',
        btn_choose:'Choose',
        btn_change:'Change',
        droppable:false,
        onchange:null,
        thumbnail:false //| true | large
        //whitelist:'gif|png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });
    //pre-show a file name, for example a previously selected file
    //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


    $('#id-input-file-3').ace_file_input({
        style: 'well',
        btn_choose: 'Drop files here or click to choose',
        btn_change: null,
        no_icon: 'ace-icon fa fa-cloud-upload',
        droppable: true,
        thumbnail: 'small'//large | fit
        //,icon_remove:null//set null, to hide remove/reset button
        /**,before_change:function(files, dropped) {
            //Check an example below
            //or examples/file-upload.html
            return true;
        }*/
        /**,before_remove : function() {
            return true;
        }*/
        ,
        preview_error : function(filename, error_code) {
            //name of the file that failed
            //error_code values
            //1 = 'FILE_LOAD_FAILED',
            //2 = 'IMAGE_LOAD_FAILED',
            //3 = 'THUMBNAIL_FAILED'
            //alert(error_code);
        }

    }).on('change', function(){
        //console.log($(this).data('ace_input_files'));
        //console.log($(this).data('ace_input_method'));
    });
});
</script>
@endsection