<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Dice</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Игра в кости</h1>
	</header>
	<section>
		<div class="main-block">
			<form action="" method="post">
				<input type="submit" value="Бросить кубик" name="but">
			</form>
			<?php 
			if ($_POST['but'] == true) {
				$pc = rand(1,6);
				$pol = rand(1,6);
			 
				$resaltPC = 0;
				$resaltPO = 0;
						if ($pc > $pol) {
							$openPC = fopen('resaltPC.txt', 'a+');
							$resaltPC++;
							fwrite($openPC, $resaltPC);
							fclose($openPC);
						}
						elseif ($pc < $pol) {
							$openPO = fopen('resaltPO.txt', 'a+');
							$resaltPO++;
							fwrite($openPO, $resaltPO);
							fclose($openPO);
						}
					}
					?>
			<div class="roll">
				<p>Бросок ПК: <?php echo $pc; ?></p>
				<p>Бросок Пользователя: <?php echo $pol; ?></p>
			</div>
			<div class="resalt">
					<p>Результат ПК:
						<?php
							if (filesize('resaltPC.txt') >= 3) {
							echo "Выйграл";
							file_put_contents('resaltPC.txt', '');
							file_put_contents('resaltPO.txt', '');
							}else
							echo filesize('resaltPC.txt');
					  ?></p>
					<p>Результат Пользователя:
						<?php
					 	if (filesize('resaltPO.txt') >= 3) {
					 		echo "Выйграл";
					 		file_put_contents('resaltPO.txt', '');
					 		file_put_contents('resaltPC.txt', '');
					 	}else
					 	echo filesize('resaltPO.txt');
					  ?></p>
			</div>

		</div>
	</section>
</body>
</html>