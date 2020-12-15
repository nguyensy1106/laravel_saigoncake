@EXTENDS('layouts.master')
@section('content')
	  
  
<style type="text/css">	
	 .trend-entry .number {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50px;
    flex: 0 0 50px;
    font-size: 30px;
    line-height: 1;
    color: #ccc;
	}
	.img-fluid {
    width: 100%;
    height: 500px;
    margin-left: auto;
     margin-right: auto;
}
h1 {
    margin-top: 1em;
    font-size: 50px;
    color: green;
}
</style>

    <div class="site-section" style="padding-top: 30px; margin-bottom: 1em">
      <div class="container">
        <div class="row">
            <div class="col-lg-12 single-content" style="width: 100%">
                <div class="row" style="text-align: center; size: 10px;">
                  <img src="{{ asset( $blog->url_image ) }}" alt="Image" class="img-fluid"><br/>
                  	<h1>{{ $blog->name_blog }}</h1>
              	</div>
                <div class="row mt-5" style="font-size: 20px;">
                  	{!! $blog->description !!}
                </div>
            </div>
        </div>
      </div>
    </div>

@endsection