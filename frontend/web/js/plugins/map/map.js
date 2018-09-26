/*
* https://github.com/10bestdesign/jqvmap
* */
$(document).ready(function () {

    function escapeXml(string) {
        return string.replace(/[<>]/g, function (c) {
            switch (c) {
                case '<': return '\u003c';
                case '>': return '\u003e';
            }
        });
    }

   /* var pins = {
        "32": escapeXml('<div class="map-pin green"><span>MO</span></div>'),
        "51": escapeXml('<div class="map-pin green"><span>MO</span></div>'),
        "12": escapeXml('<div class="map-pin green"><span>MO</span></div>'),
    };*/
    $('#vmap').vectorMap({
        map: 'ukraine_ua',
        backgroundColor: '#fff',
        borderColor: '#fff',
        color: '#279fe0',
        hoverColor: '#00d5a6',
        selectedColor: '#ffd500',
        pins: {"32": "Киев", "51": "Одесса", "12": "Днепр", "46": "Львов", "63": "Харьков"},
        selectedRegions: ["32", "12", "51", "46", "63"],
        multiSelectRegion: true,
        enableZoom: false,
        showTooltip: true,
        onRegionClick: function(element, code, region)
        {

        },
        onLabelShow : function(event, label, code)
        {
            if (code === "32")
            {
                label.text("Киев, Борисполь, Буча, Ирпень");
            }

            console.log(code);
        }

    });

});
