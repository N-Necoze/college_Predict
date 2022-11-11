<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Predict Numbers - home</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <div class="background">
        <div class="filter">
            <body>
                <!-- predict.csvファイルの読み込み -->
                <?php
                    $file_path = "csv/five_predict.csv";
                    $file = new \SplFileObject($file_path);
                    $file->setFlags(
                        \SplFileObject::READ_CSV |
                        \SplFileObject::READ_AHEAD |
                        \SplFileObject::SKIP_EMPTY |
                        \SplFileObject::DROP_NEW_LINE
                    );
                ?>
                <div>
                    <p class="title">宝くじ番号自動生成アプリ</p>
                    <p class="subtitle">〜 運 よ り 証 拠 で 一 攫 千 金 !! 〜</p>
                </div>
                <div class="bord">
                    <table>
                        <p class="bordtitle"><今週の番号予測></p>
                        <tr>
                            <th>確率降順</th>
                            <th>予測番号</th>
                        </tr>
                        <?php foreach($file as $value){ ?>
                        <tr>
                            <td><?php echo $value[0] ?></td>
                            <td><?php echo $value[1] ?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="menu">
                    <p>アプリ説明</p>
                    <p></p>
                    <p>ナンバーズのルール</p>
                    <p>他の当選番号</p>
                </div>
            </body>
        </div>
    </div>
</html>
