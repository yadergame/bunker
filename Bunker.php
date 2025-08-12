<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бункер</title>
</head>
<body>
    <div class="DateBunker">
        <?php 
            include_once 'LogicBunker.php';
            print_r("Людей:".(string)GetDateBunker("People")."<br>");
            print_r("Металла:".(string)GetDateBunker("Metal")."<br>");
            print_r("Еды:".(string)GetDateBunker("Food")."<br>");
        ?>
    </div>
    <div>
        <?php include_once 'distribution_of_people.php';
            Logic();
        ?>
    </div>
    <h3>Распределение людей на работы</h3>
    <div>
        <form method="post">
            <p>На склад:<input type="number" name="storage">людей</p>
            <p>На Разгребания выхода:<input type="number" name="exit">людей</p>
            <p>На отдых:<input type="number" name="relax">людей</p>
            <input type="submit" value="Отправить">
        </form>
    </div>
</body>
</html>