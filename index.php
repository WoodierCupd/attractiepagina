<?php
session_start();
require_once 'admin/backend/config.php';
?>

<!doctype html>
<html lang="nl">

<head>
    <title>Attractiepagina</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
    <link rel="icon" href="<?php echo $base_url; ?>/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php
    require_once 'admin/backend/conn.php';
    $query = "SELECT * FROM rides";
    $statement = $conn->prepare($query);
    $statement->execute();
    $rides = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <?php require_once 'header.php'; ?>
    <div class="container content">
        <aside>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia modi dolore magnam! Iste libero voluptatum autem, sapiente ullam earum nostrum sed magnam vel laboriosam quibusdam, officia, esse vitae dignissimos nulla?
        </aside>
        <main>
            <div class="attracties">
                <?php foreach($rides as $ride): ?>
                    <div class="attractie <?php if ($ride['fast_pass'] == True)echo "large";?>">
                        <img src="img/attracties/<?php echo $ride['img_file']; ?>" alt="foto van <?php echo $ride['title']; ?>">
                        <div class="attractie-onder">
                            <div class="attractie-info">
                                <p class="themeland"><?php echo  $result_str = strtoupper($ride['themeland']); ?></p>
                                <h2><?php echo $ride['title']; ?></h2>
                                <p><?php echo $ride['description']; ?></p>
                                <p class="lenght"><b><?php echo $ride['min_length']; ?>cm</b> minimalen lengte</p>
                            </div>
                            <?php if ($ride['fast_pass'] == True){?>
                                <div class="fast-pass">
                                    <p>Deze attracite is alleen te bezoeken met een fastpass</p>
                                    <p>Boek nu en sla de wachtrij over</p>
                                    <button>FAST PASS</button>
                                </div>
                            <?php }?>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
    </div>

</body>

</html>