Orders package for Shopavel
===========================

Usage
-----

### Facade

```php
$product = Product::find(1);

// Add 1 product
Basket::add($product);

// Add 3 more of the product
Basket::add($product, 3);

// Set the quantity of the product to 2
Basket::setQuantity($product, 2);

// Loop all products in the basket
foreach (Basket::products() as $p)
{
    //
}

// Remove the product from the basket
Basket::remove($product);
```

License
-------

All Shopavel packages are open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)