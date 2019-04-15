<?php
use App\Models\User;
?>

@extends('admin.layouts.core')

@section('body')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">List of users</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col col-md-2 col-xl-2 col-lg-2">
                                    <label>ID</label>
                                    <input type="text" name="id" class="form-control" value="{{request()->get('id')}}">
                                </div>
                                <div class="col col-md-2 col-xl-2 col-lg-2">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="{{request()->get('username')}}">
                                </div>
                                <div class="col col-md-3 col-xl-3 col-lg-3">
                                    <label>Profile type</label>
                                    <select name="profile_type" class="form-control">
                                        <option value="{{User::USER_TYPE_PERFORMER}}" {{(User::USER_TYPE_PERFORMER == request()->get('profile_type')) ? 'selected' : ''}}>Performer</option>
                                        <option value="{{User::USER_TYPE_VIEWER}}" {{(User::USER_TYPE_VIEWER == request()->get('profile_type')) ? 'selected' : ''}}>Viewer</option>
                                    </select>
                                </div>
                                <div class="col col-md-2 col-xl-2 col-lg-2">
                                    <label>Order type</label>
                                    <select name="order_by_type" class="form-control">
                                        <option value="">-</option>
                                        <option value="asc" {{('asc' === request()->get('order_by_type')) ? 'selected' : ''}}>ASC</option>
                                        <option value="desc" {{('desc' === request()->get('order_by_type')) ? 'selected' : ''}}>DESC</option>
                                    </select>
                                </div>
                                <div class="col col-md-2 col-xl-2 col-lg-2">
                                    <label>Order by column</label>
                                    <select name="order_by_column" class="form-control">
                                        <option value="">-</option>
                                        <option value="username" {{('username' === request()->get('order_by_column')) ? 'selected' : ''}}>Username</option>
                                        <option value="email" {{('email' === request()->get('order_by_column')) ? 'selected' : ''}}>Email</option>
                                        <option value="profile_type" {{('profile_type' === request()->get('order_by_column')) ? 'selected' : ''}}>Profile type</option>
                                        <option value="is_verified" {{('is_verified' === request()->get('order_by_column')) ? 'selected' : ''}}>Is verified</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col col-md-3 col-xl-3 col-lg-3">
                                   <a href="{{route('web.admin.user.get')}}" class="btn btn-secondary">Reset</a>
                                   <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </div>
                        </form>
                        <br>
                        <table id="data-table" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Profile type</th>
                                <th>Is verified</th>
                                <th>Twitter</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a href="{{$user->profile_url}}" target="_blank">{{$user->username}}</a> </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->profile_type_formatted}}</td>
                                    <td>{{true === $user->is_verified ? 'Yes' : 'No'}}</td>
                                    <td>
                                        @switch($user->provider)
                                            @case(User::PROVIDER_TWITTER)
                                                <a href="https://twitter.com/{{$user->username}}" target="_blank">Twitter</a>
                                                @break
                                            @default
                                                none
                                            @break
                                        @endswitch
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('web.admin.user.verification.change-verification-status')}}">
                                            <button class="btn {{true === $user->is_verified ? 'btn-danger' : 'btn-success'}} btn-sm">{{true === $user->is_verified ? 'Unverify' : 'Verify'}}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$users->appends(request()->except(['page']))->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection