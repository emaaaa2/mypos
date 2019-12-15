@extends('layouts.dashboard.app')

@section('content')


<div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.users')</h1>

            <ol class="breadcrumb">

                <li ><a href="{{ route('dashboard.index') }}">@lang('site.dashboard')</a></li>
                <li><a href="{{ route('dashboard.users.index') }}"></i>@lang('site.users')</a></li>
                <li class="active"><a href="{{ route('dashboard.users.create') }}"></i>@lang('site.create')</a></li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

              
              <div class="box-body">


                <form method="post" action="{{ route('dashboard.users.store')}}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('post')}}
                    @include('partials._errors')

                    
                    <div class="form-group">
                    <label>@lang('site.first_name')</label>
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}">
                </div>


                <div class="form-group">
                    <label>@lang('site.last_name')</label>
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"> 
                </div>



                <div class="form-group">
                    <label>@lang('site.email')</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                </div>

             <div class="form-group">
                <label>@lang('site.image')</label>
                <input type="file" name="image" class="form-control image">
            </div>

            <div class="form-group">
                <img src="{{ asset('uploads/user_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
            </div>



                <div class="form-group">
                    <label>@lang('site.password')</label>
                    <input  name="password" class="form-control" type="password">
                </div>


                <div class="form-group">
                    <label>@lang('site.password_confirmation')</label>
                    <input  name="password_confirmation" class="form-control" type="password"> 
                </div>


           <div class="form-group">
                            <label>@lang('site.permissions')</label>
                            <div class="nav-tabs-custom">

                                @php
                                    $models = ['users', 'categories', 'products', 'clients'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                @endphp

                                <ul class="nav nav-tabs">
                                    @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">

                                    @foreach ($models as $index=>$model)

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

                                            @foreach ($maps as $map)
                                                <label><input type="checkbox" name="permissions[]" value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach

                                        </div>

                                    @endforeach

                                </div><!-- end of tab content -->
                                
                            </div><!-- end of nav tabs -->



                 <div class="form-group">
                     <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</button>
                 </div>


                </form>

            
          


              </div> <!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection