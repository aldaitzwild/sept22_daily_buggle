function updateHeadline(title, picture, content) {
    document.getElementById('headlineTitle').innerHTML = title;
    document.getElementById('headlinePicture').setAttribute('src', picture);
    document.getElementById('headlineContent').innerHTML = content;
}

document.getElementById('changeHeadlineButton').addEventListener('click', function () {
    //TODO 1 : Get a random article
});

document.getElementById('searchHeadline').addEventListener('input', function(e) {
    //Here we get the value typed in the input
    let search = e.target.value;

    //TODO 2 : Call the route 'api/articles/search' to get the list of the articles targeted by the search
});