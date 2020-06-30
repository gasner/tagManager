
# TagManager

This package helps you easily add tags to different records in different tables.
Designed for Laravel framework only

## Installation

You can add this library as a local, per-project dependency to your project using [Composer](https://getcomposer.org/):

    composer require gasner/TagManager

## Usage

```php
<?php
use gasner\TagManager\App\TagAble;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use TagAble;
}
```

```php
use App\User;
$user = User::find($id);
// Remove old tags and add the new tags'
$user->setTags(["active user","free user"]);
//Add new tags and Not remove oldest tags
$user->addTags(["free user","active user"]);


```
