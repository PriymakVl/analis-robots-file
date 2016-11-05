<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Анализ robots.txt</title>
	<link rel="stylesheet"  href="css/style.css">
</head>
<body>
    <div class="conteiner">
        <h2>Результаты анализа файла robots.txt на сайте <span><?=$response['site']?></span></h2>
        <table>
            <tr>
                <th>№</th>
                <th>Название проверки</th>
                <th>Статус</th>
                <th colspan="2">Текущее состояние</th>
            </tr>

            <!-- exist file -->
            <tr>
                <td rowspan="2" class="number-cell not-top-border">1</td>
                <td rowspan="2" class="check-name-cell not-top-border">Проверка наличия файла robots.txt</td>
                <td rowspan="2" class="status-cell not-top-border" style="<?=$response['exist_file']['status_style']?>"><?=$response['exist_file']['status']?></td>
                <td class="current-state-key-cell not-top-border">Состояние</td>
                <td class="current-state-value-cell not-top-border"><?=$response['exist_file']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['exist_file']['recommendation']?></td>
            </tr>

            <!-- exist host -->	
            <tr>
                <td rowspan="2" class="number-cell">6</td>
                <td rowspan="2" class="check-name-cell">Проверка указания директивы Host</td>
                <td rowspan="2" class="status-cell" style="<?=$response['exist_host']['status_style']?>"><?=$response['exist_host']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['exist_host']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['exist_host']['recommendation']?></td>
            </tr>

            <!-- count host -->
            <tr>
                <td rowspan="2" class="number-cell">8</td>
                <td rowspan="2" class="check-name-cell">Проверка количества директив Host, прописанных в файле</td>
                <td rowspan="2" class="status-cell" style="<?=$response['count_host']['status_style']?>"><?=$response['count_host']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['count_host']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['count_host']['recommendation']?></td>
            </tr>

            <!-- size file -->
            <tr>
                <td rowspan="2" class="number-cell">10</td>
                <td rowspan="2" class="check-name-cell">Проверка размера файла robots.txt</td>
                <td rowspan="2" class="status-cell" style="<?=$response['file_size']['status_style']?>"><?=$response['file_size']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['file_size']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['file_size']['recommendation']?></td>
            </tr>

            <!-- exist sitemap -->
            <tr>
                <td rowspan="2" class="number-cell">11</td>
                <td rowspan="2" class="check-name-cell">Проверка указания директивы Sitemap</td>
                <td rowspan="2" class="status-cell" style="<?=$response['exist_sitemap']['status_style']?>"><?=$response['exist_sitemap']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['exist_sitemap']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['exist_sitemap']['recommendation']?></td>
            </tr>

            <!-- code response -->
            <tr>
                <td rowspan="2" class="number-cell">12</td>
                <td rowspan="2" class="check-name-cell">Проверка кода ответа сервера для файла robots.txt</td>
                <td rowspan="2" class="status-cell" style="<?=$response['code_response']['status_style']?>"><?=$response['code_response']['status']?></td>
                <td class="current-state-key-cell">Состояние</td>
                <td class="current-state-value-cell"><?=$response['code_response']['description']?></td>
            </tr>
            <tr>
                <td class="current-state-key-cell">Рекомендации</td>
                <td class="current-state-value-cell"><?=$response['code_response']['recommendation']?></td>
            </tr>
        </table>
        <div class="come-back">
            <a href="/" >Провести анализ файла robots.txt</a>
        </div>
    </div>
</body>
</html>