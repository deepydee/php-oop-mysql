<?php
// проверим, было ли получено значение в $_POST 
if ($_POST) {

    // подключаем файлы для работы с базой данных и файлы с объектами 
    include_once 'config/database.php';
    include_once 'objects/product.php';

    // получаем соединение с базой данных 
    $database = new Database();
    $db = $database->getConnection();

    // подготавливаем объект Product 
    $product = new Product($db);

    // устанавливаем ID товара для удаления 
    $product->id = $_POST['object_id'];

    // удаляем товар 
    if ($product->delete()) {
        echo "Товар был удалён.";
    }

    // если невозможно удалить товар 
    else {
        echo "Невозможно удалить товар.";
    }
}
?>