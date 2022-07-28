<?php
    require_once "../Entity/CombinedSite.php";
    require_once "../AccessDataBase/access_data_multiple_class.php";
    require_once "../AccessDataBase/access_data_class.php";
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>


<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
	crossorigin="anonymous">

<!-- Original CSS -->
<link rel="stylesheet" type="text/css" href="css/detail.css">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

<!--favicon-->
<link href="favicon.ico" rel="shortcut icon">

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
<title>詳細結果画面｜OkinawaGo</title>
</head>

<body>

	<div class="content">
		<h1>
			<a href="index.php"><img src="img/logo.jpg" alt="ロゴ"></a>
		</h1>
		<a href="javascript:history.back();"><i class="fas fa-arrow-left"></i>前のページへ戻る</a>
		

		<div class="topImg">
        <?php
		//POSTで写真を受け取る
		$image = $_POST['image'];
		echo '<img src="'.$image.'">';
        ?></h2>
		</div>

		<h2><?php
        //POSTで観光地名を受け取る
		$name_site = $_POST['name_site'];
		echo $name_site;
		?>
		<br>
		<?php
  		//POSTで住所を受け取る
 		$address = $_POST['address'];
 		echo $address;
        ?></h2>
		
		
		
		<h3>コメント</h3>
		<table class="comment">
        <?php
		//POSTでコメント受け取る
        $comments = $_POST['comment'];
		foreach($comments as $com) {
			echo $com;
			echo '<br>';
		}
        ?>
		</table>


		<form action="comment" method="post" id="commentForm"
			name="commentForm" enctype="multipart/form-data" class="com">
			<p>
				<input type="text" name="comment_nm" required maxlength="20"
					placeholder="ユーザー名（20字まで）" class="comment_name">
			</p>
			<textarea name="comment_tx" required maxlength="140"
				placeholder="本文（140字まで）" class="comment_text"></textarea>
			<p>
				<input type="file" id="avatar" name="comment_img" accept="image/png, image/jpeg">
			</p>
			<div class="submit_button">
				<button type="submit" id="button" name="name">コメント投稿</button>
			</div>
		</form>


</div>
		</div>
		<script>
			var element = document.getElementById("commentForm");
			const button = document.getElementById("button");

			button.addEventListener("click", click);
			function click() {
				var click = element.checkValidity();
				if (click) {
					alert('投稿しました！');
				}
			}
		</script>
	</div>




	<footer>
		<p></p>
	</footer>
	<script src="js/weatherForcast.js"></script>
</body>
</html>
