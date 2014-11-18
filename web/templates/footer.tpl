
</div></div>

<div id = 'load' style = "position:absolute;top:50%;left:50%; "></div>
<script type="text/javascript">
        //loading 动画的样式设置
        var cl = new CanvasLoader('load');
        cl.setColor('#000000'); // default is '#000000'
        cl.setShape('spiral'); // default is 'oval'
        cl.setDiameter(200); // default is 40
        cl.setDensity(31); // default is 40
        cl.setRange(0.8); // default is 1.3
        cl.setFPS(18); // default is 24
        cl.show(); // Hidden by default
        
        // This bit is only for positioning - not necessary
          var loaderObj = document.getElementById("canvasLoader");
        loaderObj.style.position = "absolute";
        loaderObj.style["top"] = cl.getDiameter() * -0.5 + "px";
        loaderObj.style["left"] = cl.getDiameter() * -0.5 + "px";
        $("#load").hide();
    </script>
</body>
</html>
