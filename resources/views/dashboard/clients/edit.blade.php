@extends('layouts.dashboard.app')

@section('content')


<div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.clients')</h1>

            <ol class="breadcrumb">

                <li ><a href="{{ route('dashboard.index') }}">@lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.clients.index') }}"></i>@lang('site.clients')</a></li>
                <li class="active"></i>@lang('site.edit')</a></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.clients') <small>15</small></h3>

                </div><!-- end of box header -->
              
              <div class="box-body">


                <form method="post" action="{{ route('dashboard.clients.update', $client->id) }}" >
                    @csrf
                    {{ method_field('PUT')}}
                    @include('partials._errors')

                    
                    
                                <div class="form-group">
                                    <label>@lang('site.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ $client->name }}">
                                </div>

                                 <div class="form-group">
                                    <label>@lang('site.phone')</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $client->phone }}">
                                </div>

                                 <div class="form-group">
                                    <label>@lang('site.address')</label>
                                    <input type="text" name="address" class="form-control" value="{{ $client->address }}">
                                </div>
                     



                 <div class="form-group">
                     <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('site.edit')</button>
                 </div>


                </form>

            
          


              </div> <!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection