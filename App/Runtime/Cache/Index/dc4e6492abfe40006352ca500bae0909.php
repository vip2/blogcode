<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>真人个人博客--正在维护中...</title>
		<meta name="keywords" content="网站维护中"/>
		<meta name="description" content="真人个人博客，正在维护升级中..." />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<style>
			*{
				padding: 0;
				margin: 0;
				font-family: "Arial","Microsoft YaHei","黑体","宋体",sans-serif;
			}
			.main-content{
				width: 32rem;
				margin: 15vh auto 0;
				padding: 2em 3em;
				border: 0.5px solid #ccc;
				border-radius: 1em;
				text-align: center;
			}
			.main-content:after{
				content: '';
				display: block;
				clear: both;
			}
			.main-content .l{
				float: left;
				color: #00cb99;
				border: 1px solid #0093b4;
				width: 6rem;
				height: 6rem;
				display: inline-block;
				animation: spin 6s linear infinite;
				/* Rotate div */
				transform:rotate(45deg);
				-ms-transform:rotate(45deg); /* Internet Explorer */
				-moz-transform:rotate(45deg); /* Firefox */
				-webkit-transform:rotate(45deg); /* Safari 和 Chrome */
				-o-transform:rotate(45deg); /* Opera */
			}
			.main-content .l h1{
				width: 2.86rem;
				height: 3rem;
				display: inline-block;/* Rotate div */
				transform:rotate(-45deg);
				-ms-transform:rotate(-45deg); /* Internet Explorer */
				-moz-transform:rotate(-45deg); /* Firefox */
				-webkit-transform:rotate(-45deg); /* Safari 和 Chrome */
				-o-transform:rotate(-45deg); /* Opera */
			}
			.main-content .l:after{
				position: absolute;
				top: 30%;
				left: 35%;
				content: '';
				display: inline-block;
				width: 1.8em;
				height: 1.8em;
				border-radius: 50%;
				border: 1px solid red;
				border-color: #0093b4 red red red;
				border-width: 2px 0;
				animation: my-spin 3s linear infinite;
			}
			.main-content .r{
				position: relative;
				float: left;
				height: 6rem;
				line-height: 6rem;
				margin-left: 2em;
			}
			.main-content .r h2:after {
				display: inline-block;
				position: absolute;
				content: '';
				top: 50%;
				right: 0;
				width: .8em;
				height: .5em;
				background: #FFF;
				animation: my-w 3s linear infinite;
			}
			@keyframes my-spin {
				0% {
				   	transform:rotate(0deg);
				 }
				 100% {
				   	transform:rotate(360deg);
				 }
			}
			@keyframes my-w {
				0% {
				   	width: .8em;
				 }
				 100% {
				   	width: 0em;
				 }
			}
			@media (max-width: 620px) {
				.main-content {
					width: 18rem;
					padding: 2em 0em;
				}
				.main-content .r,.main-content .l{
					float: none;
					margin: 0;
				}
				.main-content .r h2 {
					font-size: 1.1em;
				}
			}
		</style>
	</head>
	<body>
		<div class="main-content">
			<div class="l">
				<h1>真</h1>
				<h1>人</h1><br/>
				<h1>博</h1>
				<h1>客</h1>
			</div>
			<div class="r">
				<h2>非常抱歉，网站正在升级维护中...</h2>
			</div>
		</div>
	</body>
</html>