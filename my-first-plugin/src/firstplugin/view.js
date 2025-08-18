document.querySelector("#showPets").addEventListener("change", addAction);

function addAction(e){

    let selected = this.options[this.selectedIndex];

    if (!selected.value) {
        document.getElementById("stayHidden").style.display = "none";
        return;
    }

    // Get attributes
    let title = selected.getAttribute("data-title");
    let excerpt = selected.getAttribute("data-excerpt");
    let img = selected.getAttribute("data-img");
    let link = selected.getAttribute("data-link");

    // Update display
    document.getElementById("petTitle").innerText = title;
    document.getElementById("petExcerpt").innerText = excerpt;
    document.getElementById("petImg").src = img;
    document.getElementById("petLink").href = link;


    document.getElementById("stayHidden").style.display = "block";

}