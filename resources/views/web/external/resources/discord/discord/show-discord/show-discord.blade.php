@extends('layouts.site.core')

@section('title', config('app.name').' | Discord')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    DISCORD
                <div class="ui-block">
                    <div class="ui-block-content">
                        <iframe src="https://discordapp.com/widget?id=558831981937295372&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
