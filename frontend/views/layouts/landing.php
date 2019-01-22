<?php
/* @var $this \yii\web\View */

/* @var $content string */


\frontend\assets\TemplateV2Asset::register($this);
?>

<?php $this->beginPage() ?>

    <?= $this->render("header-layout-v2")?>
    <body>
    <?php $this->beginBody() ?>
    <header class="main-header none-margin">
    <?= $this->render("partials/_top_site_bar"); ?>

    <main>

        <?php


        $arr = [
            "cat" =>
                [
                    "id" => 1,
                    "name" => "Category 1",
                    "games" => [
                        ["name" => "Game1"]
                    ],
                    "cat" => [
                        ["id" => 2, "name" => "Category2", "games" => [
                            ["name" => "Game2"]]],
                        ["id" => 3, "name" => "Category3",
                            "cat" => [
                                ["id" => 4, "name" => "Category 4",
                                    "cat" => [["id" => 5, "name" => "Category 5", "games" => [
                                        ["name" => "Game5"]]]],

                                ],
                            ]
                        ]
                    ]]];
    $games = [];
        function recGames(&$arr, &$games, $prevCategory = [], $lvl = 1)
        {
            $is_cat = false;
            foreach ($arr as $key => $record) {
                foreach ($record as $k_row => $row) {
                    if ($k_row == "games") {
                        foreach ($row as $game) {
                            if ($prevCategory) {
                                foreach ($prevCategory as $pre_key => $prev_cat)
                                {
                                    $game["Category" . ($lvl - ($lvl - ($pre_key+1)))] = $prev_cat;
                                }
                            }
                            $game["Category" . $lvl] = $record["name"];
                            $game["Category_lvl"] = $lvl;
                            $games[] = $game;
                        }
                    }
                    if ($k_row == "cat") {
                        $is_cat = true;
                    }
                }
                if ($is_cat === true) {
                    $prevCategory[] = $record["name"];
                    $lvl++;
                    recGames($record["cat"], $games, $prevCategory, $lvl);
                }
            }
        }

    recGames($arr, $games);

    var_dump($games);



        ?>




        <?= $content; ?>

    </main>
    <?= $this->render("footer-layout-v2"); ?>

    <?php $this->endBody() ?>
    </body>
    </html>

<?php $this->endPage() ?>