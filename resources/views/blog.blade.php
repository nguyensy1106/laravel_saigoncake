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
  
</style>

<div class="blog-cake" style=" margin-top: 50px">
  
  <div class="site-wrap">
    <div class="site-section">
      <div class="container">
        <div class="row">
          	<div class="col-lg-9">
               	<div class="row">
                  	<div class="section-title" style="margin-bottom: 20px; margin-left: 10px">
                    	<h1>Blog</h1>
                  	</div>
                </div>
		        @foreach($data_blog as $blog)
				<div class="row mt-2">
				    <div class="col-sm-7">                
				        <div class="contents order-md-1 pl-0">
				           	<h2><a href="{{ route('blog.detail', ['slug'=>$blog->slug])}}"> {{ $blog->name_blog }} </a></h2>
				          	<p class="mb-3">{{ $blog->introduct }}</p>
				         	<div class="post-meta">
				                <span class="date-read">ngay<span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
				            </div>
				        </div>
				    </div>
				    <div class="col-sm-2">
				        <div class="thumbnail order-md-2">
				            <img src="{{ asset($blog->url_image) }}" alt="" height="150px" width="250px" />
				        </div>
				    </div>     
				</div>
				<br>
				<br>
				@endforeach
				<div class="row mt-2">
					<div class="col-4"></div>
                    <div class="col-4"> {{ $data_blog->links() }} </div>
                    <div class="col-4"></div> 
				</div>
		            <!-- endforeach -->
        	</div>

          	<div class="col-lg-3">
	            <div class="section-title"  style="margin-bottom: 50px">
	              <h2>Blog Phổ Biến</h2>
	            </div>
             	<!-- foreach -->
             	<?php
            		$i=1;	
            	?>
             	@foreach($data_blogpp as $blogpp)
	            <div class="trend-entry d-flex" style="margin-bottom: 50px">
	              <div class="number align-self-start">{{ $i }}</div>
	              <div class="trend-contents">
	                <h2><a href="{{ route('blog.detail', ['slug'=>$blogpp->slug])}}">{{ $blogpp->name_blog }}</a></h2>
	                <div class="post-meta">
	                  <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
	                  <span class="date-read"> <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
	                </div>
	              </div>
	            </div>
            	<!-- endforeach -->
            		<?php
            			$i++;
            		?>
            	@endforeach
          	</div>
        </div>

      </div>
    </div>
</div>
<div class="bot-blog" style="margin-top: 100px">
  
</div>

@endsection