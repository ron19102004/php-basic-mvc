### Sử dụng BaseQuery để tạo câu truy vấn phức tạp

Để tạo một câu truy vấn phức tạp sử dụng `BaseQuery`, bạn có thể làm như sau:

```php

$result = BaseQuery::find('products', ['products.id as productID', 'categories.name as categoryName'])
    ->join(['categories', 'images'], ['categories.id = products.category_id', 'images.product_id= products.id'])
    ->where()
    ->condition(['id'], ['='], [10])
    ->or()
    ->condition(['id'], ['='], [11])
    ->get();

Kết quả: SELECT products.id as productID, categories.name as categoryName from products JOIN categories ON categories.id = products.category_id JOIN images ON images.product_id= products.id WHERE ( id= ? ) OR ( id= ? )
