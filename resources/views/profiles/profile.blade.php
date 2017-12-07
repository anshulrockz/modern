@extends('layouts.app')
@section('content')
<div class="profile-cover">
    <div class="row">
        <div class="col-md-3 profile-image">
            <div class="profile-image-container">
                <img src="{{ url('/uploads/'.Auth::id().md5(Auth::user()->name).'/'.$profile->avatar) }}" alt="">
            </div>
        </div>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="col-md-3 user-profile">
            <h3 class="text-center">{{$profile->name}}</h3>
            <p class="text-center"><a href="#">{{$profile->email}}</a></p>
            <hr>
            <ul class="list-unstyled text-center">
                <li><p><i class="fa fa-map-marker m-r-xs"></i>Noida, NCR, India</p></li>
                <li><p><i class="fa fa-phone m-r-xs"></i>{{$profile->mobile}}</p></li>
            </ul>
            <hr>
            <a href="{{ url('profile/edit') }}" class="btn btn-primary btn-block">
                <i class="fa fa-pencil m-r-xs"></i> Edit Profile
            </a>
        </div>
        <div class="col-md-9 m-t-lg">
            <div class="panel panel-white">
                <div class="panel-heading">
                    <div class="panel-title">Team</div>
                </div>
                <div class="panel-body">
                    <div class="team">
                        <div class="team-member">
                           <div class="online on"></div>
                            <img src="assets/images/avatar1.png" alt="">
                        </div>
                        <div class="team-member">
                           <div class="online off"></div>
                            <img src="assets/images/avatar2.png" alt="">
                        </div>
                        <div class="team-member">
                           <div class="online on"></div>
                            <img src="assets/images/avatar3.png" alt="">
                        </div>
                        <div class="team-member">
                           <div class="online on"></div>
                            <img src="assets/images/avatar5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row -->
</div><!-- Main Wrapper -->
@endsection