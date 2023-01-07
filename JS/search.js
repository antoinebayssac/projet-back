const apikey= "b8442a4865b3123e0303b772a7a80077";
find()
function find() {
    let searchInput = document.querySelector("#search");
    let container_film = document.querySelector("#container_film")

    searchInput.addEventListener("keyup", function () {
        let url = 'https://api.themoviedb.org/3/search/movie?api_key=' + apikey + '&language=en-US&page=1&include_adult=false&query='+searchInput.value
        if (searchInput.value !== ""){
            console.log(url)
            axios.get(url)
                .then(response => {
            // en cas de réussite de la requête
            console.log(response.results);
            console.log(searchInput);
            let film = response.data.results
            container_film.innerHTML = "";

            for (let i = 0; i <= response.data.results.length; i++) {

                let container_div = document.createElement("div");
                container_div.classList = "w-[300px] h-[400px] object-cover";

                let link = document.createElement("a");
                link.href = "singlepage.php?" + "&id=" + film["id"];
                link.classList = "w-full h-full z-10";

                let img = document.createElement("img");
                img.src = "https://image.tmdb.org/t/p/w500" + film[i].poster_path;
                img.classList = "h-[400px] w-[300px] object-cover z-0";

                container_film.appendChild(container_div);
                container_div.appendChild(link);
                container_div.appendChild(img);

/*
                let container_div = document.createElement("div");
                container_div.classList = "w-[300px] h-[400px] object-cover";
                container_film.appendChild(container_div);
                let link = document.createElement("a");
                link.href = "singlepage.php?" + "&id=" + movie["id"];
                link.classList = "w-full h-full z-10";
                container_div.appendChild(link);
                let img = document.createElement("img");
                img.src = "https://image.tmdb.org/t/p/w500" + movie[i].poster_path;
                img.classList = "h-[400px] w-[300px] object-cover z-0";
                link.appendChild(img);
                container_film.appendChild(result);

 */
            }
        })
            .then(function () {
                // dans tous les cas
                console.log("la fonction a bien été executé");
            });
        }else{
            container_film.innerHTML = "";
        }
    })
}