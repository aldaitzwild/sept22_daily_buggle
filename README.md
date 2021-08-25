# Atelier Daily Buggle

## Description

You have been recruted by The Daily Buggle to replace the precedent developer who worked on a way to rapidly change the homepage's headline of the website.

Unfortunatly, he did not finish and let the project incomplete...

So now it's your job to fix it ! Your goal: Pick a random headline without reloading the whole page. Then add a menu to search for a headline with specific keywords (still without reload the page).

![delay.jpg](https://i.imgflip.com/5kml2i.jpg)

## To start

1. Clone the repo from Github.
2. Run `composer install`.
3. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
4. Go to `localhost:8000` with your favorite browser.

## Get a random headline without reloading the page

1. First, you have to prepare the server side. Take a look at `routes.php`, you'll see you already have the route `ajax/random/article`. Try it. Yes, nothing...
2. To fix it, go to `AjaxController.php` and complete the funtion randomArticleJson(). This function should return the data of a random article in JSON (only one !). 
* Hint 1 : look at articlesJson() to see how to get articles and return JSON.
* Hint 2 : `rand()` can help to select a random element in a array

3. Once the route is ready, let's go to the client side. In `public\assets\js\script.js`, you'll find a `//TODO 1 : Get a random article`, this is the part of the code wich will be triggered on the click of the "Change the headline" button. 
This is where you have to work to get to contact the route `ajax/random/article`, get the data of the headline and update the homepage.
* Hint 1 : Use `fetch()` in js to to call the route
* Hint 2 : When you have the data, use the function updateHeadline() which will update the page for you.
4. Try it. 

## Add a menu to select a headline from specific keywords

1. Now we need to be able to select a specific article by a keyword of its title. 
The previous developer started to implement the feature in the div `searchMenu` from `index.html.twig`. He also let a `//TODO 2` in `script.js` to trigger some code when type something in the input.

In `routes.php` there is `ajax/search/articles`. Be careful, this route take one parameter.
First prepare this route to return all the articles wich contains in the title the word passed in parameter. 
* Hint 1 : You can use `stripos()` in PHP
2. Once the route is good. Go back in `script.js` to call it and feed the `<ul id="resultList">` with the titles of articles matched.

3. Now, make these title clickable and catch the clicc to update the homepage with the right headline
* Hint 1 : To keep it simple, rember you have a `onclick` attribute where you can call a JS function 
* Hint 2 : to hide the offcanvas menu use `bootstrap.Offcanvas.getInstance(document.getElementById('searchMenu')).hide()`

