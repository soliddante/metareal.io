<script>
    //land set land owners
    map.on("load", () => {
        @foreach ($lands as $land)
            map.setFeatureState({
                source: "states",
                id: "{{ $land->geo_id }}"
            }, {
                @if ($land->user_id == auth()->user()->id)
                    owned_by_this_user: 1
                @endif
            });
        @endforeach

    });

</script>
