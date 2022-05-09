# Workshop Daily Buggle

## Description

You have been recruted by The Daily Buggle to replace the precedent developer who worked on a way to rapidly change the homepage's headline of the website.

Unfortunatly, he did not finish and let the project incomplete...

So now it's your job to fix it ! Your goal: Pick a random headline without reloading the whole page. Then add a menu to search for a headline with specific keywords (still without reload the page).

![delay.jpg](https://i.imgflip.com/5kml2i.jpg)

## To start

1. Clone the repo from [Github](https://github.com/WildCodeSchool/php_daily_buggle_workshop).
2. Run `composer install`.
3. Configure your *config/db.php* from *config/db.php.dist* file and add your DB parameters.
4. Import data in your SQL server with the command `php migration.php`;
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`.

## STEP 1 : Get a random headline without reloading the page

1. First, you have to prepare the server side. Take a look at `routes.php`, you'll see you already have the route `api/articles/random`. Try it [http://localhost:8000/api/articles/random](http://localhost:8000/api/articles/random). Yes, nothing...

2. To fix it, go to `AjaxController.php` and complete the function `getRandomArticle()`. This function should return the data of a random article in JSON (only one article !). 
* Hint 1 : Create a custom method `selectRandomOne()` in `ArticleManager`
* Hint 2 : Use `ORDER BY RAND() LIMIT 1` in your query to get only **one** random result
* Result : If you did right, [http://localhost:8000/api/articles/random](http://localhost:8000/api/articles/random) should look something like that : 
```json
{
  "id": "3",
  "title": "Doctor Octopus holds up another bank !",
  "author": "Peter Parker",
  "picture": "assets/images/article_3.jpg",
  "date": "2021-04-28 00:00:00",
  "content": "[ARTICLE_CONTENT]"
}
```

3. Once the route is ready, let's go to the client side. In `public\assets\js\script.js`, you'll find a `//TODO 1 : Get a random article`, this is the part of the code which will be triggered on the click of the "Change the headline" button. The event listener is already configured.

This is where you have to work to contact the route `api/articles/random`, get the data of the headline and update the homepage.
* Hint 1 : Use `fetch()` in JS to to call the route : [doc](https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch)
* Hint 2 : When you have the JSON data, use the provided function `updateHeadline(article)` which will update the DOM of the homepage with the data of the random article.

## STEP 2 : Add a menu to select a headline from specific keywords

1. Now we need to be able to select a specific article by a keyword of its title.
The previous developer started to implement the feature in the div `searchMenu` (which opens when you click on button "Search for a specific headline") from `index.html.twig`. He also let a `//TODO 2` in `script.js` to trigger some code when type something in the input.

In `routes.php` there is `api/articles/search`. Be careful, this route takes one parameter. It refers to `searchArticles()` method of the `AjaxController`.
First prepare this route to return all the articles which contains in the title the word passed in parameter.

It should look something like that [http://localhost:8000/api/articles/search?search=spider](http://localhost:8000/api/articles/search?search=spider) <= here we search all the articles which contains the word "spider" in their title.

* Hint 1 : You'll need a new method in the `ArticleManager` (and use a LIKE) 
* Hint 2 : Your `searchArticles()` method in `AjaxController` should return a collection of articles in JSON :

```json
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


2. Once the method works, go back in `script.js` to call the associated route `api/articles/search?search=mySearch` with `fetch()`. The associated Event Listener will be execute each time a new letter is added in the input field. The query string should use the actual value in the input (it is already done with the line `let search = e.target.value;`)

3. Once you get JSON response, you should feed the `<ul id="resultList">` with the titles of articles matched.

**BONUS** : Now, make these titles clickables and send to route `/article` (look at the route in `routes.php` to know what this route needs to work.) and complete the controller to display a page with the article details. 
