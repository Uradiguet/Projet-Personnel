document.addEventListener("DOMContentLoaded", function() {
    // Dummy data for game list
    const games = [
        { title: "Half-Life", genre: "First-person shooter" },
        { title: "Portal", genre: "Puzzle-platformer" },
        { title: "Dota 2", genre: "MOBA" },
        { title: "Counter-Strike: Global Offensive", genre: "First-person shooter" },
    ];

    // Populate the game list
    const gameList = document.getElementById("gameList");
    games.forEach(game => {
        const gameCard = document.createElement("div");
        gameCard.innerHTML = `<h3>${game.title}</h3><p>${game.genre}</p>`;
        gameList.appendChild(gameCard);
    });
    function showGameDetails(gameId) {
    // Récupérer la section du jeu
    const gameSection = document.getElementById(gameId);

    // Ajouter ou retirer la classe "show" pour afficher ou masquer les détails
    gameSection.classList.toggle("show");
}

document.addEventListener("DOMContentLoaded", function() {
    // ... (Code précédent)

    // Fonction pour afficher les détails d'un jeu
    function showGameDetails(gameId) {
        // Récupérer la section du jeu
        const gameSection = document.getElementById(gameId);

        // Ajouter ou retirer la classe "show" pour afficher ou masquer les détails
        gameSection.classList.toggle("show");
    }

});

function showGameDetails(gameId) {
    // Récupérer la section du jeu
    const gameSection = document.getElementById(gameId);

    // Ajouter ou retirer la classe "show" pour afficher ou masquer les détails
    gameSection.classList.toggle("show");
}

document.addEventListener("DOMContentLoaded", function() {
    // ... (Code précédent)

    // Fonction pour afficher les détails d'un jeu
    function showGameDetails(gameId) {
        // Récupérer la section du jeu
        const gameSection = document.getElementById(gameId);

        // Ajouter ou retirer la classe "show" pour afficher ou masquer les détails
        gameSection.classList.toggle("show");
    }
});
