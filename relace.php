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
        <div class="button"><a href="data.php">Data</a></div>
        <div class="button pressed"><a href="relace.php">Relace</a></div>
    </div>
    <div class="flex-container vertical">
        <div class="dark"></div>
        <div style="padding: 10px;">
            <h1>Data</h1>
            <table  class="underline">
                <tr>
                    <th>
                        mac adresa
                    </th>
                    <th>
                        čas připojení
                    </th>
                    <th>
                        data
                    </th>            
                </tr>
                <?php
                $sql = "SELECT * FROM data";
                $devd = new mysqli("localhost","root","","agents");
                if (!$devd) {
                    die("Connection failed: " . mysqli_connect_error());
                  }
                $content=$devd->query($sql);
                if($content -> num_rows > 0)
                {
                    while($row=$content->fetch_assoc())
                    {
                       
                        //vymazání
                        if(isset($_POST[$row["id"]]))
                        {                            
                            echo $devd->query("DELETE FROM data WHERE id='".$row["id"]."'");
                        }
                        else
                        {
                            //výpis
                            echo sprintf("
                            <tr>
                                <td>
                                    %s
                                </td>
                                <td>
                                    %s
                                </td>
                                <td>
                                    %s
                                </td>
                            </tr>
                            ",$row["macaddress"],$row["connectiontime"],$row["data"]);
                        }
                    }
                }
                else
                echo"<tr><td>0 výsledků</td></tr>";








               
                ?>
            </table>
        </div>
    </div>
















</body>