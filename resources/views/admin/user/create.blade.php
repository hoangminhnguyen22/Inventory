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
                <li class="active">User</li>
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
        <div class="col-xs-12 col-sm-4">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">Text Area</h4>

                    <div class="widget-toolbar">
                        <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                        </a>

                        <a href="#" data-action="close">
                            <i class="ace-icon fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <form action="{{route('user.store')}}" method="POST">
                    @csrf
                    <div class="widget-body">
                        <div class="widget-main">

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
                                <label for="form-field-11">Email</label>

                                <input name="email" class="autosize-transition form-control">
                                @error('email')
                                    <div class="form-group has-error">
                                        <p class="help-block text-danger">{{$message}}</p>
                                    </div>
                                @enderror 
                            </div>

                            <hr />

                            <div>
                                <label for="form-field-11">Phone number</label>

                                <input name="phone" class="autosize-transition form-control">
                                @error('phone')
                                    <div class="form-group has-error">
                                        <p class="help-block text-danger">{{$message}}</p>
                                    </div>
                                @enderror 
                            </div>

                            <hr />

                            <div>
                                <label for="form-field-9">Role</label>
                                    @foreach($roles as $role) 
                                        <div>
                                            <input type="checkbox" class="role-item" name="role[]" value="{{$role->id}}"> {{$role->name}}
                                        </div>
                                    @endforeach
                                @error('role')
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

                            <div class="clearfix form-actions">
                                <div class="col-md-offset-2 col-md-9">
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
@endsection