<!DOCTYPE html>
<html>
<body>
  <?php
    $file_path = "csv/predict.csv";
    $file = new \SplFileObject($file_path);
    $file->setFlags(
        \SplFileObject::READ_CSV |
        \SplFileObject::READ_AHEAD |
        \SplFileObject::SKIP_EMPTY |
        \SplFileObject::DROP_NEW_LINE
    );
    ?>
    
    <table>
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
  </body>
</html>