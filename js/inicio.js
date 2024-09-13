const $btnAddNote = document.getElementById("btnAddNote");
const $divElements = document.getElementById("divElements");

function removeElement(event) {
    //event.target.parentElement.remove()
        // Obtener el botón que fue clicado
        const button = event.target;
        // Obtener el div padre del botón
        const parentDiv = button.parentElement;
        // Obtener el div padre del div que contiene el botón
        const grandParentDiv = parentDiv.parentElement;
        // Eliminar el div padre del div que contiene el botón
        grandParentDiv.remove();
}



const templateElement = () => {
    return (`
          <div class="message-header">
            <p contenteditable="true" style="outline: none;"></p>
            <button class="delete" aria-label="delete" onclick="removeElement(event)"></button>
          </div>
          <div class="message-body" contenteditable="true" style="outline: none;"></div>
    `)
}


$btnAddNote.addEventListener("click", () => {
    const $article = document.createElement("article");

    $article.classList.add("message","is-dark");
    $article.innerHTML = templateElement();

    $divElements.insertBefore($article, $divElements.firstChild)

})