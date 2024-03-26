<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP基礎編</title>
</head>

<body>
    <p>
        <?php
         $num = [15, 4, 18, 23, 10 ];



        /*
         関数名 sort_2way
         引数 $array: ソート対象の配列
         引数 $order:ソート方向（ture昇順,false降順)
         戻り値：なし
         機能：第２引数に指定したソート方向（昇順・降順）で、
        　　　第１引数の配列をソートする
         */

        function sort_2way($array,$order){
          if ($order === 'true') {
            echo '昇順にソートします<br>';
            sort($array);
            foreach($array as $array){
             echo "{$array}<br>";   
            }
            }          
          else {
            echo '降順にソートします<br>';
            rsort($array);
            foreach($array as $array){
              echo "{$array}<br>"; 
            }
          }
        }
       sort_2way($num,'true');
       sort_2way($num,'false');

        ?>
    </p>
</body>

</html>