// script.js

fetch('characters.php')
    .then(response => response.json())
    .then(characters => {
        const characterList = document.getElementById('character-list');
        characters.forEach(character => {
            const characterItem = document.createElement('div');
            characterItem.innerHTML = `
                <h2>${character.name}</h2>
                <p><strong>Species:</strong> ${character.species}</p>
                <p><strong>Gender:</strong> ${character.gender}</p>
                <p><strong>Occupation:</strong> ${character.occupation}</p>
            `;
            characterList.appendChild(characterItem);
        });
    })
    .catch(error => console.error('Error fetching characters:', error));
// script.js

const characterList = document.getElementById('character-list');
let currentPage = 1;

function fetchCharacters(page) {
    fetch(`characters.php?page=${page}`)
        .then(response => response.json())
        .then(data => {
            characterList.innerHTML = '';
            data.characters.forEach(character => {
                const characterItem = document.createElement('div');
                characterItem.innerHTML = `
                    <h2>${character.name}</h2>
                    <p><strong>Species:</strong> ${character.species}</p>
                    <p><strong>Gender:</strong> ${character.gender}</p>
                    <p><strong>Occupation:</strong> ${character.occupation}</p>
                `;
                characterList.appendChild(characterItem);
            });
            currentPage = page;
            updatePagination(data.totalPages);
        })
        .catch(error => console.error('Error fetching characters:', error));
}

function updatePagination(totalPages) {
    const pagination = document.getElementById('pagination');
    pagination.innerHTML = '';
    for (let i = 1; i <= totalPages; i++) {
        const pageLink = document.createElement('a');
        pageLink.href = '#';
        pageLink.textContent = i;
        if (i === currentPage) {
            pageLink.classList.add('active');
        }
        pageLink.addEventListener('click', () => fetchCharacters(i));
        pagination.appendChild(pageLink);
    }
}

fetchCharacters(1); // Chargement des personnages de la première page au démarrage

// script.js

function searchCharacters() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    fetch('characters.php')
        .then(response => response.json())
        .then(data => {
            const filteredCharacters = data.characters.filter(character =>
                character.name.toLowerCase().includes(searchInput)
            );
            characterList.innerHTML = '';
            filteredCharacters.forEach(character => {
                const characterItem = document.createElement('div');
                characterItem.innerHTML = `
                    <h2>${character.name}</h2>
                    <p><strong>Species:</strong> ${character.species}</p>
                    <p><strong>Gender:</strong> ${character.gender}</p>
                    <p><strong>Occupation:</strong> ${character.occupation}</p>
                `;
                characterList.appendChild(characterItem);
            });
            currentPage = 1; // Reset current page to 1 after search
            updatePagination(1); // Update pagination for filtered characters
        })
        .catch(error => console.error('Error fetching characters:', error));
}
