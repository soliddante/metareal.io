@if (Session::has('msg'))
    <div class="global_modal fixed z-40 mx-auto rounded-lg bg-green-500 top-10 w-[70vw] right-0 left-0 h-[60px] flex px-4 text-white items-center">
        {{ Session::get('msg') }}
    </div>
@endif
<script>
    $('.global_modal').delay(1500).fadeOut();
</script>
