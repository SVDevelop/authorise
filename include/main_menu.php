<?php
$menu = [
    ['title' => 'Главная', 'path' => '/route/', 'sort' => 2],
    ['title' => 'О нас', 'path' => '/route/about/', 'sort' => 2],
    ['title' => 'Контакты', 'path' => '/route/contackts/', 'sort' => 2],
    ['title' => 'Новости', 'path' => '/route/news/', 'sort' => 2],
    ['title' => 'Каталог', 'path' => '/route/katalog/', 'sort' => 2]
];

function route ($menu, $clasName = '')
{
    echo "<ul class='".$clasName."'>";
    foreach ($menu as $key => $value) { ?>

        <li><a href="<?= $value['path']?>"><?= $value['title']?></a></li>

<?php }
    echo "</ul>";
}
