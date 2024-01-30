@extends('admin.layout.masterLayout')

@section('link')
    <title>Edit - Ace Admin</title>

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
                    <a href="#">Edit</a>
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
                    Asset view
                </h1>
            </div>
        </div><!-- /.page-header -->
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header widget-header-blue widget-header-flat">
                    <h4 class="widget-title lighter">Edit Asset</h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <div id="fuelux-wizard-container">

                            <hr />
                            <form class="form-horizontal" action="{{route('asset.update', $asset->id)}}" method="POST">
                                @csrf 
                                @method('PUT')
                            <div class="step-content pos-rel">
                                <div class="step-pane active" data-step="1">
                                    
                                        
                                        <h3 class="lighter block green">Asset information</h3>
                                        {{-- <form class="form-horizontal">                                             --}}
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">Name:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="name" class="col-xs-12 col-sm-6" value="{{$asset->name}}" >
                                                    </div>
                                                    @error('name')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">Name:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="code" class="col-xs-12 col-sm-6" value="{{$asset->code}}" >
                                                    </div>
                                                    @error('code')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">Location:</label>
                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <select  class="col-xs-12 col-sm-6" name="location_id" class="form-control">
                                                            <option value="{{$asset->location_id}}">{{$asset->location->name}}</option>
                                                            @foreach($locations as $location)
                                                                <option value="{{$location->id}}">{{$location->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('location_id')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">Condition:</label>
                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <select  class="col-xs-12 col-sm-6" name="condition" class="form-control">
                                                            <option value="{{$asset->condition}}">
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
                                                            </option>
                                                            <option value="0">NON-EXISTENT</option>
                                                            <option value="1">VERY GOOD</option>
                                                            <option value="2">GOOD</option>
                                                            <option value="3">FAIR</option>
                                                            <option value="4">REQUIRES RENEWAL</option>
                                                            <option value="5">UNSERVICEABLE</option>
                                                        </select>
                                                    </div>
                                                    @error('condition')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Category:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <select  class="col-xs-12 col-sm-6" name="category_id" class="form-control">
                                                            <option value="{{$asset->category_id}}">{{$asset->category->name}}</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('category_id')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Note:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <textarea type="text" name="note" value="{{$asset->note}}" class="col-xs-12 col-sm-5">{{$asset->note}}</textarea>
                                                    </div>
                                                    @error('note')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                        {{-- </form> --}}

                                        <h3 class="lighter block green">Purchase information</h3>
                                        {{-- <form class="form-horizontal"> --}}
                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Manufactorer:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <select  class="col-xs-12 col-sm-6" name="manufactorer_id" class="form-control">
                                                            <option value="{{$asset->purchase->manufactorer_id}}">{{$asset->purchase->manufactorer->name}}</option>
                                                            @foreach($manufactorers as $manufactorer)
                                                                <option value="{{$manufactorer->id}}">{{$manufactorer->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('manufactorer_id')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Model:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <select  class="col-xs-12 col-sm-6" name="model_id" class="form-control">
                                                            <option value="{{$asset->purchase->model_id}}">{{$asset->purchase->modelAsset->name}}</option>
                                                            @foreach($modelAssets as $model)
                                                                <option value="{{$model->id}}">{{$model->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('model_id')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Serial:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="serial" value="{{$asset->purchase->serial}}" class="col-xs-12 col-sm-4" />
                                                    </div>
                                                    @error('serial')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Date:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="date"  value="{{$asset->purchase->date}}" class="col-xs-12 col-sm-5" />
                                                    </div>
                                                    @error('date')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Warranty:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="warranty"  value="{{$asset->purchase->warranty}}" class="col-xs-12 col-sm-5" />
                                                    </div>
                                                    @error('warranty')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Price:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <input type="text" name="price" value="{{$asset->price}}" class="col-xs-12 col-sm-5" />
                                                    </div>
                                                    @error('price')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>

                                            <div class="form-group">
                                                <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Supplier:</label>

                                                <div class="col-xs-12 col-sm-9">
                                                    <div class="clearfix">
                                                        <select  class="col-xs-12 col-sm-6" name="supplier_id" class="form-control">
                                                            <option value="{{$asset->purchase->supplier_id}}">{{$asset->purchase->supplier->name}}</option>
                                                            @foreach($suppliers as $supplier)
                                                                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('supplier_id')
                                                        <div class="clearfix has-error">
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="space-2"></div>
                                        {{-- </form> --}}

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
                                    
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
jQuery(function($) {
    
});
</script>
@endsection