## Update Function Example:

#### Use Namespace
```php
use TURBOTECH\Helper\Controllers\Update;
```
#### Function

```php
public function save(Request $request): object 
{
    $api        = "/api/endpoint";
    $update     = new Update( $request, $api);
    return $update->save();
}
```
OR 
```php
public function save(Request $request): object 
{
    $api        = "/api/endpoint";
    $update     = new Update( $request);
    return $update->save($api);
}
```