<?php
session_start();

require '../libs/function.php';

$_POST = checkInput( $_POST );  

//固定トークンを確認（CSRF対策）
if ( isset( $_POST[ 'ticket' ], $_SESSION[ 'ticket' ] ) ) {
  $ticket = $_POST[ 'ticket' ];
  if ( $ticket !== $_SESSION[ 'ticket' ] ) {
    //トークンが一致しない場合は処理を中止
    die( 'Access Denied!' );
  }
} else {
  //トークンが存在しない場合は処理を中止（直接このページにアクセスするとエラーになる）
  // die( 'Access Denied（直接このページにはアクセスできません）' );
  header( 'HTTP/1.1 303 See Other' );
  header( 'location: contact.php' );
}


//POSTされたデータを初期化して前後にあるホワイトスペースを削除
$name = trim( filter_input(INPUT_POST, 'name') );
$kana = trim( filter_input(INPUT_POST, 'kana') );
$email = trim( filter_input(INPUT_POST, 'email') );
$tel = trim( filter_input(INPUT_POST, 'tel') );
$inquiry = trim( filter_input(INPUT_POST, 'inquiry'));

$error = array();

//値の検証（入力内容が条件を満たさない場合はエラーメッセージを配列 $error に設定）
if ( $name == '' ) {
  $error[ 'name' ] = '*お名前は必須項目です。';
  //制御文字でないことと文字数をチェック
} else if ( preg_match( '/\A[[:^cntrl:]]{1,10}\z/u', $name ) == 0 ) {
  $error[ 'name' ] = 'お名前は10文字以内でお願いします。';
}
if ( $kana == '' ) {
  $error[ 'kana' ] = 'フリガナは必須項目です。';
  //制御文字でないことと文字数をチェック
} else if ( preg_match( '/\A[[:^cntrl:]]{1,10}\z/u', $kana ) == 0 ) {
  $error[ 'kana' ] = '*フリガナは10文字以内でお願いします。';
}
if ( $email == '' ) {
  $error[ 'email' ] = '*メールアドレスは必須です。';
} else { //メールアドレスを正規表現でチェック
  $pattern = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/uiD';
  if ( !preg_match( $pattern, $email ) ) {
    $error[ 'email' ] = '*メールアドレスの形式が正しくありません。';
  }
}
if ( $tel != '' && preg_match( '/\A\(?\d{2,5}\)?[-(\.\s]{0,2}\d{1,4}[-)\.\s]{0,2}\d{3,4}\z/u', $tel ) == 0 ) {
  $error[ 'tel' ] = '*電話番号の形式が正しくありません。';
}
if ( $inquiry == '' ) {
  $error[ 'inquiry' ] = '*お問い合せ内容は必須項目です。';
  //制御文字でないことと文字数をチェック
}
// } else if ( preg_match( '/\A[[:^cntrl:]]{1,100}\z/u', $inquiry ) == 0 ) {
//   $error[ 'inquiry' ] = '*件名は100文字以内でお願いします。';
// }

//POSTされたデータとエラーの配列をセッション変数に保存
$_SESSION[ 'name' ] = $name;
$_SESSION[ 'kana' ] = $kana;
$_SESSION[ 'email' ] = $email;
$_SESSION[ 'tel' ] = $tel;
$_SESSION[ 'inquiry' ] = $inquiry;
$_SESSION[ 'error' ] = $error;

//チェックの結果にエラーがある場合は入力フォームに戻す
if ( count( $error ) > 0 ) {
  //エラーがある場合
  // $dirname = dirname( $_SERVER[ 'SCRIPT_NAME' ] );
  // $dirname = $dirname == DIRECTORY_SEPARATOR ? '' : $dirname;
  // //サーバー変数 $_SERVER['HTTPS'] が取得出来ない環境用
  // if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
  //   $_SERVER[ 'HTTPS' ] = 'on';
  // }
  //入力画面（contact.php）の URL 
  // $url = ( empty( $_SERVER[ 'HTTPS' ] ) ? 'http://' : 'https://' ) . $_SERVER[ 'SERVER_NAME' ] . ':8888'  . $dirname . '/contact-1_1_0.php';
  header( 'HTTP/1.1 303 See Other' );
  header( 'location: ' . 'contact.php' );
  // header( 'location: ' . $url );
  exit;
}

$title = 'Lesson Sample Site';
$description = '説明(確認ページ)';
$path = '../';
include $path . 'inc/head.php';
  ?>
</head>
<?php   include $path . 'inc/nav.php'; ?>
<?php   include $path . 'inc/modal.php'; ?>
<body>
  <main class="contents">
    <section class="content contact">
      <h5 class="level5-heading heading-contact">
        お問い合わせ
      </h5>
      <form class="contact__form" action="../contact/compleat.php" method="post">
        <h3 class="level3-heading">
          下記の項目をご記入の上送信ボタンを押してください
        </h3>
        <p class="form__text">
        下記の内容をご確認の上送信ボタンを押してください<br>
        内容を訂正する場合は戻るを押してください。
        </p>
        <dl class="confirm__list">
          <dt class="confirm__title">
            <labe for="name">氏名</label>
          </dt>
          <dd class="confirm__user-data">
          <?php echo h($name); ?>
          </dd>
          <dt class="confirm__title">
            <label for="kana">フリガナ</label>
          </dt>
          <dd class="confirm__user-data">
          <?php echo h($kana); ?>
          </dd>
          <dt class="confirm__title">
            <label for="tel">電話番号</label>
          </dt>
          <dd class="confirm__user-data">
          <?php echo h($tel); ?>
          </dd>
          <dt class="confirm__title">
            <label for="email">メールアドレス</label>
          </dt>
          <dd class="confirm__user-data">
            <?php echo h($email); ?>
          </dd>
          <dt class="confirm__title">
            <label for="inquiry">お問い合わせ内容</label>
          </dt>
        </dl>
        <dd class="confirm__user-data">
        <?php echo nl2br(h($inquiry),false); ?>
          <!-- Cafe-Cafe&nbsp;御中<br>
          <br>
          いつも大変お世話になっております。<br>
          株式会社〇〇の山田です。<br>
          <br>
          先日メールにてお願いしておりましたXXの商品サンプルの件についてですが、<br>
          その後の進捗は、いかがでしょうか。<br>
          当サンプルが必要となる会議が今週金曜日と迫っているため、本日15時までにご送付をお願いできますでしょうか。<br>
          <br>
          また、本メールと行き違いでご連絡をいただいておりましたら申し訳ありません。<br>
          お忙しいところ大変恐れ入りますが、お取り計らいの程、何卒よろしくお願いいたします。 -->
        </dd>   
        <dl class="horizontal-btn-list">
          <dd class="horizontal-btn-list__item">
            <form action="../contact/compleat.php" method="post">
              <input type="hidden" name="ticket" value="<?php echo h($ticket); ?>">
              <button id="submit" type="submit" class="button-submit horizontal-btn-list__btn">送信</button>
            </form>
          </dd>
          <dd class="horizontal-btn-list__item">
          <form action="../contact/contact.php" method="post">
             <button type="submit" class="button-back horizontal-btn-list__btn">戻る</button>
           </form>
          </dd>
        </dl>
      </form>
    </section>
  </main>
  <?php   include $path . 'inc/footer.php'; ?>
</body>
</html>