<?php if(!defined("__XE__")) exit();
$_m = Context::get('mid');
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/autolink/autolink.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "autolink";
$addon_time_log->called_extension = "autolink";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = 'run_selected';
$ml = array(
'test' => 1,
);
$addon_file = './addons/layerpopup/layerpopup.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('Tzo4OiJzdGRDbGFzcyI6MjA6e3M6MTU6InhlX3ZhbGlkYXRvcl9pZCI7czozMToibW9kdWxlcy9hZGRvbi90cGwvc2V0dXBfYWRkb24vMSI7czoxMToibG9hZF9qcXVlcnkiO3M6Mjoibm8iO3M6MTQ6ImxvYWRfanF1ZXJ5X3VpIjtzOjI6Im5vIjtzOjk6InBvcHVwX2NvbiI7czo5OiJsaW5lX2F1dG8iO3M6OToiaHRtbF9saW5lIjtzOjQ6ImFzZGYiO3M6ODoiaW1nX29wZW4iO3M6NjoiX2JsYW5rIjtzOjk6InBvcHVwX3BvcyI7czo0OiJ0cnVlIjtzOjEzOiJub3BvcHVwX2NvbG9yIjtzOjc6IiNmZmZmZmYiO3M6MTA6ImltYWdlX3NpemUiO3M6NToiZmFsc2UiO3M6MTA6Im9wZW5lZmZlY3QiO3M6NDoiZmFkZSI7czoxMToiY2xvc2VlZmZlY3QiO3M6NDoiZmFkZSI7czoxMDoicG9wdXBfZHJhZyI7czoyOiJubyI7czoxMDoicG9wdXBfdGltZSI7czoyOiJubyI7czoxNDoic3RhcnR0aW1lX2F1dG8iO3M6MzoieWVzIjtzOjY6InNfeWVhciI7czo0OiIyMDE3IjtzOjc6InNfbW9udGgiO3M6MjoiMTAiO3M6NToic19kYXkiO3M6MToiMSI7czo3OiJzX2hvdXJzIjtzOjU6IjIw7IucIjtzOjEzOiJ4ZV9ydW5fbWV0aG9kIjtzOjEyOiJydW5fc2VsZWN0ZWQiO3M6ODoibWlkX2xpc3QiO2E6MTp7aTowO3M6NDoidGVzdCI7fX0=')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('Tzo4OiJzdGRDbGFzcyI6MjA6e3M6MTU6InhlX3ZhbGlkYXRvcl9pZCI7czozMToibW9kdWxlcy9hZGRvbi90cGwvc2V0dXBfYWRkb24vMSI7czoxMToibG9hZF9qcXVlcnkiO3M6Mjoibm8iO3M6MTQ6ImxvYWRfanF1ZXJ5X3VpIjtzOjI6Im5vIjtzOjk6InBvcHVwX2NvbiI7czo5OiJsaW5lX2F1dG8iO3M6OToiaHRtbF9saW5lIjtzOjQ6ImFzZGYiO3M6ODoiaW1nX29wZW4iO3M6NjoiX2JsYW5rIjtzOjk6InBvcHVwX3BvcyI7czo0OiJ0cnVlIjtzOjEzOiJub3BvcHVwX2NvbG9yIjtzOjc6IiNmZmZmZmYiO3M6MTA6ImltYWdlX3NpemUiO3M6NToiZmFsc2UiO3M6MTA6Im9wZW5lZmZlY3QiO3M6NDoiZmFkZSI7czoxMToiY2xvc2VlZmZlY3QiO3M6NDoiZmFkZSI7czoxMDoicG9wdXBfZHJhZyI7czoyOiJubyI7czoxMDoicG9wdXBfdGltZSI7czoyOiJubyI7czoxNDoic3RhcnR0aW1lX2F1dG8iO3M6MzoieWVzIjtzOjY6InNfeWVhciI7czo0OiIyMDE3IjtzOjc6InNfbW9udGgiO3M6MjoiMTAiO3M6NToic19kYXkiO3M6MToiMSI7czo3OiJzX2hvdXJzIjtzOjU6IjIw7IucIjtzOjEzOiJ4ZV9ydW5fbWV0aG9kIjtzOjEyOiJydW5fc2VsZWN0ZWQiO3M6ODoibWlkX2xpc3QiO2E6MTp7aTowO3M6NDoidGVzdCI7fX0=')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "layerpopup";
$addon_time_log->called_extension = "layerpopup";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/member_communication/member_communication.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "member_communication";
$addon_time_log->called_extension = "member_communication";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/member_extra_info/member_extra_info.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "member_extra_info";
$addon_time_log->called_extension = "member_extra_info";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/mobile/mobile.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "mobile";
$addon_time_log->called_extension = "mobile";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);
$before_time = microtime(true);
$rm = '';
$ml = array(
);
$addon_file = './addons/resize_image/resize_image.addon.php';
if(file_exists($addon_file)){
if($rm === 'no_run_selected'){
if(!isset($ml[$_m])){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}else{
if(isset($ml[$_m]) || count($ml) === 0){
unset($addon_info); $addon_info = unserialize(base64_decode('')); @include($addon_file);
}}}
$after_time = microtime(true);
$addon_time_log = new stdClass();
$addon_time_log->caller = $called_position;
$addon_time_log->called = "resize_image";
$addon_time_log->called_extension = "resize_image";
writeSlowlog("addon",$after_time-$before_time,$addon_time_log);