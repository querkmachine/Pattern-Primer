<?php
	$subsection = !empty($_GET['section']) ? $_GET['section'] : '' ;
	$path = 'patterns/' . $subsection;
?><!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Pattern Primer</title>
		<!--<link rel="stylesheet" href="global.css" /><!-- <-- Remember to change this to your own stylesheet(s)! -->
		<style>
				.__patterns__body {
						margin: 0;
						padding: 0;
				}
				.__patterns__trigger {
					height: 30px;
					position: absolute;
					top: 15px;
					left: 15px;
				}
				.__patterns__trigger__icon {
					width: 30px;
					height: 5px;
					position: relative;
					background-color: #cfcfcf;
					text-indent: -9999em;
				}
				.__patterns__trigger__icon:before,
				.__patterns__trigger__icon:after {
					content: "";
					width: 100%;
					height: 5px;
					background-color: #cfcfcf;
					position: absolute;
					top: 10px;
					left: 0;
					right: 0;
				}
				.__patterns__trigger__icon:after {
					top: 20px;
				}
				.__patterns__trigger:hover .__patterns__header {
					left: 0;
				}
				.__patterns__header {
						width: 200px;
						position: fixed;
						top: 0;
						bottom: 0;
						left: -200px;
						z-index: 1000;
						background-color: #1f1f1f;
						overflow: auto;
						-webkit-transition: left .3s ease;
							 -moz-transition: left .3s ease;
										transition: left .3s ease;
				}
				.__patterns__branding {
					background-color: #5f5f5f;
					line-height: 0;
				}
				.__patterns__nav {
				}
				.__patterns__nav ul {
						margin: 0;
						padding: 0;
						color: #afafaf;
						list-style: none;
				}
				.__patterns__nav a {
						display: block;
						padding: 15px;
						color: #fff;
						text-decoration: none;
				}
				.__patterns__nav a:hover,
				.__patterns__nav a:focus {
					background-color: #4f4f4f;
				}
				.__patterns__nav__title {
					padding: 15px;
				}
				.__patterns__main {
						margin-top: 120px;
						padding: 15px;
						-webkit-transition: padding-left .3s ease;
							 -moz-transition: padding-left .3s ease;
										transition: padding-left .3s ease;
				}
				.__patterns__pattern {
					margin-bottom: 30px;
					padding-bottom: 30px;
					position: relative;
					border-bottom: 1px solid #cfcfcf;
					overflow: hidden;
				}
				.__patterns__preview {
					margin-bottom: 15px;
				}
				.__patterns__notes {
					width: 100%;
					padding: 15px;
					float: left;
					clear: left;
					background-color: #dfdfdf;
					-webkit-box-sizing: border-box;
						 -moz-box-sizing: border-box;
									box-sizing: border-box;
				}
				.__patterns__code {
					width: 100%;
					height: 10.5em;
					float: right;
					clear: right;
					font-family: monospace;
					resize: vertical;
				}
				.__patterns__swatch {
					display: inline-block;
					width: 150px;
					height: 150px;
					padding: 15px;
					vertical-align: bottom;
				}
				@media only screen and (min-width: 480px) { 
					.__patterns__notes,
					.__patterns__code {
						width: 48%;
					}
				}
				@media only screen and (min-width: 800px) { 
					.__patterns__header {
						left: 0;
					}
					.__patterns__main {
						padding-left: 215px;
					}
				}
		</style>
</head>
<body class="__patterns__body">
		<div class="__patterns__trigger">
			<div class="__patterns__trigger__icon">Menu</div>
			<header class="__patterns__header">
					<div class="__patterns__branding">
							<!-- Pur your own image here -->
							<img alt="Your Logo Here" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAABQCAYAAABcbTqwAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NDkxMSwgMjAxMy8xMC8yOS0xMTo0NzoxNiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozNURENzc0RjJGOEIxMUU0QUQ0QTkyM0NCNzg4RkM3MyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozNURENzc1MDJGOEIxMUU0QUQ0QTkyM0NCNzg4RkM3MyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjM1REQ3NzREMkY4QjExRTRBRDRBOTIzQ0I3ODhGQzczIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjM1REQ3NzRFMkY4QjExRTRBRDRBOTIzQ0I3ODhGQzczIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+azRbiAAACIBJREFUeNrsXYFx4joQ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" />
					</div>
					<nav class="__patterns__nav">
							<ul>
									<li><a href="index.php">Introduction</a></li>
									<li> <div class="__patterns__nav__title">Atoms</div>
										<ul>
											<li><a href="index.php?section=swatches">Swatches</a></li>
											<li><a href="index.php?section=typography">Typography</a></li>
											<li><a href="index.php?section=lists">Lists</a></li>
											<li><a href="index.php?section=forms">Forms</a></li>
											<li><a href="index.php?section=feedback">Feedback</a></li>
											<li><a href="index.php?section=pagination">Pagination</a></li>
										</ul>
									</li>
							</ul>
					</nav>
			</header>
		</div>
		<main class="__patterns__main">
			<?php
				$files = array();
				$handle = opendir($path);
				while (false !== ($file = readdir($handle))) :
						if(stristr($file, '.html')):
								$files[] = $file;
						endif;
				endwhile;
				sort($files);
				foreach ($files as $file) :
					$contents = file_get_contents($path . '/' . $file);
					preg_match('/<!--(.*?)-->/sg', $contents, $comments);
					$code = preg_replace('/<!--(.*?)-->/sg', '', $contents);
					$comment = ''; foreach($comments as $line) { $comment .= $line; }
			?>
			<div class="__patterns__pattern">
				<div class="__patterns__preview">
					<?php include($path . '/' . $file); ?>
				</div>
				<div class="__patterns__notes">
					<strong>Developer notes</strong><br />
					<?php echo $comment; ?>
				</div>
				<textarea class="__patterns__code" readonly><?php echo htmlspecialchars($code); ?></textarea>
			</div>
			<?php
				endforeach;
			?>
		</main>
</body>
</html>
