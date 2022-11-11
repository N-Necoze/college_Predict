<!--?php 
// 実行環境に合わせて言語も指定。実行ファイルは絶対パスで指定

$command = "python resources/views/python/predict.py";
exec($command, $output);

foreach ($output as $o) {
  echo $o . '<br>';
}
?-->