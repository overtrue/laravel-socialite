<h1 align="center"> Laravel-socialite </h1>

# Installation

```
$ composer require "overtrue/laravel-socialite:~3.0"
```
> if you have been installed the `overtrue/socialite` package, please remove it from `composer.json` before this command.

# Configuration

1. You will also need to add credentials for the OAuth services your application utilizes. These credentials should be placed in your `config/socialite.php` or `config/services.php` configuration file, and should use the key facebook, twitter, linkedin, google, github or bitbucket, depending on the providers your application requires. For example:
 ```php
 <?php

 return [
     //...
     'github' => [
         'client_id'     => 'your-app-id',
         'client_secret' => 'your-app-secret',
         'redirect'      => 'http://localhost/socialite/callback.php',
     ],
     //...
 ];
 ```

# Usage

```php
<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     */
    public function redirectToProvider()
    {
        return redirect()->to(Socialite::driver('github')->redirect());
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('github')->userFromCode($request->query('code'));

        // $user->getId();
        // $user->getNickname();
        // ...
    }
}
```

And register routes:

```php
Route::get('/oauth/github', 'AuthController@redirectToProvider');
Route::get('/oauth/github/callback', 'AuthController@handleProviderCallback');
```

About more usage, please refer to [overtrue/socialite](https://github.com/overtrue/socialite).

## PHP 扩展包开发

> 想知道如何从零开始构建 PHP 扩展包？
>
> 请关注我的实战课程，我会在此课程中分享一些扩展开发经验 —— [《PHP 扩展包实战教程 - 从入门到发布》](https://learnku.com/courses/creating-package)

# License

MIT
