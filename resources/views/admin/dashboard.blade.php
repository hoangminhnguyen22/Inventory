@extends('admin.layout.masterLayout')

@section('link')

    <title>Dashboard - Ace Admin</title>

    <meta name="description" content="overview &amp; stats" />
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
            <li class="active">Dashboard</li>
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
                Dashboard
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    overview &amp; stats
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <div class="row">
                    <div class="space-6"></div>

                    <div class="col-sm-5 infobox-container">
                        <div class="infobox infobox-green">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-users"></i>
                            </div>

                            <div class="infobox-data">
                                <div class="infobox-content">Total user</div>
                                <span class="infobox-data-number">{{count($total_user)}}</span>
                            </div>
                        </div>

                        <div class="infobox infobox-blue">
                            <div class="infobox-icon">
                                <i class="ace-icon fa fa-laptop"></i>
                            </div>

                            <div class="infobox-data">
                                <div class="infobox-content">Total asset</div>
                                <span class="infobox-data-number">{{count($total_asset)}}</span>
                            </div>
                        </div>

                        <div class="space-6"></div>
                    </div>

                    <div class="vspace-12-sm"></div>
                </div><!-- /.row -->

                <div class="hr hr32 hr-dotted"></div>

                <div class="row">
                    <div class="col-sm-5">
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-flat">
                                <h4 class="widget-title lighter">
                                    <i class="ace-icon fa fa-star orange"></i>
                                    Popular Domains
                                </h4>

                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main no-padding">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thin-border-bottom">
                                            <tr>
                                                <th>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>name
                                                </th>

                                                <th>
                                                    <i class="ace-icon fa fa-caret-right blue"></i>price
                                                </th>

                                                <th class="hidden-480">
                                                    <i class="ace-icon fa fa-caret-right blue"></i>status
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>internet.com</td>

                                                <td>
                                                    <small>
                                                        <s class="red">$29.99</s>
                                                    </small>
                                                    <b class="green">$19.99</b>
                                                </td>

                                                <td class="hidden-480">
                                                    <span class="label label-info arrowed-right arrowed-in">on sale</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>online.com</td>

                                                <td>
                                                    <b class="blue">$16.45</b>
                                                </td>

                                                <td class="hidden-480">
                                                    <span class="label label-success arrowed-in arrowed-in-right">approved</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>newnet.com</td>

                                                <td>
                                                    <b class="blue">$15.00</b>
                                                </td>

                                                <td class="hidden-480">
                                                    <span class="label label-danger arrowed">pending</span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>web.com</td>

                                                <td>
                                                    <small>
                                                        <s class="red">$24.99</s>
                                                    </small>
                                                    <b class="green">$19.95</b>
                                                </td>

                                                <td class="hidden-480">
                                                    <span class="label arrowed">
                                                        <s>out of stock</s>
                                                    </span>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>domain.com</td>

                                                <td>
                                                    <b class="blue">$12.00</b>
                                                </td>

                                                <td class="hidden-480">
                                                    <span class="label label-warning arrowed arrowed-right">SOLD</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.widget-box -->
                    </div><!-- /.col -->

                    <div class="col-sm-7">
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-flat">
                                <h4 class="widget-title lighter">
                                    <i class="ace-icon fa fa-signal"></i>
                                    Sale Stats
                                </h4>

                                <div class="widget-toolbar">
                                    <a href="#" data-action="collapse">
                                        <i class="ace-icon fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main padding-4">
                                    <div id="sales-charts"></div>
                                </div><!-- /.widget-main -->
                            </div><!-- /.widget-body -->
                        </div><!-- /.widget-box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <!-- dashboard khác -->

                <!-- PAGE CONTENT ENDS -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
</div>
@endsection
