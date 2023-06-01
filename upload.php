<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
$json = '{"mac":"John","datetime":"2023 - 05 - 11 00:00:00","data":"test"}';
       $json = '{"mac":"1C1B0D11D400","datetime":"2023 - 05 - 31","data":"BJNFKNNMFGOGNFGNCJCJKN NFADSFGSYDFGHDSRYHDFTXHJTSFRDXAHOJ JAK SESTEXT<ENT>AHOJ JAK SE MAS JA JSE JSM JSDDOBřEGKGGIUGIUGIUGIUBIUBGUIIUHUIHIIIIII<CTRL>V<CTRL>V<CTRL>VVHTTP.DivideDivideLOCALHOST<CTRL>SF5F5<CTRL>CF5F5F5F5"}';

$devd = new mysqli("localhost","root","","agents");
     
if($_SERVER["REQUEST_METHOD"] == "POST" || true)
{
    $postData = json_decode(file_get_contents('php://input'), true);
    /*$postData["mac"] = "000100011F5999AB1C1B0D11D400";
    $postData["datetime"] = "2023-06-01 20:30:50";
    $postData["data"] = "4";*/
    if(!empty($postData["mac"]) && !empty($postData["datetime"]) && !empty($postData["data"]))
    {
        $dataresult=$devd->query("INSERT INTO data (macaddress, connectiontime, data) VALUES
        ('".$postData["mac"]."','".$postData["datetime"]."','".$postData["data"]."')");
        $row = $devd->query("SELECT * FROM devices WHERE macaddress LIKE '".$postData["mac"]."'");
        if(($row->num_rows) > 0)
        {
            $devresult = $devd->query("UPDATE devices SET lastconnection = '".$postData["datetime"]."' WHERE macaddress = '".$postData["mac"]."'");
        }
        else
        {
            $devresult = $devd->query("INSERT INTO devices(macaddress, lastconnection) VALUES ('".$postData["mac"]."', '".$postData["datetime"]."')");
        }
        echo $devresult;       
    }
}


?>
</body>