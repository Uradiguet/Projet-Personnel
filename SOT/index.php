<!-- Ajoutez ces balises à l'intérieur du body de votre page index.php -->
<button onclick="openSearchModal()">Rechercher</button>

<div id="searchModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeSearchModal()">&times;</span>
        <form action="search.php" method="get">
            <label for="query">Rechercher :</label>
            <input type="text" name="query" required>
            <input type="submit" value="Rechercher">
        </form>
    </div>
</div>

<script>
    function openSearchModal() {
        document.getElementById("searchModal").style.display = "block";
    }

    function closeSearchModal() {
        document.getElementById("searchModal").style.display = "none";
    }
</script>
