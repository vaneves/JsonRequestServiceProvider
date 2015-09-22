# JsonRequestServiceProvider

## Installing

Via Composer

```
composer require vaneves/json-request-service-provider
```

## Usage

``` php
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Vaneves\Provider\JsonRequestServiceProvider;

$app = new Application();
$app->register(new JsonRequestServiceProvider());

$app->post('/blog/posts', function (Request $request) use ($app) {
    $post = array(
        'title' => $request->request->get('title'),
        'body'  => $request->request->get('body'),
    );

    $post['id'] = createPost($post);

    return $app->json($post, 201);
});

$app->run();

```