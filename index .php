<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Chat</title>
</head>
<body>
  
      <div id="room">

        <div class="box-right">
          <p class="message-box green">こんにちは</p>
        </div>

        <div class="box-left">
          <p class="message-box white">こんにちは</p>
        </div>    
      </div>

  <div class="input-group chat-input">
      <input id="inputMessage" type="text" class="form-control" placeholder="メッセージを入力してください" >
    <div class="input-group-append">
      <button id="sendBtn" class="btn btn-primary" type="button">送信</button>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>

    //送信者が自分かどうか保存する変数
    let isMySelf = true;    
    
    $('#sendBtn').on('click',function(){
      const main=$('#inputMessage').val();
      console.log(main);  

      //入力値が空かチェック
      if (main == '') {
        //入力値が空の場合、処理を中断する
        return;
      };

      //divを作成
      let messageBox = document.createElement('div');
      //console.log(messageBox);
      
      //誰が送信者かチェック
      if (isMySelf) {
        //自分が送信者→「box-right」というクラスをdivに追加
        messageBox.classList.add('box-right');
        //console.log(messageBox);
      } else {
        //相手が送信者→「box-left」というクラスをdivに追加
        messageBox.classList.add('box-left');
      };

      //pタグを作成
      let message = document.createElement('p');

      //pタグのテキストに、画面の入力値を設定
      message.textContent = main;
      //console.log(message);

      //pタグに「message-box」というクラスを追加
      message.classList.add('message-box');

    if (isMySelf) {
        //自分が送信者の場合→「green」というクラスをpタグに追加
        message.classList.add('green');
        //console.log(message);
      } else {
        //相手が送信者の場合→「white」というクラスをpタグに追加
        message.classList.add('white');
      }

    //divにpタグを追加する
    messageBox.appendChild(message);
    //console.log(messageBox);

    //チャット画面である、divタグを取得する
    let room = document.getElementById('room');

    //チャット画面のdivに新規メッセージのdivを追加する
    room.appendChild(messageBox);

    //入力欄の入力値をリセットする
    inputMessage.value = '';
    
    //送信者を変更する
    if (isMySelf) {
    //自分が送信者の場合→次の送信者を相手にする
    isMySelf = false;
    } else {
    //相手が送信者の場合→次の送信者を自分にする
    isMySelf = true;
    }
    });
    
  </script>
</body>
</html>