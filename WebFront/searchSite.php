<?php
	require_once "../AccessDataBase/access_data.php";
	$spot = $_POST["spotmap"];
	$combined = AccessData::selectByAreaName($spot);
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
	crossorigin="anonymous">

<!-- Original CSS -->
<link rel="stylesheet" type="text/css" href="css/search.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!--favicon-->
<link href="favicon.ico" rel="shortcut icon">
<!--jQuery-->
<script type='text/javascript'
	src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'
	id='jquery-js'></script>
<script src="js/paginathing.min.js"></script>
<script>
	(function(d) {
		var config = {
			kitId : 'nvj0abk',
			scriptTimeout : 3000,
			async : true
		}, h = d.documentElement, t = setTimeout(function() {
			h.className = h.className.replace(/\bwf-loading\b/g, "")
					+ " wf-inactive";
		}, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d
				.getElementsByTagName("script")[0], a;
		h.className += " wf-loading";
		tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
		tk.async = true;
		tk.onload = tk.onreadystatechange = function() {
			a = this.readyState;
			if (f || a && a != "complete" && a != "loaded")
				return;
			f = true;
			clearTimeout(t);
			try {
				Typekit.load(config)
			} catch (e) {
			}
		};
		s.parentNode.insertBefore(tk, s)
	})(document);
</script>
<title>検索結果画面｜OkinawaGo</title>
</head>
<body>
	<div class="content" style="text-align: center;">
		<h1>
			<a href="index.php"><img src="img/logo.jpg" alt="ロゴ"></a>
		</h1>

        
		<!-- <div class="pagenation_block wrapper"> -->
			<!-- <form method="POST" action="detail.php"> -->
            <?php
				$index = 0;

				foreach($combined as $site) {
					echo '<form method="POST" action="detail.php">';
					echo '<input type="image" name="image" value="'.$site->image[0].'" src="'.$site->image[0].'" class="inputimg">';
					echo '<input type="hidden" name="name_site" value="'.$site->site->name_site.'">';
					echo '<input type="hidden" name="address" value="'.$site->site->address.'">';
					echo '<input type="hidden" name="image" value="'.$site->image[0].'">';
					foreach($site->comment as $com){
						echo '<input type="hidden" name="comment[]" value="'.$com.'">';
					}
					echo '</form>';
				}
            ?>
			<!-- </form>
		写真
		観光地名
		住所
		コメント
		-->
			
		<!-- </div> -->
	</div>

	<footer>
		<p></p>
	</footer>
		<script type="text/javascript">
			$(function() {
				$('.pagenation_block').paginathing({//親要素のclassを記述
					perPage : 4,//1ページあたりの表示件数
					prevText : '<i class="fas fa-angle-left"></i>',//1つ前のページへ移動するボタンのテキスト
					nextText : '<i class="fas fa-angle-right"></i>',//1つ次のページへ移動するボタンのテキスト
					activeClass : 'navi-active',//現在のページ番号に任意のclassを付与できます
					firstText : '<i class="fas fa-angle-double-left"></i>', // "最初ページ"に移動するボタンのテキスト
					lastText : '<i class="fas fa-angle-double-right"></i>', // "最後のページ"に移動するボタンのテキスト

				})
			});
		</script>

</body>
</html>