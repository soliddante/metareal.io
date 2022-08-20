<script>
    map.on("mousemove", "state-fills", (e) => {
        if (e.features.length > 0) {
            if (hoveredStateId !== null) {
                map.setFeatureState({
                    source: "states",
                    id: hoveredStateId
                }, {
                    hover: false
                });
            }
            hoveredStateId = e.features[0].id;
            map.setFeatureState({
                source: "states",
                id: hoveredStateId
            }, {
                hover: true
            });
        }
    });
    map.on("mouseleave", "state-fills", () => {
        if (hoveredStateId !== null) {
            map.setFeatureState({
                source: "states",
                id: hoveredStateId
            }, {
                hover: false
            });
        }
        hoveredStateId = null;
    });
</script>
