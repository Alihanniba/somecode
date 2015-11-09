<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

</body>
<script type="text/javascript">
    var ua = navigator.userAgent.toLowerCase();
    var config = {
        /*scheme:必须*/
        download_url: "",
        timeout: 600
    };
    function openclient() {
        if (ua.indexOf('os 9') > 0) {
            window.location.href = '<?php echo $_GET['url'] ?>'
        }
        var startTime = Date.now();
        var ifr = document.createElement('iframe');
        ifr.src = '<?php echo $_GET['url'] ?>';
        ifr.style.display = 'none';
        document.body.appendChild(ifr);
        var t = setTimeout(function () {
            var endTime = Date.now();


            if (!startTime || endTime - startTime < config.timeout + 200) {
//                alert(2);
                window.location = config.download_url;
            } else {
                window.location = '<?php echo $_GET['url']?>';
                window.close();
            }
        }, config.timeout);
        window.onblur = function () {
            clearTimeout(t);
        }
    }
//    alert('<?php //echo $_GET['url'] ?>//');
//    alert(1);
    openclient();
</script>
</html>