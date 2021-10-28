<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Map</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       
    </head>
    <style>
    
    html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#container {
  height: 100%;
  display: flex;
}

#sidebar {
  flex-basis: 15rem;
  flex-grow: 1;
  padding: 1rem;
  max-width: 30rem;
  height: 100%;
  box-sizing: border-box;
  overflow: auto;
}

#map {
  flex-basis: 0;
  flex-grow: 4;
  height: 100%;
}

#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: "Roboto", "sans-serif";
  line-height: 30px;
  padding-left: 10px;
}

#floating-panel {
  background-color: #fff;
  border: 0;
  border-radius: 2px;
  box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
  margin: 10px;
  padding: 0 0.5em;
  font: 400 18px Roboto, Arial, sans-serif;
  overflow: hidden;
  padding: 5px;
  font-size: 14px;
  text-align: center;
  line-height: 30px;
  height: auto;
}

#map {
  flex: auto;
}

#sidebar {
  flex: 0 1 auto;
  padding: 0;
}
#sidebar > div {
  padding: 0.5rem;
}
    </style>
    <body >
    <div id="floating-panel">
      <div class="searchInputBox">
        <label for="bus" style="font-size: 18;">Nhập tuyến bus bạn muốn tìm:</label><input type="text" id="input-box" class="input-box" placeholder="Enter bus name..." autocomplete="off" style="font-size: 18;">
      </div>
      <div style="font-size: 18; cursor: pointer; " id="GPS">Click xem vị trí của bạn tại đây!</div>
      <div id="msg_name" style="font-size: 18; color: #F80B23;"></div><div id="msg_kc" style="font-size: 18; color: #F80B23;"></div>
    </div>
    <div id="container">
      <div id="map"></div>
    </div>
    </body>
    <script src = "{{asset ('js/googlemap.js')}}"> </script>
   
    <script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyALDJTXYZ9070z0vn69Oia52e13AvFW4Mk&callback=initMap" async defer> </script>

</html>