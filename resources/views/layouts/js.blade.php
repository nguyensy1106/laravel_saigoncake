
    <script src="{{ asset('client/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('client/js/jquery.nicescroll.min.js') }}"></script>
    <!-- ALL JS FILES --->
    <script src="{{ asset('client/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('client/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('client/js/jquery.superslides.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('client/js/inewsticker.js') }}"></script>
    <script src="{{ asset('client/js/bootsnav.js.') }}"></script>
    <script src="{{ asset('client/js/images-loded.min.js') }}"></script>
    <script src="{{ asset('client/js/isotope.min.js') }}"></script>
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/js/baguetteBox.min.js') }}"></script>
    <script src="{{ asset('client/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('client/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('client/js/custom.js') }}"></script>
    <script>
        $(document).ready(function(){
             $( "#slider-range" ).slider({
              orientation: "vertical",
              range: true,
              values: [ 17, 67 ],
              slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
              }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
              " - $" + $( "#slider-range" ).slider( "values", 1 ) );  
        });
    </script>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $('#sort').on('change', function(){
                var url = $(this).val();
                /*alert(url);*/
                if(url) {
                    window.location = url;
                }
                return false;
            });
        });
    </script>
    

