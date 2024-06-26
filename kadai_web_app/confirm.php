<?php

// sessionを開始
session_start();

// postリクエストから入力データを取得
$name = $_POST['user_name'];
$age = $_POST['user_age'];
$category = $_POST['category'];

// エラーメッセージを格納する配列
$errors=[];//最初はエラーなし

// お名前のバリテーション
if(empty($name)){
  $errors[]='お名前を入力してください。';
}

// メールアドレスのバリテーション
if(empty($age)){
  $errors[]='年齢を入力してください';
}elseif(!is_numeric($age)){
  $errors[]='年齢には半角数値を入力してください。';
}

// 入力項目に問題がなければセッション・クッキーを保存
if(empty($errors)){
  // セッション変数を保存
  $_SESSION['name']=$name;
  $_SESSION['age']=$age;
  $_SESSION['category']=$category;
 
  // クッキーを登録
  setcookie('name',$name,time()+3600);
  setcookie('age',$age,time()+3600);


}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>PHP基礎編</title>
</head>

<body>
  <h2>入力内容をご確認ください。</h2>
  <p>問題なければ「確定」、修正する場合は「キャンセル」をクリックしてください。</p>

  <table border="1">
    <tr>
      <th>項目</th>
      <th>入力内容</th>
    </tr>
    <tr>
      <td>お名前</td>
      <td><?php echo $name; ?></td>
    </tr>
    <tr>
      <td>年齢</td>
      <td><?php echo $age; ?></td>
    </tr>
    <tr>
      <td>所属部署</td>
      <td><?php echo $category; ?></td>
    </tr>
  </table>

  <p>
    <button id="confirm-btn" onclick="location.href='complete.php';">確定</button>
    <button id="cancel-btn" onclick="history.back();">キャンセル</button>
  </P>

  <?php
  // 入力項目にエラーがある場合の処理
  if(!empty($errors)){
    // 配列内のエラーメッセージを順番に出力
    foreach($errors as $error){
      echo '<font color="red">'.$error.'</font>'.'<br>';
    }
    // 確定ボタンを無効化するjavascriptコードをブラウザ側に送信
    echo '<script>document.getElementById("confirm-btn").disabled=true;</script>';
  }
  ?>
</body>
</html>