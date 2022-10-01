<?php

echo var_dump($data);
echo '<br>';
echo count($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        let visitorBln = {2022: [<?php foreach ($data['thn'][2022]['visitorBln'] as $e) {echo $e; echo ',';} ?>]};
        const bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    </script>
</body>
</html>
