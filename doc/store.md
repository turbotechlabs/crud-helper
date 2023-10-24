## Store Function Example:

#### Use Namespace
```php
use TURBOTECH\Helper\Controllers\Store;
```
#### Function

```php
public function save(Request $request): object 
{
    $api        = "/api/endpoint";
    $store      = new Store( $request, $api);
    return $store->save();
}
```
OR 
```php
public function save(Request $request): object 
{
    $api        = "/api/endpoint";
    $store      = new Store( $request);
    return $store->save($api);
}
```