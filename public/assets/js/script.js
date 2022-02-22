function updateHeadline(title, picture, content) {
    document.getElementById('headlineTitle').innerHTML = title;
    document.getElementById('headlinePicture').setAttribute('src', picture);
    document.getElementById('headlineContent').innerHTML = content;
}

updateHeadline(
    'Default Title',
    'assets/images/default_image.png',
    'Sit fugiat aute aute magna. Voluptate adipisicing ullamco nostrud esse. Exercitation fugiat consequat sunt aliquip adipisicing proident nulla deserunt aute ut fugiat. Laboris cillum qui sit in adipisicing quis irure nostrud quis veniam. Qui et id non culpa culpa cillum reprehenderit ut mollit.Labore occaecat enim cupidatat cupidatat enim adipisicing dolor officia elit deserunt. Lorem culpa sint tempor nostrud ipsum aliqua veniam ipsum do aute proident. Do fugiat consectetur tempor adipisicing amet officia non in voluptate. Ea aliqua fugiat adipisicing Lorem exercitation eiusmod pariatur deserunt amet et dolore exercitation consequat.'
);

document.getElementById('changeHeadlineButton').addEventListener('click', function () {
    //TODO 1 : Get a random article
});


document.getElementById('searchHeadline').addEventListener('change', function(e) {
    //Here we get the value typed in the input
    let search = e.target.value;

    //TODO 2 : Call the route 'api/articles/search' to get the list of the articles targeted by the search
});