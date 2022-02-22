# Workshop Daily Buggle

## Description

You have been recruted by The Daily Buggle to replace the precedent developer who worked on a way to rapidly change the homepage's headline of the website.

Unfortunatly, he did not finish and let the project incomplete...

So now it's your job to fix it ! Your goal: Pick a random headline without reloading the whole page. Then add a menu to search for a headline with specific keywords (still without reload the page).

![delay.jpg](https://i.imgflip.com/5kml2i.jpg)

## To start

1. Clone the repo from [Github](https://github.com/WildCodeSchool/php_daily_buggle_workshop).
2. Run `composer install`.
3. Create *config/db.php* from *config/db.php.dist* file and add your DB parameters. Don't delete the *.dist* file, it must be kept.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');
```
4. Import data in your SQL server with the command `php migration.php`;
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.

## Get a random headline without reloading the page

1. First, you have to prepare the server side. Take a look at `routes.php`, you'll see you already have the route `api/articles/random`. Try it [http://localhost:8000/api/articles/random](http://localhost:8000/api/articles/random). Yes, nothing...

2. To fix it, go to `AjaxController.php` and complete the function `getRandomArticle()`. This function should return the data of a random article in JSON (only one article !). 
* Hint 1 : Take a look at articlesJson() to see how to get articles and return JSON.
* Hint 2 : `array_rand()` can help to select a random element in a array
* Result : If you did right, [http://localhost:8000/api/articles/random](http://localhost:8000/api/articles/random) should look something like that : 
```
{
  "id": "3",
  "title": "Doctor Octopus holds up another bank !",
  "author": "Peter Parker",
  "picture": "assets/images/article_3.jpg",
  "date": "2021-04-28 00:00:00",
  "content": "[ARTICLE_CONTENT]"
}
```

3. Once the route is ready, let's go to the client side. In `public\assets\js\script.js`, you'll find a `//TODO 1 : Get a random article`, this is the part of the code which will be triggered on the click of the "Change the headline" button. 

This is where you have to work to get to contact the route `api/articles/random`, get the data of the headline and update the homepage.
* Hint 1 : Use `fetch()` in js to to call the route : [doc](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch)
* Hint 2 : When you have the data, use the function updateHeadline(title, picture, content) which will update the page for you.
4. Try it. 

## Add a menu to select a headline from specific keywords

1. Now we need to be able to select a specific article by a keyword of its title. 
The previous developer started to implement the feature in the div `searchMenu` from `index.html.twig`. He also let a `//TODO 2` in `script.js` to trigger some code when type something in the input.

In `routes.php` there is `api/articles/search`. Be careful, this route take one parameter.
First prepare this route to return all the articles wich contains in the title the word passed in parameter. 

It should look something like that [http://localhost:8000/api/articles/search?search=spider](http://localhost:8000/api/articles/search?search=spider) <= here we search all the articles which contains the word "spider" in their title.

* Hint 1 : You'll need a new function in the `ArticleManager`
* Hint 2 : Your controller should respond a collection of article in JSON
* Result : For it shoul respond :

```
[
  {
    "id": "1",
    "title": "Spider-Man : Friend or Foe ?",
    "author": "Jonah Jamesson",
    "picture": "assets/images/article_1.jpg",
    "date": "2021-01-18 00:00:00",
    "content": "Cillum enim dolor nostrud irure sint cupidatat esse nulla ipsum proident nisi. Eiusmod reprehenderit aliqua nostrud mollit. Ex ut in ipsum commodo culpa esse ullamco ex. Anim velit et qui non elit pariatur. Non occaecat est veniam aliquip incididunt duis eiusmod irure magna aute. Irure officia consequat est cillum occaecat officia ipsum culpa sint irure pariatur cillum veniam aliqua. Tempor quis veniam aliqua amet magna laborum consectetur laborum laborum do. Sit anim laborum aliquip eu voluptate do aliqua proident. Ex consectetur occaecat in aliqua labore deserunt duis deserunt eiusmod fugiat. Dolor in quis sint consequat occaecat ea aliquip minim proident labore."
  },
  {
    "id": "5",
    "title": "Another Spider-man ? Another criminal",
    "author": "Jonah Jamesson",
    "picture": "assets/images/article_5.jpg",
    "date": "2021-05-23 00:00:00",
    "content": "Minim eiusmod Lorem do exercitation id pariatur non dolore ullamco ea. Magna id veniam eu nulla nostrud velit consectetur ad in fugiat in ea aliqua proident. Ipsum adipisicing minim cupidatat eiusmod aute. Consequat voluptate minim nostrud laboris sunt eiusmod ut ut exercitation qui eiusmod nostrud minim quis. Eu reprehenderit ad eiusmod consequat. Aute pariatur ullamco esse dolor eu eiusmod exercitation do sit amet enim. Cupidatat magna eiusmod fugiat id anim eiusmod consectetur consectetur deserunt tempor esse proident est. Laborum nulla fugiat aliqua elit mollit laboris. Tempor nisi id culpa quis sunt duis in. Ut consectetur incididunt."
  }
]
```


2. Once the route is good. Go back in `script.js` to call it and feed the `<ul id="resultList">` with the titles of articles matched.

3. Now, make these titles clickables and send to route `/article`
* Hint 1 : Remember to look at the route in `routes.php` to know what this route needs to work.

