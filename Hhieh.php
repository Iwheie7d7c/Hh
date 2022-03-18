
<?php
ob_start();
define("API_KEY","2063994953:AAFyMiDj-88c1C3UUkqZU8PmODsds6yZtNc"); # Token
$admin = "1483182240"; #ID
echo file_get_contents("https://api.telegram.org/bot" . API_KEY . "/setwebhook?url=" . $_SERVER['SERVER_NAME'] . "" . $_SERVER['SCRIPT_NAME']);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}}

$update = json_decode(file_get_contents('php://input'));
$message= $update->message;
$text   = $message->text;
$chat_id= $message->chat->id;
$data   = $update->callback_query->data;
$chat_id2   = $update->callback_query->message->chat->id;
$message_id = $message->message_id;
$message_id2= $update->callback_query->message->message_id;
$photo = $update->message->photo;
$video = $update->message->video;
$sticker = $update->message->sticker;
$file = $update->message->document;
$music = $update->message->audio;
$voice = $update->message->voice;
$caption = $message->caption;
$photo_id = $update->message->photo[0]->file_id;
$video_id= $update->message->video->file_id;
$sticker_id = $update->message->sticker->file_id;
$file_id = $update->message->document->file_id;
$music_id = $update->message->audio->file_id;
$voice_id = $update->message->voice->file_id;
$name   = $message->from->first_name;
$name2  = $update->callback_query->message->chat->first_name;
$username   = $message->from->username;
$from_id= $message->from->id;
$from_id2   = $update->callback_query->from->id;
$chatid   = $update->callback_query->message->chat->id;
$members = explode("\n",file_get_contents("data/members.json"));
$memcount = count($members)-1;
$send = file_get_contents("data/send.txt");
$do = file_get_contents("data/do.json");
$channel = file_get_contents("data/channel.json");
$subscribe = file_get_contents("data/subscribe.json");
$sting = file_get_contents("$from_id.txt");
$notfction = file_get_contents("data/nof.json");
mkdir("data");
#------------------------------------------------------------------------------------------#
$too2 = API_KEY;
$SAEED00= file_get_contents("https://api.telegram.org/bot$too2/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$SAEED11= json_decode($SAEED00, true);
$SAEED22 = $SAEED11['result']['status'];
$ch2 = file_get_contents("data/channel.json");
$join2 = file_get_contents("https://api.telegram.org/bot".$too2."/getChatMember?chat_id=@$ch2&user_id=".$from_id);
if($text && (strpos($join2,'"status":"left"') or strpos($join2,'"Bad Request: USER_ID_INVALID"') or strpos($join2,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"- [$hend](tg://user?id=$from_id) ؛ 
- لايمكنك استخدام البوت 
يجب عليك الاشتراك بقناة البوت
- اشترك الان من هنا ؛ [@$ch2] 📡",
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قناتي",'url'=>"https://t.me/$ch2"]]
]
])
]);return false;}

if($text == "/start" and $from_id == $admin){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"*
اهلا بك عزيزي *[$name](tg://user?id=$from_id)*
انت المطور الاساسي هنا يمكنك تحكم بالبوت
من خلال الازرار التي في اسفل هاذه الرساله*
[Dev ~](t.me/h_690531)
",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".الاشتراك الاجباري ☤",'callback_data'=>"subscribe"]],
[['text'=>".الاذاعة ☤",'callback_data'=>"sendall"]],
[['text'=>"($memcount).المشتركين ☤",'callback_data'=>"member"]],
[['text'=>".تفعيل الاشعارات ☤",'callback_data'=>"onnof"],['text'=>".تعطيل الاشعارات ☤",'callback_data'=>"offnof"]],
[['text'=>".نقل ملكية البوت ☤",'callback_data'=>"notnow"]],
[['text'=>".تفعيل التواصل ☤",'callback_data'=>"ontw"],['text'=>".تعطيل التواصل ☤",'callback_data'=>"offtw"]],
[['text'=>"𝙳𝙴𝚅 ☤",'url'=>"t.me/h_690531"]],
]
])
]);
}

