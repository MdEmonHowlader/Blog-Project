<script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Additional Scripts -->
<script src="{{ asset('front/assets/js/custom.js') }}"></script>
<script src="{{ asset('front/assets/js/owl.js') }}"></script>
<script src="{{ asset('front/assets/js/slick.js') }}"></script>
<script src="{{ asset('front/assets/js/isotope.js') }}"></script>
<script src="{{ asset('front/assets/js/accordions.js') }}"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>