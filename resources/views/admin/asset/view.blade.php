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
                    <a href="#">View</a>
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
                    <h4 class="widget-title lighter">New Item Wizard</h4>

                    <div class="widget-toolbar">
                        <label>
                            <small class="green">
                                <b>Validation</b>
                            </small>

                            <input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4" />
                            <span class="lbl middle"></span>
                        </label>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <div id="fuelux-wizard-container">

                            <hr />

                            <div class="step-content pos-rel">
                                <div class="step-pane active" data-step="1">

                                    <h3 class="lighter block green">Asset information</h3>
                                    <form class="form-horizontal" id="validation-form" method="get">
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right">Name:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" class="col-xs-12 col-sm-6" value="{{$asset->name}}" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right">Location:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" class="col-xs-12 col-sm-4" value="{{$asset->location->name}}" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Condition:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" class="col-xs-12 col-sm-4" value="{{$asset->condition}}" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Category:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" class="col-xs-12 col-sm-4" value="{{$asset->category->name}}" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Note:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <textarea type="text" value="{{$asset->note}}" class="col-xs-12 col-sm-5" disabled>{{$asset->note}}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                    </form>

                                    <h3 class="lighter block green">Purchase information</h3>
                                    <form class="form-horizontal" id="validation-form" method="get">
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Manufactorer:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" value="{{$asset->purchase->manufactorer->name}}" class="col-xs-12 col-sm-6" disabled/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Model:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" value="{{$asset->purchase->modelAsset->name}}" disabled class="col-xs-12 col-sm-4" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Serial:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" disabled value="{{$asset->purchase->serial}}" class="col-xs-12 col-sm-4" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Date:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" disabled value="{{$asset->purchase->date}}" class="col-xs-12 col-sm-5" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Warranty:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" disabled value="{{$asset->purchase->warranty}}" class="col-xs-12 col-sm-5" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Price:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" disabled value="{{$asset->price}}" class="col-xs-12 col-sm-5" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Supplier:</label>

                                            <div class="col-xs-12 col-sm-9">
                                                <div class="clearfix">
                                                    <input type="text" disabled value="{{$asset->purchase->supplier->name}}" class="col-xs-12 col-sm-5" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-2"></div>
                                    </form>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-4 col-md-9">
                                            <a class="btn btn-info" href="{{route('asset.edit', $asset->id)}}">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Edit
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
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