if($data == "~home~" and $chat_id2 == $admin){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*
اهلا بك عزيزي *[$name2](tg://user?id=$from_id2)*
انت المطور الاساسي هنا يمكنك تحكم بالبوت
من خلال الازرار التي في اسفل هاذه الرساله*
[Dev ~](t.me/h_690531)
",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>".الاشتراك الاجباري ☤",'callback_data'=>"subscribe"]],
[['text'=>".الاذاعة ☤",'callback_data'=>"sendall"]],
[['text'=>"($memcount).المشتركين ☤",'callback_data'=>"member"]],
[['text'=>".تفعيل الاشعارات ☤",'callback_data'=>"onnof"],['text'=>".تعطيل الاشعارات ☤",'callback_data'=>"offnof"]],
[['text'=>".نقل ملكية البوت ☤",'callback_data'=>"notnow"]],
[['text'=>".تفعيل التواصل ☤",'callback_data'=>"ontw"],['text'=>".تعطيل التواصل ☤",'callback_data'=>"offtw"]],
[['text'=>"𝙳𝙴𝚅 ☤",'url'=>"t.me/p6xxx"]],
]
])
]);
unlink("data/do.json");
unlink('data/send.txt');
}

if($data == "subscribe" and $chat_id2 == $admin){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*لتفعيل الاشتراك الاجباري
اضغط اضف قناة واضف قناتك واضغط
تفعيل الاشتراك الاجباري وبالعافيه
*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تعطيل الاشتراك الاجباري",'callback_data'=>"offsubscribe"],['text'=>"تفعيل الاشتراك الاجباري",'callback_data'=>"onsubscribe"]],
[['text'=>"حذف قناة الاشتراك الاجباري",'callback_data'=>"deletesubscribe"],['text'=>"اضف قناة اشتراك اجباري",'callback_data'=>"addsubscribe"]],
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
}
if($data == "sendall" and $chat_id2 == $admin){
file_put_contents("data/send.txt","done");
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*حسنا الان ارسل رسالتك لاذاعتها للمشتركين
يمكنك ارسال (صورة - فيديو - نص - ملصق - بصمة -الخ)*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]], 
]
])
]);
}

if($data == "onsubscribe" and $from_id2 == $admin){
file_put_contents("data/subscribe.json","on");
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*تم تفعيل الاشتراك الاجباري*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
}

if($data == "offsubscribe" and $from_id2 == $admin){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*تم تعطيل الاشتراك الاجباري*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
unlink("data/subscribe.json");
}

if($data == "addsubscribe" and $from_id2 == $admin){
file_put_contents("data/do.json","addsub");
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*حسنا ارسل معرف القناة بدون @*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
}

if($data == "deletesubscribe" and $from_id2 == $admin){
unlink("data/channel.json");
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*تم حذف قناة الاشتراك الاجباري*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
}

if($text && $from_id2 == $admin && $do == "addsub"){
file_put_contents("data/channel.json",$text);
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*تم حفظ قناة الاشتراك الاجباري
تاكد من ان البوت ادمن في القناة*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
}


