<script>
    let color_logic = {
        "fill-opacity": [
            'case',
            ["==",
                ["feature-state", "hover"], true
            ], 1, 0.5 //default
        ],
        "fill-color": [
            'case',
            ["==", ["feature-state", "owned_by_this_user"], 1], 'green',
            ["==", ["feature-state", "owned_by_this_user"], 0], 'white',
            '#76CEFF' //default
        ],
        "fill-outline-color": '#000000',
    };

    map.on("load", () => {
        map.addSource("rookesh_json_source", {
            type: "geojson",
            data: "{{ asset('features.geojson') }}",
        });
        map.addLayer({
            id: "rookesh_layer",
            type: "fill",
            source: "rookesh_json_source",
            paint: color_logic
        });




        afterMapLoad()
        after2()
    });
</script>
<script>
    var jsonObject;
    var center0;
    var poli1;
    var poli2;
    var poli1turf;
    var poli2turf;
    var theIntersect;
    var uniois;
    var buffered;

    function after2() {
        var xhReq = new XMLHttpRequest();
        xhReq.open("GET", "{{ asset('features.geojson') }}", false);
        xhReq.send(null);
        jsonObject = JSON.parse(xhReq.responseText);
        // console.log(jsonObject);
        center0 = turf.center(jsonObject.features[0]);

        buffered = turf.buffer(center0, 100, {
            units: 'meters'
        });


        poli1 = buffered;
        poli2 = jsonObject;
        uniois = []
        turf.featureEach(poli2, function(currentFeature, featureIndex) {
            console.log(turf.intersect(poli1, currentFeature));
            if (turf.intersect(poli1, currentFeature) != null) {
                uni = turf.union((turf.intersect(poli1, currentFeature)), currentFeature)
                uniois.push(uni);
            }
        });

        uniois = turf.featureCollection(uniois)

        console.log(uniois);

        // map.addSource("rookesh_sakhtegi", {
        //     type: "geojson",
        //     data: buffered
        // })
        // map.addLayer({
        //     id: "rookesh_layer2",
        //     type: "fill",
        //     source: "rookesh_sakhtegi",
        //     paint: {
        //         "fill-opacity": 0
        //     },
        // })

        map.addSource("rookesh_sakhtegi2", {
            type: "geojson",
            data: uniois
        })
        map.addLayer({
            id: "rookesh_layer3",
            type: "fill",
            source: "rookesh_sakhtegi2",
            paint: {
                "fill-color": 'red'
            },
        })
    }
</script>
