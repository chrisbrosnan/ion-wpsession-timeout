<html>
<head>
<script type="text/javascript">
    window.onload=function(){
        var auto = setTimeout(function(){ autoRefresh(); }, 1);
        function submitform(){
          // alert('test');
          document.forms["expiryRedirect"].submit();
        }
        function autoRefresh(){
           clearTimeout(auto);
           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 1);
        }
    }
</script>
</head>
<body>
<?php
$last_page = $_GET['lastpage']; 
echo '<form id="expiryRedirect" name="expiryRedirect" method="post" action="'.$last_page.'">
    <input type="hidden" name="wpsessionexpired" value="true"/> 
    <input type="hidden" name="newpage" value="'.$last_page.'"/>
    </form>';
?>
</body>
</html>