if($from_id == $admin){
if($send == "done" and $text && $from_id == $admin){
for($i=0;$i<count($members); $i++){
bot('sendMessage', [
'chat_id'=>$members[$i],
'text'=>"$text",
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
unlink('data/send.txt');
}
}
if( $send == 'done' and $photo){
for($i=0;$i<count($members); $i++){
bot('sendphoto', [
'chat_id'=>$members[$i],
'photo'=>$photo_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
unlink('data/send.txt');
}
}
if($send == 'video' and $video){
for($i=0;$i<count($members); $i++){
bot('Sendvideo',[
'chat_id'=>$members[$i],
'video'=>$video_id,
'caption'=>$caption,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
unlink('data/send.txt');
}
}
if($send == 'done' and $sticker){
for($i=0;$i<count($members); $i++){
bot('Sendsticker',[
'chat_id'=>$members[$i],
'sticker'=>$sticker_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
unlink('data/send.txt');
}
}
if($text and $send == 'done'){
for($i=0;$i<count($members); $i++){
 bot('SendDocument',[
'chat_id'=>$members[$i],
'document'=>$file_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
unlink('data/send.txt');
}
}
if($send == 'done' and $music){
for($i=0;$i<count($members); $i++){
 bot('Sendaudio',[
'chat_id'=>$members[$i],
'audio'=>$music_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
unlink('data/send.txt');
}
}
if($send == 'done' and $voice){
for($i=0;$i<count($members); $i++){
 bot('Sendvoice',[
'chat_id'=>$members[$i],
'voice'=>$voice_id,
'parse_mode'=>"MARKDOWN",
'parse_mode'=>"HTML",
'disable_web_page_preview'=>true,
]);
unlink('data/send.txt');
}
}
}

if($message && !in_array($from_id,$members) && $notfction == "on"){
file_put_contents("data/members.json",$from_id."\n",FILE_APPEND);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>"
تم دخول شخص جديد
Name | [$name](tg://user?id=$from_id)
User | [@$username](tg://user?id=$from_id)
Id - | `$from_id`
",
'parse_mode'=>"MARKDOWN",
'disable_web_page_preview'=>true,
]);
}

if($message && !in_array($from_id,$members) && $notfction != "on"){
file_put_contents("data/members.json",$from_id."\n",FILE_APPEND);
}

if($data == "onnof" and $from_id2 == $admin){
file_put_contents("data/nof.json","on");
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*تم تفعيل الاشعارات*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
}

if($data == "offnof" and $from_id2 == $admin){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*تم تعطيل الاشعارات*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
unlink("data/nof.json");
}

if($data == "notnow" and $from_id2 == $admin){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*قيد الصيانة*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
}

if($data == "member" and $from_id2 == $admin){
bot('editmessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"*عدد المشتركين بالبوت ($memcount)*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
}

$rt = $update->message->reply_to_message;
$id = $message->reply_to_message->forward_from->id;
$twasol = file_get_contents("data/tw.json");
if($twasol == "on" and $from_id != $admin){
if($text != "/start"){
bot('forwardMessage', [
'chat_id'=>$admin,
'from_chat_id'=>$chat_id,
'message_id'=>$message->message_id
]);
}
}
if($twasol == "on" and $rt and $chat_id == $admin){
bot("sendMessage",[
"chat_id"=>$id,
"text"=>"
$text
"
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"
تم الارسال بنجاح
"
]);
}
if($data == "offtw" and $from_id2 == $admin){
bot("editmessagetext",[
"chat_id"=>$chat_id2,
'message_id'=>$message_id2,
"text"=>"*تم تعطيل التواصل بنجاح*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
unlink("data/tw.json") ;
}

if($data == "ontw" and $from_id2 == $admin){
bot("editmessagetext",[
"chat_id"=>$chat_id2,
'message_id'=>$message_id2,
"text"=>"*تم تفعيل التواصل*",
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"رجوع",'callback_data'=>"~home~"]],
]
])
]);
file_put_contents('data/tw.json','on');
}

//------------------------------------------------------------------------------//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$reply = $message->reply_to_message->message_id;
$message = $update->message;
$text = $message->text;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$bot = bot('getme',['bot'])->result->username;
$i = "
• Now send video or photo link 🔱 •
• الان ارسل رابط الفيديو او الصورة 🔱•";
$m = "
• Now send video  link 🔱 •
• الان ارسل رابط الفيديو🎥،";
$ch = "@Jeccc";
$Load[0] = $facebook->Sd;//"انتظر";

if ($text == '/start'){
  bot('sendMessage',[
  'chat_id' => $chat_id,
  'text' => "• *Welcome to the download bot. Please choose your language*

• مرحبا بك في بوت التحميل. اختر لغتك",
  'parse_mode'=>"MarkDown",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
  [['text'=>'بدا الاستخدام','callback_data'=>'ar']]
]  
])
 ]);
}

if($data == 'm'){

bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'• Just send the video link
• The twitter download must be 2 minutes',
 'show_alert'=>true
 ]);      
}
if($data == "ar"){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"• مرحبا بك مجددا . قم بأختيار احد المواقع",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"الانستكرام",'callback_data'=>'b']],
[["text"=>"الميوزكلي",'callback_data'=>'c'],["text"=>"اليوتيوب",'callback_data'=>'d']],
[["text"=>"الفيسبوك",'callback_data'=>'facebook']],
[["text"=>"مساعده",'callback_data'=>'e']]
] 
]) 
]); 
}
if($data == 'j'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"
- اهلا بك عزيزي في بوت التحميل
- اختر احد المواقع للتحميل منه",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[["text"=>"الانستكرام",'callback_data'=>'b']],
[["text"=>"التيكتوك",'callback_data'=>'c'],["text"=>"اليوتيوب",'callback_data'=>'d']],
[["text"=>"الفيسبوك",'callback_data'=>'facebook']],
[["text"=>"مساعده",'callback_data'=>'e']]
] 
]) 
]); 
}
if (preg_match("#facebook#", $text) || preg_match("#fb#", $text)){
$facebook = json_decode(file_get_contents("https://8338.tk/Facebook/index.php?url=$text"));
$fasss = $facebook->Sd;
bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>$fasss,
'caption'=>"*By => * @h_69053",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"تابعنا - Follow us'",'url'=>"t.me/h_690531"]],]])
]);
if($facebook->Sd == null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"- an error occurred❌
- حدث خطأ❌" 
]);
}}
if($data == 'a' or $data == 'b' or $data == 'c'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=> "$i",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'• رجوع - Back','callback_data'=>'j']]    
]    
])
]);
}
if($data == 'd'){
bot('editMessageText',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id,
'text'=>"$m",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'• رجوع - Back','callback_data'=>'j']]    
]    
])
]);
}
if(preg_match('/.*instagram\.com.*/i',$text)){
$instagram = json_decode(file_get_contents("https://8338.tk/IG/index.php?url=$text"));
$insta_1 = $instagram->url;
bot('sendmessage',[
  'chat_id'=>$chat_id,
    'text'=> "• جار التحميل . . .
    • loading . . .",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"تابعنا - Follow us'",'url'=>"t.me/h_690531"]],   
        ]
    ])
    ]);
 bot('sendvideo',[
  'chat_id'=>$chat_id,
   'video'=>"$insta_1",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
 [['text'=>"تابعنا - Follow us'",'url'=>"t.me/h_690531"]],
        ]
    ])
    ]);
    }
    //--------------------------------------------------------------------------------------//

     if(preg_match('/.*tiktok\.com.*/i',$text)){
$url = "https://8338.tk/TikTok/index.php?url=$text";
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL,$url);
$tikf=curl_exec($ch);
$tiktok = json_decode($tikf);
curl_close($ch);

 bot('sendmessage',[
  'chat_id'=>$chat_id,
    'text'=>"• جار التحميل . . .
    • loading . . .",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"تابعنا - Follow us'",'url'=>"https://t.me/h_690531"]],   
        ]
    ])
    ]);
 bot('sendvideo',[
  'chat_id'=>$chat_id,
   'video'=>$tiktok->data->video_link_nwm,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"تابعنا - Follow us",'url'=>"https://t.me/h_690531"]],    
        ]
    ])
    ]);
    }
if(preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $text)){
$url = json_decode(file_get_contents('https://8338.tk/YouTube/index.php?url='.$text)); 
if ($url->meta->source !=null) {
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'انتظر من فضلك  ،'
]);
bot('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>$text,
'caption'=>$url->meta->title,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'تحميل  ،','callback_data'=>"vi##$text"] ]
]])]);}}

if($pt[0] == 'vi'){
$text = $pt[1];
$url = json_decode(file_get_contents('https://8338.tk/YouTube/index.php?url='.$text)); 
bot('sendMessage',[
'chat_id'=>$chat_id2,
'text'=>'انتظر من فضلك ،'
]);
bot('sendvideo',[
'chat_id'=>$chat_id2,
'video'=>$url->url[0]->url,
'reply_markup'=>json_encode([
        'inline_keyboard'=>[
[['text'=>"تابعنا - Follow us",'url'=>"https://t.me/h_690531"]],    
]])
]);
}
