# zoom_google_calendar_linebot

個人作成のLinebotです。時間を入力すると、Zoom会議の予約とGoogleCalendarに予定追加を行います。</br>
開発したLINEBOTは、友だち追加して「会議」と送信すると時間を入力する画面が出力され、オンライン会議の時間を入力するとZOOM会議の予約とGoogleCalendarにスケジュール追加を同時します。</br>

## 開発のきっかけ
東京にいる友人とオンライン飲み会をやる時にZOOM設定をするのはいつも自分でした。登録後にグーグルカレンダーにも予定を追加しているため、この動作をセット出できたら楽だなと思ったのが開発のきっかけです。<br>

## 使用技術/使用ツール
PHP7,</br>
heroku,</br>
Linux,</br>
LINE Messaging API,</br>
ZoomAPI,</br>
Google CalendarAPI,</br>
Git,</br>
GitHub</br>

## 操作方法
①文字を打つと入力してほしい文字の案内が出ます</br>
<img src="https://github.com/ryuzo111/zoom_google_calendar_linebot/blob/master/IMG_6411.PNG" width="300px" >

②「会議」と入力するとボタン付きのコメントを返します。</br>
<img src="https://github.com/ryuzo111/zoom_google_calendar_linebot/blob/master/IMG_6410.PNG" width="300px" >

③コメントに記載のボタンを押すと、会議時間を選択できます。</br>
<img src="https://github.com/ryuzo111/zoom_google_calendar_linebot/blob/master/IMG_6413.PNG" width="300px" >

④会議時間設定時間の結果をコメントを返します。</br>
<img src="https://github.com/ryuzo111/zoom_google_calendar_linebot/blob/master/IMG_6414.PNG" width="300px" >

⑤グーグルカレンダーにも会議時間が追加されています。</br>
<img src="https://github.com/ryuzo111/zoom_google_calendar_linebot/blob/master/IMG_6415.PNG" width="300px" >

## URL
・友達追加URL
https://lin.ee/S5ZMCsG

・使用動画
https://youtu.be/k69wai50TZM

## ポイント
・ワンクリックでZOOM会議とGoogleCalendarに追加できる設計。</br>
