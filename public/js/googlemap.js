
function initMap() {

    var mapElement = document.getElementById('map');
    // fetch('http://127.0.0.1:8000/api/diemdung/searchMap?cactuyen=${}')
    // .then(response => response.json())
    // .then(data => console.log(data));
    const searchInputBox = document.getElementById("input-box");
    searchInputBox.addEventListener('keypress',(event)=>{
    if(event.keyCode == 13){
        getMap(searchInputBox.value);
        }
    });
    function getMap(cactuyen){
        fetch(`http://127.0.0.1:8000/api/diemdung/searchMap?cactuyen=${cactuyen}`)
        .then(response => response.json())
        .then(mapDisplay);
    }
    function mapDisplay(datas){
        //map options
        var options = {
            center: { lat:Number(datas[0].lat), lng:  Number(datas[0].lng) },
            zoom: 14,
            mapTypeId: "terrain",
        }
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(mapElement, options );


        var markers = new Array();
        // const image ="./images/busstop.svg";
        for (let index = 0; index < datas.length; index++) {
            markers.push({
                coords: { lat: Number(datas[index].lat), lng:  Number(datas[index].lng) },
                // iconImage:image,
                content: `<div><h5>${datas[index].tendiadiem}</h5><h4 style='border:1px solid #000'>Bus:${datas[index].cactuyen}</h4></div>`
            })
        }

        //loop through marker
        for ( var i = 0; i < markers.length; i++ ){
            addMarker(markers[i]);
        }
        // var flightPlanCoordinates = new Array();
        // for(let index = 0;index<datas.length;index++){
        //         flightPlanCoordinates.push({lat: Number(datas[index].lat), lng:  Number(datas[index].lng)})
        //     }
        // const flightPath = new google.maps.Polyline({
        //     path: flightPlanCoordinates,
        //     geodesic: true,
        //     strokeColor: "#FF0000",
        //     strokeOpacity: 1.0,
        //     strokeWeight: 2,
        //     });
        // flightPath.setMap(map);
        //addMarker();
        function addMarker(props){
            var marker = new google.maps.Marker({
                position: props.coords,
                map:map,
            });

            if(props.iconImage){
                marker.setIcon(props.iconImage);
            }

            if(props.content){

                var infowindow = new google.maps.InfoWindow({
                    content: props.content
                });

                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            }
        }
        var btn_GPS = document.getElementById('GPS');
        btn_GPS.addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Ko Lấy Được Vị Trí Hiện Tại Của Bạn !!!");
        }
        }, false);
        function showPosition(position) {
            var show_lat = position.coords.latitude;
            var show_lng = position.coords.longitude;
            var marker_GPS = {
                coords: { lat: show_lat, lng: show_lng }
            }
            addMarker(marker_GPS);
            creat_bankinh(show_lat, show_lng, 500);
            console.log(marker_GPS.coords)
            const dakota = {lat:marker_GPS.coords.lat, lng: marker_GPS.coords.lng};
            // const dakota = {lat:21.174354922739774,lng:105.89601488889593};
            let frick = {lat: datas[0].lat,lng: datas[0].lng};
            var arr=[]
            for (let index = 0; index < datas.length; index++) {
                frick = {lat: datas[index].lat,lng: datas[index].lng};
                var mk1 = new google.maps.Marker({position: dakota, map: map});
                var mk2 = new google.maps.Marker({position: frick, map: map});
                function haversine_distance(mk1, mk2) {
                    var R = 3958.8; // Radius of the Earth in miles
                    var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
                    var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
                    var difflat = rlat2-rlat1; // Radian difference (latitudes)
                    var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)
              
                    var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
                    return d;
                }
                for ( var i = 0; i < markers.length; i++ ){
                    addMarker(markers[i]);
                }
                var distance = haversine_distance(mk1, mk2);
                arr.push(distance);
            }
            let min = arr[0]
            for(i=0;i<arr.length;i++){
                if(arr[i]<min){
                    min = arr[i]
                }
            console.log(min)
            if(min == arr[i]){
                console.log(datas[i].tendiadiem)
                document.getElementById('msg_name').innerHTML ="Điểm dừng gần bạn nhất là:"+datas[i].tendiadiem;
                document.getElementById('msg_kc').innerHTML ="Điểm dừng cách bạn: " + (min/0.00062137).toFixed(2) +" mét";
            }
            // var line = new google.maps.Polyline({path: [dakota, frick], map: map});
            }
        }
        var cityCircle;
    
        function creat_bankinh(user_lat_get, user_lng_get, radius) {
            if (user_lng_get && user_lat_get) {
                cityCircle = new google.maps.Circle({
                    strokeColor: '#888',
                    strokeOpacity: 0.5,
                    strokeWeight: 2,
                    fillColor: '#03A9F4',
                    fillOpacity: 0.1,
                    map: map,
                    zoom: 15,
                    center: { lat: user_lat_get, lng: user_lng_get },
                    radius: radius
                });
            }
        }
    };
} //initMap end
