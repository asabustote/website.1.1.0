<?php
session_start();

require '../libs/function.php';

$_POST = checkInput($_POST);

//固定トークンを確認（CSRF対策）
if ( isset( $_POST[ 'ticket' ], $_SESSION[ 'ticket' ] ) ) {
  $ticket = $_POST[ 'ticket' ];
  if ( $ticket !== $_SESSION[ 'ticket' ] ) {
    //トークンが一致しない場合は処理を中止
    die( 'Access denied' );
  }
} else {
  //トークンが存在しない場合（入力ページにリダイレクト）
  //die( 'Access Denied（直接このページにはアクセスできません）' ); //処理を中止する場合
  // $dirname = dirname( $_SERVER['SCRIPT_NAME'] );
  // $dirname = $dirname == DIRECTORY_SEPARATOR ? '' : $dirname;
  // //サーバー変数 $_SERVER['HTTPS'] が取得出来ない環境用（オプション）
  // if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
  //   $_SERVER[ 'HTTPS' ] = 'on';
  // }
  // $url = ( empty( $_SERVER[ 'HTTPS' ] ) ? 'http://' : 'https://' ) . $_SERVER[ 'SERVER_NAME' ] . $dirname . '/contact-1_1_0.php';
  header( 'HTTP/1.1 303 See Other' );
  // header( 'location: ' . $url );
  header( 'location: contact.php' );
  exit;
}

// //固定トークンを確認（CSRF対策）
// if ( isset( $_POST[ 'ticket' ], $_SESSION[ 'ticket' ] ) ) {
//   $ticket = $_POST[ 'ticket' ];
//   if ( $ticket !== $_SESSION[ 'ticket' ] ) {
//     //トークンが一致しない場合は処理を中止
//     die( 'Access Denied!' );
//   }
// } else {
//   //トークンが存在しない場合は処理を中止（直接このページにアクセスするとエラーになる）
//   // die( 'Access Denied（直接このページにはアクセスできません）' );
//   $dirname = dirname( $_SERVER[ 'SCRIPT_NAME' ] );
//   $dirname = $dirname == DIRECTORY_SEPARATOR ? '' : $dirname;
//   //サーバー変数 $_SERVER['HTTPS'] が取得出来ない環境用
//   if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === "https") {
//     $_SERVER[ 'HTTPS' ] = 'on';
//   }
//   //入力画面（contact.php）の URL 
//   $url = ( empty( $_SERVER[ 'HTTPS' ] ) ? 'http://' : 'https://' ) . $_SERVER[ 'SERVER_NAME' ] . $dirname . '/contact-1_1_0.php';
//   header( 'HTTP/1.1 303 See Other' );
//   header( 'location: ' . $url );
//   exit;
// }



//変数にエスケープ処理したセッション変数の値を代入
$name = h( $_SESSION[ 'name' ] );
$kana = h( $_SESSION[ 'kana' ] );
$email = h( $_SESSION[ 'email' ] ) ;
$tel =  h( $_SESSION[ 'tel' ] ) ;
$inquiry = h( $_SESSION[ 'inquiry' ] );


//$_SESSIONの値を初期化
unset($_SESSION['name']);
unset($_SESSION['kana']);
unset($_SESSION['email']);
unset($_SESSION['tel']);
unset($_SESSION['inquiry']);
unset($_SESSION['error']);

$title = 'Lesson Sample Site';
$description = '説明(完了ページ)';
$path = '../';
include $path . 'inc/head.php';
?>
</head>
<body>
<?php   include $path . 'inc/nav.php'; ?>
<?php   include $path . 'inc/modal.php'; ?>
  <main class="contents">
    <section class="content contact">
      <h5 class="level5-heading heading-contact">
        お問い合わせ
      </h5>
      <form class="contact__form complete_msg">
        <p class="form__text">
          お問い合わせ頂きありがとうございます。
        </p>
        <p class="form__text">
          送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。
        </p>
        <p class="form__text">
          なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。
        </p>
        <!-- <a class="back-to-home" href="../index-1_1_0.php"> -->
        <a class="back-to-home" href="../index.php">
          トップへ戻る
        </a>
      </form>
    </section>
  </main>
 
  <?php   include $path . 'inc/footer.php'; ?>

</body>
</html>