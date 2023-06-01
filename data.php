<head>
    <meta charset="UTF-8">
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    -->
    <link href="style.css" rel="stylesheet" type="text/css">








</head>
<body>
    <div class="flex-container dark horizontal">
        <div class="button"><a href="index.php">Seznam zařízení</a></div>
        <div class="button pressed"><a href="data.php">Data</a></div>
        <div class="button"><a href="relace.php">Relace</a></div>
    </div>
    <div class="flex-container vertical">
        <div class="dark"></div>
        <div style="padding: 10px;">
            <h1>Data</h1>
            <table class="underline">
                 <tr>
                    <th>
                        mac adresa
                    </th>
                    <th>
                        data
                    </th>             
                </tr>           
                <?php
                $devd = new mysqli("localhost","root","","agents");
                if (!$devd) {
                    die("Connection failed: " . mysqli_connect_error());
                  }
                $macaddresses=$devd->query("SELECT DISTINCT  macaddress FROM data ORDER BY macaddress");
                if($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $nalezeno = false;
                    while(($row = $macaddresses->fetch_assoc())&&$nalezeno==false)
                    {                        
                        if(isset($_POST[$row["macaddress"]]))
                        {
                            $macaddresses=$devd->query("SELECT macaddress FROM data WHERE macaddress LIKE '".$row["macaddress"]."'");
                            $nalezeno = true;
                        }
                    }                    
                }
                if($macaddresses -> num_rows > 0)
                {
                    while($row=$macaddresses->fetch_assoc())
                    {           
                            $data = $devd->query("SELECT data FROM data WHERE macaddress LIKE '".$row["macaddress"]."'");
                            $text = "";
                            if($data -> num_rows > 0)
                            {
                                while($datarow=$data->fetch_assoc())
                                {
                                    $text=$text.$datarow["data"];
                                }
                                
                            }       
                            if($data != "")
                            echo "<tr><td><h4>".$row["macaddress"]."</h4></td>
                                <td><div style=\"width: 300px; word-wrap: break-word\">   
                                        ".$text."
                                    </div>
                                    </td></tr>";                            
                    }
                }
                else
                echo"<tr><td>0 výsledků</td></tr>";








               
                ?>
                
            </table>
        </div>
    </div>
















</body>