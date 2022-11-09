<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Predict Numbers - rule</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <div>
        <div class="filter">
            <body>
                <div class="title">
                    <p>ナンバーズのルール</p>
                </div>
                <div class="boxes">
                    <div class="box">
                        <p class='boxtitle'><ナンバーズ3のルール></p>
                            <p class="text">
                                000から999までの中から3ケタの数字と申込タイプを選びます。
                                抽選された3ケタの数字と並び方によって当選金額が決定します。
                                また、ナンバーズ3には下2ケタだけを選ぶ「ミニ」という購入方法もあります。
                                ストレート当選なら約10万円です。
                            </p>
                            <p class="text"><br>
                                ナンバーズ3は、一口200円で購入できます。
                            </p>
                            
                    </div>
                    <div class="box">
                        <p class='boxtitle'> < 購入方法> </p>
                            <table class="text">
                                <tr><!-- 行1（見出し）-->
                                <th>タイプ</th> <th>当選条件</th>
                                </tr>
                                <tr><!-- 行2 -->
                                <td>ストレート</td> <td>3ケタの各数字と並びの順番が一致</td>
                                </tr>
                                <tr><!-- 行3 -->
                                <td>ボックス</td> <td>3ケタの各数字が一致すれば並びの順序は問わない</td>
                                </tr>
                                <tr><!-- 行4 -->
                                <td>セット</td> <td>ストレートとボックスに半分ずつ申し込み、いずれかが一致</td>
                                </tr>
                                <tr><!-- 行5 -->
                                <td>ミニ</td> <td>下2ケタの数字と並びの順序が一致</td>
                                </tr>
                            </table>
                    </div>
                </div>
                <div class="boxes">    
                    <div class="box">
                        <p class='boxtitle'>3個の数字が全て異なる場合の一般的な確率</p>
                            <table class="text">
                                <tr><!-- 行1（見出し）-->
                                <th>タイプ</th> <th>当選確率</th>
                                </tr>
                                <tr><!-- 行2 -->
                                <td>ストレート</td> <td>1/1,000</td>
                                </tr>
                                <tr><!-- 行3 -->
                                <td>ボックス</td> <td>6/1,000</td>
                                </tr>
                                <tr><!-- 行4 -->
                                <td>セット（ストレート）</td> <td>1/1,000</td>
                                </tr>
                                <tr><!-- 行5 -->
                                <td>セット（ボックス）</td> <td>5/1,000</td>
                                </tr>
                                <tr><!-- 行6 -->
                                <td>ミニ</td> <td>1/100</td>
                                </tr>
                            </table>
                    </div>
                    <div class="box">
                        <p class='boxtitle'>3個のうち2個が同一数字の場合の一般的な確率</p>
                            <table class="text">
                                <tr><!-- 行1（見出し）-->
                                <th>タイプ</th> <th>当選確率</th>
                                </tr>
                                <tr><!-- 行2 -->
                                <td>ストレート</td> <td>1/1,000</td>
                                </tr>
                                <tr><!-- 行3 -->
                                <td>ボックス</td> <td>3/1,000</td>
                                </tr>
                                <tr><!-- 行4 -->
                                <td>セット（ストレート）</td> <td>1/1,000</td>
                                </tr>
                                <tr><!-- 行5 -->
                                <td>セット（ボックス）</td> <td>2/1,000</td>
                                </tr>
                                <tr><!-- 行6 -->
                                <td>ミニ</td> <td>1/100</td>
                                </tr>
                            </table>
                    </div>
                        
                </div>
            </body>
        </div>
    </div>
</html>
