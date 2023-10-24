## Destroy Function Example:

#### Use Namespace
```php
use TURBOTECH\Helper\Controllers\Destroy;
```
#### Function

```php
public function save(Request $request): object 
{
    $api        = "/api/endpoint";
    $destroy    = new Destroy( $request, $api);
    return $destroy->save();
}
```
OR 
```php
public function save(Request $request): object 
{
    $api        = "/api/endpoint";
    $destroy    = new Destroy( $request);
    return $destroy->save($api);
}
```