<script>
    map.on("mousemove", "rookesh_layer", (e) => {
        if (e.features.length > 0) {
            if (hoveredStateId !== null) {
                map.setFeatureState({
                    source: "rookesh_json_source",
                    id: hoveredStateId
                }, {
                    hover: false
                });
            }
            hoveredStateId = e.features[0].id;
            map.setFeatureState({
                source: "rookesh_json_source",
                id: hoveredStateId
            }, {
                hover: true
            });
        }
    });
    map.on("mouseleave", "rookesh_layer", () => {
        if (hoveredStateId !== null) {
            map.setFeatureState({
                source: "rookesh_json_source",
                id: hoveredStateId
            }, {
                hover: false
            });
        }
        hoveredStateId = null;
    });
</script>
