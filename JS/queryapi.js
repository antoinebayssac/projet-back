const apikey= "b8442a4865b3123e0303b772a7a80077";

function queryGenres() {
    return fetch("https://api.themoviedb.org/3/genre/movie/list?api_key=" + apikey+ '&language=fr-FR')
        .then(response => response.json());
}

function queryFilmByGenre(genres) {
    return fetch("https://api.themoviedb.org/3/discover/movie?api_key=" + apikey + "&language=FR-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate" + "&with_genres=" + genres)
    .then(response => response.json());

}


let container_genre = document.querySelector("#container_genre")  
let container_film = document.querySelector("#container_film")  

queryGenres().then(query=>{
    for(let genre of query.genres){
        let a=document.createElement("button")
        a.innerHTML=genre["name"]
        container_genre.appendChild(a)
        a.addEventListener("click", () => {
            moovieByGenre(genre["id"])
        })
    }
})

function moovieByGenre(genre){
    queryFilmByGenre(genre).then(data => {
        console.log(data["results"])
        if(container_film.innerHTML !== null) {
            container_film.innerHTML=""
        }
        data["results"].forEach(film =>{
            let img= document.createElement("img")
            img.src="https://image.tmdb.org/t/p/w500" + film["poster_path"]
            img.classList = "h-[400px] w-[300px] object-cover"
            container_film.appendChild(img)
        });
    })  
}







