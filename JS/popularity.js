const apikey= "b8442a4865b3123e0303b772a7a80077";
let PopularityInput = document.querySelector("#container_popularity");
let container_film = document.querySelector("#container_film")
PopularityInput.addEventListener("click", function () {
        let url = 'https://api.themoviedb.org/3/movie/popular?api_key=' + apikey + '&language=en-US&page=1'+PopularityInput.value
        console.log(url)
        axios.get(url)
            .then(response => {
                // en cas de réussite de la requête
                console.log(response.results);
                console.log(PopularityInput);
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
                }
            })
            .then(function () {
                console.log("la fonction a bien été executé");
            });
    })
