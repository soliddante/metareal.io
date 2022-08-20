<script>
    map.on("load", () => {
        map.addSource("states", {
            type: "geojson",
            data: "{{ asset('features.geojson') }}",
        });
        map.addLayer({
            id: "state-fills",
            type: "fill",
            source: "states",
            layout: {},
            paint: {

                "fill-opacity": [
                    'case',
                    ["==",
                    ["feature-state", "hover"], true], 1, 0.5 //default
                ],
                "fill-color": [
                    'case',
                    ["==", ["feature-state", "owned_by_this_user"], 1], 'green',
                    ["==", ["feature-state", "owned_by_this_user"], 0], 'white',
                    // ["==", ["feature-state", "hover"], false], 'red',
                    '#76CEFF' //default
                ],

                "fill-outline-color": '#000000',

            },
        });
    });
</script>
