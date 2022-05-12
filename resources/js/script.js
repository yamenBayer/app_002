const APIURL = "";
const IMGPATH = "";
const SEARCHAPI = "";

const main = document.getElementById("main");
const film_info = document.getElementById("film_info");
const form = document.getElementById("form");
const search = document.getElementById("search");
const search_res = document.getElementById("search_res");
const total_records = document.getElementById("total_records");

const movie_ref = document.getElementsByClassName("Game");


const date = new Date();
document.getElementById("date").innerHTML = date;

// initially get fav Games
getGames(APIURL);

// get Game when click






// Functions



async function getGames(url) {
    const resp = await fetch(url);
    const respData = await resp.json();

    if (respData.results.length == 0) {
        search_res.innerHTML = "No Results Founds";
        total_records.innerHTML = '';
    }else{
        total_records.innerHTML = "Total Records: "+ respData.total_results
    }
    
    console.log(respData);

    showGames(respData.results);
    
}

function showGames(Games) {
    // clear main
    main.innerHTML = "";
    Games.forEach((Game, index) => {
        const GameEl = document.createElement("a");

    
        GameEl.classList.add("Game");
        GameEl.setAttribute("href","Game_details.html");


        if (Game.poster_path != null) {
            poster_path = IMGPATH + Game.poster_path;
        } else {
            poster_path = 'https://www.peakndt.com/wp-content/uploads/2017/02/No_picture_available.png';
        }

        GameEl.innerHTML = `

            <img id="image"
                src="${poster_path}"
                alt="${Game.title}"
            />
            <div class="Game-info">
                <h3>${Game.title}</h3>
                <span class="${getClassByRate(
                    Game.vote_average
        )}">${Game.vote_average}</span>
            </div>
        `;

        
        main.appendChild(GameEl);
    });
}



 

 function view_film_info(Game_ref){
    film_info.innerHTML = "";

    const Game1 = document.createElement("div");

    const img = Game_ref.innerHTML.getElementById("image");
    const info = Game_ref.innerHTML.getElementsByClassName("Game-info");

    
        Game1.classList.add("Game_section");


        Game1.innerHTML = img + info;

        
        film_info.appendChild(Game1);

}

function getClassByRate(vote) {
    if (vote >= 8) {
        return "green";
    } else if (vote >= 5) {
        return "orange";
    } else {
        return "red";
    }
}

form.addEventListener("submit", (e) => {
    e.preventDefault();

    const searchTerm = search.value;

    if (searchTerm) {
        getGames(SEARCHAPI + searchTerm);
        search.value = searchTerm;
        search_res.innerHTML = "Search Result for "+searchTerm;
    } else {
        getGames(APIURL);
    }

});