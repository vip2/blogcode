<?php 
/* 系统配置文件 */
return array (
  'MY_SYSTEM_NAME' => 'system',
  'ADMIN_TXT' => 
  array (
    'web_title' => '我的后台 - admin',
    'web_icon' => 'fa fa-paper-plane-o',
    'web_keywords' => '网站关键词',
    'web_description' => '网站关键词',
  ),
  'NODELEVEL' => 
  array (
    1 => '项目',
    2 => '模块',
    3 => '操作',
  ),
  'MENUS' => 
  array (
    'adminleft' => '后台左侧菜单',
    'admintop' => '后台顶部菜单',
    'indextop' => '前台顶部菜单',
  ),
  'MAIL_ADDRESS' => 'q470409928@163.com',
  'MAIL_FROM' => '我乃张真人',
  'MAIL_SMTP' => 'smtp.163.com',
  'MAIL_LOGINNAME' => 'q470409928@163.com',
  'MAIL_PASSWORD' => 'mycode208823',
  'SYSTEM_MENUS' => 
  array (
    'webconfig' => '后台设置',
    'dataconfig' => '参数设置',
    'emailconfig' => '邮箱设置',
  ),
  'AUTO_CODE_CAPITAL' => 'lower',
  'AUTO_CODE_LENGTH' => 6,
  'AUTO_ADMIN_CODE' => 'U',
  'AUTO_GROUP_CODE' => 'G',
  'SHOW_PAGE_TRACE' => true,
  'TOKEN_ON' => false,
  'IMG_MAX_SIZE' => 3,
  'IMG_EXTS' => 
  array (
    0 => 'jpg',
    1 => 'pjpeg',
    2 => 'bmp',
    3 => 'gif',
    4 => 'png',
    5 => 'jpeg',
  ),
  'IMG_ROOT_PATH' => './Public/static/Uploads/',
  'ARTICLE_LOGO_THUMB' => 
  array (
    0 => 220,
    1 => 138,
  ),
  'YZM_CODE_LENGTH' => 2,
  'YZM_USE_NOISE' => false,
  'YZM_USE_CURVE' => true,
  'YZM_CODE_SET' => '0123456789',
  'YZM_CODE_W' => 116,
  'YZM_CODE_H' => 33,
  'YZM_FONT_SIZE' => 16,
  'PAGE_DEFAULT_NUM' => 1,
  'MAIL_TPL_TITLE' => '{$THISMONTH$}的工资详情{$NICKNAME$}',
  'WEB_UPDATE_HTML' => true,
);
?>